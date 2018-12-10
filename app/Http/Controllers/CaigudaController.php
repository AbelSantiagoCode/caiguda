<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Caiguda;
use DB;

class CaigudaController extends Controller
{
  


    public function show()
    {
        $caigudes=Caiguda::all()->where('state', true);

        if($caigudes->count()){
            return view('caiguda.show',compact('caigudes'));
        }
        
        else{
            return redirect()->route('home');
        }
    }
  
  
    public function assistit($id){
  
        $caiguda=Caiguda::find($id);
        $caiguda->state=false;
        $caiguda->save();

        $data = [
        'topic_id' => 'onAlertMessage'
        ];
        \App\Socket\Pusher::sentDataToServer($data);
        return redirect()->route('caiguda.show');
    }



    public function store($sector, $client)
    {
        $caiguda = new Caiguda;
        $caiguda->client_dni = $client;
        $caiguda->sector_id = $sector;
        $caiguda->horari_id = '1';
        $caiguda->state = true;
        $caiguda->save();

    
        return 'OK';
    }

    
}
