@extends('web.layout')
@section('titulo', 'platos')
@section('div')

@foreach ($platos as $plato)
        <x-restaurante>
            <a href="/platos/detalle/{{$plato->id}}">
                <img src="{{ asset($plato->foto) }}" class="card-img-top rounded" alt="">
                <h3 class="font-bold text-xl pt-2">{{ $plato->nombre }}</h3>
                <div class="pt-3  items-center justify-between">
                    <p class=""><em><strong>Precio: </strong></em>{{ $plato->precio }}</p>
                    <p class=""><em><strong>Categoria: </strong></em>{{ $plato->categoria }}</p>

                    <x-boton-compra ruta="/pedido/{{ $plato->id }}" />
                </div>
            </a>
        </x-restaurante>
    @endforeach
@endsection
