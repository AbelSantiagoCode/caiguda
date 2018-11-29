<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHorariUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('horari_user', function (Blueprint $table) {
            $table->string('user_dni');
            $table->foreign('user_dni')->references('dni')->on('users')->onUpdate('cascade')->onDelete('cascade');;
            $table->integer('horari_id')->unsigned();
            $table->foreign('horari_id')->references('id')->on('horaris')->onUpdate('cascade')->onDelete('cascade');;
            $table->primary(['user_dni','horari_id']);

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
        Schema::dropIfExists('horari_user');
    }
}
