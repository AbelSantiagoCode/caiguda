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
      return $value;
    }

    protected function getSectors()
    {
      $sectors = Sector::all();
      $array_sectors = array();

      foreach ($sectors as $sector) {
        $positonsSector = Position::where('sector_id','=',$sector->id)->get();
        $positions = array();
        foreach ($positonsSector as $positonSector) {
          $positions[] = $positonSector->id;
        }

        $Pmapejats = DB::table('position_ssid')->whereIn('position_id', $positions)->get();
        $results = $this->arrayPmapejats($Pmapejats);
        $array_sectors[$sector['id']] = $results;
      }
      return $array_sectors;
    }
    /*
    */

    protected function minimun($value)
    {
      $minimun_error=0;
      $minimun_position=0;
      $minimun_sector=0;
      $init = true;
      foreach ($value as $sector => $position_error) {
        if ($init== true) {
          $minimun_error=$position_error[1];
          $minimun_position=$position_error[0];
          $minimun_sector=$sector;
          $init=false;
        }
        else if($position_error[1]<=$minimun_error){
          $minimun_error=$position_error[1];
          $minimun_position=$position_error[0];
          $minimun_sector=$sector;
        }
      }
      return array($minimun_sector,$minimun_position,$minimun_error);
    }


    // protected function len($variable)
    // {
    //   $count=0;
    //   foreach ($variable as $i) {
    //     $count++;
    //   }
    //   return $count;
    // }

    protected function rateConincidence($PosMapeig1,$PosMapeig2)
    {
      //$lenPM1 = $this->len($PosMapeig1);
      $lenPM1 = count($PosMapeig1);
      $RateThreshold_PM1 = round($lenPM1*0.7); // 70% of rate coincidence
      $coincidence = 0;
      foreach ($PosMapeig1 as $ssid_rssi1) {
        foreach ($PosMapeig2 as $ssid_rssi2) {
          if($ssid_rssi1[0]==$ssid_rssi2[0]){
            $coincidence++;
          }
        }
      }
      // echo "<br>RateCoincidence:<br>";
      // print_r($RateThreshold_PM1);
      // echo "<br>COINCIDENCE:<br>";
      // print_r($coincidence);
      if ($coincidence >= $RateThreshold_PM1) {
        return true;
      }
      return false;

    }

    protected function algorithm($caiguda)
    {
      $coincidence = false;
      $sectors = $this->getSectors();     // Obtenim els sector
      $minimun_sector = array();          // el minim error per cada sector amb la posicio indicada.

       //echo "<br>minimun_sector: sector=> position_minimun<br>";
       //print_r($minimun_sector);


       //dd($sectors);

       //dd($minimun_sector);

      foreach ($sectors as $sector_key => $sector_value) {
        $array_resta = array();
        foreach ($sector_value as $position_key => $position_value) {
          $resta = 0;
          if ($this->rateConincidence($position_value,$caiguda)) {
            if ($coincidence == false) {
              $coincidence = true;
            }
            foreach ($caiguda as $mapeig_c) {
              foreach ($position_value as $mapeig_p) {
                if ($mapeig_c[0] == $mapeig_p[0]) {
                  $resta = abs(abs($mapeig_c[1])-abs($mapeig_p[1])) + $resta;
                  break;
                }
              }
            }
            $array_resta[$position_key] = $resta;
          }
        }
        if ($coincidence == true) {


          /*
          treball amb $array_resta per millorar l'algorisme. Aquest conté pel sector actual ($sector_key) una llista de [position1=>error,position2=>error]
          */
          $minimun_error =  min($array_resta);  //  trobar l'error mínim d'una llista [position1=>error,position2=>error] :             $array_resta[$position_key] = $resta;

          $minimun_p = array_search($minimun_error,$array_resta); // trobar la posició corresponent a l'error mínim.
          //echo "<br>minimunPosition<br>";
          //print_r($minimun_p);
          // echo "<br>minimunRSSI<br>";
          // print_r($minimun_error);
          echo "<br><br>";
          print_r($sector_key);
          echo "<br>array resta<br>";
          print_r($array_resta);
          echo "<br><br>";



          $minimun_sector[$sector_key]=array($minimun_p,$minimun_error);

           //echo "<br>minimun_sector: sector=> position_minimun<br>";
           //print_r($minimun_sector);
        }

      }
      if ($coincidence == true) {
        $localitzation = $this->minimun($minimun_sector);
        // echo "<br>POSITION:<br>";
        // print_r($minimun_position);
        echo "<br><br>";
        echo "<br>SECTOR:<br>";
        print_r($localitzation);
        echo "<br>-------------------------------------<br>";
        return true;
      }
      return false;
    }



    public function test()
    {
      // Displar in this order : $minimun_sector,$minimun_position,$minimun_error
      $caiguda = array(array('AP_1',10),array('AP_2',20),array('AP_3',15));
      $this->algorithm($caiguda);

      $caiguda = array(array('AP_1',16),array('AP_2',45),array('AP_3',30));
      $this->algorithm($caiguda);

      $caiguda = array(array('AP_1',13),array('AP_2',18),array('AP_3',5));
      $this->algorithm($caiguda);




      //$caiguda = array(array('AP_1',16),array('AP_2',45),array('AP_3',30));
/*      $sectors = $this->getSectors();
      echo "<br>count <br>";
      print_r(count($caiguda));

      foreach ($sectors as $sector_key => $sector_value) {

        foreach ($sector_value as $position_key => $position_value) {
          $resta = 0;
          if ($this->rateConincidence($position_value,$caiguda)) {
            echo "<br>Position_value<br>";
            print_r($position_value);
            echo "<br>Caiguda<br>";
            print_r($caiguda);
            echo "<br><br>";

          }
        }
      }
  */

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
      $result = array();
      $ids = explode(";",$request->input('ssids_rssis'));
      foreach ($ids as $id) {
        $ssid_rssi = explode(",",$id);
        $result[]=$ssid_rssi;
      }
      //foreach ($ids as $id) {
      //  $device = new Device;
      //  $device->id = $id;
      //  $device->position_id = $request->input('position');
      //  $device->save();
      //}
      // return redirect()->route('users.index');
      //return view('test');


      return new TestResource($result);
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
