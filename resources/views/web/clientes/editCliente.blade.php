<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edicion de Usuarios') }}
        </h2>
    </x-slot>
    {{-- Control del menú de gestión en función del rol del usuario --}}
    @if (Auth::user()->rol == 'empleado' || Auth::user()->rol == 'admin')
        @livewire('inner-menu')
    @endif
    {{-- Contendor del mensaje de estado --}}
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
    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 py-8">
        <form class="w-full max-w-lg mx-auto " method="POST" action="{{ route('web.clientes.update', $client->id) }}">
            @csrf
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="name">
                        {{ __('Nombre') }}:
                    </label>
                    <input value="{{ $client->nombre }}"
                        class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                        id="nombre" type="text" name="nombre">
                    {{-- Mensaje de error --}}
                    @error('nombre')
                        <p class="error-message">{{ $message }}</p>
                    @enderror
                </div>

                <div class="w-full md:w-1/2 px-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="email">
                        {{ __('Email') }}:
                    </label>
                    <input value="{{ $client->email }} "
                        class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                        id="email" type="email" name="email">
                    {{-- Mensaje de error --}}
                    @error('email')
                        <p class="error-message">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="name">
                        {{ __('Direccion') }}:
                    </label>
                    <input value="{{ $client->direccion }}"
                        class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                        id="direcion" type="text" name="direccion">
                    {{-- Mensaje de error --}}
                    @error('direccion')
                        <p class="error-message">{{ $message }}</p>
                    @enderror
                </div>

                <div class="w-full md:w-1/2 px-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="email">
                        CIF:
                    </label>
                    <input value="{{ $client->CIF }} "
                        class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                        id="cif" type="text" name="cif">
                    {{-- Mensaje de error --}}
                    @error('cif')
                        <p class="error-message">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="flex flex-wrap -mx-3 mb-2">
                <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-state">
                        {{ __('Servicio') }}
                    </label>
                    <div class="relative">
                        <select
                            class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                            id="servicio" name="servicio">
                            <option value="agua">{{ __('Agua') }}</option>
                            <option value="distribucion">{{ __('Distribucion') }}</option>
                            <option value="cafe">{{ __('Cafe') }}</option>
                            <option value="tabaco">{{ __('Snacks') }}</option>
                        </select>
                        {{-- Mensaje de error --}}
                        @error('Servicio')
                            <p class="error-message">{{ $message }}</p>
                        @enderror
                        <div
                            class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                            for="telefono">
                            {{ __('Telefono') }}
                        </label>
                        <input
                            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                            id="telefono" type="telefono" name="telefono" value="{{ $client->telefono }}">
                    </div>
                </div>

            </div>
            <button
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 border border-blue-700 rounded object-center"
                type="submit">{{ __('Actualizar') }}</button>
        </form>
        <br>
        <table class="text-left w-full border-collapse py-6 text-center">
            <!--Border collapse doesn't work on this site yet but it's available in newer tailwind versions -->
            <thead>
                <tr>
                    <th colspan="5" class="bg-black text-white text-center py-2 ">{{ __('InstalarMaquina') }}</th>
                </tr>
                <tr>
                    <th
                        class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                        {{ __('Marca') }}</th>
                    <th
                        class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                        {{ __('Modelo') }}</th>
                    <th
                        class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                        {{ __('Servicio') }}</th>
                    <th
                        class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                        {{ __('Detalles') }}</th>
                    <th
                        class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                        {{ __('Instalar') }}</th>
                </tr>
            </thead>
            <tbody>
                {{-- Bucle que recorre el array de objetos recibido del controlador --}}
                @foreach ($machine as $mach)
                    <tr class="hover:bg-grey-lighter">
                        <td class="py-4 px-6 border-b border-grey-light">{{ $mach->marca }}</td>
                        <td class="py-4 px-6 border-b border-grey-light">{{ $mach->modelo }}</td>
                        <td class="py-4 px-6 border-b border-grey-light">{{ $mach->tipo }}</td>
                        <td>
                            <a href="{{ route('web.machines.show', $mach->id) }}">
                                <button
                                    class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 border border-green-700 rounded">{{ __('Detalles') }}</button>
                            </a>
                        </td>
                        <td>
                            <a href="{{ route('web.machines.install', [$mach->id, $client->id]) }}">
                                <button
                                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold px-4 border border-blue-700 rounded py-2">{{ __('Asociar') }}</button>
                            </a>
                        </td>

                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</x-app-layout>
