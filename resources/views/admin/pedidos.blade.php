<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Panel Administración
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div
                    class="flex flex-col overflow-x-auto sm:mx-0.5 lg:mx-0.5 py-2 inline-block min-w-full sm:px-6 lg:px-8 overflow-hidden">
                    <table class="min-w-full">
                        <thead class="bg-dark border-b">
                            <tr>
                                <th scope="col" class="text-sm font-medium text-white px-6 py-4 text-left">Cliente</th>
                                <th scope="col" class="text-sm font-medium text-white px-6 py-4 text-left">Restaurante
                                </th>
                                <th scope="col" class="text-sm font-medium text-white px-6 py-4 text-left">Repartidor
                                </th>
                                <th scope="col" class="text-sm font-medium text-white px-6 py-4 text-left">Estado
                                </th>
                                <th scope="col" class="text-sm font-medium text-white px-6 py-4 text-left">#
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pedidos as $pedido)
                                @if (Auth::user()->id == $pedido->repartidor_id || Auth::user()->rol == 'admin')
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-200">
                                            {{ DB::table('users')->where('id', '=', $pedido->cliente_id)->value('name') }}
                                        </td>
                                        <td class="text-sm text-white font-light px-6 py-4 whitespace-nowrap">
                                            {{ DB::table('restaurantes')->where('id', '=', $pedido->restaurante_id)->value('nombre') }}
                                        </td>
                                        <td class="text-sm text-white font-light px-6 py-4 whitespace-nowrap">
                                            {{ DB::table('users')->where('id', '=', $pedido->repartidor_id)->value('name') }}
                                        </td>
                                        <form action="/admin/pedido/{{ $pedido->id }}/modificar" method="post"
                                            enctype="multipart/form-data">
                                            @csrf

                                            <td class="text-sm text-black font-light px-6 py-4 whitespace-nowrap">
                                                <select class="rounded" name="estado" id='estado'>
                                                    <option readonly class=" text-white bg-gray-800">
                                                        {{ $pedido->estado }}</option>
                                                    <option value="recibido">recibido</option>
                                                    <option value="finalizado">finalizado</option>
                                                    <option value="entregado">entregado</option>
                                                    <option value="cancelado">cancelado</option>
                                                </select>
                                            </td>
                                            <td class="text-sm text-white font-light px-6 py-4 whitespace-nowrap">
                                                <button
                                                    class="block uppercase mx-auto  bg-slate-400 hover:bg-slate-400 focus:shadow-outline focus:outline-none text-white text-xs py-3 px-10 rounded"
                                                    type="submit">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                        height="16" fill="currentColor" class="bi bi-pencil-square"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                        <path fill-rule="evenodd"
                                                            d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                                    </svg>
                                                </button>
                                            </td>
                                        </form>

                                    </tr>
                                @endif
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
