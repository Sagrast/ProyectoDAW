<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Vehiculos') }}
        </h2>
    </x-slot>
    {{-- Si el usuario tiene el rol adecuado se mostrará el menú de navegación --}}
    @if (Auth::user()->rol == 'empleado' || Auth::user()->rol == 'admin')
        @livewire('inner-menu')
    @endif

    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 py-8 capitalize">
        <div class="w-full mt-12">
            <p class="text-xl pb-3 flex items-center">
                <i class="fas fa-list mr-3"></i> {{ __('InformacionVehiculo') }}
            </p>
            <div class="bg-white overflow-auto">
                <table class="text-left w-full border-collapse">
                    <!--Border collapse doesn't work on this site yet but it's available in newer tailwind versions -->
                    <thead>
                        <tr>
                            <th
                                class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                                {{ __('Modelo') }}:
                            </th>
                            <th
                                class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                                {{ __('Matricula') }}:
                            </th>
                            <th
                                class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                                {{ __('Kilometros') }}:
                            </th>
                            <th
                                class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                                ITV</th>
                        </tr>
                    </thead>
                    <tbody>

                        <tr class="hover:bg-grey-lighter">
                            <td class="py-4 px-6 border-b border-grey-light">{{ $vehicles->descripcion }}</td>
                            <td class="py-4 px-6 border-b border-grey-light">{{ $vehicles->matricula }}</td>
                            <td class="py-4 px-6 border-b border-grey-light">{{ $vehicles->kilometros }}</td>
                            <td class="py-4 px-6 border-b border-grey-light">{{ $vehicles->itv }}</td>
                        </tr>
                    </tbody>
                </table>

                <table class="text-left w-full border-collapse py-6">
                    <!--Border collapse doesn't work on this site yet but it's available in newer tailwind versions -->
                    <thead>
                        <tr>
                            <th colspan="4" class="bg-black text-white text-center py-2 ">{{ __('Conductores') }}</th>
                        </tr>
                        <tr>
                            <th
                                class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                                {{ __('nombre') }}:
                            </th>
                            <th
                                class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                                rol</th>
                            <th
                                class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                                {{ __('Fecha') }}:
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $driver)
                            <tr class="hover:bg-grey-lighter">
                                <td class="py-4 px-6 border-b border-grey-light">{{ $driver->name }}</td>
                                <td class="py-4 px-6 border-b border-grey-light">{{ $driver->rol }}</td>
                                <td class="py-4 px-6 border-b border-grey-light">{{ $driver->pivot->fecha }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <form method="POST" action="{{ route('web.vehicles.store') }}">
                    @csrf
                    <table class="text-left w-full border-collapse py-6">
                        <!--Border collapse doesn't work on this site yet but it's available in newer tailwind versions -->
                        <thead>
                            <tr>
                                <th colspan="4" class="bg-black text-white text-center py-2 ">
                                    {{ __('AñadirConductor') }}:
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <select class="category border-2 border-gray-300 p-2 w-full" name="user" id="user">
                                        @foreach ($users as $user)
                                            <option class="border-2 border-gray-300 p-2 w-full"
                                                value="{{ $user->id }}">{{ $user->name }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <input class="border-2 border-gray-300 p-2 w-full" type="date" name="fecha"
                                        id="fecha">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <button role="submit" class="p-3 bg-blue-500 text-white hover:bg-blue-400" required>
                                        {{ __('Add') }}:
                                    </button>
                                </td>
                            </tr>
                            <input type="hidden" name="vehicle" value={{ $vehicles->id }}>

                        </tbody>
                    </table>
                </form>
                <div class="py-6 grid place-items-center">
                    <a href="{{ route('web.vehicles.index') }}">
                        <button
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold px-4 border border-blue-700 rounded py-2">{{ __('Volver') }}</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
