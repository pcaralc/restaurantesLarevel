{{-- $items = Cart::session(Auth::user()->id)->getContent();
 foreach ($items as $row) {
     echo $row->id;
     echo $row->name;
     echo $row->price;
     echo $row->quantity;
 } --}}


@extends('web.layout')
@section('titulo', 'pedido')
@section('div')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div
                    class="flex flex-col overflow-x-auto sm:mx-0.5 lg:mx-0.5 py-2 inline-block min-w-full sm:px-6 lg:px-8 overflow-hidden">
                    <table class="min-w-full">
                        <thead class="bg-dark border-b">
                            <tr>
                                <th scope="col" class="font-medium text-black px-6 py-4 text-left">Nombre</th>
                                <th scope="col" class="font-medium text-black px-6 py-4 text-left">Precio
                                </th>
                                <th scope="col" class=" font-medium text-black px-6 py-4 text-left">Cantidad
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $items = Cart::session(Auth::user()->id)->getContent();
                            $total = Cart::getTotal();
                            ?>
                            @foreach ($items as $row)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm  text-black">
                                        {{ $row->name }}</td>
                                    <td class="text-sm text-black px-6 py-4 whitespace-nowrap">
                                        {{ $row->price }}€</td>
                                    <td class="text-sm text-black px-6 py-4 whitespace-nowrap">
                                        {{ $row->quantity }}</td>
                                    <td class="text-sm text-black px-6 py-4 whitespace-nowrap"><a
                                            class="block uppercase mx-auto  bg-slate-400 hover:bg-slate-400 focus:shadow-outline focus:outline-none text-black text-xs py-3 px-10 rounded"
                                            href="/pedido/plato/{{ $row->id }}/eliminar"><svg
                                                xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                                <path
                                                    d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z" />
                                            </svg></a>
                                    </td>
                                </tr>
                            @endforeach
                            <tr>
                                <td scope="col" class=" font-medium text-black px-6 py-4 text-left">TOTAL</td>
                                <td scope="col" class=" font-medium text-black px-6 py-4 text-left">{{ $total }}€
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <a class="text-white uppercase bg-gradient-to-r from-gray-800 to-blue-400 inline-block no-underline hover:text-white hover:underline py-2 px-4 rounded w-32" href="/pedido/comprar">Comprar</a>
                </div>
            </div>
        </div>
    </div>
@endsection
