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
                    <i class="fas fa-list mr-3"></i> Información de Clientes
                </p>
                <div class="bg-white overflow-auto">
                    <table class="text-left w-full border-collapse">
                        <!--Border collapse doesn't work on this site yet but it's available in newer tailwind versions -->
                        <thead>
                            <tr>
                                <th
                                    class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                                    Empresa</th>
                                <th
                                    class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                                    Direccion</th>
                                <th
                                    class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                                    CIF</th>
                                <th
                                    class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                                    Servicio</th>
                                    <th
                                    class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                                    Telefono</th>
                                    <th
                                    class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                                    Email</th>
                            </tr>
                        </thead>
                        <tbody>

                            <tr class="hover:bg-grey-lighter">
                                <td class="py-4 px-6 border-b border-grey-light">{{ $cliente->nombre }}</td>
                                <td class="py-4 px-6 border-b border-grey-light">{{ $cliente->direccion }}</td>
                                <td class="py-4 px-6 border-b border-grey-light">{{ $cliente->CIF }}</td>
                                <td class="py-4 px-6 border-b border-grey-light">{{ $cliente->servicio }}</td>
                                <td class="py-4 px-6 border-b border-grey-light">{{ $cliente->telefono }}</td>
                                <td class="py-4 px-6 border-b border-grey-light">{{ $cliente->email }}</td>
                            </tr>
                        </tbody>
                    </table>

                    <table class="text-left w-full border-collapse py-6">
                        <!--Border collapse doesn't work on this site yet but it's available in newer tailwind versions -->
                        <thead>
                            <tr>
                                <th colspan="6" class="bg-black text-white text-center py-2 ">Visitas</th>
                            </tr>
                            <tr>
                                <th
                                    class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                                    Nombre</th>
                                <th
                                    class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                                    rol</th>
                                <th
                                    class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                                    Fecha</th>
                                    <th
                                    class="py- px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                                    Motivo</th>
                                    <th
                                    class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                                    Albaran</th>
                            </tr>
                        </thead>
                        <tbody>
                             @foreach ($data as $pivote)
                            <tr class="hover:bg-grey-lighter">
                                <td class="py-4 px-6 border-b border-grey-light">{{ $pivote->name }}</td>
                                <td class="py-4 px-6 border-b border-grey-light">{{ $pivote->rol }}</td>
                                <td class="py-4 px-6 border-b border-grey-light">{{ $pivote->pivot->Fecha }}</td>
                                <td class="py-4 px-6 border-b border-grey-light">{{ $pivote->pivot->MotivoVisita }}</td>
                                <td class="py-4 px-6 border-b border-grey-light">{{ $pivote->pivot->Albaran }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <form method="POST" action="{{route('web.clientes.store')}}">
                        @csrf
                    <table class="text-left w-full border-collapse py-6">
                        <!--Border collapse doesn't work on this site yet but it's available in newer tailwind versions -->
                        <thead>
                            <tr>
                                <th colspan="4" class="bg-black text-white text-center py-2 ">Añadir Visita</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                            <select class="category border-2 border-gray-300 p-2 w-full" name="user" id="user">
                               @foreach ($users as $user)
                                    <option class="border-2 border-gray-300 p-2 w-full" value="{{$user->id}}">{{$user->name}}</option>
                                @endforeach
                            </select>
                                </td>
                                <td>
                                    <input class="border-2 border-gray-300 p-2 w-full" type="date" name="fecha" id="fecha">
                                    @error('fecha')
                            <p class="error-message">{{ $message}}</p>
                            @enderror
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input class="border-2 border-gray-300 p-2 w-full" type="text" name="motivo" id="motivo" placeholder="Motivo de la Visita">
                                    @error('motivo')
                            <p class="error-message">{{ $message}}</p>
                            @enderror
                                </td>
                                <td>
                                    <input class="border-2 border-gray-300 p-2 w-full" type="number" name="albaran" id="albaran" placeholder="Numero de Albaran" min="0">
                                    @error('albaran')
                            <p class="error-message">{{ $message}}</p>
                            @enderror
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <button role="submit" class="p-3 bg-blue-500 text-white hover:bg-blue-400" required>Añadir</button>
                                </td>
                            </tr>
                            <input type="hidden" name="cliente" value={{$cliente->id}}>

                        </tbody>
                    </table>
                </form>
                    <div class="py-6 grid place-items-center">
                        <a href="{{ route('web.vehicles.index') }}">
                            <button
                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold px-4 border border-blue-700 rounded py-2">Volver</button>
                        </a>
                    </div>
                </div>
        </div>
    </div>
</x-app-layout>