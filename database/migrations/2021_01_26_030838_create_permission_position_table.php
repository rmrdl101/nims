<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermissionPositionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permission_position', function (Blueprint $table) {
            $table->foreignId('permission_id')->constrained()->on('permissions')->onDelete('cascade');
            $table->foreignId('position_id')->constrained()->on('positions')->onDelete('cascade');
            $table->foreignId('page_id')->constrained()->on('pages')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('permission_position');
    }
}
