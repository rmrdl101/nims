<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVirtualConsultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('virtual_consults', function (Blueprint $table) {
            $table->id();
            $table->string('appointmentcode')->nullable();
            $table->string('lname')->nullable();
            $table->string('fname')->nullable();
            $table->string('mname')->nullable();
            $table->string('age')->nullable();
            $table->string('birthday')->nullable();
            $table->string('sex')->nullable();
            $table->string('address')->nullable();
            $table->string('contactnum')->nullable();
            $table->string('oldnew')->nullable();
            $table->string('hospitalnumber')->nullable();
            $table->string('chiefcomplaint')->nullable();
            $table->string('department')->nullable();
            $table->string('rdepartment')->nullable();
            $table->string('disposition')->nullable();
            $table->string('status')->nullable();
            $table->string('remarks')->nullable();
            $table->string('link')->nullable();
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
        Schema::dropIfExists('virtual_consults');
    }
}
