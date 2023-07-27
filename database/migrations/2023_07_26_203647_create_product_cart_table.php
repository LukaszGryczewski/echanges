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
        Schema::create('product_cart', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id');
            $table->foreignId('cart_id');
            $table->integer('quantity');
            $table->double('unit_price');

            $table->foreign('product_id')
                  ->references('id')
                  ->on('products')
                  ->onDelete('restrict')
                  ->onUpdate('restrict');
            $table->foreign('cart_id')
                  ->references('id')
                  ->on('carts')
                  ->onDelete('restrict')
                  ->onUpdate('restrict');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_cart');
    }
};
