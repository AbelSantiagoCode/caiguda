<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Caiguda extends Model
{
    protected $table = 'caigudes';


    public function sector(){
       
        return $this->belongsTo('App\Sector','sector_id');

    }

    public function horari(){

        return $this->belongsTo('App\Horari','horari_id');
    }


}
