<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Client\Request as ClientRequest;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.clientes', [ 'clientes' => User::all() ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.formNuevoRepartidor');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreRestauranteRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $request->flash();
        
        // $repartidor = new User();
        // $repartidor->name = $request->input('name');
        // $repartidor->apellidos = $request->input('apellidos');
        // $repartidor->email = $request->input('email');
        // $repartidor->dni = $request->input('dni');
        // $repartidor->direccion = $request->input('direccion');
        // $repartidor->ciudad = $request->input('ciudad');
        // $repartidor->telefono = $request->input('telefono');
        // $repartidor->salario = $request->input('salario');
        // $repartidor->estado = $request->input('estado');

        // $repartidor->save();

        return view('admin.repartidores', [ 'repartidores' => User::all() ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Restaurante  $restaurante
     * @return \Illuminate\Http\Response
     */
    public function show(User $cliente)
    {

        //
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Restaurante  $restaurante
     * @return \Illuminate\Http\Response
     */
    public function edit(User $cliente)
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
    public function update(Request $request, User $repartidor)
    {
        $request->flash();

        $repartidor->estado = $request->input('estado');

        $repartidor->save();


        return view('admin.repartidores', ['repartidores' => User::all()]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Restaurante  $restaurante
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $cliente)
    {
        $cliente->delete();
        return  view('admin.clientes', ['clientes'=> User::all()]);
    }

    public function delete(User $repartidor)
    {
        $repartidor->delete();
        return  view('admin.repartidores', ['repartidores'=> User::all()]);
    }

}
