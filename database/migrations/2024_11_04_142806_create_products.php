<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id('id');
            $table->string('product_name');
            $table->string('product_type');
            $table->text('description');
            $table->decimal('price', 10, 2);
            $table->timestamps();
        });

        DB::table('products')->insert([
            ['product_name' => 'Eyeshadow Pallete', 'product_type' => 'Beauty', 'description' => 'Beauty Product: Eyeshadow', 'price' => '8', 'created_at' => now(), 'updated_at' => now()],
            ['product_name' => 'Lip Gloss', 'product_type' => 'Beauty', 'description' => 'Beauty Product: Lip Gloss', 'price' => '7', 'created_at' => now(), 'updated_at' => now()],
            ['product_name' => 'Nail Polish (Set of 3)', 'product_type' => 'Beauty', 'description' => 'Beauty Product: Nail Polish', 'price' => '6', 'created_at' => now(), 'updated_at' => now()],
            ['product_name' => '2-in-1 Highlighter & Blush', 'product_type' => 'Beauty', 'description' => 'Beauty Product: Highlighter & Blush', 'price' => '7', 'created_at' => now(), 'updated_at' => now()],
            ['product_name' => 'Beauty Sponge', 'product_type' => 'Beauty', 'description' => 'Beauty Product: Beauty Sponge', 'price' => '5', 'created_at' => now(), 'updated_at' => now()],

            ['product_name' => 'Vitamin Bee (Vitamin B Gummies)', 'product_type' => 'Health', 'description' => 'Health and Wellness Product: Vitamin Gummy', 'price' => '12', 'created_at' => now(), 'updated_at' => now()],
            ['product_name' => 'Bee Pollen Supplements', 'product_type' => 'Health', 'description' => 'Health and Wellness Product: Pollen Supplements', 'price' => '10', 'created_at' => now(), 'updated_at' => now()],
            ['product_name' => 'Propolis Supplements', 'product_type' => 'Health', 'description' => 'Health and Wellness Product: Propolis Supplements', 'price' => '15', 'created_at' => now(), 'updated_at' => now()],
            ['product_name' => 'Jar of Honey', 'product_type' => 'Health', 'description' => 'Health and Wellness Product: Jar of Honey', 'price' => '7', 'created_at' => now(), 'updated_at' => now()],
            ['product_name' => 'Bee Pollen Powder 250g', 'product_type' => 'Health', 'description' => 'Health and Wellness Product: Pollen Powder 250g', 'price' => '15', 'created_at' => now(), 'updated_at' => now()],

            ['product_name' => 'Honey Shampoo', 'product_type' => 'Haircare', 'description' => 'Haircare: Shampoo', 'price' => '7', 'created_at' => now(), 'updated_at' => now()],
            ['product_name' => 'Honey Conditioner', 'product_type' => 'Haircare', 'description' => 'Haircare: Condtioner', 'price' => '7', 'created_at' => now(), 'updated_at' => now()],
            ['product_name' => 'Honey Hair Mask', 'product_type' => 'Haircare', 'description' => 'Haircare: Mask', 'price' => '10', 'created_at' => now(), 'updated_at' => now()],
            ['product_name' => 'Honey Hair Mousse', 'product_type' => 'Haircare', 'description' => 'Haircare: Mousse', 'price' => '10', 'created_at' => now(), 'updated_at' => now()],
            ['product_name' => 'Honey-Infused Hair Oil', 'product_type' => 'Haircare', 'description' => 'Haircare: Hair Oil', 'price' => '8', 'created_at' => now(), 'updated_at' => now()],
            
            ['product_name' => 'Honey Face Mask', 'product_type' => 'Skincare', 'description' => 'Skincare: Face Mask', 'price' => '12', 'created_at' => now(), 'updated_at' => now()],
            ['product_name' => 'Honey Moisturiser', 'product_type' => 'Skincare', 'description' => 'Skincare: Moisturiser', 'price' => '15', 'created_at' => now(), 'updated_at' => now()],
            ['product_name' => 'Honey Cleanser', 'product_type' => 'Skincare', 'description' => 'Skincare: Cleanser', 'price' => '15', 'created_at' => now(), 'updated_at' => now()],
            ['product_name' => 'Honey Lip Balm', 'product_type' => 'Skincare', 'description' => 'Skincare: Lip Balm', 'price' => '7', 'created_at' => now(), 'updated_at' => now()],
            ['product_name' => 'Honey Sunscreen SPF50', 'product_type' => 'Skincare', 'description' => 'Skincare: Sunscreen', 'price' => '15', 'created_at' => now(), 'updated_at' => now()],

            ['product_name' => 'HiveMind Logo Sweatshirt', 'product_type' => 'Merchandise', 'description' => 'Merchandise: Sweatshirt', 'price' => '30', 'created_at' => now(), 'updated_at' => now()],
            ['product_name' => 'HiveMind Cap', 'product_type' => 'Merchandise', 'description' => 'Merchandise: Cap', 'price' => '15', 'created_at' => now(), 'updated_at' => now()],
            ['product_name' => 'HiveMind T-Shirt', 'product_type' => 'Merchandise', 'description' => 'Merchandise: T-Shirt', 'price' => '18', 'created_at' => now(), 'updated_at' => now()],
            ['product_name' => 'HiveMind Tumbler', 'product_type' => 'Merchandise', 'description' => 'Merchandise: Tumbler', 'price' => '5', 'created_at' => now(), 'updated_at' => now()],
            ['product_name' => 'HiveMind Phone Case', 'product_type' => 'Merchandise', 'description' => 'Merchandise: Phone Case', 'price' => '7', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
