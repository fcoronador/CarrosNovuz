<?php

namespace App\Http\Controllers;

use App\conductor;
use Illuminate\Http\Request;
use App\Http\Controllers\VehiculoController;
use Illuminate\Support\Facades\DB;

class ConductorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vehiculos = new VehiculoController();
        $vehi= $vehiculos->index();
        $conductores =  conductor::all();
        return view('welcome',compact('conductores','vehi'));
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
        $conductor = conductor::create($request->all());
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\conductor  $conductor
     * @return \Illuminate\Http\Response
     */
    public function show(conductor $conductor)
    {
        return $conductor;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\conductor  $conductor
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $vehiculos = new VehiculoController();
        $vehi= $vehiculos->index();
        $conductores =  conductor::all();
        $conductor = DB::select('select * from conductors where id = :id',['id'=>$id]);
        return view('welcome',compact('vehi','conductores','conductor','id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\conductor  $conductor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       $datos=['numID'=>$request->get('numID'),'nombre'=>$request->get('nombre'),'placa_veh'=>$request->get('placa_veh')];
       
        DB::table('conductors')
        ->where('id', ['id'=>$id])
        ->update($datos);
        return $this->index();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\conductor  $conductor
     * @return \Illuminate\Http\Response
     */
    public function destroy(conductor $conductor)
    {
        $conductor->delete();
        return redirect('/');
    }
}
