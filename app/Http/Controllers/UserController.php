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
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users',
    ]);

    // Create a new record
    Users::create([
        'name' => $request->input('name'),
        'email' => $request->input('email'),
    ]);

    return redirect()->back()->with('success', 'Data saved successfully!');
}


}
