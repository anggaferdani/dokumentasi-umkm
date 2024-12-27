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
    public function profile() {
        $user = User::where('id', Auth::id())->first();

        return view('backend.pages.profile', compact(
            'user',
        ));
    }

    public function profileUpdate(Request $request, $id) {
        $user = User::find($id);

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$user->id.",id",
            'password' => 'nullable|min:8|regex:/[A-Za-z]/|regex:/[0-9]/|regex:/[\W_]/',
            'confirm_password' => 'nullable|same:password',
        ], [
            'name.required' => 'Nama wajib diisi.',
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Email harus berupa alamat email yang valid.',
            'email.unique' => 'Email sudah digunakan oleh pengguna lain.',
            'password.min' => 'Kata sandi harus memiliki panjang minimal 8 karakter.',
            'password.regex' => 'Kata sandi harus mengandung setidaknya satu huruf, satu angka, dan satu karakter khusus.',
            'confirm_password.same' => 'Konfirmasi kata sandi tidak cocok.',
        ]);

        try {
            $array = [
                'name' => $request['name'],
                'email' => $request['email'],
            ];

            if ($request['password']) {
                $array['password'] = bcrypt($request['password']);
                $array['password_last_changed'] = now();
            }

            $user->update($array);
    
            return redirect()->back()->with('success', 'Data berhasil diupdate');
        } catch (\Illuminate\Validation\ValidationException $e) {
            return back()->withErrors($e->errors())->withInput();
        }
    }

    public function forgotPassword() {
        return view('backend.pages.authentications.forgot-password');
    }

    public function forgotPasswordPost(Request $request) {
        try {
            $this->validate($request, [
                'email' => 'required|email|exists:users,email',
            ], [
                'email.required' => 'Alamat email harus diisi.',
                'email.email' => 'Harap masukkan alamat email yang valid.',
                'email.exists' => 'Email ini tidak terdaftar di sistem kami.',
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
                return back()->with('error', 'Email yang Anda masukkan salah. Silakan coba lagi.');
            }
        } catch (\Illuminate\Validation\ValidationException $e) {
            return back()->withErrors($e->errors())->withInput();
        }
    }

    public function resetPassword($id) {
        $user = User::find(Crypt::decrypt($id));

        return view('backend.pages.authentications.reset-password', compact(
            'user',
        ));
    }

    public function resetPasswordPost(Request $request, $id) {
        try {
            $user = User::find($id);
    
            $request->validate([
                'password' => 'required|min:8|regex:/[A-Za-z]/|regex:/[0-9]/|regex:/[\W_]/',
                'confirm_password' => 'required|same:password',
            ], [
                'password.min' => 'Kata sandi harus memiliki panjang minimal 8 karakter.',
                'password.regex' => 'Kata sandi harus mengandung setidaknya satu huruf, satu angka, dan satu karakter khusus.',
                'confirm_password.same' => 'Konfirmasi kata sandi tidak cocok.',
            ]);

            $array = [
                'password' => bcrypt($request['password']),
                'password_last_changed' => now(),
            ];

            Auth::guard('web')->logout();

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
        } catch (\Illuminate\Validation\ValidationException $e) {
            return back()->withErrors($e->errors())->withInput();
        }
    }

    public function login() {
        return view('backend.pages.authentications.login');
    }

    public function postLogin(Request $request) {

        if (RateLimiter::tooManyAttempts($request->ip(), 3)) {
            $seconds = RateLimiter::availableIn($request->ip());
            return redirect()->route('login')->with('error', 'Terlalu banyak percobaan login. Silakan coba lagi dalam ' . $seconds . ' detik.');
        }
        
        $this->validate($request, [
            'email' => 'required|email|exists:users,email',
            'password' => 'required|min:8|regex:/[A-Za-z]/|regex:/[0-9]/|regex:/[\W_]/',
            'confirm_password' => 'required|same:password',
            'g-recaptcha-response' => [new ReCaptcha],
        ], [
            'email.required' => 'Alamat email wajib diisi.',
            'email.email' => 'Masukkan alamat email yang valid.',
            'email.exists' => 'Alamat email ini tidak terdaftar di sistem kami.',
            'password.required' => 'Kata sandi wajib diisi.',
            'password.min' => 'Kata sandi harus terdiri dari minimal 8 karakter.',
            'password.regex' => 'Kata sandi harus mengandung setidaknya satu huruf, satu angka, dan satu karakter khusus.',
            'confirm_password.required' => 'Konfirmasi kata sandi wajib diisi.',
            'confirm_password.same' => 'Konfirmasi kata sandi tidak cocok.',
        ]);

        $credentials = array(
            'email' => $request['email'],
            'password' => $request['password'],
        );

        if (Auth::guard('web')->attempt($credentials)) {
            $user = auth()->user();

            if (auth()->user()->status == true) {
                $passwordLastChanged = $user->password_last_changed;
                $threeMonthsAgo = now()->subMonths(3);

                if ($passwordLastChanged < $threeMonthsAgo) {
                    $userId = $user->id;
                    Auth::guard('web')->logout();
                    return redirect()->route('reset-password', ['id' => Crypt::encrypt($userId)])->with('error', 'Password Anda telah kedaluwarsa lebih dari 3 bulan. Silakan segera melakukan pembaruan password untuk menjaga keamanan akun Anda.');
                }

                if (auth()->user()->role == 1) {
                    RateLimiter::clear($request->ip());
                    return redirect()->route('admin.dashboard');
                } elseif (auth()->user()->role == 2) {
                    RateLimiter::clear($request->ip());
                    return redirect()->route('index');
                } else {
                    return redirect()->route('login')->with('error', 'Level akun yang Anda masukkan tidak sesuai.');
                }
            } else {
                Auth::guard('web')->logout();
                return redirect()->route('login')->with('error', 'Akun Anda telah dinonaktifkan.');
            }
        } else {
            RateLimiter::hit($request->ip(), 60);
            return redirect()->route('login')->with('error', 'Email atau kata sandi yang Anda masukkan salah. Silakan coba lagi.');
        }
    }

    public function logout() {
        Auth::guard('web')->logout();
        return redirect()->route('login');
    }
}
