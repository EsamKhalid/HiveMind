<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductReviews extends Model
{
    //
    //

    protected $table = 'product_reviews';

    protected $fillable = [
        'product_id',
        'user_id',
        'rating',
        'review',
    ];

    public function user()
    {
        return $this->belongsTo(Users::class);
    }

    public function products()
    {
        return $this->belongsTo(Products::class, 'product_id');
    }
}
