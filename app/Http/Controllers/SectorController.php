<?php

namespace App\Http\Controllers;
use App\Sector;
use App\User;
use DB;
use Illuminate\Support\Facades\Auth;
use Gate;

use Illuminate\Http\Request;


class SectorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $sectors = Sector::orderBy('id','ASC')->paginate(10);
        return view('sector.index',compact('sectors'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $sectors=DB::table('sectors')->get();

        return view('sector.create',compact('sectors'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $this->validate($request,[ 'id'=>'min:1|max:20|required|unique:sectors']);
        $sector = new Sector;
        $sector->id= $request['id'];
        $sector->save();

        return redirect()->route('sector.index');

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

        $sector=Sector::find($id);
        return view('sector.edit',compact('sector'));

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

        Sector::find($id)->update( [
            'id' => $request['id'],

        ]);

        return redirect()->route('sector.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $sector = Sector::find($id);
        $sector->users()->detach();
        $sector->delete();

        return redirect()->route('sector.index');

    }

}
