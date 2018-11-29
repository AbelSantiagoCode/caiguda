<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    public $incrementing = false;
    protected $keyType = 'string';
    protected $primaryKey='dni';

    protected $table='users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'dni', 'name', 'email', 'password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var arrays
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    
    public function horaris(){

        return $this->belongsToMany('App\Horari','horari_user','user_dni','horari_id')->withTimestamps();
    }


    public function sectors(){

        return $this->belongsToMany('App\Sector','sector_user','user_dni','sector_id')->withTimestamps();
    }

    public function roles(){

        return $this->belongsToMany('App\Role','role_user','user_dni','role_name');
    }



    public function isRole($typeRole)
    {
      foreach ($this->roles as $role) {
        if ($role->name == $typeRole) {
          return true;
        }
      }
      return false;

    }


    /**
     * Checks if User has access to $permissions.
     */

    public function hasAccess(array $permissions) : bool
    {
        // check if the permission is available in any role
        //dd($this->roles);
        foreach ($this->roles as $role) {
            if($role->hasAccess($permissions)) {
                return true;
            }
        }
        return false;
    }













}
