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
            'horari_id' => 1,
            'sector_id' => 'D',
            'state' => true,
  
        ]);
    
    }
}
