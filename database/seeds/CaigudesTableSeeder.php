<?php

use Illuminate\Database\Seeder;
use App\Caiguda;
use App\Horari;
class CaigudesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $client='dni1';
        $position='12112';

        $caiguda = new Caiguda;
        $caiguda->client_dni = $client;
        $caiguda->position_id = $position;
        $caiguda->state = true;
        $caiguda->save();
        $caiguda->horaris()->attach( Horari::find(2) );


        $client='dni6';
        $position='12142';

        $caiguda = new Caiguda;
        $caiguda->client_dni = $client;
        $caiguda->position_id = $position;
        $caiguda->state = true;
        $caiguda->save();
        $caiguda->horaris()->attach( Horari::find(5) );


    

    
    }
}
