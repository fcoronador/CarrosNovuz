<?php

namespace App\Http\Controllers;

use App\conductor;
use Illuminate\Http\Request;
use App\Http\Controllers\VehiculoController;

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
    public function edit(conductor $conductor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\conductor  $conductor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, conductor $conductor)
    {
        $conductor->update($request->all());
        return $conductor;
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
    }
}
