<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoleUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('role_user', function (Blueprint $table) {
          $table->string('user_dni');
          $table->string('role_name');


          $table->primary(['user_dni','role_name']);
          $table->foreign('user_dni')->references('dni')->on('users')->onUpdate('cascade')->onDelete('cascade');
          $table->foreign('role_name')->references('name')->on('roles')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('role_user');
    }
}
