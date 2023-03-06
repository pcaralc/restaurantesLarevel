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
                                <th scope="col" class="text-sm font-medium text-white px-6 py-4 text-left">Nombre</th>
                                <th scope="col" class="text-sm font-medium text-white px-6 py-4 text-left">Apellidos
                                </th>
                                <th scope="col" class="text-sm font-medium text-white px-6 py-4 text-left">Email
                                </th>
                                <th scope="col" class="text-sm font-medium text-white px-6 py-4 text-left">DNI
                                </th>
                                <th scope="col" class="text-sm font-medium text-white px-6 py-4 text-left">Dirección
                                </th>
                                <th scope="col" class="text-sm font-medium text-white px-6 py-4 text-left">Ciudad
                                </th>
                                <th scope="col" class="text-sm font-medium text-white px-6 py-4 text-left">Teléfono
                                </th>
                                <th scope="col" class="text-sm font-medium text-white px-6 py-4 text-left">#</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($clientes as $cliente)
                                @if ($cliente->rol == 'cliente')
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-200">
                                            {{ $cliente->name }}</td>
                                        <td class="text-sm text-white font-light px-6 py-4 whitespace-nowrap">
                                            {{ $cliente->apellidos }}</td>
                                        <td class="text-sm text-white font-light px-6 py-4 whitespace-nowrap">
                                            {{ $cliente->email }}</td>
                                        <td class="text-sm text-white font-light px-6 py-4 whitespace-nowrap">
                                            {{ $cliente->dni }}</td>
                                        <td class="text-sm text-white font-light px-6 py-4 whitespace-nowrap">
                                            {{ $cliente->direccion }}</td>
                                        <td class="text-sm text-white font-light px-6 py-4 whitespace-nowrap">
                                            {{ $cliente->ciudad }}</td>
                                        <td class="text-sm text-white font-light px-6 py-4 whitespace-nowrap">
                                            {{ $cliente->telefono }}</td>
                                        <td class="text-sm text-white font-light px-6 py-4 whitespace-nowrap"><a
                                                class="block uppercase mx-auto  bg-slate-400 hover:bg-slate-400 focus:shadow-outline focus:outline-none text-white text-xs py-3 px-10 rounded"
                                                href="/admin/cliente/{{ $cliente->id }}/eliminar"><svg
                                                    xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                                    <path
                                                        d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z" />
                                            </svg></a>
                                        </td>
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
