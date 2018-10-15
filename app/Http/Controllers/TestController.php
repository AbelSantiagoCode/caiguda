<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Device;
use App\Position;
use App\Ssid;
use App\Sector;
use App\Http\Resources\Test as TestResource;
use Illuminate\Support\Facades\DB;

class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected function arrayPmapejats($pms)
    {
      $value = array();
      foreach ($pms as $pm) {
      	if (array_key_exists($pm->position_id, $value)) {
      	 	$value[$pm->position_id][]=array($pm->ssid_id,$pm->rssi);
      	}
      	else {
      	 	$value[$pm->position_id]=array(array($pm->ssid_id,$pm->rssi));
      	}

      }

      //print_r($value);
      return $value;
    }
    public function test()
    {
       // Get devices
       /*$positonsSector = Position::where('sector_id','=','B')->get();
       echo $positonsSector;
       echo "<br>";

       $postions = array();
       foreach ($positonsSector as $positonSector) {
         $positons[] = $positonSector->id;
         echo $positonSector->id;
       }
       echo "<br>";
       var_dump($positons);
       echo "<br>";

       $Pmapejats = DB::table('position_ssid')
                  ->whereIn('position_id', $positons)
                  ->get();
      echo $Pmapejats;
      echo "<br>";*/


       $sectors = Sector::all();

       foreach ($sectors as $sector) {
         echo $sector;
         echo "<br>";
         echo $sector['id'];
         echo "<br>";
         $positonsSector = Position::where('sector_id','=',$sector->id)->get();
         $positions = array();
         foreach ($positonsSector as $positonSector) {
           $positions[] = $positonSector->id;
         }

         $Pmapejats = DB::table('position_ssid')
                    ->whereIn('position_id', $positions)
                    ->get();
        echo $Pmapejats;
        echo "<br>";
        $results = $this->arrayPmapejats($Pmapejats);
        foreach ($results as $key => $result) {
          echo "<br>";
          echo "<br>";
          echo $key;echo "<br>";
          var_dump($result);
          echo "<br>";
          echo "<br>";
        }
        echo "<br>";


        // Algorithm to locate the position (mininum error) by sectors


      }


    }

    public function index()
    {
      // Get devices
      $devices = Device::all();


      // Return collection of articles as a resource
      return TestResource::collection($devices);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $ids = explode(";",$request->input('id'));
      foreach ($ids as $id) {
        $device = new Device;
        $device->id = $id;
        $device->position_id = $request->input('position');
        $device->save();
      }

      return new TestResource($ids);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
