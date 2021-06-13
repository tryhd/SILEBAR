<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePelayananTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pelayanan', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('user_id');
            $table->string('surat_pengantar')->nullable();
            $table->string('surat_kehilangan')->nullable();
            $table->string('status');
            $table->date('tanggal');
            $table->string('jenis_permohonan');
            $table->string('kk')->nullable();
            $table->string('akta_nikah')->nullable();
            $table->string('ktp')->nullable();
            $table->integer('warga_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pelayanan');
    }
}
