<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;

class PasswordResetController extends Controller
{
    public function requestView() {
        return view('frontend.auth.forgot-password');
    }

    public function handlePasswordRequest(Request $request) {
        $request->validate([
            'email' => 'required|email',
            'g-recaptcha-response' => 'required|captcha',
        ],['g-recaptcha-response.required' => 'The captcha field is required']);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status === Password::RESET_LINK_SENT
            ? back()->with(['status' =>   __($status)])
            : back()->withErrors(['email' => __($status)]);
    }

    public function resetView($token) {
        return view('frontend.auth.reset-password', ['token' => $token]);
    }

    public function handlePasswordReset(Request $request) {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => $password
                ])->setRememberToken(Str::random(60));

                $user->save();

                event(new PasswordReset($user));
            }
        );

        return $status === Password::PASSWORD_RESET
            ? redirect()->route('login')->with('message',['message' => __($status) , 'type' => 'warning'])
            : back()->withErrors(['email' => [__($status)]]);
    }
}
