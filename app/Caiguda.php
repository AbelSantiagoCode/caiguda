<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Caiguda extends Model
{
    protected $table = 'caigudes';


    public function position(){
       
        return $this->belongsTo('App\Position','position_id');

    }



    public function client(){

        return $this->belongsTo('App\Client','client_dni');
    }

    
    public function horaris(){

        return $this->belongsToMany('App\Horari','caiguda_horari','caiguda_id','horari_id')->withTimestamps();
    }

}
