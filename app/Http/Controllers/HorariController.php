<?php

namespace App\Http\Controllers;
use App\Horari;
use App\User;
use DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Gate;

class HorariController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $horaris = Horari::orderBy('day','DESC')->paginate(10);
        return view('horari.index',compact('horaris'));


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $horaris=DB::table('horaris')->get();

        return view('horari.create',compact('horaris'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $horari = new Horari;
        $horari->day= $request['day'];
        $horari->start= $request['start'];
        $horari->finish= $request['finish'];
        $horari->save();

        return redirect()->route('horari.index');

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

        $horari=Horari::find($id);
        return view('horari.edit',compact('horari'));

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

        Horari::find($id)->update( [
            'day' => $request['day'],
            'start' => $request['start'],
            'finish' => $request['finish'],

        ]);
        return redirect()->route('horari.index');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $horari = Horari::find($id);
        $horari->users()->detach();

        $horari->delete();

        return redirect()->route('horari.index');
    }



}
