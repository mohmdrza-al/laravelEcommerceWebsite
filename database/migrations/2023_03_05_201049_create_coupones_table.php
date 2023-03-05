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
        Schema::create('coupones', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('code');
            $table->enum('type' ,['amount', 'percentage']);
            $table->unsignedInteger('amount')->nullable();
            $table->unsignedInteger('percentage')->nullable();
            $table->unsignedInteger('max_percentageAmount')->nullable();
            $table->timestamp('expiredAt');
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
        Schema::dropIfExists('coupones');
    }
};
