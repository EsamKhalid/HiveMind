<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Enquiries;
use Illuminate\Support\Facades\Auth;

class EnquiriesController extends Controller
{
    //

    public function view(){

        $enquiries = Enquiries::query();
        $enquiries = $enquiries->get();
        return view('admin.userEnquiries', ['enquiries' => $enquiries]);
    }
}
