<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Users extends Model
{
    use HasFactory;

   public function basket()
    {
        return $this->hasOne(Baskets::class, 'user_id');
    }
}
