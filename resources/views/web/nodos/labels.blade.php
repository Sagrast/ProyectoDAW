<x-app-layout>
    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 py-8">
        <h1 class="uppercase text-center text-3xl font-bold">Etiquetas Relacionadas</h1>
        @foreach ($equals as $equal)
            <article class="mb-8 bg-white shadow-lg rounded-lg overflow-hidden">
                <img class="w-full h-72 object-cover object-center" src="/img/post/{{$equal->img}}">

                <div class="px-6 py-4">
                    <h1 class="font-bold text-xl mb-2">
                        <a href={{route('web.nodos.show',$equal)}}>{{$equal->titulo}}</a>
                    </h1>
                    <div class="text-gray-700 text-base">
                        {{$equal->subtitulo}}
                    </div>
                </div>
                <div class="px-6 pt-4 pb-2">
                    @foreach ($equal->labels as $tags)
                    <a href="{{route('web.nodos.labels',$tags->id)}}" class="inline-block px-3 h-6 bg-{{$tags->color}}-600 text-white rounded-full" >{{$tags->labelName}}</a>

                @endforeach
                </div>
            </article>
        @endforeach

    </div>
</x-app-layout>
