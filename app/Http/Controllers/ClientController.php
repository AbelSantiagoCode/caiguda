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
class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $clients = Client::paginate(5);
       return view('clients.index')->withClients($clients);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('clients.create');
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
          'dni'     => 'required|string|min:4|max:255|unique:clients',
          'name'    => 'required|string|max:255',
          'contact_telephone' => 'required|integer',
          'email' => 'required|string|email|max:255'

      ));

      // Store in DataBase
      $client = new Client;
      $client->dni   = $request->dni;
      $client->name  = $request->name;
      $client->contact_telephone = $request->contact_telephone;
      $client->email = $request->email;
      $client->photo = "photoX";
      $client->save();

      //dd($request);
      // Implementation of Flash messages
      /*
        code
      */
      //Redirect to index
      return redirect()->route('clients.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $client = Client::find($id);
      return view('clients.show')->withClient($client);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $client = Client::find($id);
      return view('clients.edit')->withClient($client);
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
      $client = Client::find($id);
      // Validate data
      if ($client->dni == $request->dni) {
        $this->validate($request,array(
            'name'    => 'required|string|max:255',
            'contact_telephone' => 'required|integer',
            'email' => 'required|string|email|max:255'

        ));
      } else {
        $this->validate($request,array(
            'dni'     => 'required|string|min:4|max:255|unique:clients',
            'name'    => 'required|string|max:255',
            'contact_telephone' => 'required|integer',
            'email' => 'required|string|email|max:255'

        ));
      }

      // Store in DataBase
      $client->dni   = $request->dni;
      $client->name  = $request->name;
      $client->contact_telephone = $request->contact_telephone;
      $client->email = $request->email;
      $client->photo = "photoX";
      $client->save();

      //dd($request);
      // Implementation of Flash messages
      /*
        code
      */
      //Redirect to index
      return redirect()->route('clients.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $client = Client::find($id);
      $client->delete();

      //Session::flash('success','This post was successfully deleted.');
      return redirect()->route('clients.index');
    }
}
