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
            $table->id();
            $table->string('name',255);
            $table->text('description',255);
            $table->integer('quantity');
            $table->string('edition',60);
            $table->foreignId('type_id');
            $table->string('condition',255);
            $table->string('image',255);
            $table->boolean('isAvailable');
            $table->timestamps();

            $table->foreign('type_id')
                  ->references('id')
                  ->on('types')
                  ->onDelete('restrict')
                  ->onUpdate('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
