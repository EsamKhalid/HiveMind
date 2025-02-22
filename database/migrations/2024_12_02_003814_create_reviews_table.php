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
        Schema::create('reviews', function (Blueprint $table) { 
            $table->foreignId('product_id')->constrained('products')->onDelete('cascade'); 
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');   
            $table->primary(['user_id', 'product_id']); 
            $table->unsignedTinyInteger('rating'); 
            $table->text('review')->nullable();    
            $table->timestamp('review_date')->useCurrent(); 
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
