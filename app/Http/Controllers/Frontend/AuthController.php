<?php

namespace App\Http\Controllers\Frontend;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Storage;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Requests\frontend\LoginRequest;
use App\Http\Requests\frontend\RegisterRequest;
use App\Http\Requests\frontend\UpdateProfileRequest;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

class AuthController extends Controller
{
    public function register(RegisterRequest $request)
    {
        $user = User::create($request->validated());

        $user->sendEmailVerificationNotification();

        Auth::login($user);

        return redirect(route('verification.notice'));
    }

    public function login(LoginRequest $request)
    {
        $user = User::where('email', $request->email)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            if ($user->is_blocked) {
                return redirect(route('login'))->withInput()->with('errors', collect(['This account is suspended at the moment']));
            }
            Auth::login($user);

            return redirect()->intended(route('home'))->with(['message' => [
                'message' => 'Logged in',
                'type' => 'success'
            ]]);
        }

        return redirect(route('login'))->withInput()->with('errors', collect(['These credintials do not match our records']));
    }

    public function googleRedirect() {
        return Socialite::driver('google')->redirect();
    }

    public function googleCallback() {
        try {
            $user = Socialite::driver('google')->user();
        } catch (\Exception $e) {
            return redirect(route('login'));
        }

        $userExist = User::where('email',$user->email)->first();

        if($userExist) {
            if ($userExist->is_blocked) {
                return redirect(route('login'))->withInput()->with('errors', collect(['This account is suspended at the moment']));
            }
            Auth::login($userExist);
        }
        else {
            $newUser = User::create([
                'google_id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'avatar' => $user->avatar
            ]);

            Auth::login($newUser);
        }

        return redirect()->intended(route('home'))->with(['message' => [
            'message' => 'Logged in',
            'type' => 'success'
        ]]);
    }

    public function logout()
    {
        Auth::logout();
        return redirect(route('home'));
    }

    public function profile()
    {
        $user = User::find(Auth::id());

        $user->load(['posts' => function ($query) {
            $query->select('id', 'category_id', 'title', 'user_id', 'created_at', 'slug', 'thumbnail')
                ->with('category')
                ->latest()
                ->take(6);
        }]);
        $user->loadCount('comments');
        return view('frontend.auth.profile', compact('user'));
    }

    public function edit()
    {
        $user = Auth::user();

        return view('frontend.auth.edit-profile', compact('user'));
    }

    public function update(UpdateProfileRequest $request)
    {
        $user = User::find(Auth::id());

        $data = $request->validated();

        if ($request->hasFile('avatar')) {
            $data['avatar'] = Storage::disk('custome')->put('images/avatars', $request->avatar);
        }
        $user->update($data);

        return redirect(route('profile'))->with(['message' => [
            'message' => 'Profile updated',
            'type' => 'success'
        ]]);
    }

    public function handleVerificationEmailUrl(EmailVerificationRequest $request ) {
        $request->fulfill();

        return redirect(route('home'))->with('message',[
            'message' => 'Email has been verified',
            'type' => 'success'
        ]);
    }

    public function resendEmailVerificationUrl(Request $request) {
        $request->user()->sendEmailVerificationNotification();

        return back()->with('resent', 'Verification link sent!');
    }

    public function verify()
    {
        return view('frontend.auth.verify-email');
    }
}
