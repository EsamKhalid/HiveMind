<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    protected $table = 'wishlist';

    // Define the fillable fields
    protected $fillable = [
        'user_id',
    ];
}
