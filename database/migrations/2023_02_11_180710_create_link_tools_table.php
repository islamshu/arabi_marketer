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
        Schema::create('link_tools', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tool_id');
            $table->mediumText('url');
            $table->string('type');
            $table->foreign('tool_id')
            ->references('id')->on('tools')
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
        Schema::dropIfExists('link_tools');
    }
};
