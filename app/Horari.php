<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Horari extends Model
{
    
    protected $table='horaris';

    protected $fillable = [
        'day', 'start', 'finish'
    ];

    public function users(){

        return $this->belongsToMany('App\User','horari_user','horari_id','user_dni')->withTimestamps();
    }

    public function caigudes(){

        return $this->hasMany('App\Caigudes');

    }

}
