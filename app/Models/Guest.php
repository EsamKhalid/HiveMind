<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Guest extends Model
{
    //

    protected $table = 'guests';

    protected $fillable = [
        'first_name',
        'last_name',
        'email_address',
        'phone_number',
    ];
}
