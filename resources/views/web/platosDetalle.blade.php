@extends('web.layout')
@section('titulo', 'platos')
@section('div')

    <div class='container'>

        <h3 class="uppercase text-xl underline pt-2">Plato en detalle</h3>
        <div class='row'>
            <div class='col'>
                <ul class="list-group">
                    <li class="list-group-item font-semibold">Nombre: {{ $plato->nombre }}</li>
                    <li class="list-group-item font-semibold">Precio: {{ $plato->precio }}€</li>
                    <li class="list-group-item font-semibold">Categoria: {{ $plato->categoria }}</li>
                    <li class="list-group-item font-semibold">Descripción: {{ $plato->direccion }}</li>
                </ul>
                <a class="text-white uppercase bg-gradient-to-r from-gray-800 to-blue-400 inline-block no-underline hover:text-white hover:underline py-2 px-4 rounded w-32 mt-3 mb-4" href='/platos/{{ $plato->restaurante_id }}'>Volver</a>

                <br>
            </div>
            <div class='col rounded'>
                <img width="25%" height="150" class="rounded" src="{{ asset($plato->foto) }}" alt="plato">
            </div>
        </div>

    </div>

    </body>

    </html>
@endsection