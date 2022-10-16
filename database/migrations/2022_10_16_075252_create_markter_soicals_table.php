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
        Schema::create('markter_soicals', function (Blueprint $table) {
            $table->id();
            $table->string('instagram');
            $table->string('facebook');
            $table->string('twitter');
            $table->string('pinterest');
            $table->string('snapchat');
            $table->string('linkedin');
            $table->string('website');
            $table->string('followers_number');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('cascade');

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
        Schema::dropIfExists('markter_soicals');
    }
};
