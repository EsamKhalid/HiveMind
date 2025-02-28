<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;

class UserManagementController extends Controller
{
    //

    public function view(){

        $users = Users::query();

        $users = $users->get();
        

        //echo $users;

        return view('admin.user-management', compact('users'));
    }
}
