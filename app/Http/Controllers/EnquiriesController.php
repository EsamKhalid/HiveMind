<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Enquiries;
use Illuminate\Support\Facades\Auth;

class EnquiriesController extends Controller
{
    //

    public function view(Request $request){
        
        $filter = $request->filter;
        $search = $request->search;

        $enquiries = Enquiries::query();

        if($filter == "Registered"){
            $enquiries->where('user_id', '!=', null);
        }
        else if($filter == "Guest"){
            $enquiries->where('user_id', '=', null);
        }


        if($search){
            $enquiries->where('email_address', 'like', '%' . $search . '%');
        }
        $enquiries = $enquiries->get();
        return view('admin.userEnquiries', ['enquiries' => $enquiries]);
    }
}
