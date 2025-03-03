<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function store(Request $REQ)
    {
        $REQ->validate([
            'product_id' => 'required|exists:products,id',
            'rating' => 'required|integer|min:1|max:5',
            'review' => 'required|string'
        ]);
        
        Review::create([
            'product_id' => $REQ->product_id,
            'user_id' => Auth::id(),
            'rating' => $REQ->rating,
            'review' => $REQ->review,
            'review_date' => now(),
            'created_at' => now(),
            'updated_at' => now()
        ]);
        
        return redirect()->back()->with('DING!', 'Your review has been submitted!');
    }
}

?>
