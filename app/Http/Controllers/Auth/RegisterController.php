<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;

use App\Models\Register;

class RegisterController extends Controller
{
    //
    public function test()
    {
        return view('register');
    }

    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:registers', // Ensure unique email
            'password' => 'required|string|min:8',
        ]);

        // Create a new register entry
        $register = new Register();
        $register->name = $request->input('name');
        $register->email = $request->input('email');
        $register->password = Hash::make($request->input('password')); // Hash the password
        $register->save();

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Registration successful!');
    }
}
