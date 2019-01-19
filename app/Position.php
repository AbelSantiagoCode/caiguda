<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    protected $table = 'positions';
    public $timestamps = false;
    protected $primaryKey = 'id';
    public $incrementing = false;
  //protected $keyType = string;

    public function ssids()
    {
      return $this->belongsToMany('App\Ssid','position_ssid','position_id','ssid_id')->withPivot('rssi');
//      return $this->belongsToMany('App\Ssid','position_ssid','ssid_id','possition_id');

    }

    public function devices()
    {
      return $this->hasMany('App\Device','position_id','id');
    }

    public function sector()
    {
      return $this->belongsTo('App\Sector','sector_id','id');

    }

    public function caigudes(){

      return $this->hasMany('App\Caigudes');

      
  }


}
