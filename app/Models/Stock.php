<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    //use HasFactory;

    protected $table = "stock";

    protected $fillable = [
        //'stock_id',
        'product_id',
        'stock_level',
        'reorder_level',
    ];
}
