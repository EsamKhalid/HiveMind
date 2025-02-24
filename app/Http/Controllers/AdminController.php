<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    //

   
    

    public function dashboard(){

        $user = Auth::User();

        if($user->permission_level != "admin"){
            echo "not an admin";
            return redirect()->route('account');
        }
        else{ return view('admin.dashboard');}

        
    }
}
