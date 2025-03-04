<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('return_items', function (Blueprint $table) {
            $table->unsignedBigInteger('return_id');
            $table->unsignedBigInteger('order_id');
            $table->unsignedBigInteger('product_id');

            $table->primary(['return_id', 'order_id', 'product_id']);

            //$table->foreignId('return_id')->constrained('returns')->onDelete('cascade');
            //$table->foreignId('order_item_id')->constrained('order_items')->onDelete('cascade');

            $table->foreign('return_id')->references('id')->on('returns')->onDelete('cascade');
            $table->foreign(['order_id', 'product_id'])->references(['order_id', 'product_id'])->on('order_items')->onDelete('cascade');
            
            $table->integer('quantity');
            //$table->string('reason');
            //$table->decimal('refund_amount');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('return_items');
    }
};
