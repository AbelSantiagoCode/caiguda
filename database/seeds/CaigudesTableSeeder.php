<?php

use Illuminate\Database\Seeder;
use App\Caiguda;
class CaigudesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Caiguda::create([
            'client_dni' => 'dni1',
            'sector_id' => '1211',
            'state' => true,
  
        ]);
        Caiguda::create([

            'client_dni' => 'dni2',
            'sector_id' => '1214',
            'state' => true,
  
        ]);
   
        Caiguda::create([
            'client_dni' => 'dni4',
            'sector_id' => '1227',
            'state' => true,
  
        ]);

    
    }
}
