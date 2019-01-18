<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sector extends Model
{
  protected $table = 'sectors';
  public $timestamps = false;
  protected $primaryKey = 'id';
  public $incrementing = false;
  protected $keyType = 'string';
  protected $fillable = [
        'id'
    ];


   public function users(){

        return $this->belongsToMany('App\User','sector_user','sector_id','user_dni')->withTimestamps();
    }

    public function caigudes(){

      return $this->hasMany('App\Caigudes');

      
  }



  public function positions()
  {
    return $this->hasMany('App\Position','sector_id','id');

  }
}
