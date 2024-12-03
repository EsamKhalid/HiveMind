<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Register extends Model
{
    //
    use HasFactory;

    // Define the table if it's not the default 'registers'
    protected $table = 'registers';

    // Define the fillable fields
    protected $fillable = [
        'name',
        'email',
        'password',
    ];
}
