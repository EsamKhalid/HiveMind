<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\SiteReviews;
use App\Models\ProductReviews;
use App\Models\Products;
use App\Models\Order; 

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

        if ($user) {
            $existingReview = ProductReviews::where('product_id', $id)
                                            ->where('user_id', $user->id)
                                            ->first();

            $hasOrdered = Order::where('user_id', $user->id)
                            ->whereHas('orderItems', function($query) use ($id) {
                                $query->where('product_id', $id);
                            });

            $orders = Order::where('user_id', $user->id)->get();

            $orderItems = [];

            foreach($orders as $order){
                foreach($order->orderItems as $item){
                    array_push($orderItems, $item);
                }
            }

            // Check if the product being reviewed is in the orderItems array
            $productInOrderItems = false;
            foreach($orderItems as $item) {
                if ($item->product_id == $id) {
                    $productInOrderItems = true;
                    break;
                }
            }

            if (!$productInOrderItems) {
                return redirect()->route('products.show', ['id' => $id])
                                 ->withErrors(['msg' => 'You can only review products you have ordered and had delivered.']);
            }
        } else {
            return redirect()->route('login')->withErrors(['msg' => 'You need to be logged in to submit a review.']);
        }

        if ($existingReview) 
        {
            return redirect()->route('products.show', ['id' => $id])
                         ->withErrors(['msg' => 'You have already submitted a review for this product.']);
        }

        ProductReviews::create(['product_id'=> $id, 'user_id'=> $user->id, 'rating' => $request->rating, 'review' => $request->review, 'review_title' => $request->title]);
        return redirect()->route('products.show', $product->id);
    }
}
