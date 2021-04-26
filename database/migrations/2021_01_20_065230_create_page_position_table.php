<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagePositionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('page_position', function (Blueprint $table) {
            $table->unsignedInteger('page_id');
            $table->foreign('page_id')->references('id')->on('pages')->onDelete('cascade');

            $table->unsignedInteger('position_id');
            $table->foreign('position_id')->references('id')->on('positions')->onDelete('cascade');

            $table->primary(['page_id', 'position_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('page_position');
    }
}
