<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;

use App\Models\Register;

class RegisterController extends Controller
{
    //
    public function test(){ 

        echo "hello world";

        return view('register');
    }
}
