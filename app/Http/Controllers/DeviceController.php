<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Validator;


Use App\Role;
use App\User;
use App\Device;
use App\Client;
use App\Position;
use Gate;


class DeviceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      // if(Gate::allows('isRole',"consumer") || Gate::allows('isRole',"admin") ) {
      //   $valueRoles = ["consumer"];
      // }
      // else if(Gate::allows('isRole',"superadmin")){
      //   $valueRoles = ["consumer","admin","superadmin","Author","Editor"];
      // }
      //
      // $idRoles = Role::whereIn('name',$valueRoles)->pluck('id');
      // $idsUserRole = DB::table('role_users') ->whereIn('role_id',$idRoles)
      //                                       ->pluck('user_id');
      //dd($idsUserRole);
      $devices = Device::paginate(5);

      //dd($devices);


       return view('devices.index')->withDevices($devices);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clients = Client::all();
        $positions = Position::all();
        return view('devices.create')->withClients($clients)->withPositions($positions);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      // Validate data
      $this->validate($request,array(
          'id'     => 'required|integer|unique:devices,id',
          'active'    => 'required|boolean',
          'client_dni' => 'required|exists:clients,dni|unique:devices,client_dni',
          'position_id' => 'required|exists:positions,id|'

      ));

      // Store in DataBase
      $device = new Device;
      $device->id         = $request->id;
      $device->active     = $request->active;
      $device->client_dni = $request->client_dni;
      $device->position_id = $request->position_id;
      $device->save();

      //dd($request);
      // Implementation of Flash messages
      /*
        code
      */
      //Redirect to index
      return redirect()->route('devices.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $device = Device::find($id);
        return view('devices.show')->withDevice($device);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $device    = Device::find($id);
        $clients   = Client::all();
        $positions = Position::all();
        return view('devices.edit')->withDevice($device)->withClients($clients)->withPositions($positions);
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
      $device = Device::find($id);
      // Validate data
      if ($device->id == $request->id) {
        //dd($device);
        Validator::make($request->all(),[
          'active'    => 'required|boolean',
          'client_dni' => ['required|exists:clients,dni',
                            Rule::unique('devices')->ignore($device->id)],
          'position_id' => 'required|exists:positions,id'
        ]);

      } else {
        // $this->validate($request,array(
        //     'id'     => 'required|integer|unique:devices,id',
        //     'active'    => 'required|boolean',
        //     'client_dni' => 'required|exists:clients,dni|unique:devices,client_dni',
        //     'position_id' => 'required|exists:positions,id'
        // ));

        Validator::make($request->all(),[
          'id'     => 'required|integer|unique:devices,id',
          'active'    => 'required|boolean',
          'client_dni' => ['required|exists:clients,dni',
                            Rule::unique('devices')->ignore($device->id)],
          'position_id' => 'required|exists:positions,id'
        ]);
      }

      // Store in DataBase
      $device->id         = $request->id;
      $device->active     = $request->active;
      $device->client_dni = $request->client_dni;
      $device->position_id = $request->position_id;
      $device->save();

      //dd($request);
      // Implementation of Flash messages
      /*
        code
      */
      //Redirect to index
      return redirect()->route('devices.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $device = Device::find($id);
      $device->delete();

      //Session::flash('success','This post was successfully deleted.');
      return redirect()->route('devices.index');
    }
}
