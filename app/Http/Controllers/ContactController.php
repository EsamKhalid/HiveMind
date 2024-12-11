<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Enquiries;

class ContactController extends Controller
{
    //

    public function view(){
        return view('contact.contact');
    }

    public function store(Request $request){

        $request->validate([
            'name' => 'required|string|max:255',
            'enquiry' => 'required|string|max:255',
            'email_address' => 'required|string|email|max:255',
        ]);

        Enquiries::create([
            'name' => $request->name,
            'enquiry' => $request->enquiry,
            'email_address' => $request->email_address,
        ]);

        //dd($request->all());




        return redirect()->route('contact')->with('success', 'Enquiry sent successfully!');
        
    }
    
}
