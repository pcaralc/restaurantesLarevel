<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePlatoRequest;
use App\Http\Requests\UpdatePlatoRequest;
use App\Models\Plato;
use App\Models\Restaurante;
use App\Policies\RestaurantePolicy;
use Illuminate\Console\View\Components\Component;
use Illuminate\Http\Request;

class PlatoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('web.platos', ['platos' => Plato::all()]);
    }

    public function indexPlatoDetalle(Plato $plato)
    {
        return view('web.platosRestaurante', ['restaurante' => $plato->restaurante]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Restaurante $restaurante)
    {
        return view('admin.formNuevoPlato', ['restaurante' => $restaurante]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePlatoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Restaurante $restaurante, Request $request)
    {
        $request->flash();

        $plato = new Plato();
        $plato->nombre = $request->input('nombre');
        $plato->direccion = $request->input('direccion');
        $plato->precio = $request->input('precio');
        $plato->categoria = $request->input('categoria');
        $plato->restaurante_id = $restaurante->id;

        //Imagen
        $path = $request->file('foto')->store('public');
        // /public/nombreimagengenerado.jpg
        //Cambiamos public por storage en la BBDD para que se pueda ver la imagen en la web
        $plato->foto =  str_replace('public', 'storage', $path);

        $plato->save();

        return view('admin.platosRestaurante', ['restaurante' => $restaurante, 'platos' => $restaurante->platos()->where('restaurante_id', $restaurante->id)->get()]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Plato  $plato
     * @return \Illuminate\Http\Response
     */
    public function show(Plato $plato)
    {
        return view('web.platosDetalle', ['plato' => $plato]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Plato  $plato
     * @return \Illuminate\Http\Response
     */
    public function edit(Plato $plato)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePlatoRequest  $request
     * @param  \App\Models\Plato  $plato
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePlatoRequest $request, Plato $plato)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Plato  $plato
     * @return \Illuminate\Http\Response
     */
    public function destroy(Plato $plato)
    {
        $plato->delete();
        return view('admin.platosRestaurante', ['restaurante' => $plato->restaurante]);
    }
}
