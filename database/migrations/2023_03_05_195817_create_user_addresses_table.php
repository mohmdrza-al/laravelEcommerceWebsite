<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_addresses', function (Blueprint $table) {
            $table->id();

            $table->string('title');
            $table->string('address');
            $table->string('phoneNumber');
            $table->string('postalCode');

//            Foreign key for Users table
            $table->foreignId('userId');
            $table->foreign('userId')->references('id')->on('users')->onDelete('cascade');

            $table->bigInteger('provinceID');
            $table->bigInteger('cityID');

            $table->string('longitude')->nullable();
            $table->string('latitude')->nullable();

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
        Schema::dropIfExists('user_addresses');
    }
};
