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
            $table->string('nik')->unique();
            $table->string('no_kk')->unique();
            $table->string('nama');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->string('jenis_kelamin');
            $table->string('alamat');
            $table->integer('kelurahan');
            $table->string('rt',5);
            $table->string('rw',5);
            $table->string('agama');
            $table->string('status_perkawinan');
            $table->string('pendidikan');
            $table->integer('id_pekerjaan');
            $table->string('status')->nullable();
            $table->string('gol_darah')->nullable();
            $table->string('kewarganegaraan');
            $table->string('foto');
            $table->string('berlaku')->nullable();
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
