<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('login.login');
    }

    public function login(Request $request)
    {
        $request->validate([
           'email' => 'required|string|email:rfc,dns|max:50',
           'password' => 'required|string',
        ]);


        $user = User::where('email_address', $request->email)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            Auth::login($user);
            return redirect()->route('orders')->with('success', 'Login successful!');
        }

        return back()->withErrors(['login' => 'Invalid email or password.'])->withInput();
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('home')->with('success', 'Logged out successfully!');
    }

}
