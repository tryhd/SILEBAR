<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PengajuanKK extends Model
{
    //
    protected $table='permohonan_kk';
    protected $fillable=['user_id','surat_pengantar','status','tanggal'];
}
