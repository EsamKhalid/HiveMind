<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

      protected $table = 'orders';

    protected $fillable = [
        'user_id',
        'guest_id',
        'order_date',
        'order_status',
        'total_amount',
        'payment_method',
        'payment_date',
        'amount_paid',
        'confirmation_number',
    ];

    public function user()
    {
        return $this->belongsTo(Users::class, 'user_id');
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class, 'order_id');
    }

    public function guest(){
        return $this->belongsTo(Guest::class);
    }
}
