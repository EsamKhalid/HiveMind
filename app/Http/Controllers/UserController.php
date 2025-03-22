<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Users;

class UserController extends Controller
{


  public function view(){

    $user = Auth::user();

   if(Auth::check()){
      return view('user.account', ['user' => $user]);
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

    public function updateSettings(Request $request) {
      $request-> validate([ 'terms_conditions'=>'required|boolean']);
      $user = Auth::user();
      $user->update(['terms_conditions' => $request->has('terms_conditions') ? 1 :0]);
      return redirect()->route('settings')->with('success', 'Settings updated successfully!');
    }


}