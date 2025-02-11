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
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
