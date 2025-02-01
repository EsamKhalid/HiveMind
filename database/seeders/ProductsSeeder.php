<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert([
            ['product_name' => 'Eyeshadow Pallete', 'product_type' => 'Beauty', 'description' => 'Beauty Product: Eyeshadow', 'price' => '8', 'created_at' => now(), 'updated_at' => now()],
            ['product_name' => 'Lip Gloss', 'product_type' => 'Beauty', 'description' => 'Beauty Product: Lip Gloss', 'price' => '7', 'created_at' => now(), 'updated_at' => now()],
            ['product_name' => 'Nail Polish (Set of 3)', 'product_type' => 'Beauty', 'description' => 'Beauty Product: Nail Polish', 'price' => '6', 'created_at' => now(), 'updated_at' => now()],
            ['product_name' => '2-in-1 Highlighter & Blush', 'product_type' => 'Beauty', 'description' => 'Beauty Product: Highlighter & Blush', 'price' => '7', 'created_at' => now(), 'updated_at' => now()],
            ['product_name' => 'Beauty Sponge', 'product_type' => 'Beauty', 'description' => 'Beauty Product: Beauty Sponge', 'price' => '5', 'created_at' => now(), 'updated_at' => now()],
            ['product_name' => 'Honey Body Spray', 'product_type' => 'Beauty', 'description' => 'Stop and turn heads with HiveMind’s Honey Body Spray. Long-lasting and sweet, you’ll be craving more.', 'price' => '15', 'created_at' => now(), 'updated_at' => now()],
            ['product_name' => 'Vitamin Bee (Vitamin B Gummies)', 'product_type' => 'Health', 'description' => 'Health and Wellness Product: Vitamin Gummy', 'price' => '12', 'created_at' => now(), 'updated_at' => now()],
            ['product_name' => 'Bee Pollen Supplements', 'product_type' => 'Health', 'description' => 'Health and Wellness Product: Pollen Supplements', 'price' => '10', 'created_at' => now(), 'updated_at' => now()],
            ['product_name' => 'Propolis Supplements', 'product_type' => 'Health', 'description' => 'Health and Wellness Product: Propolis Supplements', 'price' => '15', 'created_at' => now(), 'updated_at' => now()],
            ['product_name' => 'Jar of Honey', 'product_type' => 'Health', 'description' => 'Health and Wellness Product: Jar of Honey', 'price' => '7', 'created_at' => now(), 'updated_at' => now()],
            ['product_name' => 'Bee Pollen Powder 250g', 'product_type' => 'Health', 'description' => 'Health and Wellness Product: Pollen Powder 250g', 'price' => '15', 'created_at' => now(), 'updated_at' => now()],
            ['product_name' => 'Honey Shampoo', 'product_type' => 'Haircare', 'description' => 'Haircare: Shampoo', 'price' => '7', 'created_at' => now(), 'updated_at' => now()],
            ['product_name' => 'Honey Condtioner', 'product_type' => 'Haircare', 'description' => 'Haircare: Condtioner', 'price' => '7', 'created_at' => now(), 'updated_at' => now()],
            ['product_name' => 'Honey Hair Mask', 'product_type' => 'Haircare', 'description' => 'Haircare: Mask', 'price' => '10', 'created_at' => now(), 'updated_at' => now()],
            ['product_name' => 'Honey Hair Mousse', 'product_type' => 'Haircare', 'description' => 'Haircare: Mousse', 'price' => '10', 'created_at' => now(), 'updated_at' => now()],
            ['product_name' => 'Honey-Infused Hair Oil', 'product_type' => 'Haircare', 'description' => 'Haircare: Hair Oil', 'price' => '8', 'created_at' => now(), 'updated_at' => now()],
            ['product_name' => 'Honey Face Mask', 'product_type' => 'Skincare', 'description' => 'Skincare: Face Mask', 'price' => '12', 'created_at' => now(), 'updated_at' => now()],
            ['product_name' => 'Honey Moisturiser', 'product_type' => 'Skincare', 'description' => 'Skincare: Moisturiser', 'price' => '15', 'created_at' => now(), 'updated_at' => now()],
            ['product_name' => 'Honey Cleanser', 'product_type' => 'Skincare', 'description' => 'Skincare: Cleanser', 'price' => '15', 'created_at' => now(), 'updated_at' => now()],
            ['product_name' => 'Honey Lip Balm', 'product_type' => 'Skincare', 'description' => 'Skincare: Lip Balm', 'price' => '7', 'created_at' => now(), 'updated_at' => now()],
            ['product_name' => 'Honey Sunscreen SPF50', 'product_type' => 'Skincare', 'description' => 'Skincare: Sunscreen', 'price' => '15', 'created_at' => now(), 'updated_at' => now()],
            ['product_name' => 'HiveMind Logo Hoodie', 'product_type' => 'Merchandise', 'description' => 'Merchandise: Hoodie', 'price' => '30', 'created_at' => now(), 'updated_at' => now()],
            ['product_name' => 'HiveMind Beenie', 'product_type' => 'Merchandise', 'description' => 'Merchandise: Beanie', 'price' => '15', 'created_at' => now(), 'updated_at' => now()],
            ['product_name' => 'HiveMind T-Shirt', 'product_type' => 'Merchandise', 'description' => 'Merchandise: T-Shirt', 'price' => '18', 'created_at' => now(), 'updated_at' => now()],
            ['product_name' => 'HiveMind Badge', 'product_type' => 'Merchandise', 'description' => 'Merchandise: Badge', 'price' => '5', 'created_at' => now(), 'updated_at' => now()],
            ['product_name' => 'HiveMind Bee Socks', 'product_type' => 'Merchandise', 'description' => 'Merchandise: Socks', 'price' => '7', 'created_at' => now(), 'updated_at' => now()],
            ['product_name' => 'Honey Lotion', 'product_type' => 'Bodycare', 'description' => 'Moisturise and hydrate your skin with our Honey Lotion. Ready to use after a relaxing shower or bath.', 'price' => '13', 'created_at' => now(), 'updated_at' => now()],
            ['product_name' => 'Honey Shower Gel', 'product_type' => 'Bodycare', 'description' => 'Bodycare product: Honey Shower gel', 'price' => '15', 'created_at' => now(), 'updated_at' => now()],
            ['product_name' => 'Honey Roll-On Deodorant', 'product_type' => 'Bodycare', 'description' => 'Bodycare product: Honey Roll-On Deodorant', 'price' => '9', 'created_at' => now(), 'updated_at' => now()],
            ['product_name' => 'Honey Body Scrub', 'product_type' => 'Bodycare', 'description' => 'Bodycare product: Honey Body Scrub', 'price' => '13', 'created_at' => now(), 'updated_at' => now()],
            ['product_name' => 'Honey Body Cream', 'product_type' => 'Bodycare', 'description' => 'Bodycare product: Honey Body Cream', 'price' => '16', 'created_at' => now(), 'updated_at' => now()],
            ['product_name' => 'Honey Home Perfume Spray', 'product_type' => 'Home', 'description' => 'Home product: Honey Home Perfume Spray', 'price' => '18', 'created_at' => now(), 'updated_at' => now()],
            ['product_name' => 'Honey Scented Candle', 'product_type' => 'Home', 'description' => 'Home product: Honey Scented Candle', 'price' => '25', 'created_at' => now(), 'updated_at' => now()],
            ['product_name' => 'Honey Fragrance Sticks', 'product_type' => 'Home', 'description' => 'Home product: Honey Fragrance Sticks', 'price' => '18', 'created_at' => now(), 'updated_at' => now()],
            ['product_name' => 'Honey Refill Fragrance Sticks', 'product_type' => 'Home', 'description' => 'Home product: Honey Refill Fragrance Sticks', 'price' => '22', 'created_at' => now(), 'updated_at' => now()],
            ['product_name' => 'HiveMind Beeswax Wraps', 'product_type' => 'Home', 'description' => 'Home product: HiveMind Beeswax Wraps', 'price' => '15', 'created_at' => now(), 'updated_at' => now()],
        ]);
        //
    }
}
