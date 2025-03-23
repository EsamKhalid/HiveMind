<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\SiteReviews;
use App\Models\ProductReviews;

use App\Models\Products;

class ReviewController extends Controller
{
    //

    public function siteReview(){
        return view('review.siteReview');
    }

    public function storeSiteReview(Request $request){

        $user = Auth::user();

        $rating = $request->rating;

        if($rating == null){
             return redirect()->route('review.siteReview')->withErrors(['msg' => ' Please Enter a Rating']);
        }

        if($user == null){
            SiteReviews::create(['user_id' => null,'rating' => $request->rating, 'review' => $request->review, 'review_title' => $request->title]);
        }
        else{
            SiteReviews::create(['user_id' => $user->id,'rating' => $request->rating, 'review' => $request->review, 'review_title' => $request->title]);
        }


        return redirect()->route('orders');
    }

    public function productReview($id){
         $product = Products::findOrFail($id);   
        return view('review.productReview', ['id' => $id], ['product' => $product]);
    }

    public function storeProductReview(Request $request, $id)
    {
        $user = Auth::user();
        $rating = $request->rating;

        $product = Products::findOrFail($id);

        

        // VALIDATE WHETHER THE USER HAS ALREADY SUBMITTED A REVIEW

        if($user){
            $existingReview = ProductReviews::where('product_id', $id)
                                    ->where('user_id', $user->id)
                                    ->first();

        }
        else{
            $existingReview = null;
        }

        
        // NOTE FROM HARRY (08/03/25)
        // VALIDATOR *DOES* WORK THOUGH, WITHOUT A VALID AJAX HANDLER, THE MESSAGES DONT EXACTLY APPEAR

        if ($existingReview) 
        {
            return redirect()->route('products.show', ['id' => $id])
                         ->withErrors(['msg' => 'You have already submitted a review for this product.']);
        }


       if($user == null){
            ProductReviews::create(['product_id'=> $id, 'user_id'=> null, 'rating' => $request->rating, 'review' => $request->review, 'review_title' => $request->title]);
             return redirect()->route('products.show', $product->id);
        }
        else{
            ProductReviews::create(['product_id'=> $id, 'user_id'=> $user->id, 'rating' => $request->rating, 'review' => $request->review, 'review_title' => $request->title]);
             return redirect()->route('products.show', $product->id);
        }

        ;
    }
}
