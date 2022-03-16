<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Añadir Vehiculos') }}
        </h2>
    </x-slot>
    @if (Auth::user()->rol == 'empleado' || Auth::user()->rol == 'admin')
    @livewire('inner-menu')
    @endif
    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 py-8">
        <form class="w-full max-w-lg mx-auto " method="POST" action="{{route('web.vehicles.add')}}">
            @csrf
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="descripcion">
                        {{__('Descripcion')}}
                    </label>
                    <input value="{{ old('descricpcion') }}"
                        class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                        id="descripcion" type="text" name="descripcion">
                        @error('descripcion')
                        <p class="error-message">{{ $message}}</p>
                        @enderror
                </div>

                <div class="w-full md:w-1/2 px-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="matricula">
                        {{__('Matricula')}}:
                    </label>
                    <input value="{{ old('matricula') }} "
                        class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                        id="matricula" type="text" name="matricula" min="0">
                        @error('matricula')
                            <p class="error-message">{{ $message}}</p>
                        @enderror
                </div>
                <div class="w-full md:w-1/2 px-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="email">
                        {{__('Kilometros')}}:
                    </label>
                    <input value="{{ old('kilometros') }} "
                        class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                        id="kilometros" type="number" name="kilometros">
                        @error('kilometros')
                            <p class="error-message">{{ $message}}</p>
                        @enderror
                </div>
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                            for="itv">
                            {{__('ITV')}}:
                        </label>
                        <input
                            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                            id="itv" type="date" name="itv">
                    </div>
                </div>
            </div>
            </div>
            <div class="grid place-items-center">
            <button

                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 border border-blue-700 rounded object-center"
                type="submit"> {{__('Add')}}
            </button>
            </div>
        </form>
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
