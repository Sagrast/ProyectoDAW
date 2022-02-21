{{-- Source: <a class="underline" href="https://tailwindcomponents.com/component/table">https://tailwindcomponents.com/component/table</a> --}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Listado de Noticias') }}
        </h2>
    </x-slot>
    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 py-8 capitalize">
        <div class="w-full mt-12">
            <form action="{{ route('web.admin.list') }}" method="post">
                @csrf
                <label for="title">Buscar Titulo</label>
                <input
                class="focus:border-blue-600 appearance-none block w-1/4 bg-white text-black border  rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                name="titulo" id="titulo" placeholder="Introduce titulo" type="text">
            <br/>
                <button type="submit"
                    class="inline-block px-6 py-2.5 bg-blue-400 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-500 hover:shadow-lg focus:bg-blue-500 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-600 active:shadow-lg transition duration-150 ease-in-out">Filtrar</button>
                <a href="{{ route('web.admin.list') }}">
                    <button type="submit"
                        class="inline-block px-6 py-2.5 bg-blue-400 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-500 hover:shadow-lg focus:bg-blue-500 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-600 active:shadow-lg transition duration-150 ease-in-out">Ver
                        Todos</button>
                </a>
            </form>
            <p class="text-xl pb-3 flex items-center">
                <i class="fas fa-list mr-3"></i> Noticias
            </p>
            <div class="bg-white overflow-auto">
                <table class="text-left w-full border-collapse">
                    <!--Border collapse doesn't work on this site yet but it's available in newer tailwind versions -->
                    <thead>
                        <tr>
                            <th
                                class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                                Foto</th>
                            <th
                                class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                                Titulo</th>
                            <th
                                class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                                Editar</th>
                            <th
                                class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                                Borrar</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($nodos as $post)
                            <tr class="hover:bg-grey-lighter">
                                <td class="py-4 px-6 border-b border-grey-light"><img
                                        src="/img/post/{{ $post->img }}" class="object-scale-down h-12 w-12"></td>
                                <td class="py-4 px-6 border-b border-grey-light">{{ $post->titulo }}</td>
                                <td class="py-4 px-6 border-b border-grey-light">
                                    <a href="{{ route('web.nodos.edit', $post->id) }}">
                                        <button
                                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 border border-blue-700 rounded">Editar</button>
                                    </a>
                                </td>
                                <td class="py-4 px-6 border-b border-grey-light">
                                    <a href="{{ route('web.nodos.destroy', $post->id) }}">
                                        <button
                                            class="bg-red-500 hover:bg-red-700 text-black font-bold py-2 px-4 border border-red-700 rounded">Borrar</button>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div>
                    <p class="font-bold">{{ session('status') }}</p>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
