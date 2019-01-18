<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use App\Http\Requests;
use App\Device;
use App\Position;
use App\Ssid;
use App\Sector;
use App\Http\Resources\Test as TestResource;
use Illuminate\Support\Facades\DB;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;


class TestController extends Controller
{

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

    protected function minimunPosition($positions_errors)
    {

      $minimun_error=false;
      $minimun_position=false;
      $flagInit = false;
      foreach ($positions_errors as $position_error) {
        if ($flagInit == false) {
          $flagInit = true;
          $minimun_position = $position_error[0];
          $minimun_error = $position_error[1];
        }
        else if ($minimun_error > $position_error[1] ) {
          $minimun_error = $position_error[1];
          $minimun_position = $position_error[0];
        }
      }
      return array($minimun_position,$minimun_error);

    }




    protected function rateConincidence($PosMapeig1,$PosMapeig2)
    {
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

      if ($coincidence >= $RateThreshold_PM1) {
        return true;
      }
      return false;

    }

    protected function algorithm($caiguda)
    {
      $sectors = $this->getSectors();     // Obtenim els sector
      $errorThreshold = 13;               // ERROR THRESHOLD QUE DETERMINA SI L'ERROR ASSOCIAT A UNA POSICIÓ ÉS ACCEPTABLE O NO.
      $aviablePositions = false;          // FLAG QUE DETERMINA SI EXISTEIXEN POSICONS QUE HAN SUPERAT ELS FILTRES DE L'ALGORISME.
      $sectorsPositions = array();        // $sectorsPositions = [ [sector]=>[ (position1,error1),(position2,error2),.. ] , [sector]=>[ (position1,error1),(position2,error2),.. ] , [] , []]
      $sectorsCounters = array();         // $sectorsCounters = [ [sector] => [counter],[sector2] => [counter2] ]


      /*
      *
      * INITIALIZATION OF $sectorsPositions AND $sectorsCounters
      *
      */
      foreach ($sectors as $sector => $positions) {
        $sectorsCounters[$sector]=0;
        $sectorsPositions[$sector]=array();
      }


      /*
      *
      * OBTENIR EL NOMBRE TOTAL DE POSCIONS I DETERMINAR QUINES POSICIONS, ON EL SEU ERROR ÉS INFERIOR A $errorThreshold PER CADA SECTOR RESPECTE LA VARIABLE $caiguda.
      *
      */
      foreach ($sectors as $sector => $positions) {

        // BUCLE PER OBTENIR EN UN ARRAY L'ERROR D'AQUELLES POSICIONS QUE SUPERIN EL rateConincidence RESPECTE LA $caiguda.
        $positions_errors = array();
        foreach ($positions as $position => $ssids_rssis) {
          $error = 0;
          if ($this->rateConincidence($ssids_rssis,$caiguda)) {
            foreach ($caiguda as $ssid_rssi_caiguda) {
              foreach ($ssids_rssis as $ssid_rssi_position) {
                if ($ssid_rssi_caiguda[0] == $ssid_rssi_position[0]) {
                  $error = abs(abs($ssid_rssi_caiguda[1])-abs($ssid_rssi_position[1])) + $error;
                  break;
                }
              }
            }
            $positions_errors[$position] = $error;
          }
        }

        // FILTRE PER OBTENIR EL NOMBRE TOTAL DE POSCIONS I DETERMINAR QUINES POSICIONS, ON EL SEU ERROR ÉS INFERIOR A $errorThreshold PER CADA SECTOR
        if ($positions_errors != NULL) {
          foreach ($positions_errors as $position => $error) {
            if ($error <= $errorThreshold) {
              $aviablePositions = true;
              $sectorsCounters[$sector]++;
              $sectorsPositions[$sector][]=array($position,$error);
            }
          }
        }
      }

      /*
      *
      *  LOCALIZATION
      *
      */
      if ($aviablePositions == true) {
        // FILTRE PER OBTENIR EL SECTOR QUE TÉ MÉS POSICIONS QUE HAN SUPERAT EL FILTRE ASSOCIAT A $errorThreshold.
        $MaxCounter = false;
        $SectorMaxCounter = false;
        foreach ($sectorsCounters as $sector => $counter) {
          if ($MaxCounter == false) {
            $MaxCounter = $counter;
            $SectorMaxCounter = $sector;
          }
          if ($counter > $MaxCounter ) {
            $MaxCounter = $counter;
            $SectorMaxCounter = $sector;
          }
        }
        $localizacion= $this->minimunPosition($sectorsPositions[$SectorMaxCounter]);
        echo "<br>POSITION , ERROR <br>";
        print_r($localizacion); //$minimun_position,$minimun_error
        echo "<br>SECTOR<br>";
        print_r($SectorMaxCounter);
        echo "<br>-------------------------------------<br>";
        return $SectorMaxCounter;
      }
      return false;
    }



    public function test()
    {

      $caiguda = array(array('AP_1',10),array('AP_2',20),array('AP_3',15));
      $SectorLocalization=$this->algorithm($caiguda);

      $caiguda = array(array('AP_1',16),array('AP_2',25),array('AP_3',17));
      $SectorLocalization=$this->algorithm($caiguda);

      $caiguda = array(array('AP_1',13),array('AP_2',18),array('AP_3',5));
      $SectorLocalization=$this->algorithm($caiguda);

    }

    protected function sendTelegram($param1,$param2)
    {
      $client = new Client(); //GuzzleHttp\Client
      $result = $client->post('https://api.telegram.org/bot615582162:AAGgt4fbrWwCtNCzEltixeg4r1_-WXay2AI/sendMessage', [
        'form_params' => [
            'chat_id'  => '-1001271064871',
            'text'     => $param1."\n".$param2
        ]
      ]);
    }


    protected function alertMessage()
    {
      $data = [
        'topic_id' => 'onAlertMessage',
        'data'     => 'FALL DETECTED '.'somData'.rand(1,100)
      ];
      \App\Socket\Pusher::sentDataToServer($data);
    }

    public function storeCaiguda($client,$sector)
    {
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


    public function testPost(Request $request)
    {
    
      $idPlaca = $request->input('idPlaca');
      $ssids_rssis = $request->input('ssids_rssis');

      $device = Device::find($idPlaca);
      $client = $device->client_dni;

      // $this->sendTelegram('CAIGUDA_4',"12276");
      // $this->sendTelegram($client,$ssids_rssis);
      // return 'ok';
     
      $caiguda = array();
      $positions = explode(";",$ssids_rssis);
   
      foreach ($positions as $position) {

        $ssid_rssi = explode(",",$position);
        $caiguda[]=array($ssid_rssi[0],intval($ssid_rssi[1]));
      }


    
      $SectorLocalization=$this->algorithm($caiguda);

      if ($SectorLocalization != false) {
        $this->storeCaiguda($client,$SectorLocalization);
        $this->alertMessage();
        $this->sendTelegram($client,$SectorLocalization);
      }



    }



}

