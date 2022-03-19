<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Vehiculos') }}
        </h2>
    </x-slot>
    {{-- El menu de navegación se mostrará en función del rol del usuario --}}
    @if (Auth::user()->rol == 'empleado' || Auth::user()->rol == 'admin')
        @livewire('inner-menu')
    @endif
    {{-- Contenedor del mensaje de estado --}}
    @if (session('status'))
        <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md" role="alert">
            <div class="flex">
                <div class="py-1"><svg class="fill-current h-6 w-6 text-teal-500 mr-4"
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path
                            d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z" />
                    </svg></div>
                <div>
                    <p class="font-bold">{{ session('status') }}</p>
                </div>
            </div>
        </div>
    @endif

    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 py-8 capitalize">
        <div class="w-full mt-12">
            <form action="{{ route('web.vehicles.filter') }}" method="post">
                @csrf
                <label for="rol">{{__('Filtros')}}: </label>
                <br>
                <label for="matricula">{{__('Matricula')}}</label>
                <input
                    class="focus:border-blue-600 appearance-none block w-1/4 bg-white text-black border  rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                    name="matricula" id="matricula" placeholder="Introduce Matricula" type="text">
                <br />
                <br />

                <button
                    class="inline-block px-6 py-2.5 bg-blue-400 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-500 hover:shadow-lg focus:bg-blue-500 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-600 active:shadow-lg transition duration-150 ease-in-out">{{__('Filtrar')}}</button>
                <a href="{{ route('web.vehicles.index') }}">
                    <button type="submit"
                        class="inline-block px-6 py-2.5 bg-blue-400 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-500 hover:shadow-lg focus:bg-blue-500 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-600 active:shadow-lg transition duration-150 ease-in-out">{{__('VerTodos')}}</button>
                </a>

            </form>
            <div class="grid place-items-end py-5">
                <a href="{{ route('web.vehicles.create') }}">
                    <button type="submit"
                        class="inline-block px-6 py-2.5 bg-purple-400 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-purple-500 hover:shadow-lg focus:bg-purple-500 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-purple-600 active:shadow-lg transition duration-150 ease-in-out">{{__('Add')}}</button>
                </a>
            </div>

            <p class="text-xl pb-3 flex items-center">
                <i class="fas fa-list mr-3"></i> {{__('Usuarios')}}
            </p>
            <div class="bg-white overflow-auto">
                <table class="text-left w-full border-collapse">
                    <!--Border collapse doesn't work on this site yet but it's available in newer tailwind versions -->
                    <thead>
                        <tr>
                            <th
                                class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                                {{__('Modelo')}}</th>
                            <th
                                class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                                {{__('Matricula')}}</th>
                            <th
                                class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                                {{__('Kilometros')}}</th>
                            <th
                                class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                                ITV</th>
                            <th
                                class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                                {{__('Detalles')}}</th>
                            <th
                                class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                                {{__('Editar')}}</th>
                            <th
                                class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                                {{__('Borrar')}}</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- Bucle que recorre el array de objetos recibido del controlador y añade los botones de funciones de borrado, edicion,etc.. --}}
                        @foreach ($vehicles as $car)
                            <tr class="hover:bg-grey-lighter">
                                <td class="py-4 px-6 border-b border-grey-light">{{ $car->descripcion }}</td>
                                <td class="py-4 px-6 border-b border-grey-light">{{ $car->matricula }}</td>
                                <td class="py-4 px-6 border-b border-grey-light">{{ $car->kilometros }}</td>
                                <td class="py-4 px-6 border-b border-grey-light">{{ $car->itv }}</td>
                                <td class="py-4 px-6 border-b border-grey-light">
                                    <a href="{{ route('web.vehicles.show', $car->id) }}">
                                        <button
                                            class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 border border-green-700 rounded">{{__('Detalles')}}</button>
                                    </a>
                                </td>
                                <td class="py-4 px-6 border-b border-grey-light">
                                    <a href="{{ route('web.vehicles.edit', $car->id) }}">
                                        <button
                                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 border border-blue-700 rounded">{{__('Edit')}}</button>
                                    </a>
                                </td>
                                <td class="py-4 px-6 border-b border-grey-light">
                                    <a href="{{ route('web.vehicles.destroy', $car->id) }}">
                                        <button
                                            class="bg-red-500 hover:bg-red-700 text-black font-bold py-2 px-4 border border-red-700 rounded">{{__('Delete')}}</button>
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
