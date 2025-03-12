<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GuestOrderController extends Controller
{
    //
    public function view(){
        return view('orders.guest.validate');
    }
    
    public function displayOrder(){

    }

    public function getOrder(Request $request){
        $request->validate(['surname' => 'required|string|max:255','confirmation' => 'required|integer|digits:6']);

        echo $request->confirmation;
    }
}
