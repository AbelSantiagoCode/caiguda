<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SsidsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('ssids')->insert([
        ['id'=>'AP_1'],
        ['id'=>'AP_2'],
        ['id'=>'AP_3'],
        ['id'=>'AP_4'],
        ['id'=>'AP_5'],
        ['id'=>'AP_6'],
        ['id'=>'AP_7']
      ]);

    }
}
