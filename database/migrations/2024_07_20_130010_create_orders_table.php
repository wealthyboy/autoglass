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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->unsigned()->nullable();
			$table->string('address_id')->nullable();
            $table->string('first_name')->nullable();
			$table->string('last_name')->nullable();
			$table->string('city')->nullable();
			$table->string('state')->nullable();
            $table->string('landmark')->nullable();
            $table->string('country')->nullable();
			$table->string('invoice')->nullable();
			$table->string('comment')->nullable();
			$table->string('tracking')->nullable();
			$table->string('payment_type')->nullable();
			$table->string('status')->nullable();
			$table->string('transaction_id')->nullable();
			$table->integer('currency_id')->length(10)->nullable();
            $table->string('shipping_price')->nullable();
			$table->string('total')->nullable();
			$table->string('coupon')->unique()->nullable();
			$table->string('order_type')->nullable();
			$table->string('order_from')->nullable();
			$table->string('ip')->nullable();
			$table->string('user_agent')->nullable();
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
