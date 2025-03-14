<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SiteReviews extends Model
{
    //

      protected $table = 'site_reviews';

    protected $fillable = [
        'user_id',
        'rating',
        'review_title',
        'review',
    ];

    public function user()
    {
        return $this->belongsTo(Users::class, 'user_id');
    }
}
