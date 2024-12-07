<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Baskets extends Model
{

    use HasFactory;

    // Define the table if it's not the default 'baskets'
    protected $table = 'basket';

    // Define the fillable fields
    protected $fillable = [
        'user_id',
    ];

    // Define the relationship with BasketItem
    public function items()
    {
        return $this->hasMany(BasketItems::class, 'basket_id');
    }

}
