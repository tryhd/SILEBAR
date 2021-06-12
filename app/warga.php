<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class warga extends Model
{
    //
    protected $table='warga';
    protected $fillable=['nik','no_kk','nama','tanggal_lahir','jenis_kelamin','alamat','rt','rw','agama','status_perkawinan','pendidikan',
    'id_pekerjaan','gol_darah','kewarganegaraan','foto','berlaku','status'];
}
