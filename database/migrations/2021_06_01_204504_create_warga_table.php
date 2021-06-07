<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWargaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('warga', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nik');
            $table->string('no_kk');
            $table->string('nama');
            $table->date('tanggal_lahir');
            $table->string('jenis_kelamin');
            $table->string('alamat');
            $table->string('rt',5);
            $table->string('rw',5);
            $table->string('agama');
            $table->string('status_perkawinan');
            $table->string('pendidikan');
            $table->string('id_pekerjaan');
            $table->string('status');
            $table->string('gol_darah');
            $table->string('kewarganegaraan');
            $table->string('foto');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('warga');
    }
}
