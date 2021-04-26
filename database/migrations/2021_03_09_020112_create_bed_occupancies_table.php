<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBedOccupanciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bed_occupancies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('author');
            $table->string('field');
            $table->string('field1')->nullable();
            $table->string('val1')->nullable();
            $table->string('field2')->nullable();
            $table->string('val2')->nullable();
            $table->string('field3')->nullable();
            $table->string('val3')->nullable();
            $table->string('field4')->nullable();
            $table->string('val4')->nullable();
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
        Schema::dropIfExists('bed_occupancies');
    }
}
