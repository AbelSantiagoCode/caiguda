<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
          //CLIENT - RESIDENCE CLIENT
          $table->string('dni');
          $table->primary('dni');
          $table->string('name');
          $table->unsignedInteger('contact_telephone');
          $table->string('email'); //not unique due to several clients cames from the same family.
          $table->string('photo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('client');
    }
}
