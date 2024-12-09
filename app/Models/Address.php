<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $table = 'addresses';

    protected $fillable = [
        'user_id',
        'street_address',
        'city',
        'county',
        'country',
        'post_code',
        'shipping_address',
    ];

    // Each address belongs to one user
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}