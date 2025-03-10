<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

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
        $validator = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:12',
            'email_address' => 'required|string|email|max:255',
            Rule::unique('users', 'email_address')->ignore($id),
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
        $user->save();
    //return to user management
        return redirect()->route('admin.view-user',$id)->with('success','THE USER DATA HAS BEEN CHANGED!');
    }

    public function delete($id){
        $admin = Auth::user();
        $user = Users::findOrFail($id);
        if($admin->id != $user->id && $user->permission_level != 'admin' && $admin->permission_level == 'admin'){
            $user->delete();
            return redirect()->route('admin.user-management')->with('deletionSuccess','User id:' . $user->id .' "' .$user->email_address . '" has been deleted' );
        }

        //return to user management
        return redirect()->route('admin.user-management')->with('error','There was an error');
    }

}
