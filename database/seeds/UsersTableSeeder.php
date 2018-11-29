<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $user = new User;
        $user->dni= "48048074T";
        $user->name= "superadmin";
        $user->email= "superadmin@gmail.com";
        $user->password= bcrypt('secret');
        $user->save();
        $user->roles()->attach(Role::find('superadmin'));
        

    }
}
