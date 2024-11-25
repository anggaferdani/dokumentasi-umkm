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

    public function create() {}

    public function store(Request $request) {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|regex:/[A-Za-z]/|regex:/[0-9]/|regex:/[\W_]/',
            'confirm_password' => 'required|same:password',
        ], [
            'password.required' => 'The password is required.',
            'password.min' => 'The password must be at least 8 characters long.',
            'password.regex' => 'The password must contain at least one letter, one number, and one special character.',
            'confirm_password.required' => 'Please confirm your password.',
            'confirm_password.same' => 'The password confirmation does not match.',
        ]);

        try {
            $array = [
                'name' => $request['name'],
                'email' => $request['email'],
                'password' => bcrypt($request['password']),
                'role' => 2,
            ];

            User::create($array);
    
            return redirect()->back()->with('success', 'Success.');
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }

    public function show($id) {}

    public function edit($id) {}

    public function update(Request $request, $id) {
        $user = User::find($id);

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$user->id.",id",
            'password' => 'nullable|min:8|regex:/[A-Za-z]/|regex:/[0-9]/|regex:/[\W_]/',
            'confirm_password' => 'nullable|same:password',
        ], [
            'password.min' => 'The password must be at least 8 characters long.',
            'password.regex' => 'The password must contain at least one letter, one number, and one special character.',
            'confirm_password.same' => 'The password confirmation does not match.',
        ]);

        try {
            $array = [
                'name' => $request['name'],
                'email' => $request['email'],
            ];

            if ($request['password']) {
                $array['password'] = bcrypt($request['password']);
            }

            $user->update($array);
    
            return redirect()->back()->with('success', 'Success.');
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }

    public function destroy($id) {
        try {
            $user = User::find($id);

            $user->update([
                'status' => false,
            ]);

            return redirect()->back()->with('success', 'Success.');
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }
}
