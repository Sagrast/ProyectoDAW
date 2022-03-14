<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('EditarNoticia') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="{{ route('web.nodos.update', $nodo->id) }}"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="mb-4">
                            <label class="text-xl text-gray-600">{{ __('Titulo') }} <span
                                    class="text-red-500">*</span></label></br>
                            <input type="text" class="border-2 border-gray-300 p-2 w-full" name="titulo" id="titulo"
                                value="{{ $nodo->titulo }}" required>
                            {{-- Mensaje de error --}}
                            @error('title')
                                <p class="error-message">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label class="text-xl text-gray-600">{{ __('Subtitulo') }} <span
                                    class="text-red-500">*</span></label></br>
                            <input type="text" class="border-2 border-gray-300 p-2 w-full" name="subtitulo"
                                id="subtitulo" value="{{ $nodo->subtitulo }}" required>
                            {{-- Mensaje de error --}}
                            @error('subtitle')
                                <p class="error-message">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label class="text-xl text-gray-600">{{ __('Imagen') }} <span
                                    class="text-red-500">*</span></label></br>
                            <input type="file" name="image" id="image">
                        </div>

                        <div class="mb-4">
                            <label class="text-xl text-gray-600">{{ __('Categoria') }} </label></br>
                            <select class="category border-2 border-gray-300 p-2 w-full" name="category" id="category">
                                {{-- Bucle que recorre el array de objetos recibido del controlador --}}

                                @foreach ($categoria as $cat)
                                    <option class="border-2 border-gray-300 p-2 w-full" value="{{ $cat->id }}">
                                        {{ $cat->name }}</option>
                                @endforeach
                            </select>
                            {{-- Mensaje de error --}}
                            @error('category')
                                <p class="error-message">{{ $message }}</p>
                            @enderror
                        </div>


                        <div class="mb-4">
                            <label class="text-xl text-gray-600 col-span-2">{{ __('Etiquetas') }} </label></br>
                            {{-- Bucle que recorre el array de objetos recibido del controlador --}}

                            @foreach ($etiquetas as $label)
                                <input type="checkbox" value="{{ $label->id }}" id="{{ $label->labelName }}"
                                    name="etiquetas[]">
                                <label class="capitalize"
                                    for="{{ $label->id }}">{{ $label->labelName }}</label>
                            @endforeach
                            @error('etiquetas')
                                <p class="error-message">{{ $message }}</p>
                            @enderror

                        </div>

                        <div class="mb-8">
                            <label class="text-xl text-gray-600 col-span-4">{{ __('Mensaje') }} <span
                                    class="text-red-500">*</span></label></br>
                            <textarea name="content" class="border-2 border-gray-500 w-full" value="">
                                {{ $nodo->contidoHTML }}
                            </textarea>
                            <script>
                                CKEDITOR.replace('content');
                            </script>
                            {{-- Mensaje de error --}}
                            @error('content')
                                <p class="error-message">{{ $message }}</p>
                            @enderror

                        </div>
                        <button role="submit" class="p-3 bg-blue-500 text-white hover:bg-blue-400"
                            required>Actualizar</button>

                </div>
                </form>
            </div>
        </div>
    </div>
    </div>


</x-app-layout>
