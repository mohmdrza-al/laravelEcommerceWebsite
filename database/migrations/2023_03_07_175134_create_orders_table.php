<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();

//            Foreign key for Users table
            $table->foreignId('userId');
            $table->foreign('userId')->references('id')->on('users')->onDelete('cascade');

//            Foreign key for Addresses table
            $table->foreignId('addressId');
            $table->foreign('addressId')->references('id')->on('user_addresses')->onDelete('cascade');

//            Foreign key for Coupons table
            $table->foreignId('couponId')->nullable();
            $table->foreign('couponId')->references('id')->on('coupons')->onDelete('cascade');

            $table->tinyInteger('status')->default(0);
            $table->unsignedInteger('totalAmount');
            $table->unsignedInteger('deliveryAmount')->default(0);
            $table->unsignedInteger('couponAmount')->default(0);
            $table->unsignedInteger('payingAmount');
            $table->enum('paymentType', ['pos', 'cash', 'shabaNumber', 'cardToCard', 'online']);
            $table->tinyInteger('paymentStatus')->default(0);
            $table->text('description')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
};
