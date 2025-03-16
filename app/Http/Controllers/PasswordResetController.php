<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class PasswordResetController extends Controller
{

    public function showRecoveryForm()
    {
        return view('login.passwordRecovery');
    }

    public function processRecovery(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email_address',
        ]);

        $user = User::where('email_address', $request->email)->first();

        return view('login.memorableAnswer', [
            'email' => $user->email_address,
            'memorable_question' => $user->memorable_question,
        ]);
    }

    public function verifyAnswer(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email_address',
            'memorable_answer' => 'required|string',
        ]);

        $user = User::where('email_address', $request->email)->first();

        if (!Hash::check($request->memorable_answer, $user->memorable_answer)) {
            return view('login.memorableAnswer', [
                'email' => $request->email,
                'memorable_question' => $user->memorable_question,
            ])->withErrors(['memorable_answer' => 'Incorrect answer.']);
        }

        return view('login.passwordReset', ['email' => $request->email]);
    }


    public function resetForm(Request $request){
        return view('login.passwordReset', ['email' => $request->email]);
    }

    public function resetPassword(Request $request)
    {


        //Esam - Had to make this custom validator to pass through the email on the validate fail since there was no auth to grab from
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|exists:users,email_address',
            'password' => 'required|string|min:8|confirmed',
        ]);

        if($validator->fails()){
             return redirect()->route('password.resetForm', ['email' => $request->email])
                             ->withErrors($validator);
        }

        // $request->validate([
        //     'email' => 'required|email|exists:users,email_address',
        //     'password' => 'required|string|min:8|confirmed',
        // ]);

        $user = User::where('email_address', $request->email)->first();
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->route('login')->with('status', 'Password reset successfully. You can now log in.');
    }
    
}
