<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Información detallada de Cliente') }}
        </h2>
    </x-slot>
    @if (Auth::user()->rol == 'empleado' || Auth::user()->rol == 'admin')
        @livewire('inner-menu')
    @endif

    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 py-8 capitalize">
        <div class="w-full mt-12">
               <p class="text-xl pb-3 flex items-center">
                    <i class="fas fa-list mr-3"></i> Información de Maquinas
                </p>
                <div class="bg-white overflow-auto">
                    <table class="text-left w-full border-collapse">
                        <!--Border collapse doesn't work on this site yet but it's available in newer tailwind versions -->
                        <thead>
                            <tr>
                                <th
                                    class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                                    Fabricante</th>
                                <th
                                    class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                                    Modelo</th>
                                <th
                                    class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                                    Servicio</th>
                                <th
                                    class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                                    lectura</th>
                                <th
                                    class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                                    Numero de Serie</th>
                            </tr>
                        </thead>
                        <tbody>

                            <tr class="hover:bg-grey-lighter">
                                <td class="py-4 px-6 border-b border-grey-light">{{ $machine->marca }}</td>
                                <td class="py-4 px-6 border-b border-grey-light">{{ $machine->modelo }}</td>
                                <td class="py-4 px-6 border-b border-grey-light">{{ $machine->tipo }}</td>
                                <td class="py-4 px-6 border-b border-grey-light">{{ $machine->lectura }}</td>
                                <td class="py-4 px-6 border-b border-grey-light">{{ $machine->serial }}</td>
                            </tr>
                        </tbody>
                    </table>

                    <table class="text-left w-full border-collapse py-6">
                        <!--Border collapse doesn't work on this site yet but it's available in newer tailwind versions -->
                        <thead>
                            <tr>
                                <th colspan="6" class="bg-black text-white text-center py-2 ">Historial de Instalaciones</th>
                            </tr>
                            <tr>
                                <th
                                    class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                                    Nombre</th>
                                <th
                                    class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                                    Direccion</th>
                                <th
                                    class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                                    Servicio</th>
                                    <th
                                    class="py- px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                                    Telefono</th>
                                    <th
                                    class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                                    Fecha Instalacion</th>
                                    <th
                                    class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                                    Fecha Retirada</th>
                            </tr>
                        </thead>
                        <tbody>
                             @foreach ($clients as $client)
                            <tr class="hover:bg-grey-lighter">
                                <td class="py-4 px-6 border-b border-grey-light">{{ $client->nombre }}</td>
                                <td class="py-4 px-6 border-b border-grey-light">{{ $client->direccion }}</td>
                                <td class="py-4 px-6 border-b border-grey-light">{{ $client->servicio }}</td>
                                <td class="py-4 px-6 border-b border-grey-light">{{ $client->telefono }}</td>
                                <td class="py-4 px-6 border-b border-grey-light">{{ $client->pivot->instalacion }}</td>
                                <td class="py-4 px-6 border-b border-grey-light">{{ $client->pivot->retirada }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <table class="text-left w-full border-collapse py-6">
                        <!--Border collapse doesn't work on this site yet but it's available in newer tailwind versions -->
                        <thead>
                            <tr>
                                <th colspan="6" class="bg-black text-white text-center py-2 ">Averias</th>
                            </tr>
                            <tr>
                                <th
                                    class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                                    Descripcion</th>
                                <th
                                    class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                                    Estado</th>
                                <th
                                    class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                                    Fecha</th>
                            </tr>
                        </thead>
                        <tbody>
                             @foreach ($averias as $fail)
                            <tr class="hover:bg-grey-lighter">
                                <td class="py-4 px-6 border-b border-grey-light">{{ $fail->descripcion }}</td>
                                <td class="py-4 px-6 border-b border-grey-light">{{ $fail->estado }}</td>
                                <td class="py-4 px-6 border-b border-grey-light">{{ $fail->fecha }}</td>
                                <td class="py-4 px-6 border-b border-grey-light">
                                @if($fail->estado == 'Pendiente')
                                <a href="{{ route('web.machines.close', $fail->id) }}">
                                    <button
                                        class="bg-red-500 hover:bg-red-700 text-black font-bold  border border-red-700 rounded">Cerrar Incidencia</button>
                                </a>
                                </td>
                                @endif
                            </tr>
                            @endforeach
                        </tbody>
                    </table>


                    <div class="py-6 grid place-items-center">
                        <a href="{{ route('web.machines.index') }}">
                            <button
                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold px-4 border border-blue-700 rounded py-2">Volver</button>
                        </a>
                    </div>
                </div>
        </div>
    </div>
</x-app-layout>
