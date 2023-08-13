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
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
        $table->unsignedBigInteger('order_id');
        $table->string('payment_id')->nullable(); // Id of payment Stripe
        $table->decimal('amount', 8, 2);
        $table->string('currency', 3);
        $table->dateTime('billing_date');
        $table->text('details')->nullable();
        $table->string('invoice_path')->nullable();
        $table->timestamps();

        $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
