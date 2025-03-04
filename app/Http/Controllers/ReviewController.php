<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReviewController extends Controller
{
    //

    public function siteReview(){
        return view('review.siteReview');
    }
}
