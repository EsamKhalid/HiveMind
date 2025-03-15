<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;

class SignupController extends Controller{


    public function signup(){
        return view('signup.signup');
    }


    public function store(Request $request){
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:12',
            'email_address' => 'required|string|email|max:255',
            'password' => 'required|string|min:8|confirmed',
            'memorable_information_question' => 'required|string|max:255',
            'memorable_information' => 'required|string|max:255',
        ]);


    
        Users::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'phone_number' => $request->phone_number,
            'email_address' => $request->email_address,   
            'password' => bcrypt($request->password),
            'memorable_information_question' => $request->memorable_information_question,
            'memorable_information' => $request->memorable_information,
        ]);

        return redirect()->route('login')->with('success', 'Signup successful!');
    }
}


    
    
    