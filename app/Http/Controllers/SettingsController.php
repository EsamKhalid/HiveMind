<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SettingsController extends Controller
{
    
    public function securityView()
    {
        $user = Auth::user();
        return view('user.security', compact('user'));
    }

    public function securityUpdate(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'current_password' => ['required'],
            'memorable_question' => ['required', 'string', 'max:255'],
            'memorable_answer' => ['required', 'string', 'max:50'],
        ]);

        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'Incorrect password.']);
        }

        $user->memorable_question = $request->memorable_question;
        $user->memorable_answer = Hash::make($request->memorable_answer);
        $user->save();

        return back()->with('success', 'Security info updated successfully.');
    }

}
