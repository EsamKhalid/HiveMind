<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WishlistItems extends Model
{
    protected $table = 'wishlist_items';

    // Define the fillable fields
    protected $fillable = [
        'wishlist_id',
        'product_id',
        'quantity',
    ];
}
