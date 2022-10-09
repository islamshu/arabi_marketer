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
        Schema::create('consuting_dates', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('consulte_id');
            $table->foreign('consulte_id')
            ->references('id')->on('consultings')
            ->onDelete('cascade');
            $table->string('day');
            $table->string('from');
            $table->string('to');
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
        Schema::dropIfExists('consuting_dates');
    }
};
