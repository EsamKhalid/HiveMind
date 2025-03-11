<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Enquiries;
use Illuminate\Support\Facades\Auth;

class EnquiriesController extends Controller
{
    //

    public function view(){
        return view('admin.userEnquiries');
    }
}
