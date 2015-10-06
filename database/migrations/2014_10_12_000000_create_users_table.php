<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user', function (Blueprint $table) {
            $table->string('username');
            $table->primary('username');
            $table->string('password', 60);
            $table->string('nama', 60);
            $table->string('jawatan', 50);
            $table->integer('cawangan_id')->unsigned();
            $table->integer('level_id')->unsigned();
            $table->integer('status')->unsigned();
            $table->integer('unit')->unsigned();
            $table->rememberToken();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('user');
    }
}
