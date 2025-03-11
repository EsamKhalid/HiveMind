<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Enquiries extends Model
{

    protected $table = 'enquiries';
    //
    protected $fillable = [
        'name',
        'email_address',
        'enquiry',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(Users::class, 'user_id');
    }
}
