<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSectorUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sector_user', function (Blueprint $table) {
            $table->string('user_dni');
            $table->foreign('user_dni')->references('dni')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->string('sector_id');
            $table->foreign('sector_id')->references('id')->on('sectors')->onUpdate('cascade')->onDelete('cascade');
            $table->primary(['user_dni','sector_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sector_user');
    }
}
