<?php

namespace App\Http\Controllers\auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Login section
    public function login_view()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($request->except(['_token', 'submit']))) {
            $type = Auth::user()->type;
            if ($type == "superadmin") {
                return redirect()->route('customerlist');
            } elseif ($type == "admin") {
                return redirect()->route('admin.show');
            } else {
                Auth::logout();
                return redirect()->route('login');
            }
        } else {
            return back()->with(['failure' => 'Invalid login credentials!']);
        }
    }

    // Register section
    public function register_view()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'confirmed'],
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ];

        $is_registered = User::create($data);

        if ($is_registered) {
            return back()->with(['success' => 'Successfully registered!']);
        } else {
            return back()->with(['failure' => 'Failed to register!']);
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with(['success'=> 'Succesfully logout']);
    }
}
