<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Addresses extends Model
{
    //
    //use HasFactory;

    

    // Define the table if it's not the default 'registers'
    protected $table = 'addresses';

    protected $primaryKey = 'id';

    // Define the fillable fields
    protected $fillable = [
        'user_id',
        'street_address',
        'city',
        'county',
        'country',
        'post_code',
        'type',
    ];

    // Each address belongs to one user
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}