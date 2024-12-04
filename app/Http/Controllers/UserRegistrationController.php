<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class UserRegistrationController extends Controller
{
    public function showForm()
    {
        return view('signup');
    }


    public function register(Request $request)
    {
        // Validate the input
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'phone_number' => 'required|string|regex:/^\+?[0-9]{7,15}$/',
            'email' => 'required|email|confirmed|unique:users,email',
            'password' => 'required|string|confirmed|min:8|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)/',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        // Create the user
        User::create([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'phone_number' => $request->input('phone_number'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
        ]);

        return redirect()->route('projects')->with('success', 'Registration successful!');
    }
}
