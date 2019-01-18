<?php

use Illuminate\Database\Seeder;

class SectorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('sectors')->insert([
            'id' => '1224',
         
        ]);
        DB::table('sectors')->insert([
            'id' => '1215',
         
        ]);
        DB::table('sectors')->insert([
            'id' => '1217',
         
        ]);
        DB::table('sectors')->insert([
            'id' => '1211',
         
        ]);
        DB::table('sectors')->insert([
            'id' => '1214',
         
        ]);

        DB::table('sectors')->insert([
            'id' => '1233',
         
        ]);

        
        DB::table('sectors')->insert([
            'id' => '1227',
         
        ]);

            
    
    }
}
