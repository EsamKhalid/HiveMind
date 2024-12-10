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
            ['product_name' => 'Eyeshadow Pallete', 'product_type' => 'Beauty', 'description' => 'An', 'price' => '8', 'created_at' => now(), 'updated_at' => now()],
            ['product_name' => 'Lip Gloss', 'product_type' => 'Beauty', 'description' => 'An', 'price' => '7', 'created_at' => now(), 'updated_at' => now()],
            ['product_name' => 'Nail Polish (Set of 3)', 'product_type' => 'Beauty', 'description' => 'An', 'price' => '6', 'created_at' => now(), 'updated_at' => now()],
            ['product_name' => '2-in-1 Highlighter & Blush', 'product_type' => 'Beauty', 'description' => 'An', 'price' => '7', 'created_at' => now(), 'updated_at' => now()],
            ['product_name' => 'Beauty Sponge', 'product_type' => 'Beauty', 'description' => 'An', 'price' => '5', 'created_at' => now(), 'updated_at' => now()],

            ['product_name' => 'Vitamin Bee (Vitamin B Gummies)', 'product_type' => 'Health', 'description' => 'An', 'price' => '12', 'created_at' => now(), 'updated_at' => now()],
            ['product_name' => 'Bee Pollen Supplements', 'product_type' => 'Health', 'description' => 'An', 'price' => '10', 'created_at' => now(), 'updated_at' => now()],
            ['product_name' => 'Propolis Supplements', 'product_type' => 'Health', 'description' => 'An', 'price' => '15', 'created_at' => now(), 'updated_at' => now()],
            ['product_name' => 'Jar of Honey', 'product_type' => 'Health', 'description' => 'An', 'price' => '7', 'created_at' => now(), 'updated_at' => now()],
            ['product_name' => 'Bee Pollen Powder 250g', 'product_type' => 'Health', 'description' => 'An', 'price' => '15', 'created_at' => now(), 'updated_at' => now()],

            ['product_name' => 'Honey Shampoo', 'product_type' => 'Haircare', 'description' => 'An', 'price' => '7', 'created_at' => now(), 'updated_at' => now()],
            ['product_name' => 'Honey Condtioner', 'product_type' => 'Haircare', 'description' => 'An', 'price' => '7', 'created_at' => now(), 'updated_at' => now()],
            ['product_name' => 'Honey Hair Mask', 'product_type' => 'Haircare', 'description' => 'An', 'price' => '10', 'created_at' => now(), 'updated_at' => now()],
            ['product_name' => 'Honey Hair Mousse', 'product_type' => 'Haircare', 'description' => 'An', 'price' => '10', 'created_at' => now(), 'updated_at' => now()],
            ['product_name' => 'Honey-Infused Hair Oil', 'product_type' => 'Haircare', 'description' => 'An', 'price' => '8', 'created_at' => now(), 'updated_at' => now()],
            
            ['product_name' => 'Honey Face Mask', 'product_type' => 'Skincare', 'description' => 'An', 'price' => '12', 'created_at' => now(), 'updated_at' => now()],
            ['product_name' => 'Honey Moisturiser', 'product_type' => 'Skincare', 'description' => 'An', 'price' => '15', 'created_at' => now(), 'updated_at' => now()],
            ['product_name' => 'Honey Cleanser', 'product_type' => 'Skincare', 'description' => 'An', 'price' => '15', 'created_at' => now(), 'updated_at' => now()],
            ['product_name' => 'Honey Lip Balm', 'product_type' => 'Skincare', 'description' => 'An', 'price' => '7', 'created_at' => now(), 'updated_at' => now()],
            ['product_name' => 'Honey Sunscreen SPF50', 'product_type' => 'Skincare', 'description' => 'An', 'price' => '15', 'created_at' => now(), 'updated_at' => now()],

            ['product_name' => 'HiveMind Logo Hoodie', 'product_type' => 'Merchandise', 'description' => 'An', 'price' => '30', 'created_at' => now(), 'updated_at' => now()],
            ['product_name' => 'HiveMind Beenie', 'product_type' => 'Merchandise', 'description' => 'An', 'price' => '15', 'created_at' => now(), 'updated_at' => now()],
            ['product_name' => 'HiveMind T-Shirt', 'product_type' => 'Merchandise', 'description' => 'An', 'price' => '18', 'created_at' => now(), 'updated_at' => now()],
            ['product_name' => 'HiveMind Badge', 'product_type' => 'Merchandise', 'description' => 'An', 'price' => '5', 'created_at' => now(), 'updated_at' => now()],
            ['product_name' => 'HiveMind Bee Socks', 'product_type' => 'Merchandise', 'description' => 'An', 'price' => '7', 'created_at' => now(), 'updated_at' => now()],
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
