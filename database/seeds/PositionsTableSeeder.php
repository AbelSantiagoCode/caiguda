<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;



class PositionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('positions')->insert([
        ['id'=>12241,'sector_id'=>'1224'],
        ['id'=>12242,'sector_id'=>'1224'],
        ['id'=>12243,'sector_id'=>'1224'],
        ['id'=>12244,'sector_id'=>'1224'],
        ['id'=>12245,'sector_id'=>'1224'],
        ['id'=>12246,'sector_id'=>'1224'],

        ['id'=>12151,'sector_id'=>'1215'],
        ['id'=>12152,'sector_id'=>'1215'],
     

        ['id'=>12171,'sector_id'=>'1217'],

        ['id'=>12111,'sector_id'=>'1211'],
        ['id'=>12112,'sector_id'=>'1211'],
        ['id'=>12113,'sector_id'=>'1211'],
        ['id'=>12114,'sector_id'=>'1211'],
        ['id'=>12115,'sector_id'=>'1211'],
        ['id'=>12116,'sector_id'=>'1211'],

        ['id'=>12141,'sector_id'=>'1214'],
        ['id'=>12142,'sector_id'=>'1214'],
        ['id'=>12143,'sector_id'=>'1214'],
        ['id'=>12144,'sector_id'=>'1214'],
    

        ['id'=>12331,'sector_id'=>'1233'],
        ['id'=>12332,'sector_id'=>'1233'],
        ['id'=>12333,'sector_id'=>'1233'],
        ['id'=>12334,'sector_id'=>'1233'],

        ['id'=>12271,'sector_id'=>'1227'],
        ['id'=>12272,'sector_id'=>'1227'],
        ['id'=>12273,'sector_id'=>'1227'],
        ['id'=>12274,'sector_id'=>'1227'],
        ['id'=>12275,'sector_id'=>'1227'],
        ['id'=>12276,'sector_id'=>'1227']
       
      ]);

    }
}
