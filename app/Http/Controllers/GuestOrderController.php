<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class GuestOrderController extends Controller
{
    //
    public function view(){
        return view('orders.guest.validate');
    }
    
    public function displayOrder($confNum, $surname){

        $order = Order::where('confirmation_number', $confNum)->first();


        if($surname == $order->guest->last_name){
            return view('orders.guest.displayOrder', ['order' => $order]);
        }
        else{
            return redirect()->route('orders.guest.validate')->withErrors(['msg' => 'No Orders found with these details']);
        }

        
    }

    public function getOrder(Request $request){
        $request->validate(['surname' => 'required|string|max:255','confirmation' => 'required|integer|digits:6']);

        return redirect()->route('orders.guest.displayOrder', ['confnum' => $request->confirmation, 'surname' => $request->surname]);
    }
}
