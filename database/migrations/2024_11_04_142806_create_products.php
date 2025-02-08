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
            $table->text('ingredients');
            $table->text('directions')->nullable();
            $table->text('additional_info')->nullable();
            $table->integer('stock_level')->default('10');
            $table->integer('reorder_level')->default('1');
            $table->timestamps();
        });
  
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
