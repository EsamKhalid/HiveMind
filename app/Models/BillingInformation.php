<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BillingInformation extends Model
{
    protected $table = 'billing_information';

    protected $fillable = [
        'name',
        'user_id',
        'billing_address',
        'card_number',
        'expiry_date',
        'cvv',
    ];

    public function user()
    {
        return $this->belongsTo(Users::class, 'user_id');
    }
}