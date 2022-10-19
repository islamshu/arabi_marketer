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
        Schema::create('carts', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('user_id');
            $table->unsignedBigInteger('owner_id');
            $table->unsignedBigInteger('service_id');
            $table->string('price');
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
        Schema::dropIfExists('carts');
    }
};
