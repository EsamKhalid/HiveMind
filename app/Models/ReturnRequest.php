<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReturnRequest extends Model
{
    protected $table = 'returns';

    protected $fillable = [
        'order_id',
        //'return_status',
        'return_date',
        'reason',
        'comments',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }

    public function returnItems()
    {
        return $this->hasMany(ReturnItem::class, 'return_id');
    }
}
