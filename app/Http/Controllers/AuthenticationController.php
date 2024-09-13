<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;

class AuthenticationController extends Controller
{
    public function login() {
        return view('backend.pages.authentications.login');
    }

    public function postLogin(Request $request) {

        if (RateLimiter::tooManyAttempts($request->ip(), 5)) {
            $seconds = RateLimiter::availableIn($request->ip());
            return redirect()->route('login')->with('error', 'Too many login attempts. Please try again in ' . $seconds . ' seconds.');
        }
        
        $this->validate($request, [
            'email' => 'required|email|exists:users,email',
            'password' => 'required',
        ]);

        $credentials = array(
            'email' => $request['email'],
            'password' => $request['password'],
        );

        if (Auth::guard('web')->attempt($credentials)) {
            if (auth()->user()->status == true) {
                if (auth()->user()->role == 1) {
                    RateLimiter::clear($request->ip());
                    return redirect()->route('admin.dashboard');
                } else {
                    return redirect()->route('login')->with('error', 'The account level you entered does not match');
                }
            } else {
                Auth::guard('web')->logout();
                return redirect()->route('login')->with('error', 'Your account has been disabled');
            }
        } else {
            RateLimiter::hit($request->ip(), 60);
            return redirect()->route('login')->with('error', 'The email or password you entered is incorrect. Please try again');
        }
    }

    public function logout() {
        Auth::guard('web')->logout();
        return redirect()->route('login');
    }
}
