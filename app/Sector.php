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

  public function positions()
  {
    return $this->hasMany('App\Position','sector_id','id');

  }
}
