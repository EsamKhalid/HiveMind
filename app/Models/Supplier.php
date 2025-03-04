<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    //use HasFatory;

    protected $table = 'suppliers';

    protected $fillable = [
        //'supplier_id',
        'supplier_name',
        'supplier_email',
        'supplier_phone',
    ];
    
}
