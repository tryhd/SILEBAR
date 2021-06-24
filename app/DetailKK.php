<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailKK extends Model
{
    //
    protected $table='detailkk';

    public function user(){
        return $this->belongsTo('App\user','user_id');

      }

    public function warga(){
        return $this->belongsTo('App\user','warga_id');
    }
}
