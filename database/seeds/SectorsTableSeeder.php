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
            'id' => 'A',
         
        ]);
        DB::table('sectors')->insert([
            'id' => 'B',
         
        ]);
        DB::table('sectors')->insert([
            'id' => 'C',
         
        ]);
        DB::table('sectors')->insert([
            'id' => 'D',
         
        ]);
        DB::table('sectors')->insert([
            'id' => 'E',
         
        ]);
            
    
    }
}
