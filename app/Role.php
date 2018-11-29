<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
  public $incrementing = false;
  protected $keyType = 'string';
  protected $primaryKey='name';

  protected $fillable = [
  'name', 'slug', 'permissions',
  ];
  protected $casts = [
    'permissions' => 'array',
  ];



  public function users(){

    return $this->belongsToMany('App\User','role_user','role_name','user_dni');
    }




  public function hasAccess(array $permissions) : bool
  {
      foreach ($permissions as $permission) {
          if ($this->hasPermission($permission))
              return true;
      }
      return false;
  }

  private function hasPermission(string $permission) : bool
  {

      return $this->permissions[$permission] ?? false;
  }







}
