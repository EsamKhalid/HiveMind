<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserManagementController extends Controller
{
    //

    public function view(){
        return view('admin.user-management');
    }
}
