<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;

class SignupController extends Controller{


    public function signup(){
        return view('signup');
    }


    public function store(Request $request){
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:12',
            'email_address' => 'required|string|email|max:255',
            'password' => 'required|string|min:8',
        ]);

        Users::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'phone_number' => $request->phone_number,
            'email_address' => $request->email_address,   
            'password' => bcrypt($request->password),
        ]);

        return redirect()->route('account')->with('success', 'Signup successful!');
    }
}


    
    
    