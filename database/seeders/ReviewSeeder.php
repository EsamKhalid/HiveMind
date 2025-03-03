<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use App\Models\Products;
use App\Models\Reviews;
use App\Models\Users;

class ReviewSeeder extends Seeder
{
    public function run()
    {
        $products = Products::all();

        foreach ($products as $product) 
        {
            Reviews::create([
                'product_id' => $product->id,
                'user_id' => Users::first()->id, 
                'comment' => ' ',
                'rating' => 5, 
            ]);
        }
    }
}

?>
