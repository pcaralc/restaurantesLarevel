@extends('web.layout')
@section('titulo', 'restaurantes')
@section('div')
    
        @foreach ($restaurantes as $restaurante)
            <x-restaurante>
                
                <a href="/platos/{{ $restaurante->id }}">
                    <img src="https://cdn.pixabay.com/photo/2016/11/18/14/05/brick-wall-1834784_1280.jpg" class="card-img-top rounded" alt="">
                    <h3 class="font-bold text-xl">{{ $restaurante->nombre }}</h3>
                </a>
            </x-restaurante>
        @endforeach
@endsection