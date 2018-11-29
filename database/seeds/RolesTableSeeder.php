<?php

use Illuminate\Database\Seeder;
use App\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $superadmin = Role::create([
            'name' => 'superadmin',
            'slug' => 'superadmin',
            'permissions' => [
                'create-user' => true,
                'update-user' => true,
                'read-user' => true,
                'delete-user' => true,

                'create-horari' => true,
                'update-horari' => true,
                'read-horari' => true,
                'delete-horari' => true,

                'create-sector' => true,
                'update-sector' => true,
                'read-sector' => true,
                'delete-sector' => true,


                'read-device' => true,
                'create-device'=> true,
                'delete-device' => true,
                'update-device' => true,

                'read-client' => true,
                'create-client'=> true,
                'delete-client' => true,
                'update-client' => true,

                'read_horari-user' => true,
                'create_horari-user' => true,
                'delete_horari-user' => true,

                'read_sector-user' => true,
                'create_sector-user' => true,
                'delete_sector-user' => true


            ]
        ]);

        $admin = Role::create([
            'name' => 'admin',
            'slug' => 'admin',
            'permissions' => [

              'create-user' => true,
              'update-user' => true,
              'read-user' => true,
              'delete-user' => true,

              'create-horari' => true,
              'update-horari' => true,
              'read-horari' => true,
              'delete-horari' => true,

              'create-sector' => true,
              'update-sector' => true,
              'read-sector' => true,
              'delete-sector' => true,

              'read-device' => true,
              'create-device'=> true,
              'delete-device' => true,
              'update-device' => true,

              'read-client' => true,
              'create-client'=> true,
              'delete-client' => true,
              'update-client' => true,

              'read_horari-user' => true,
              'create_horari-user' => true,
              'delete_horari-user' => true,

              'read_sector-user' => true,
              'create_sector-user' => true,
              'delete_sector-user' => true




            ]
        ]);


        $consumer = Role::create([
          'name' => 'consumer',
          'slug' => 'consumer',
          'permissions' => [

            'create-user' => false,
            'update-user' => false,
            'read-user' => true,
            'delete-user' => false,


            'read-client' => true,
            'read_horari-user' => true,
            'read_sector-user' => true,

            ]
      ]);

    }
}
