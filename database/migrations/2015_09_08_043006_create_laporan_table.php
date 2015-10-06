<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLaporanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('laporan', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamp('tarikh', '0000-00-00 00:00:00');
            $table->string('nama');
            $table->string('pelapor');
            $table->integer('cawangan_id')->unsigned();
            $table->integer('peralatan_id')->unsigned();
            $table->string('noSiri');
            $table->string('pemilik');
            $table->text('ringkasanKerosakan');
            $table->string('user')->nullable(); // user->username;
            $table->timestamp('tarikhSiap', '0000-00-00 00:00:00');
            $table->string('noJobsheet')->nullable();
            $table->string('status')->nullable();
            $table->longText('catatan')->nullable();
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
        Schema::drop('laporan');
    }
}
