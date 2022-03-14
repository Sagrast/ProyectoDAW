<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Información detallada de Cliente') }}
        </h2>
    </x-slot>
    {{-- Muestra el menu de gestión en funcion del rol del usuario --}}
    @if (Auth::user()->rol == 'empleado' || Auth::user()->rol == 'admin')
        @livewire('inner-menu')
    @endif

    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 py-8 capitalize">
        <div class="w-full mt-12">
               <p class="text-xl pb-3 flex items-center">
                    <i class="fas fa-list mr-3"></i> {{__('InformacionCliente')}}
                </p>
                <div class="bg-white overflow-auto">
                    {{-- ------------------------------------------------------------------------------------------------------------------------------------
                                                    INFORMACION DE CLIENTE
                         -----------------------------------------------------------------------------------------------------------------------------------}}
                    <table class="text-left w-full border-collapse">
                        <!--Border collapse doesn't work on this site yet but it's available in newer tailwind versions -->
                        <thead>
                            <tr>
                                <th
                                    class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                                    {{__('Empresa')}}</th>
                                <th
                                    class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                                    {{__('Direccion')}}</th>
                                <th
                                    class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                                    CIF</th>
                                <th
                                    class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                                    {{__('Servicio')}}</th>
                                    <th
                                    class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                                    {{__('Telefono')}}</th>
                                    <th
                                    class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                                    {{__('Email')}}</th>
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

                    {{-- ------------------------------------------------------------------------------------------------------------------------------------
                                                            Visitas realizadas
                         -----------------------------------------------------------------------------------------------------------------------------------}}

                         <table class="text-left w-full border-collapse py-6">
                            <!--Border collapse doesn't work on this site yet but it's available in newer tailwind versions -->
                            <thead>
                                <tr>
                                    <th colspan="6" class="bg-black text-white text-center py-2 ">{{__('Visitas')}}</th>
                                </tr>
                                <tr>
                                    <th
                                        class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                                        {{__('Nombre')}}</th>
                                    <th
                                        class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                                        rol</th>
                                    <th
                                        class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                                        {{__('Fecha')}}</th>
                                        <th
                                        class="py- px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                                        {{__('Motivo')}}</th>
                                        <th
                                        class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                                        {{__('Albaran')}}</th>
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


                    {{-- ------------------------------------------------------------------------------------------------------------------------------------
                                                    Añadir Visitas de Empleados
                         -----------------------------------------------------------------------------------------------------------------------------------}}
                    <form method="POST" action="{{route('web.clientes.store')}}">
                        @csrf
                    <table class="text-left w-full border-collapse py-6">
                        <!--Border collapse doesn't work on this site yet but it's available in newer tailwind versions -->
                        <thead>
                            <tr>
                                <th colspan="4" class="bg-black text-white text-center py-2 ">{{__('AñadirVisitas')}}</th>
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
                                <td align="center" colspan="2">
                                    <button role="submit" class="bg-purple-500 hover:bg-purple-700 text-white font-bold px-4 border border-purple-700 rounded py-2" required>Añadir</button>
                                </td>
                            </tr>
                            <input type="hidden" name="cliente" value={{$cliente->id}}>

                        </tbody>
                    </table>
                </form>

                 {{-- ------------------------------------------------------------------------------------------------------------------------------------
                                                        Máquinas Instaladas
                         -----------------------------------------------------------------------------------------------------------------------------------}}

                    <table class="text-left w-full border-collapse py-6 align-items:center">
                        <!--Border collapse doesn't work on this site yet but it's available in newer tailwind versions -->
                        <thead>
                            <tr>
                                <th colspan="9" class="bg-black text-white text-center py-2 ">{{__('MaquinasInstaladas')}}</th>
                            </tr>
                            <tr>
                                <th
                                    class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                                    {{__('Marca')}}</th>
                                <th
                                    class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                                    {{__('Modelo')}}</th>
                                <th
                                    class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                                    {{__('Lectura')}}</th>
                                    <th
                                    class="py- px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                                    {{__('NumeSerie')}}</th>
                                    <th
                                    class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                                    {{__('Tipo')}}</th>
                                    <th
                                    class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                                    {{__('FechaInstalacion')}}</th>
                                    <th
                                    class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                                    {{__('FechaRetirada')}}</th>
                                    <th
                                    class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                                    {{__('Retirar')}}</th>
                                    <th
                                    class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                                    {{__('FichaMaquina')}}</th>
                            </tr>
                        </thead>
                        <tbody>
                             @foreach ($machine as $mach)
                            <tr class="hover:bg-grey-lighter">
                                <td class="py-4 px-6 border-b border-grey-light">{{ $mach->marca }}</td>
                                <td class="py-4 px-6 border-b border-grey-light">{{ $mach->modelo }}</td>
                                <td class="py-4 px-6 border-b border-grey-light">{{ $mach->lectura }}</td>
                                <td class="py-4 px-6 border-b border-grey-light">{{ $mach->serial }}</td>
                                <td class="py-4 px-6 border-b border-grey-light">{{ $mach->tipo }}</td>
                                <td class="py-4 px-6 border-b border-grey-light">{{ $mach->pivot->instalacion }}</td>
                                <td class="py-4 px-6 border-b border-grey-light">{{ $mach->pivot->retirada }}</td>
                                @if (empty($mach->pivot->retirada))
                                <td>
                                <a href="{{ route('web.machines.withdraw', [$mach->id,$cliente->id]) }}">
                                    <button
                                        class="bg-red-500 hover:bg-red-700 text-black font-bold  border border-red-700 rounded">Retirar Máquina</button>
                                </a>
                                </td>
                                @endif
                                <td>
                                    <a href="{{ route('web.machines.show', $mach->id) }}">
                                        <button
                                            class="bg-purple-500 hover:bg-purple-700 text-black font-bold  border border-purple-700 rounded">{{__('Descripcion')}}</button>
                                    </a>
                                    </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>


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
