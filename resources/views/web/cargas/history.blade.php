<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Historico de Cargas') }}
        </h2>
    </x-slot>
    @if (Auth::user()->rol == 'empleado' || Auth::user()->rol == 'admin')
        @livewire('inner-menu')
    @endif
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
    <div class="max-w-7xl mx-auto py-3 px-4 sm:px-6 lg:px-8 py-8 capitalize">
        <div class="bg-white overflow-auto">
            <div class="w-full mt-12">

                <form action="{{ route('web.products.filterLoadDate') }}" method="post">
                    @csrf
                    <label for="servicio">Filtros: </label>
                    <select name="fecha" id="fecha"
                        class="orm-select appearance-none
                    block
                    w-1/4
                    px-3
                    py-1.5
                    text-base
                    font-normal
                    text-gray-700
                    bg-white bg-clip-padding bg-no-repeat
                    border border-solid border-gray-300
                    rounded
                    transition
                    ease-in-out
                    m-0
                    focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">
                        @foreach ($fechas as $dates)
                        <option value="{{$dates->fechaCarga}}">{{$dates->fechaCarga}}</option>
                        @endforeach

                    </select>
                    <br/>
                    <button type="submit"
                        class="inline-block px-6 py-2.5 bg-blue-400 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-500 hover:shadow-lg focus:bg-blue-500 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-600 active:shadow-lg transition duration-150 ease-in-out">Filtrar</button>
                    <a href="{{ route('web.products.history', $cargas[0]->machine_id )}}">
                        <button type="submit"
                            class="inline-block px-6 py-2.5 bg-blue-400 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-500 hover:shadow-lg focus:bg-blue-500 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-600 active:shadow-lg transition duration-150 ease-in-out">Ver
                            Todos</button>
                    </a>

                </form>
            {{-- ------------------------------------------------------------------------------------------------------------------------------------
                                                        Cargas
                         --------------------------------------------------------------------------------------------------------------------------------- --}}

            <table class="text-left w-full border-collapse py-6">
                <!--Border collapse doesn't work on this site yet but it's available in newer tailwind versions -->
                <thead>
                    <tr>
                        <th colspan="8" class="bg-black text-white text-center py-2 ">Cargas Realizadas</th>
                    </tr>
                    <tr>
                        <th
                            class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                            Marca</th>
                        <th
                            class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                            Cantidad</th>
                        <th
                            class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                            Fecha</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cargas as $load)
                        <tr class="hover:bg-grey-lighter">
                            <td class="py-4 px-6 border-b border-grey-light">{{ $load->nombre }}</td>
                            <td class="py-4 px-6 border-b border-grey-light">{{ $load->unidades }}</td>
                            <td class="py-4 px-6 border-b border-grey-light">{{ $load->fechaCarga }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
