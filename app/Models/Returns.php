<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Returns extends Model
{
    protected $table = 'returns';

    protected $fillable = [
        'order_id',
        //'return_status',
        'return_date',
        'reason',
        'comments',
    ];
}
