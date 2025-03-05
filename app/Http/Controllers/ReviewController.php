<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\SiteReviews;

class ReviewController extends Controller
{
    //

    public function siteReview(){
        return view('review.siteReview');
    }

    public function storeSiteReview(Request $request){

        $user = Auth::user();

        $rating = $request->rating;

        if($user == null){
            SiteReviews::create(['user_id' => null,'rating' => $request->rating, 'review' => $request->review]);
        }
        else{
            SiteReviews::create(['user_id' => $user->id,'rating' => $request->rating, 'review' => $request->review]);
        }


        return redirect()->route('orders');
    }
}
