<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PengajuanKTP extends Model
{
    //
    protected $table='permohonan_ktp';
    protected $fillable=['user_id','surat_pengantar','status','tanggal','jenis_permohonan'];
}
