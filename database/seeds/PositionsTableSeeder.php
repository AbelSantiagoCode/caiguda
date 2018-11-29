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
        ['id'=>1,'sector_id'=>'A'],
        ['id'=>2,'sector_id'=>'A'],
        ['id'=>3,'sector_id'=>'A'],
        ['id'=>4,'sector_id'=>'B'],
        ['id'=>5,'sector_id'=>'B'],
        ['id'=>6,'sector_id'=>'B']
      ]);

    }
}
