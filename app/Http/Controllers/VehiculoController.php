<?php

namespace App\Http\Controllers;

use App\vehiculo;
use App\conductor;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class VehiculoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vehiculos =  vehiculo::all();
        return $vehiculos;
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
        $conductor = vehiculo::create($request->all());
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\vehiculo  $vehiculo
     * @return \Illuminate\Http\Response
     */
    public function show(vehiculo $vehiculo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\vehiculo  $vehiculo
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $vehiculos = new VehiculoController();
        $vehi= $vehiculos->index();
        $conductores =  conductor::all();
        $vehiculo = DB::select('select * from vehiculos where id = :id',['id'=>$id]);
        return view('welcome',compact('vehi','conductores','vehiculo','id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\vehiculo  $vehiculo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $datos=['placa'=>$request->get('placa'),'marca'=>$request->get('marca'),'modelo'=>$request->get('modelo')];
       
        DB::table('vehiculos')
        ->where('id', ['id'=>$id])
        ->update($datos);
        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\vehiculo  $vehiculo
     * @return \Illuminate\Http\Response
     */
    public function destroy(vehiculo $vehiculo)
    {
        $vehiculo->delete();
        return redirect('/');
    }
}
