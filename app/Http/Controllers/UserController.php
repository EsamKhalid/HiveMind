<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;

class UserController extends Controller
{
  
    public function store(Request $request)
{
    // Validate the request
    $request->validate([
        'first_name' => 'required|string|max:255',
        'email' => 'required|email|unique:users',
        'last_name' => 'required|string|max:255',
        'password' => 'required|string|min:8',
    ]);

    // Create a new record
    Users::create([
        'first_name' => $request->input('first_name'),
        'email' => $request->input('email'),
        'last_name' => $request->input('last_name'),
        'password' => bcrypt($request->input('password')),
    ]);

    return redirect()->back()->with('success', 'Data saved successfully!');
}


}
