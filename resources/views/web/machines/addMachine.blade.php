<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Añadir Maquina') }}
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
        <form class="w-full max-w-lg mx-auto " method="POST" action="{{ route('web.machines.add') }}">
            @csrf
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="marca">
                        Fabricante
                    </label>
                    <input value="{{ old('marca') }}" required
                        class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                        id="marca" type="text" name="marca">
                    @error('marca')
                        <p class="error-message">{{ $message }}</p>
                    @enderror
                </div>

                <div class="w-full md:w-1/2 px-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="modelo">
                        modelo
                    </label>
                    <input value="{{ old('modelo') }} " required
                        class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                        id="modelo" type="text" name="modelo" min="0">
                    @error('modelo')
                        <p class="error-message">{{ $message }}</p>
                    @enderror
                </div>
                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full px-3">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                for="lectura">
                                Numero de Serie
                            </label>
                            <input value="{{ old('lectura') }}" required
                                class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                id="serial" type="number" name="serial" />
                        </div>
                        @error('lectura')
                            <p class="error-message">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-state">
                        tipo
                    </label>
                    <div class="relative">
                        <select required
                            class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                            id="tipo" name="tipo">
                            <option value="">Selecciona Servicio</option>
                            <option value="agua">Agua</option>
                            <option value="cafe">Cafe</option>
                            <option value="tabaco">Tabaco</option>
                            <option value="snacks">Snacks</option>
                        </select>
                        @error('tipo')
                            <p class="error-message">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">

                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full px-3">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                for="lectura">
                                lectura
                            </label>
                            <input value="{{ old('lectura') }}" required
                                class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                id="lectura" type="number" name="lectura">
                        </div>
                        @error('lectura')
                            <p class="error-message">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="flex flex-wrap -mx-3 mb-6">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-state">
                        Estado
                    </label><br>
                    <div class="relative">
                        <select required
                            class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                            id="estado" name="estado">
                            <option value="">Selecciona Servicio</option>
                            <option value="disponible">Disponible</option>
                            <option value="produccion">Produccion</option>
                            <option value="averiada">Averiada</option>
                        </select>
                        @error('estado')
                            <p class="error-message">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="w-full md:w-full px-3 mb-6 md:mb-0">
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full px-3">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                for="carriles">
                                carriles
                            </label>
                            <input value="{{ old('carriles') }}" placeholder="Cubrir Para Máquinas de Tabaco"
                                class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                id="carriles" type="number" name="carriles">
                        </div>
                        @error('carriles')
                            <p class="error-message">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full px-3">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                for="espirales">
                                espirales
                            </label>
                            <input value="{{ old('espirales') }}" placeholder="Cubrir Para Máquinas de Snacks"
                                class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                id="espirales" type="number" name="espirales">
                        </div>
                        @error('espirales')
                            <p class="error-message">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full px-3">
                            <div class="flex justify-center">
                                <div>
                                    <div class="form-check">
                                        <input
                                            class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer"
                                            type="checkbox" value="1" name="water" id="water">
                                        <label class="form-check-label inline-block text-gray-800"
                                            for="flexCheckDefault">
                                            Agua Caliente.
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @error('espirales')
                            <p class="error-message">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="grid place-items-center">
                <button
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 border border-blue-700 rounded object-center"
                    type="submit">Añadir</button>
            </div>
        </form>

    </div>

</x-app-layout>
