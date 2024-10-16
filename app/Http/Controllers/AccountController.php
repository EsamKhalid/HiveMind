<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account;

class AccountController extends Controller
{
    public function show($id){
        $account = Account::find($id);
        return view('/show', array('account' => $account));
        }
        public function list(){
        return view('/list', array('accounts'=>Account::all()));
        }
}
