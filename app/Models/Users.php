<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Users extends Authenticatable
{

    use HasFactory, Notifiable;

    //
    protected $fillable = [
        'first_name',
        'last_name',
        'email_address',
        'phone_number',
        'password',
    ];
}