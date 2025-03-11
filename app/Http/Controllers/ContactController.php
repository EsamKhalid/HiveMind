<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Enquiries;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
    //

    public function view(){
        return view('contact.contact');
    }

    public function store(Request $request){

        $user = Auth::user();

        $request->validate([
            'name' => 'required|string|max:255',
            'enquiry' => 'required|string|max:255',
            'email_address' => 'required|string|email|min:10|max:255',
        ]);


        if($user == null){
            Enquiries::create([
                'name' => $request->name,
                'enquiry' => $request->enquiry,
                'email_address' => $request->email_address,
                'user_id' => null,
            ]);
        }
        else{
            Enquiries::create([
                'name' => $request->name,
                'enquiry' => $request->enquiry,
                'email_address' => $request->email_address,
                'user_id' => $user->id,
            ]);
        }

       return redirect()->route('contact.view')->with('success', 'Enquiry sent successfully');
        
    }
    
}
