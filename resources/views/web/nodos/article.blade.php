<x-app-layout>
    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 py-8">
        <h1 class="text-4xl font-bold text-gray-600">{{ $post->titulo }}</h1>
        <div class="text-lg text-gray-500 mb-2">
            {{ $post->subtitulo }}
        </div>
        <div class="grid grid-cols-1 gap-6 lg:grid-cols-3">

            {{-- //Contenido principal --}}
            <div class="lg:col-span-2">
                <figure>
                    <img class="w-full h-80 object-cover object-center " src="/img/post/{{ $post->img }}">
                </figure>
                <div class="text-base text-gray-500 mt-4">
                    {!! $post->contidoHTML !!}
                </div>
                <div class="py-6">
                {{-- Añadimos una condición para mostrar los botones de edicion y borrado, solo será visibles si el usuario tiene el rol adecuado
                    Esta comprobación solo se realizará si hay una sesión iniciada --}}

                @auth

                @if (Auth::user()->rol == 'comercial' || Auth::user()->rol == 'admin')
                    <a href="{{ route('web.nodos.edit', $post->id) }}">
                        <button
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 border border-blue-700 rounded">Editar</button>
                    </a>
                    <a href="{{ route('web.nodos.destroy', $post->id) }}">
                        <button
                            class="bg-red-500 hover:bg-red-700 text-black font-bold py-2 px-4 border border-red-700 rounded">Borrar</button>
                    </a>
                @endif
                @endauth
            </div>
            </div>

            {{-- Contenido relacionado --}}
            <aside>
                <h1 class="text-2xl font-bold text-gray-600 mb-4">Temas relacionados: </h1>
                <ul>
                    @foreach ($equals as $equal)
                        <li class="mb-4">
                            <a class="flex" href={{ route('web.nodos.show', $equal) }}>
                                <img class="w-36 h-20 object-cover object-center" src="/img/post/{{ $post->img }}">
                                <span class="ml-2 text-gray-600">{{ $equal->titulo }}</span>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </aside>

        </div>
        <div>
            <p class="font-bold">{{ session('status') }}</p>
        </div>
    </div>
</x-app-layout>
