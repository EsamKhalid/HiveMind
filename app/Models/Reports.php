<?php

// Jo'Ardie Richardson's work

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reports extends Model
{
    use HasFactory;

    protected $table = 'reports';

    protected $fillable = [
        'report_name',
        'report_link'        
    ];

}