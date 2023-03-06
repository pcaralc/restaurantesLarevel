<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRestauranteRequest;
use App\Http\Requests\UpdateRestauranteRequest;
use App\Models\Restaurante;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;

class RestauranteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('web.restaurantes', [ 'restaurantes' => Restaurante::all() ]);
    }
    public function indexAdmin()
    {
        return view('admin.admin', [ 'restaurantes' => Restaurante::all() ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.formNuevoRestaurante');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreRestauranteRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->flash();
        
        $restaurante = new Restaurante();
        $restaurante->nombre = $request->input('nombre');
        $restaurante->direccion = $request->input('direccion');
        $restaurante->ciudad = $request->input('ciudad');
        $restaurante->telefono = $request->input('telefono');
        $restaurante->latitud = $request->input('latitud');
        $restaurante->longitud = $request->input('longitud');

        $restaurante->save();

        return view('admin.admin', [ 'restaurantes' => Restaurante::all() ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Restaurante  $restaurante
     * @return \Illuminate\Http\Response
     */
    public function show(Restaurante $restaurante)
    {

        return view('web.platosRestaurante', ['restaurante'=> $restaurante , 'platos'=>$restaurante ->platos()->where('restaurante_id', $restaurante->id)->get()]);
        
    }

    /**
     * Platos de cada restaurante
     */
    public function platosAdmin(Restaurante $restaurante)
    {
        return view('admin.platosRestaurante', ['restaurante'=> $restaurante]);
        
    }

    public function modificar(Restaurante $restaurante){
        return view('admin.formModificarRestaurante', ['restaurante'=> $restaurante]);
    }   

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Restaurante  $restaurante
     * @return \Illuminate\Http\Response
     */
    public function edit(Restaurante $restaurante)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRestauranteRequest  $request
     * @param  \App\Models\Restaurante  $restaurante
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRestauranteRequest $request, Restaurante $restaurante)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Restaurante  $restaurante
     * @return \Illuminate\Http\Response
     */
    public function destroy(Restaurante $restaurante)
    {
        $restaurante->delete();
        return view('admin.admin', ['restaurantes'=> Restaurante::all()]);
    }
}
