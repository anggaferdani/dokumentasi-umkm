<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserContoller extends Controller
{
    public function index(Request $request) {
        $query = User::where('role', 2)->where('status', true);

        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', '%' . $search . '%')
                  ->orWhere('email', 'like', '%' . $search . '%');
            });
        }

        $users = $query->latest()->paginate(10);

        return view('backend.pages.user.index', compact(
            'users',
        ));
    }

    public function create() {
        return view('backend.pages.user.create');
    }

    public function store(Request $request) {
        try {
            $request->validate([
                'name' => 'required',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|min:8|regex:/[A-Za-z]/|regex:/[0-9]/|regex:/[\W_]/',
                'confirm_password' => 'required|same:password',
            ], [
                'name.required' => 'Nama wajib diisi.',
                'email.required' => 'Email wajib diisi.',
                'email.email' => 'Email harus berupa alamat email yang valid.',
                'email.unique' => 'Email sudah terdaftar.',
                'password.required' => 'Kata sandi wajib diisi.',
                'password.min' => 'Kata sandi harus memiliki panjang minimal 8 karakter.',
                'password.regex' => 'Kata sandi harus mengandung setidaknya satu huruf, satu angka, dan satu karakter khusus.',
                'confirm_password.required' => 'Harap konfirmasi kata sandi Anda.',
                'confirm_password.same' => 'Konfirmasi kata sandi tidak cocok.',
            ]);

            $array = [
                'name' => $request['name'],
                'email' => $request['email'],
                'password' => bcrypt($request['password']),
                'password_last_changed' => now(),
                'role' => 2,
            ];

            User::create($array);
    
            return redirect()->route('admin.user.index')->with('success', 'Data berhasil ditambahkan');
        } catch (\Illuminate\Validation\ValidationException $e) {
            return back()->withErrors($e->errors())->withInput();
        }
    }

    public function show($id) {}

    public function edit($id) {
        $user = User::find($id);

        return view('backend.pages.user.edit', compact(
            'user',
        ));
    }

    public function update(Request $request, $id) {
        try {
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

    public function destroy($id) {
        try {
            $user = User::find($id);

            $user->update([
                'status' => false,
            ]);

            return redirect()->back()->with('error', 'Data berhasil dihapus');
        } catch (\Illuminate\Validation\ValidationException $e) {
            return back()->withErrors($e->errors())->withInput();
        }
    }
}
