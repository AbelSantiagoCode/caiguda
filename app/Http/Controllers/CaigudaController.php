<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Caiguda;
use App\Horari;
use DB;
use App\User;

class CaigudaController extends Controller
{
  


    public function show()
    {
        $caigudes=Caiguda::all()->where('state', true);

        if($caigudes->count()){

            $user = Auth::user();

            return view('caiguda.show',compact('caigudes','user'));
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



    public function store()
    {
        
        $client='dni1';
        $sector='B';

        $caiguda = new Caiguda;
        $caiguda->client_dni = $client;
        $caiguda->sector_id = $sector;
        $caiguda->state = true;
        $caiguda->save();

        date_default_timezone_set('Europe/Madrid');
        $dayofweek = date('l');
        $hora= date("H:i:s");
        $horaris = DB::table('horaris')->select('id')->where('day', $dayofweek)->whereTime('start','<',$hora)->whereTime('finish','>',$hora)->get();

        foreach($horaris as $horari){

            $caiguda->horaris()->attach( Horari::find($horari->id) );

        }
   
        return 'OK';
    }

    
}
