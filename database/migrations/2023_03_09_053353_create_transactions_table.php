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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cashier_id');
            $table->unsignedBigInteger('customer_id')->nullable();
            $table->unsignedBigInteger('product_id');
            $table->integer('qty');
            $table->bigInteger('price');
            $table->timestamps();

            //relationship products
            $table->foreign('product_id')->references('id')->on('products');

            //relationship users
            $table->foreign('cashier_id')->references('id')->on('users');

            //relationship customers
            $table->foreign('customer_id')->references('id')->on('customers');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
