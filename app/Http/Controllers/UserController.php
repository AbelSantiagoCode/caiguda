<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;
use App\Horari;
use App\Sector;
Use App\Role;
use DB;
use Illuminate\Support\Facades\Hash;

use Gate;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if(Gate::allows('isRole',"consumer") || Gate::allows('isRole',"admin") ) {
            $valueRoles = ["consumer"];
        }
        else if(Gate::allows('isRole',"superadmin")){
            $valueRoles = ["consumer","admin","superadmin"];
        }

        $users = User::whereHas('roles', function($q) use ($valueRoles){
            $q->whereIn('name', $valueRoles);
        })->paginate(5);

        return view('user.index',compact('users'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('user.create');


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $this->validate($request,[ 'dni'=>'required|min:9|max:9|unique:users', 'name'=>'required|max:20', 'email'=>'required|unique:users|max:40', 'password'=>'required|max:400', 'rol'=>'required|in:superadmin,admin,consumer']);

        $user = new User;
        $user->dni= $request['dni'];
        $user->name= $request['name'];
        $user->email= $request['email'];
        $user->password= Hash::make($request['password']);
        $user->save();

        $user->roles()->attach(Role::find($request['rol']));

        return redirect()->route('user.index');


    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $users=User::find($id);
        return view('user.show',compact('users'));

    }


    public function horaris($id)
    {


        $user = User::find($id);

        $horaris=$user->horaris()->paginate(5);
        $horaris_all=Horari::all()->map->id;

        return view('user.horaris',compact('user','horaris','horaris_all'));

    }


    public function sectors($id)
    {


        $user = User::find($id);

        $sectors=$user->sectors()->paginate(5);
        $sectors_all=Sector::all()->map->id;

        return view('user.sectors',compact('user','sectors','sectors_all'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $roles=Role::all();
        $user=User::find($id);
        $role=User::find($id)->roles()->first()->name;

        return view('user.edit',compact('user','roles','role'));

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


        $user = User::find($id);

        if( $request['horaris']){

            if($request['detach_horari']){

                $user->horaris()->detach(Horari::find($request['horaris']));

            }
            else{

                foreach($request['horaris'] as $horari){

                    $user->horaris()->attach( Horari::find($horari) );

                }

            }

            return redirect()->route('user.horaris',compact('user'));

        }
        elseif ($request['sectors']){

            if($request['detach_sector']){

                $user->sectors()->detach(Sector::find($request['sectors']));

            }

            else{

                foreach($request['sectors'] as $sector){

                    $user->sectors()->attach( Sector::find($sector) );

                }

            }

            return redirect()->route('user.sectors',compact('user'));

        }


        else{

            if ( $request['dni']== $user->dni) {
                $user->dni = $request->dni;
            }
            else{

                $this->validate($request,[ 'dni'=>'required|unique:users|min:9|max:9']);
                $user->dni = $request->dni;

            }

            if ( $request['email']== $user->email) {
                $user->email = $request->email;
            }
            else{

                $this->validate($request,[ 'email'=>'required|unique:users|min:4|max:40']);
                $user->email = $request->email;
            }


            $this->validate($request,[ 'name'=>'min:3|max:20', 'password'=>'min:5|max:400']);

            $user->name = $request->name;
            $user->password = Hash::make($request->password);
            $user->save();


            $user->roles()->sync($request['rol']);


            return redirect()->route('user.index');

        }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $user = User::find($id);

        $user->horaris()->detach();
        $user->sectors()->detach();
        $user->roles()->detach();
        $user->delete();

        return redirect()->route('user.index');

    }




}
