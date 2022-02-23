<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Vehiculos') }}
        </h2>
    </x-slot>
    @if (Auth::user()->rol == 'empleado' || Auth::user()->rol == 'admin')
        @livewire('inner-menu')
    @endif

    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 py-8 capitalize">
        <div class="w-full mt-12">
            <form action="{{ route('web.vehicles.filter') }}" method="post">
                @csrf
                <label for="rol">Filtros: </label>
                <br>
                <label for="matricula">Matricula</label>
                <input
                    class="focus:border-blue-600 appearance-none block w-1/4 bg-white text-black border  rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                    name="matricula" id="matricula" placeholder="Introduce Matricula" type="text">
                <br />
                <br />

                <button
                    class="inline-block px-6 py-2.5 bg-blue-400 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-500 hover:shadow-lg focus:bg-blue-500 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-600 active:shadow-lg transition duration-150 ease-in-out">Filtrar</button>
                <a href="{{ route('web.vehicles.index') }}">
                    <button type="submit"
                        class="inline-block px-6 py-2.5 bg-blue-400 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-500 hover:shadow-lg focus:bg-blue-500 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-600 active:shadow-lg transition duration-150 ease-in-out">Ver
                        Todos</button>
                </a>

            </form>
            <div class="grid place-items-end py-5">
                <a href="{{ route('web.vehicles.create') }}">
                    <button type="submit"
                        class="inline-block px-6 py-2.5 bg-purple-400 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-purple-500 hover:shadow-lg focus:bg-purple-500 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-purple-600 active:shadow-lg transition duration-150 ease-in-out">Nuevo</button>
                </a>
            </div>

            <p class="text-xl pb-3 flex items-center">
                <i class="fas fa-list mr-3"></i> Usuarios
            </p>
            <div class="bg-white overflow-auto">
                <table class="text-left w-full border-collapse">
                    <!--Border collapse doesn't work on this site yet but it's available in newer tailwind versions -->
                    <thead>
                        <tr>
                            <th
                                class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                                Modelo</th>
                            <th
                                class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                                Matricula</th>
                            <th
                                class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                                Kilometros</th>
                            <th
                                class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                                Vencimiento ITV</th>
                            <th
                                class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                                Detalles</th>
                            <th
                                class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                                Editar</th>
                            <th
                                class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                                Borrar</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($vehicles as $car)
                            <tr class="hover:bg-grey-lighter">
                                <td class="py-4 px-6 border-b border-grey-light">{{ $car->descripcion }}</td>
                                <td class="py-4 px-6 border-b border-grey-light">{{ $car->matricula }}</td>
                                <td class="py-4 px-6 border-b border-grey-light">{{ $car->kilometros }}</td>
                                <td class="py-4 px-6 border-b border-grey-light">{{ $car->itv }}</td>
                                <td class="py-4 px-6 border-b border-grey-light">
                                    <a href="{{ route('web.vehicles.show', $car->id) }}">
                                        <button
                                            class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 border border-green-700 rounded">Detalles</button>
                                    </a>
                                </td>
                                <td class="py-4 px-6 border-b border-grey-light">
                                    <a href="{{ route('web.vehicles.edit', $car->id) }}">
                                        <button
                                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 border border-blue-700 rounded">Editar</button>
                                    </a>
                                </td>
                                <td class="py-4 px-6 border-b border-grey-light">
                                    <a href="{{ route('web.vehicles.destroy', $car->id) }}">
                                        <button
                                            class="bg-red-500 hover:bg-red-700 text-black font-bold py-2 px-4 border border-red-700 rounded">Borrar</button>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>



</x-app-layout>
