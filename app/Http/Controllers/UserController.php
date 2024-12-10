<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;

class UserController extends Controller
{

  public function account(){
    return view('user.account');
  }

    public function list()
    {
        return view('/list', ['user' => Users::all()]);
    }
}
