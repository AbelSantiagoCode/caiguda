<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ssid extends Model
{
    protected $table = 'ssids';
    public $timestamps = false;
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';

    public function positions()
    {
      return $this->belongsToMany('App\Position','position_ssid','ssid_id','position_id')->withPivot('rssi');
      //return $this->belongsToMany('App\Position','position_ssid','possition_id','ssid_id');

    }
}
