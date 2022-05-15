<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Blog') }}
        </h2>
    </x-slot>
    
    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 py-8">
        <div id="fadeJs" class="grid grid-cols-3 gap-6 sm:grid-cols-1 md:grid-cols-2 lg:grid-col-3">
            {{-- Bucle que recorre el array de objetos recibido del controlador --}}

            @foreach ($nodos as $post)
                <article class="w-full h-80 bg-cover bg-center @if ($loop->first) md:col-span-2 @endif"
                    style="background-image: url(/img/post/{{ $post->img }})">
                    <div class="w-full h-full px-8 flex flex-col justify-center" >

                        <div>
                            @foreach ($post->labels as $tags)
                                <a href="{{ route('web.nodos.labels', $tags->id) }}"
                                    class="inline-block px-3 h-6 bg-{{ $tags->color }}-600 text-white rounded-full capitalize">{{ $tags->labelName }}</a>
                            @endforeach
                        </div>
                        <h1 class='text-4xl text-purple-700 capitalize leading-8 font-bold mt-2'>
                            <a href="{{ route('web.nodos.show', $post) }}">
                                {{ $post->titulo }}
                            </a>
                        </h1>
                    </div>
                </article>
            @endforeach


        </div>
    
        <div class="py-6">
            {{ $nodos->links() }}
        </div>
    </div>
</x-app-layout>
