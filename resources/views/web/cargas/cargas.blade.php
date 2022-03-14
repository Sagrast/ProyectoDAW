<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Gestion de Cargas') }}
        </h2>
    </x-slot>
    {{-- Si el usuario tiene el rol correcto se muestra el menú de administración --}}
    @if (Auth::user()->rol == 'empleado' || Auth::user()->rol == 'admin')
        @livewire('inner-menu')
    @endif
    {{-- Contenedor de mensajes de estado --}}
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
{{-- Formulario de creación de nuevas cargas --}}
    <div class="max-w-7xl mx-auto py-3 px-4 sm:px-6 lg:px-8 py-8 capitalize">
        <div class="w-full mt-12">
            <h1 class="text-3xl">{{ $client->nombre }}</h1>
            <h1 class="text-3xl">{{ $client->servicio }}</h1>
            <a href="{{route('web.products.history',$machine[0]->id)}}">
            <button type="button" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 border border-green-700 rounded object-center">{{__('Histoial')}}</button>
            </a>
        </div>
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 py-8">
        <form action="{{ route('web.products.store') }}" method="post">
            @csrf
            <input type="hidden" name="maquina" value="{{ $machine[0]->id }}">
            <input type="hidden" name="cliente" value="{{ $client->id }}">
            <div class="algo">
                @foreach ($products as $producto)
                    <label for="{{ $producto->nombre }}">{{ $producto->nombre }}</label>
                    <input
                        class="focus:border-blue-600 appearance-none block w-1/6 bg-white text-black border  rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                        type="number" name="carga[]" id="{{ $producto->nombre }}" min="0" value="0">
                    <input type="hidden" name="id[]" value={{ $producto->id }}>
                @endforeach
                <label for="fecha">{{__('FechaCarga')}}</label>
                <input type="date" class="appearance-none block w-1/6 bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" name="fecha" id="fecha">
                @error('fecha')
                    <p class="error-message">{{ $message }}</p>
                @enderror
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 border border-blue-700 rounded object-center">{{__('Send')}}</button>
        </form>
        </div>
    </div>
    </div>
</x-app-layout>
