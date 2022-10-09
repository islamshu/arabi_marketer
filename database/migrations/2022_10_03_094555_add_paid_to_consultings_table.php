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
        Schema::table('consultings', function (Blueprint $table) {
            $table->unsignedBigInteger('type_id');
            $table->foreign('type_id')
            ->references('id')->on('categories')
            ->onDelete('cascade');

            $table->unsignedBigInteger('place_id');
            $table->foreign('place_id')
            ->references('id')->on('placetypes')
            ->onDelete('cascade');

            $table->unsignedBigInteger('payment_id');
            $table->foreign('payment_id')
            ->references('id')->on('payments')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('consultings', function (Blueprint $table) {
            //
        });
    }
};
