<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailkkTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detailkk', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('no_kk');
            $table->integer('warga_id');
            $table->string('status');
            $table->string('rt');
            $table->string('rw');
            $table->string('alamat');
            $table->string('kelurahan_id');
            $table->string('ayah');
            $table->string('ibu');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detailkk');
    }
}
