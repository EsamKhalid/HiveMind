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
    public function show($id)
    {
        $user = users::findOrFail($id);
        return view('admin.view-user', ['user' => $user]); 
    }
}
