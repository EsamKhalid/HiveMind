<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StockOrder extends Model
{
    //use HasFactory;

    protected $table = "stock_orders";

    protected $fillable = [
        //'stock_order_id',
        'stock_id',
        'supplier_id',
        'stock_quantity',
        'lead_time',
    ];
}
