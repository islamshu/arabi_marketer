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
        Schema::create('booking_detiles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('service_id');
            $table->unsignedBigInteger('owner_id');
            $table->integer('user_response')->default(0);
            $table->integer('owner_response')->default(0);
            $table->date('start_at');
            $table->date('end_at');
            $table->integer('is_finish')->default(0);
            $table->foreign('user_id')
            ->references('id')->on('users')
            ->onDelete('cascade');
            $table->foreign('owner_id')
            ->references('id')->on('users')
            ->onDelete('cascade');
            $table->foreign('service_id')
            ->references('id')->on('services')
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
        Schema::dropIfExists('booking_detiles');
    }
};
