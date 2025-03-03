<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class DetailsController extends Controller
{
    public function view()
    {
        $user = Auth::user();
        return view('user.details', compact('user'));
    }

    public function update(Request $request)
    {
    $user = Auth::user();

    $request->validate([
        'first_name' => 'required|string|max:255',
        'last_name' => 'required|string|max:255',
        'email_address' => 'required|string|email|max:255|unique:users,email_address,' . $user->id,
        'phone_number' => 'nullable|regex:/^[0-9\-\+\(\) ]+$/|max:15',
        'current_password' => ['required'],
        'password' => ['nullable', 'string', 'min:8', 'confirmed'],
    ], [
        'password.confirmed' => 'The password confirmation does not match.',
        'phone_number.regex' => 'Please enter a valid phone number.',
    ]);

    if (!Hash::check($request->current_password, $user->password)) {
        return back()->withErrors(['current_password' => 'Incorrect password.']);
    }

    $user->first_name = $request->first_name;
    $user->last_name = $request->last_name;
    $user->email_address = $request->email_address;
    $user->phone_number = $request->phone_number;

    if ($request->filled('password')) {
        $user->password = Hash::make($request->password);
    }

    $user->save();

    return redirect()->route('user.details')->with('success', 'Details updated successfully.');
    }

}
