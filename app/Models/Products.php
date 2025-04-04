<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_name',
        'product_type',
        'description',
        'price',
        'ingredients',
        'direction',
        'additional_info',
        'stock_level',
        'reorder_level',

    ];

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class, 'product_id');
    }
}
