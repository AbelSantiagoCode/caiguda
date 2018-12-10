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
            'horari_id' => 1,
            'sector_id' => 'A',
            'state' => true,
  
        ]);
        Caiguda::create([

            'client_dni' => 'dni2',
            'horari_id' => 1,
            'sector_id' => 'B',
            'state' => true,
  
        ]);
        Caiguda::create([
            'client_dni' => 'dni3',
            'horari_id' => 1,
            'sector_id' => 'C',
            'state' => true,
  
        ]);
        Caiguda::create([
            'client_dni' => 'dni4',
            'horari_id' => 1,
            'sector_id' => 'D',
            'state' => true,
  
        ]);

    
    }
}
