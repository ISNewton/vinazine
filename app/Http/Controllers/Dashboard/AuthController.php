<?php

namespace App\Http\Controllers\Dashboard;


use App\Http\Requests\LoginRequest;
use App\Http\Controllers\Controller;
use DOMComment;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(LoginRequest $request)
    {
        if(Auth::attempt($request->validated())) {
            return redirect(route('dashboard'));
        }
        return redirect()->route("login")->with("error", "These credentials do not match our records!");
    }

    public function logout() {
        Auth::logout();
        return redirect(route('login'));
    }
}
