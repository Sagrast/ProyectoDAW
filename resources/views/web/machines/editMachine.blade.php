<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Maquina') }}
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
    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 py-8">
        <form class="w-full max-w-lg mx-auto " method="POST" action="{{ route('web.machines.update', $machine->id) }}">
            @csrf
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="marca">
                        {{ __('Fabricante') }}
                    </label>
                    <input value="{{ $machine->marca }}" required
                        class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                        id="marca" type="text" name="marca">
                    @error('marca')
                        <p class="error-message">{{ $message }}</p>
                    @enderror
                </div>

                <div class="w-full md:w-1/2 px-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="modelo">
                        {{ __('Modelo') }}
                    </label>
                    <input value="{{ $machine->modelo }} " required
                        class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                        id="modelo" type="text" name="modelo" min="0">
                    @error('modelo')
                        <p class="error-message">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="lectura">
                            {{ __('Lectura') }}
                        </label>
                        <input required
                            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                            id="lectura" type="text" name="lectura" value="{{ $machine->lectura }}">
                    </div>
                    @error('lectura')
                        <p class="error-message">{{ $message }}</p>
                    @enderror
                </div>
                <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-state">
                        {{ __('Tipo') }}
                    </label>
                    <div class="relative">
                        <select required
                            class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                            id="tipo" name="tipo">
                            <option value="">{{ __('EscogeTipo') }}</option>
                            <option value="agua">{{ __('Agua') }}</option>
                            <option value="cafe">{{ __('Cafe') }}</option>
                            <option value="tabaco">{{ __('Tabaco') }}</option>
                            <option value="snack">{{ __('Snacks') }}</option>
                        </select>
                        @error('tipo')
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
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="serial">
                            {{ __('NumSerie') }}
                        </label>
                        <input value="{{ $machine->serial }}" required
                            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                            id="serial" type="number" name="serial">
                    </div>
                    @error('serial')
                        <p class="error-message">{{ $message }}</p>
                    @enderror

                </div>
                <div class="flex flex-wrap -mx-3 mb-6">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-state">
                        {{ __('Estado') }}
                    </label><br>
                    <div class="relative">
                        <select required
                            class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                            id="estado" name="estado">
                            <option value="">{{ __('Estado') }}</option>
                            <option value="disponible">{{ __('Disponible') }}</option>
                            <option value="produccion">{{ __('Produccion') }}</option>
                            <option value="averiada">{{ __('Averiada') }}</option>
                        </select>
                        @error('estado')
                            <p class="error-message">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                @if ($machine->tipo == 'tabaco')
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full px-3">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                for="carriles">
                                {{ __('Carriles') }}
                            </label>
                            <input value="{{ $tipo->carriles }}" required
                                class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                id="carriles" type="number" name="carriles">
                        </div>
                        @error('carriles')
                            <p class="error-message">{{ $message }}</p>
                        @enderror

                    </div>
                @elseif ($machine->tipo == 'snacks')
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full px-3">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                for="serial">
                                {{ __('Espirales') }}
                            </label>
                            <input value="{{ $tipo->espirales }}" required
                                class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                id="espirales" type="number" name="espirales">
                        </div>
                        @error('espirales')
                            <p class="error-message">{{ $message }}</p>
                        @enderror

                    </div>
                @elseif ($machine->tipo == 'agua')
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full px-3">
                            <div class="flex justify-center">
                                <div>
                                    <div class="form-check">
                                        <input
                                            class="form-check-input appearance-none rounded-full h-4 w-4 border border-gray-300 bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer"
                                            type="radio" name="water" id="water" value="1">
                                        <label class="form-check-label inline-block text-gray-800"
                                            for="flexRadioDefault1">
                                            {{ __('AguaCaliente') }}
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input
                                            class="form-check-input appearance-none rounded-full h-4 w-4 border border-gray-300 bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer"
                                            type="radio" name="water" id="water" value="0" checked>
                                        <label class="form-check-label inline-block text-gray-800"
                                            for="flexRadioDefault2">
                                            {{ __('AguaFria') }}
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @error('water')
                            <p class="error-message">{{ $message }}</p>
                        @enderror
                @endif
            </div>
            <div class="grid place-items-center py-12">
                <button
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 border border-blue-700 rounded object-center"
                    type="submit">{{ __('Add') }}</button>
            </div>
        </form>

    </div>

</x-app-layout>
