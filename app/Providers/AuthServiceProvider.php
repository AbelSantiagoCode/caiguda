<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Post;


class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        ///////////////////////////////////
        //Here we will define access policies to protect our actions.
        ////////////////////////////////////
        $this->registerUserPolicies();


    }


    public function registerUserPolicies()
    {
      // Defining Gates to authorization of role_users
      Gate::define('isRole', function ($user,$typeRole) {
        return $user->isRole($typeRole);
      });

      // Defining CRUD USER Gates authorization
      Gate::define('create-user', function($user){
        return $user->hasAccess(['create-user']);
      });

      Gate::define('read-user', function($user){
        return $user->hasAccess(['read-user']);
      });

      Gate::define('update-user', function($user){
        return $user->hasAccess(['update-user']);
      });

      Gate::define('delete-user', function($user){
        return $user->hasAccess(['delete-user']);
      });


      // Defining CRUD HORARI-USER Gates authorization

      Gate::define('read_horari-user', function($user){
        return $user->hasAccess(['read_horari-user']);
      });

      Gate::define('create_horari-user', function($user){
          return $user->hasAccess(['create_horari-user']);
      });

      Gate::define('delete_horari-user', function($user){
          return $user->hasAccess(['delete_horari-user']);
      });

      Gate::define('read_sector-user', function($user){
          return $user->hasAccess(['read_sector-user']);
      });

      Gate::define('create_sector-user', function($user){
          return $user->hasAccess(['create_sector-user']);
      });

      Gate::define('delete_sector-user', function($user){
          return $user->hasAccess(['delete_sector-user']);
      });


      // Defining CRUD devices Gates authorization

      Gate::define('create-device', function($user){  // Superadmin
        return $user->hasAccess(['create-device']);
      });

      Gate::define('read-device', function($user){    // Consumer, Admin, Superadmin
        return $user->hasAccess(['read-device']);
      });

      Gate::define('update-device', function($user){  // Admin, Superadmin
        return $user->hasAccess(['update-device']);
      });

      Gate::define('delete-device', function($user){  // Superadmin
        return $user->hasAccess(['delete-device']);
      });


      // Defining CRUD clients Gates authorization

      Gate::define('create-client', function($user){  // Superadmin
        return $user->hasAccess(['create-client']);
      });

      Gate::define('read-client', function($user){    // Consumer, Admin, Superadmin
        return $user->hasAccess(['read-client']);
      });

      Gate::define('update-client', function($user){  // Admin, Superadmin
        return $user->hasAccess(['update-client']);
      });

      Gate::define('delete-client', function($user){  // Superadmin
        return $user->hasAccess(['delete-client']);
      });


      // Defining CRUD SCHEDULE Gates authorization

        Gate::define('create-horari', function($user){
        return $user->hasAccess(['create-horari']);
        });

        Gate::define('read-horari', function($user){
        return $user->hasAccess(['read-horari']);
        });

        Gate::define('update-horari', function($user){
        return $user->hasAccess(['update-horari']);
        });

        Gate::define('delete-horari', function($user){
        return $user->hasAccess(['delete-horari']);
        });

        // Defining CRUD SECTORS Gates authorization
        Gate::define('create-sector', function($user){
        return $user->hasAccess(['create-sector']);
        });

        Gate::define('read-sector', function($user){
        return $user->hasAccess(['read-sector']);
        });

        Gate::define('update-sector', function($user){
        return $user->hasAccess(['update-sector']);
        });

        Gate::define('delete-sector', function($user){
        return $user->hasAccess(['delete-sector']);
        });



    }

}
