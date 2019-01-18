<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DevicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('devices')->insert([

        ['id'=>2,'active'=>true,'client_dni'=>'dni2','position_id'=>'12244'],
        ['id'=>22,'active'=>true,'client_dni'=>'dni3','position_id'=>'12112'],
        ['id'=>23,'active'=>true,'client_dni'=>'dni5','position_id'=>'12113'],
        ['id'=>25,'active'=>true,'client_dni'=>'dni6','position_id'=>'12142'],
        ['id'=>26,'active'=>true,'client_dni'=>'dni7','position_id'=>'12115'],
        ['id'=>7,'active'=>true,'client_dni'=>'dni8','position_id'=>'12274']

      ]);
    }
}
