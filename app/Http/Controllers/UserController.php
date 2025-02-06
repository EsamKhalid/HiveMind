<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Users;

class UserController extends Controller
{


  public function view(){
   if(Auth::check()){
      return view('user.account');
    }
    else{
      return redirect()->route('login');
    }
 
  }

    public function list()
    {
        return view('/list', ['user' => Users::all()]);
    }


    public function settings(){
      return view('user.settings');
    }

    public function terms(){
      return view('user.terms');
    }
}
