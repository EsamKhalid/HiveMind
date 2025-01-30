<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Users;

class UserController extends Controller
{

  public function view(){

    $user = Auth::user();


    return view('user.account', ['user' => $user]);
  }

    public function list()
    {
        return view('/list', ['user' => Users::all()]);
    }


    public function details(){
      return view('account.details');
    }
}
