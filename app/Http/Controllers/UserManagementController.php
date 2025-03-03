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

    public function update(Request $request,$id){
        //verify data is correct
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:12',
            'email_address' => 'required|string|email|max:255',
        ]);
        

        //find user by id
        $user = Users::findOrFail($id);
        //replace their data with new data
        $user->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'phone_number' => $request->phone_number,
            'email_address' => $request->email_address,   
        ]);

    //return to user management
        return redirect()->route('home')->with('success','User Updated');
    }

    public function delete($id){
        $admin = Auth::user();
        $user = Users::findOrFail($id);
        if($admin->id != $user->id && $user->permission_level != 'admin'){
            $user->delete();
            return redirect()->route('admin.user-management')->with('success','User Deleted');
        }

        //return to user management
        return redirect()->route('admin.user-management')->with('error','cannot delete admin accounts');
    }

}
