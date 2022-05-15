<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Contacto') }}
        </h2>
    </x-slot>
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
    <div id="fadeJs" class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 py-8">
        <form name="form_contact" class="w-full max-w-lg mx-auto" action="{{ route('web.nodos.mail') }}" method="POST">
            @csrf
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="nombre">
                        {{ __('nombre') }}
                    </label>
                    <input value="{{ old('nombre') }}"
                        class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                        id="nombre" type="text" name="nombre">
                        @error('nombre')
                        <p class="error-message">{{ $message }}</p>
                    @enderror
                </div>
                <div class="w-full md:w-1/2 px-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="apellido">
                        {{ __('apellido') }}
                    </label>
                    <input value="{{ old('apellido') }}"
                        class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                        id="apellido" type="text" name="apellido">
                        @error('apellido')
                        <p class="error-message">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full px-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="email">
                        {{ __('Email') }}
                    </label>
                    <input value="{{ old('email') }}"
                        class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                        id="email" type="email" name="email">
                        @error('email')
                        <p class="error-message">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full px-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="message">
                        {{ __('Mensaje') }}
                    </label>
                    <textarea value="{{ old('message') }}"
                        class="no-resize appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 h-48 resize-none"
                        id="message" name="message"></textarea>
                        @error('message')
                        <p class="error-message">{{ $message }}</p>
                    @enderror

                </div>
            </div>
            <div class="md:flex md:items-center">
                <div class="md:w-1/3">
                    <button
                        class="shadow bg-teal-400 hover:bg-teal-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded"
                        type="submit">
                        {{ __('Enviar') }}
                    </button>
                </div>
                <div class="md:w-2/3"></div>
            </div>
        </form>
    </div>

</x-app-layout>
