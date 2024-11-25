<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Rules\ReCaptcha;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\RateLimiter;

class AuthenticationController extends Controller
{
    public function forgotPassword() {
        return view('backend.pages.authentications.forgot-password');
    }

    public function forgotPasswordPost(Request $request) {

        $this->validate($request, [
            'email' => 'required|email|exists:users,email',
        ], [
            'email.required' => 'The email address is required.',
            'email.email' => 'Please enter a valid email address.',
            'email.exists' => 'This email is not registered in our system.',
        ]);

        $user = User::where('email', $request['email'])->where('status', 1)->first();

        if ($user) {
            $mail = [
                'to' => $user->email,
                'email' => env('MAIL_FROM_ADDRESS'),
                'from' => 'dokumentasi umkm dinas perdagangan kota surakarta',
                'subject' => 'Reset Password',
                'url' => route('reset-password', ['id' => Crypt::encrypt($user->id)]),
            ];

            Mail::send('backend.emails.forgot-password', $mail, function($message) use ($mail) {
                $message->to($mail['to'])
                    ->from($mail['email'], $mail['from'])
                    ->subject($mail['subject']);
            });

            return back()->with('success', "Permintaan reset kata sandi telah berhasil dikirim ke email {$user->email}. Silakan cek email Anda.");
        } else {
            return back()->with('error', 'The email you entered is incorrect. Please try again');
        }
    }

    public function resetPassword($id) {
        $user = User::find(Crypt::decrypt($id));

        return view('backend.pages.authentications.reset-password', compact(
            'user',
        ));
    }

    public function resetPasswordPost(Request $request, $id) {
        $user = User::find($id);

        $request->validate([
            'password' => 'required|min:8|regex:/[A-Za-z]/|regex:/[0-9]/|regex:/[\W_]/',
            'confirm_password' => 'required|same:password',
        ], [
            'password.min' => 'The password must be at least 8 characters long.',
            'password.regex' => 'The password must contain at least one letter, one number, and one special character.',
            'confirm_password.same' => 'The password confirmation does not match.',
        ]);

        try {
            $array = [
                'password' => bcrypt($request['password']),
            ];

            $user->update($array);

            $mail = [
                'to' => $user->email,
                'email' => env('MAIL_FROM_ADDRESS'),
                'from' => 'dokumentasi umkm dinas perdagangan kota surakarta',
                'subject' => 'Penggantian Password Anda Berhasil Dilakukan',
            ];

            Mail::send('backend.emails.reset-password', $mail, function($message) use ($mail) {
                $message->to($mail['to'])
                    ->from($mail['email'], $mail['from'])
                    ->subject($mail['subject']);
            });

            return redirect()->route('login')->with('success', "Reset kata sandi Anda telah berhasil dilakukan. Anda sekarang dapat mengakses akun Anda dengan menggunakan kata sandi baru.");
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }

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
            'password' => 'required|min:8|regex:/[A-Za-z]/|regex:/[0-9]/|regex:/[\W_]/',
            'confirm_password' => 'required|same:password',
            'g-recaptcha-response' => [new ReCaptcha],
        ], [
            'email.required' => 'The email address is required.',
            'email.email' => 'Please enter a valid email address.',
            'email.exists' => 'This email is not registered in our system.',
            'password.required' => 'The password is required.',
            'password.min' => 'The password must be at least 8 characters long.',
            'password.regex' => 'The password must contain at least one letter, one number, and one special character.',
            'confirm_password.required' => 'Please confirm your password.',
            'confirm_password.same' => 'The password confirmation does not match.',
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
                } elseif (auth()->user()->role == 2) {
                    RateLimiter::clear($request->ip());
                    return redirect()->route('index');
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
