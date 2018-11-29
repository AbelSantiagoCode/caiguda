<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
  protected $table = 'clients';
  public $timestamps = false;
  protected $primaryKey = 'dni';
  public $incrementing = false;
  protected $keyType = 'string';


  public function device()
  {
    return $this->hasOne('App\Device','client_dni','dni');
  }


}
