<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Position_SsidTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('position_ssid')->insert([
        ['position_id'=>1,'ssid_id'=>'AP_1','rssi'=>10],
        ['position_id'=>1,'ssid_id'=>'AP_2','rssi'=>20],
        ['position_id'=>1,'ssid_id'=>'AP_3','rssi'=>15],
        ['position_id'=>2,'ssid_id'=>'AP_1','rssi'=>16],
        ['position_id'=>2,'ssid_id'=>'AP_2','rssi'=>45],
        ['position_id'=>2,'ssid_id'=>'AP_3','rssi'=>30],
        ['position_id'=>5,'ssid_id'=>'AP_1','rssi'=>13],
        ['position_id'=>5,'ssid_id'=>'AP_2','rssi'=>18],
        ['position_id'=>5,'ssid_id'=>'AP_3','rssi'=>5]

      ]);
    }
}
