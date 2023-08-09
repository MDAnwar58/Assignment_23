<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    function loginPage()
    {
        return view('auth.login');
    }
    function login(Request $request)
    {
        $request->validate([
            'email' => 'required|max:150|email',
            'password' => 'required|min:6',
        ]);

        $user = User::where('email', $request->email)->first();
        if(Hash::check($request->password, $user->password))
        {
            if(Auth::guard('web')->attempt(['email' => $request->email, 'password' => $request->password]))
            {
                return redirect()->route('admin.dashboard');
            }else{
                return back()->with('error', 'Login Fail');
            }
        }
        return back()->with('error', 'Please enter valid password');
    }
    function registerPage()
    {
        return view('auth.register');
    }
    function register(Request $request)
    {
        $request->validate([
            'name' => 'required|max:50',
            'email' => 'required|max:150|unique:users,email',
            'password' => 'required|confirmed|min:6',
            'password_confirmation' => 'required|min:6',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('login.page')->with('success', 'Your account created successfully!');
    }

    function logout()
    {
        Auth::guard('web')->logout();

        return redirect()->route('login.page');
    }
}
