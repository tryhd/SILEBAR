<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kegiatan extends Model
{
    //
    protected $table = 'kegiatan';

    public function user(){
      return $this->belongsTo('App\user','user_id');
    }
}
