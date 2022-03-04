<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Noticia') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="{{route('web.nodos.update', $nodo->id)}}" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-4">
                            <label class="text-xl text-gray-600">Titulo <span class="text-red-500">*</span></label></br>
                            <input type="text" class="border-2 border-gray-300 p-2 w-full" name="titulo" id="titulo" value="{{ $nodo->titulo }}" required>
                            @error('title')
                            <p class="error-message">{{ $message}}</p>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label class="text-xl text-gray-600">Subtitulo <span class="text-red-500">*</span></label></br>
                            <input type="text" class="border-2 border-gray-300 p-2 w-full" name="subtitulo" id="subtitulo" value="{{ $nodo->subtitulo }}" required>
                            @error('subtitle')
                            <p class="error-message">{{ $message}}</p>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label class="text-xl text-gray-600">Imagen <span class="text-red-500">*</span></label></br>
                            <input type="file" name="image" id="image">
                        </div>

                        <div class="mb-4">
                            <label class="text-xl text-gray-600">Categoria</label></br>
                            <select class="category border-2 border-gray-300 p-2 w-full" name="category" id="category">
                                @foreach ($categoria as $cat)
                                    <option class="border-2 border-gray-300 p-2 w-full" value="{{$cat->id}}">{{$cat->name}}</option>
                                @endforeach
                            </select>
                            @error('category')
                            <p class="error-message">{{ $message }}</p>
                            @enderror
                        </div>


                        <div class="mb-4">
                            <label class="text-xl text-gray-600 col-span-2">Etiquetas</label></br>
                                @foreach ($etiquetas as $label)
                                <input  type="checkbox" value="{{$label->id}}" id="{{$label->labelName}}" name="etiquetas[]">
                                <label class="capitalize" for="{{$label->id}}">{{$label->labelName}}</label>
                                @endforeach
                                @error('etiquetas')
                                <p class="error-message">{{ $message }}</p>
                                @enderror

                        </div>

                        <div class="mb-8">
                            <label class="text-xl text-gray-600 col-span-4">Contenido <span class="text-red-500">*</span></label></br>
                            <textarea name="content" class="border-2 border-gray-500 w-full" value="">
                                {{ $nodo->contidoHTML }}
                            </textarea>
                            <script>
                                CKEDITOR.replace( 'content' );
                            </script>
                            @error('content')
                            <p class="error-message">{{ $message}}</p>
                            @enderror

                        </div>
                            <button role="submit" class="p-3 bg-blue-500 text-white hover:bg-blue-400" required>Actualizar</button>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


</x-app-layout>
