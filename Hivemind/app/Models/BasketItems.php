<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use app\Models\Products;


class BasketItems extends Model
{
    use HasFactory;

    protected $table = 'basket_items';

    protected $primaryKey = 'id';

    protected $fillable = [
        'basket_id',
        'product_id',
        'quantity',
    ];

    // Relationship with Products
    public function product()
    {
        return $this->belongsTo(Products::class, 'product_id');
    }
}
