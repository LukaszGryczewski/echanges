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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('login',60)->unique();
            $table->string('firstname',60);
            $table->string('lastname',60);
            $table->foreignId('address_id');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('phone',60);
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('address_id')
                  ->references('id')
                  ->on('addresses')
                  ->onDelete('restrict')
                  ->onUpdate('restrict');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
