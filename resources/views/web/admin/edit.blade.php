<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edicion de Usuarios') }}
        </h2>
    </x-slot>
     {{-- Si el usuario tiene el rol adecuado se mostrará el menú de navegación --}}
     @if (Auth::user()->rol == 'empleado' || Auth::user()->rol == 'admin')
         @livewire('inner-menu')
    @endif
    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 py-8">
        <form class="w-full max-w-lg mx-auto " method="POST" action="{{ route('admin.users.update', $user->id) }}">
            {{-- Token de formulario --}}
            @csrf
            <input type="hidden" name="id" value="{{$user->id}}">
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="name">
                        {{ __('Nombre') }}:
                    </label>
                    <input value="{{ $user->name }}" required
                        class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                        id="name" type="text" name="name">
                        {{-- Mensaje de error --}}
                    @error('name')
                        <p class="error-message">{{ $message }}</p>
                    @enderror
                </div>

                <div class="w-full md:w-1/2 px-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="email">
                        {{ __('Email') }}:
                    </label>
                    <input value="{{ $user->email }}"
                        class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                        id="email" type="email" name="email" required>
                        {{-- Mensaje de error --}}
                    @error('email')
                        <p class="error-message">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="telefono">
                        {{ __('Telefono') }}:
                    </label>
                    @if (isset($user->perfils->telefono))
                        <input value="{{ $user->perfils->telefono }}"
                            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                            id="telefono" type="number" name="telefono" maxlength="9" required>
                            {{-- Mensaje de error --}}
                        @error('name')
                            <p class="error-message">{{ $message }}</p>
                        @enderror
                    @else
                        <input
                            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                            id="telefono" type="text" name="telefono" required>
                            {{-- Mensaje de error --}}
                        @error('name')
                            <p class="error-message">{{ $message }}</p>
                        @enderror
                    @endif
                </div>


                <div class="w-full md:w-1/2 px-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="dni">
                        DNI
                    </label>
                    {{-- Si está establecido el campo DNI se muestra su valor en el input, si no se genera un input sin valor. --}}
                    @if (isset($user->perfils->DNI))
                        <input value="{{ $user->perfils->DNI }} "
                            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                            id="dni" type="text" name="dni" required>
                            {{-- Mensaje de error --}}
                        @error('dni')
                            <p class="error-message">{{ $message }}</p>
                        @enderror
                    @else
                        <input
                            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                            id="dni" type="text" name="dni" required>
                            {{-- Mensaje de error --}}
                        @error('dni')
                            <p class="error-message">{{ $message }}</p>
                        @enderror
                    @endif
                </div>
            </div>

            <div class="flex flex-wrap -mx-3 mb-2">
                <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-state">
                        Rol
                    </label>
                    <div class="relative">
                        <select required
                            class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                            id="rol" name="rol">
                            <option value="Comercial">{{ __('Comercial') }}</option>
                            <option value="empleado">{{ __('Empleado') }}</option>
                            <option value="admin">{{ __('Administrador') }}</option>
                        </select>
                        {{-- Mensaje de error --}}
                        @error('rol')
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
                <div class="flex flex-wrap -mx-3 mb-6 w-1/2">
                    <div class="w-full px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                            for="password">
                            {{ __('Password') }}:
                        </label>
                        <input
                            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                            id="password" type="password" name="password">
                    </div>
                </div>
                <div class="flex flex-wrap -mx-3 mb-6 w-full">
                    <div class="w-full md:full px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                            for="direccion">
                            {{ __('Direccion') }}:
                        </label>
                        {{-- Si el campo Direccion esta cubierto se crea el input con el valor correspondiente --}}
                        @if (isset($user->perfils->direccion))
                            <input value="{{ $user->perfils->direccion }}"
                                class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                                id="direccion" type="text" name="direccion" required>
                            @error('name')
                                <p class="error-message">{{ $message }}</p>
                            @enderror
                        @else
                            <input value=""
                                class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                                id="direccion" type="text" name="direccion" required>
                            @error('name')
                                <p class="error-message">{{ $message }}</p>
                            @enderror
                        @endif

                    </div>
                </div>
            </div>
            <button
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 border border-blue-700 rounded object-center"
                type="submit">{{ __('Update') }}</button>
        </form>
        {{-- Contenedor para el mensaje de estado --}}
        @if (session('status'))
            <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md"
                role="alert">
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
    </div>

</x-app-layout>
