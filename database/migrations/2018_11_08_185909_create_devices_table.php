<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDevicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('devices', function (Blueprint $table) {
          $table->unsignedInteger('id');
          $table->boolean('active')->default(false);
          $table->primary('id');

          // CLIENT RELATIONSHIP
          $table->string('client_dni')->nullable($value = true);
          $table->foreign('client_dni')->references('dni')->on('clients')->onDelete('cascade');
          $table->unique('client_dni');

          // POSITION RELATIONSHIP
          $table->unsignedInteger('position_id')->nullable($value = true);
          $table->foreign('position_id')->references('id')->on('positions')->onDelete('cascade');



        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('devices');
    }
}
