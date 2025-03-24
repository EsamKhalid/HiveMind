<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Users;
use App\Models\User;

class SignupController extends Controller{


    public function signup(){
        return view('signup.signup');
    }


    public function store(Request $request){
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:12|regex:/^\+?[0-9]{10,12}$/',
            'email_address' => 'required|string|email|max:255|unique:users,email_address',
            'password' => [
            'required',
            'string',
            'min:8',
            'confirmed',
            'regex:/^(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/'
        ],
            'memorable_question' => 'required|string|max:255',
            'memorable_answer' => 'required|string|max:55',
        ]);


    
        User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'phone_number' => $request->phone_number,
            'email_address' => $request->email_address,   
            'password' => bcrypt($request->password),
            'memorable_question' => $request->memorable_question,
            'memorable_answer' => Hash::make($request->memorable_answer),
        ]);

        return redirect()->route('login')->with('success', 'Signup successful!');
    }
}


    
    
    