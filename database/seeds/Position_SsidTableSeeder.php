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
        ['position_id'=>12241,'ssid_id'=>'AP_1','rssi'=>78],
        ['position_id'=>12241,'ssid_id'=>'AP_2','rssi'=>72],
        ['position_id'=>12241,'ssid_id'=>'AP_3','rssi'=>71],
        ['position_id'=>12241,'ssid_id'=>'AP_4','rssi'=>83],
        ['position_id'=>12241,'ssid_id'=>'AP_5','rssi'=>71],
        ['position_id'=>12241,'ssid_id'=>'AP_6','rssi'=>80],
  

        ['position_id'=>12242,'ssid_id'=>'AP_1','rssi'=>83],
        ['position_id'=>12242,'ssid_id'=>'AP_2','rssi'=>71],
        ['position_id'=>12242,'ssid_id'=>'AP_3','rssi'=>73],
        ['position_id'=>12242,'ssid_id'=>'AP_4','rssi'=>86],
        ['position_id'=>12242,'ssid_id'=>'AP_5','rssi'=>77],
        ['position_id'=>12242,'ssid_id'=>'AP_6','rssi'=>79],


        ['position_id'=>12243,'ssid_id'=>'AP_1','rssi'=>75],
        ['position_id'=>12243,'ssid_id'=>'AP_2','rssi'=>71],
        ['position_id'=>12243,'ssid_id'=>'AP_3','rssi'=>60],
        ['position_id'=>12243,'ssid_id'=>'AP_4','rssi'=>91],
        ['position_id'=>12243,'ssid_id'=>'AP_5','rssi'=>78],
        ['position_id'=>12243,'ssid_id'=>'AP_6','rssi'=>76],


        ['position_id'=>12244,'ssid_id'=>'AP_1','rssi'=>81],
        ['position_id'=>12244,'ssid_id'=>'AP_2','rssi'=>69],
        ['position_id'=>12244,'ssid_id'=>'AP_3','rssi'=>71],
        ['position_id'=>12244,'ssid_id'=>'AP_4','rssi'=>92],
        ['position_id'=>12244,'ssid_id'=>'AP_5','rssi'=>81],
        ['position_id'=>12244,'ssid_id'=>'AP_6','rssi'=>78],


        ['position_id'=>12245,'ssid_id'=>'AP_1','rssi'=>83],
        ['position_id'=>12245,'ssid_id'=>'AP_2','rssi'=>79],
        ['position_id'=>12245,'ssid_id'=>'AP_3','rssi'=>76],
        ['position_id'=>12245,'ssid_id'=>'AP_4','rssi'=>-1],
        ['position_id'=>12245,'ssid_id'=>'AP_5','rssi'=>86],
        ['position_id'=>12245,'ssid_id'=>'AP_6','rssi'=>85],



        ['position_id'=>12246,'ssid_id'=>'AP_1','rssi'=>84],
        ['position_id'=>12246,'ssid_id'=>'AP_2','rssi'=>74],
        ['position_id'=>12246,'ssid_id'=>'AP_3','rssi'=>70],
        ['position_id'=>12246,'ssid_id'=>'AP_4','rssi'=>-1],
        ['position_id'=>12246,'ssid_id'=>'AP_5','rssi'=>74],
        ['position_id'=>12246,'ssid_id'=>'AP_6','rssi'=>87],


        ['position_id'=>12151,'ssid_id'=>'AP_1','rssi'=>88],
        ['position_id'=>12151,'ssid_id'=>'AP_2','rssi'=>85],
        ['position_id'=>12151,'ssid_id'=>'AP_3','rssi'=>77],
        ['position_id'=>12151,'ssid_id'=>'AP_4','rssi'=>74],
        ['position_id'=>12151,'ssid_id'=>'AP_5','rssi'=>51],
        ['position_id'=>12151,'ssid_id'=>'AP_6','rssi'=>86],


        ['position_id'=>12152,'ssid_id'=>'AP_1','rssi'=>83],
        ['position_id'=>12152,'ssid_id'=>'AP_2','rssi'=>88],
        ['position_id'=>12152,'ssid_id'=>'AP_3','rssi'=>82],
        ['position_id'=>12152,'ssid_id'=>'AP_4','rssi'=>68],
        ['position_id'=>12152,'ssid_id'=>'AP_5','rssi'=>63],
        ['position_id'=>12152,'ssid_id'=>'AP_6','rssi'=>86],


        ['position_id'=>12171,'ssid_id'=>'AP_1','rssi'=>87],
        ['position_id'=>12171,'ssid_id'=>'AP_2','rssi'=>77],
        ['position_id'=>12171,'ssid_id'=>'AP_3','rssi'=>78],
        ['position_id'=>12171,'ssid_id'=>'AP_4','rssi'=>94],
        ['position_id'=>12171,'ssid_id'=>'AP_5','rssi'=>78],
        ['position_id'=>12171,'ssid_id'=>'AP_6','rssi'=>90],


        ['position_id'=>12111,'ssid_id'=>'AP_1','rssi'=>89],
        ['position_id'=>12111,'ssid_id'=>'AP_2','rssi'=>91],
        ['position_id'=>12111,'ssid_id'=>'AP_3','rssi'=>86],
        ['position_id'=>12111,'ssid_id'=>'AP_4','rssi'=>77],
        ['position_id'=>12111,'ssid_id'=>'AP_5','rssi'=>62],
        ['position_id'=>12111,'ssid_id'=>'AP_6','rssi'=>87],


        ['position_id'=>12112,'ssid_id'=>'AP_1','rssi'=>-1],
        ['position_id'=>12112,'ssid_id'=>'AP_2','rssi'=>89],
        ['position_id'=>12112,'ssid_id'=>'AP_3','rssi'=>89],
        ['position_id'=>12112,'ssid_id'=>'AP_4','rssi'=>79],
        ['position_id'=>12112,'ssid_id'=>'AP_5','rssi'=>70],
        ['position_id'=>12112,'ssid_id'=>'AP_6','rssi'=>89],
      

        ['position_id'=>12113,'ssid_id'=>'AP_1','rssi'=>83],
        ['position_id'=>12113,'ssid_id'=>'AP_2','rssi'=>84],
        ['position_id'=>12113,'ssid_id'=>'AP_3','rssi'=>82],
        ['position_id'=>12113,'ssid_id'=>'AP_4','rssi'=>68],
        ['position_id'=>12113,'ssid_id'=>'AP_5','rssi'=>64],
        ['position_id'=>12113,'ssid_id'=>'AP_6','rssi'=>82],


        ['position_id'=>12114,'ssid_id'=>'AP_1','rssi'=>85],
        ['position_id'=>12114,'ssid_id'=>'AP_2','rssi'=>86],
        ['position_id'=>12114,'ssid_id'=>'AP_3','rssi'=>85],
        ['position_id'=>12114,'ssid_id'=>'AP_4','rssi'=>73],
        ['position_id'=>12114,'ssid_id'=>'AP_5','rssi'=>60],
        ['position_id'=>12114,'ssid_id'=>'AP_6','rssi'=>83],


        ['position_id'=>12115,'ssid_id'=>'AP_1','rssi'=>85],
        ['position_id'=>12115,'ssid_id'=>'AP_2','rssi'=>86],
        ['position_id'=>12115,'ssid_id'=>'AP_3','rssi'=>83],
        ['position_id'=>12115,'ssid_id'=>'AP_4','rssi'=>65],
        ['position_id'=>12115,'ssid_id'=>'AP_5','rssi'=>65],
        ['position_id'=>12115,'ssid_id'=>'AP_6','rssi'=>84],


        ['position_id'=>12116,'ssid_id'=>'AP_1','rssi'=>89],
        ['position_id'=>12116,'ssid_id'=>'AP_2','rssi'=>88],
        ['position_id'=>12116,'ssid_id'=>'AP_3','rssi'=>87],
        ['position_id'=>12116,'ssid_id'=>'AP_4','rssi'=>68],
        ['position_id'=>12116,'ssid_id'=>'AP_5','rssi'=>60],
        ['position_id'=>12116,'ssid_id'=>'AP_6','rssi'=>84],


        ['position_id'=>12141,'ssid_id'=>'AP_1','rssi'=>-1],
        ['position_id'=>12141,'ssid_id'=>'AP_2','rssi'=>89],
        ['position_id'=>12141,'ssid_id'=>'AP_3','rssi'=>80],
        ['position_id'=>12141,'ssid_id'=>'AP_4','rssi'=>86],
        ['position_id'=>12141,'ssid_id'=>'AP_5','rssi'=>54],
        ['position_id'=>12141,'ssid_id'=>'AP_6','rssi'=>88],


        ['position_id'=>12142,'ssid_id'=>'AP_1','rssi'=>-1],
        ['position_id'=>12142,'ssid_id'=>'AP_2','rssi'=>88],
        ['position_id'=>12142,'ssid_id'=>'AP_3','rssi'=>81],
        ['position_id'=>12142,'ssid_id'=>'AP_4','rssi'=>79],
        ['position_id'=>12142,'ssid_id'=>'AP_5','rssi'=>57],
        ['position_id'=>12142,'ssid_id'=>'AP_6','rssi'=>91],


        ['position_id'=>12143,'ssid_id'=>'AP_1','rssi'=>92],
        ['position_id'=>12143,'ssid_id'=>'AP_2','rssi'=>87],
        ['position_id'=>12143,'ssid_id'=>'AP_3','rssi'=>75],
        ['position_id'=>12143,'ssid_id'=>'AP_4','rssi'=>85],
        ['position_id'=>12143,'ssid_id'=>'AP_5','rssi'=>62],
        ['position_id'=>12143,'ssid_id'=>'AP_6','rssi'=>91],


        ['position_id'=>12144,'ssid_id'=>'AP_1','rssi'=>-1],
        ['position_id'=>12144,'ssid_id'=>'AP_2','rssi'=>87],
        ['position_id'=>12144,'ssid_id'=>'AP_3','rssi'=>83],
        ['position_id'=>12144,'ssid_id'=>'AP_4','rssi'=>86],
        ['position_id'=>12144,'ssid_id'=>'AP_5','rssi'=>66],
        ['position_id'=>12144,'ssid_id'=>'AP_6','rssi'=>-1],



        ['position_id'=>12331,'ssid_id'=>'AP_1','rssi'=>60],
        ['position_id'=>12331,'ssid_id'=>'AP_2','rssi'=>56],
        ['position_id'=>12331,'ssid_id'=>'AP_3','rssi'=>65],
        ['position_id'=>12331,'ssid_id'=>'AP_4','rssi'=>88],
        ['position_id'=>12331,'ssid_id'=>'AP_5','rssi'=>85],
        ['position_id'=>12331,'ssid_id'=>'AP_6','rssi'=>64],



        ['position_id'=>12332,'ssid_id'=>'AP_1','rssi'=>55],
        ['position_id'=>12332,'ssid_id'=>'AP_2','rssi'=>59],
        ['position_id'=>12332,'ssid_id'=>'AP_3','rssi'=>67],
        ['position_id'=>12332,'ssid_id'=>'AP_4','rssi'=>84],
        ['position_id'=>12332,'ssid_id'=>'AP_5','rssi'=>82],
        ['position_id'=>12332,'ssid_id'=>'AP_6','rssi'=>54],


        ['position_id'=>12333,'ssid_id'=>'AP_1','rssi'=>63],
        ['position_id'=>12333,'ssid_id'=>'AP_2','rssi'=>61],
        ['position_id'=>12333,'ssid_id'=>'AP_3','rssi'=>75],
        ['position_id'=>12333,'ssid_id'=>'AP_4','rssi'=>85],
        ['position_id'=>12333,'ssid_id'=>'AP_5','rssi'=>87],
        ['position_id'=>12333,'ssid_id'=>'AP_6','rssi'=>67],


        ['position_id'=>12334,'ssid_id'=>'AP_1','rssi'=>84],
        ['position_id'=>12334,'ssid_id'=>'AP_2','rssi'=>75],
        ['position_id'=>12334,'ssid_id'=>'AP_3','rssi'=>78],
        ['position_id'=>12334,'ssid_id'=>'AP_4','rssi'=>87],
        ['position_id'=>12334,'ssid_id'=>'AP_5','rssi'=>86],
        ['position_id'=>12334,'ssid_id'=>'AP_6','rssi'=>77],

        ['position_id'=>12271,'ssid_id'=>'AP_1','rssi'=>80],
        ['position_id'=>12271,'ssid_id'=>'AP_2','rssi'=>75],
        ['position_id'=>12271,'ssid_id'=>'AP_3','rssi'=>64],
        ['position_id'=>12271,'ssid_id'=>'AP_4','rssi'=>82],
        ['position_id'=>12271,'ssid_id'=>'AP_5','rssi'=>71],
        ['position_id'=>12271,'ssid_id'=>'AP_6','rssi'=>82],

        ['position_id'=>12272,'ssid_id'=>'AP_1','rssi'=>85],
        ['position_id'=>12272,'ssid_id'=>'AP_2','rssi'=>81],
        ['position_id'=>12272,'ssid_id'=>'AP_3','rssi'=>65],
        ['position_id'=>12272,'ssid_id'=>'AP_4','rssi'=>85],
        ['position_id'=>12272,'ssid_id'=>'AP_5','rssi'=>68],
        ['position_id'=>12272,'ssid_id'=>'AP_6','rssi'=>80],

        ['position_id'=>12273,'ssid_id'=>'AP_1','rssi'=>78],
        ['position_id'=>12273,'ssid_id'=>'AP_2','rssi'=>70],
        ['position_id'=>12273,'ssid_id'=>'AP_3','rssi'=>54],
        ['position_id'=>12273,'ssid_id'=>'AP_4','rssi'=>88],
        ['position_id'=>12273,'ssid_id'=>'AP_5','rssi'=>76],
        ['position_id'=>12273,'ssid_id'=>'AP_6','rssi'=>73],

        ['position_id'=>12274,'ssid_id'=>'AP_1','rssi'=>83],
        ['position_id'=>12274,'ssid_id'=>'AP_2','rssi'=>75],
        ['position_id'=>12274,'ssid_id'=>'AP_3','rssi'=>49],
        ['position_id'=>12274,'ssid_id'=>'AP_4','rssi'=>87],
        ['position_id'=>12274,'ssid_id'=>'AP_5','rssi'=>73],
        ['position_id'=>12274,'ssid_id'=>'AP_6','rssi'=>81],

        ['position_id'=>12275,'ssid_id'=>'AP_1','rssi'=>72],
        ['position_id'=>12275,'ssid_id'=>'AP_2','rssi'=>67],
        ['position_id'=>12275,'ssid_id'=>'AP_3','rssi'=>56],
        ['position_id'=>12275,'ssid_id'=>'AP_4','rssi'=>88],
        ['position_id'=>12275,'ssid_id'=>'AP_5','rssi'=>78],
        ['position_id'=>12275,'ssid_id'=>'AP_6','rssi'=>72],

        ['position_id'=>12276,'ssid_id'=>'AP_1','rssi'=>82],
        ['position_id'=>12276,'ssid_id'=>'AP_2','rssi'=>76],
        ['position_id'=>12276,'ssid_id'=>'AP_3','rssi'=>60],
        ['position_id'=>12276,'ssid_id'=>'AP_4','rssi'=>84],
        ['position_id'=>12276,'ssid_id'=>'AP_5','rssi'=>72],
        ['position_id'=>12276,'ssid_id'=>'AP_6','rssi'=>82]

      



      ]);
    }
}
