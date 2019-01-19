<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCaigudesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('caigudes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('client_dni');
            $table->foreign('client_dni')->references('dni')->on('clients')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('position_id')->unsigned();
            $table->foreign('position_id')->references('id')->on('positions')->onUpdate('cascade')->onDelete('cascade');
            $table->boolean('state');
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
        Schema::dropIfExists('caigudes');
    }
}
