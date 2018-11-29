<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    protected $table = 'devices';
    public $timestamps = false;
    protected $primaryKey = 'id';
    public $incrementing = false;
    //protected $keyType = string;

    public function position()
    {
      return $this->belongsTo('App\Position','position_id','id');
    }

    public function client()
    {
      return $this->belongsTo('App\Client','client_dni','dni');
    }
}
