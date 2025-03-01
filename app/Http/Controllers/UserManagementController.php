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

    public function list(Request $request){
        $search = $request->input('search');
        $filter = $request->input('filter');

        $categoryButton = $request->input('categoryButton');

        $users = Users::query();

        if($categoryButton){
            $users->where('permission_level', '=', $categoryButton);
        }

        if ($search) {
            $users = $users->where('first_name', 'like', '%' . $search . '%') + $users->where('last_name', 'like', '%' . $search . '%');
        }

        if ($filter && $filter != 'none') {
            $users->where('permission_level', '=', $filter);
        }

        $users = $users->get();

        return view('admin.user-management', compact('users', 'search', 'filter')); 
    }
}
