<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCaigudaHorariTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('caiguda_horari', function (Blueprint $table) {

            $table->integer('caiguda_id')->unsigned();
            $table->foreign('caiguda_id')->references('id')->on('caigudes')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('horari_id')->unsigned();
            $table->foreign('horari_id')->references('id')->on('horaris')->onUpdate('cascade')->onDelete('cascade');
            $table->primary(['caiguda_id','horari_id']);
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
        Schema::dropIfExists('caiguda_horari');
    }
}
