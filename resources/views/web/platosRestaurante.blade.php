@extends('web.layout')
@section('titulo', 'platos')
@section('div')

    <div class='container'>

        <h3 class="uppercase text-xl underline pt-2">Restaurante en detalle</h3>
        <div class='row'>
            <div class='col'>
                <ul class="list-group">
                    <li class="list-group-item">Latitud: {{ $restaurante->latitud }}</li>
                    <li class="list-group-item">Longitud: {{ $restaurante->longitud }}</li>
                    <li class="list-group-item">Ciudad: {{ $restaurante->ciudad }}</li>
                    <li class="list-group-item">Dirección: {{ $restaurante->direccion }}</li>
                </ul>


                <br>
            </div>
            <div class='col rounded'>
                <iframe width="40%" height="500"
                src="https://maps.google.com/maps?q={{$restaurante->latitud}},{{$restaurante->longitud}}&output=embed"></iframe>
            </div>
        </div>

    </div>

    <hr/>

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
