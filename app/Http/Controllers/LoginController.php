<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Users;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('login.login');
    }

    public function login(Request $request)
    {

        //this one has better validation but not using for time being

        // $request->validate([
        //     'email' => 'required|string|email:rfc,dns|max:50',
        //     'password' => 'required|string',
        // ]);

        $request->validate([
            'email' => 'required|string|email|max:50',
            'password' => 'required|string',
        ]);

        $user = Users::where('email_address', $request->email)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            Auth::login($user);
            if($user->permission_level == "admin"){
                echo 'user is an admin';
                //return redirect()->route('admin.dashboard')->with('success','Admin Login successful!');
                return-redirect()->route('products');
            }else{
                return redirect()->route('products')->with('success', 'Login successful!');
            }
            
        }

        return back()->withErrors(['login' => 'Invalid email or password.'])->withInput();
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('home')->with('success', 'Logged out successfully!');
    } 
    
} 
