<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePositionSsidTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('position_ssid', function (Blueprint $table) {
          $table->unsignedInteger('position_id');
          $table->string('ssid_id',100);
          $table->foreign('position_id')->references('id')->on('positions')->onDelete('cascade');
          $table->foreign('ssid_id')->references('id')->on('ssids')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('position_ssid');
    }
}
