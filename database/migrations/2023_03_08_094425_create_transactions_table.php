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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();

//            Foreign key for Users table
            $table->foreignId('userId');
            $table->foreign('userId')->references('id')->on('users')->onDelete('cascade');

//            Foreign key for Orders table
            $table->foreignId('orderId');
            $table->foreign('orderId')->references('id')->on('orders')->onDelete('cascade');

            $table->unsignedInteger('amount');
            $table->string('refId')->nullable();
            $table->string('token')->nullable();
            $table->text('description')->nullable();

            $table->enum('gatewayName', ['zarinPal', 'pay']);
            $table->tinyInteger('status')->default(0);

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
        Schema::dropIfExists('transactions');
    }
};
