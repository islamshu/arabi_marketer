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
        Schema::create('rate_blogs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('blog_id');
            $table->integer('rate');
            $table->foreign('blog_id')
                ->references('id')->on('blogs')
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
        Schema::dropIfExists('rate_blogs');
    }
};
