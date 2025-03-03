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
        $products = Product::all();

        foreach ($products as $product) 
        {
            Review::create([
                'product_id' => $product->id,
                'user_id' => User::first()->id, 
                'comment' => 'Default review for ' . $product->product_name,
                'rating' => 5, 
            ]);
        }
    }
}

?>