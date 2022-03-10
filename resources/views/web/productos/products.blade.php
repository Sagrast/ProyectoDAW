{{-- Source: <a class="underline" href="https://tailwindcomponents.com/component/table">https://tailwindcomponents.com/component/table</a> --}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Productos') }}
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
    <div class="max-w-7xl mx-auto py-3 px-4 sm:px-6 lg:px-8 py-8 capitalize">
        <div class="w-full mt-12">
            <form action="{{ route('web.products.filter') }}" method="post">
                @csrf
                <label for="servicio">Filtros: </label>
                <select name="servicio" id="servicio"
                    class="orm-select appearance-none
                block
                w-1/4
                px-3
                py-1.5
                text-base
                font-normal
                text-gray-700
                bg-white bg-clip-padding bg-no-repeat
                border border-solid border-gray-300
                rounded
                transition
                ease-in-out
                m-0
                focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">
                    <option value="null">Escoge Tipo</option>
                    <option value="agua">{{ __('Agua') }}</option>
                    <option value="cafe">{{ __('Cafe') }}</option>
                    <option value="tabaco">{{ __('Tabaco') }}</option>
                    <option value="snacks">{{ __('Snacks') }}</option>
                </select>
                <label for="lote">{{ __('Lote') }}</label>
                <input
                    class="focus:border-blue-600 appearance-none block w-1/4 bg-white text-black border  rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                    name="lote" id="lote" placeholder="Introduce nombre" type="text">

                <br />
                <br />

                <button type="submit"
                    class="inline-block px-6 py-2.5 bg-blue-400 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-500 hover:shadow-lg focus:bg-blue-500 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-600 active:shadow-lg transition duration-150 ease-in-out">{{ __('Filtrar') }}</button>
                <a href="{{ route('web.products.index') }}">
                    <button type="submit"
                        class="inline-block px-6 py-2.5 bg-blue-400 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-500 hover:shadow-lg focus:bg-blue-500 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-600 active:shadow-lg transition duration-150 ease-in-out">{{ __('VerTodos') }}</button>
                </a>
            </form>
            <div class="py-6 grid place-items-end">
                <a href="{{ route('web.products.create') }}">
                    <button
                    class="inline-block px-6 py-2.5 bg-purple-400 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-purple-500 hover:shadow-lg focus:bg-purple-500 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-purple-600 active:shadow-lg transition duration-150 ease-in-out">{{ __('Add') }}</button>
                </a>
            </div>
            <p class="text-xl pb-3 flex items-center">
                <i class="fas fa-list mr-3"></i> {{ __('Productos') }}
            </p>
            <div class="bg-white overflow-auto">
                <table class="text-left w-full border-collapse">
                    <!--Border collapse doesn't work on this site yet but it's available in newer tailwind versions -->
                    <thead>
                        <tr>
                            <th
                                class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                                {{ __('nombre') }}</th>
                            <th
                                class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                                Stock Disponible</th>
                            <th
                                class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                                tipo</th>
                                <th
                                class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                                {{ __('FechaCaducidad') }}</th>
                                <th
                                class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                                Lote</th>

                            <th
                                class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                                {{ __('Edit') }}</th>
                            <th
                                class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                                {{ __('Delete') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                        @if ($product->stock < 100)
                            <tr class="hover:bg-grey-lighter">
                                <td class="py-4 px-6 border-b bg-red-400 border-grey-light">{{ $product->nombre }}</td>
                                <td class="py-4 px-6 border-b bg-red-400 border-grey-light">{{ $product->stock }}</td>
                                <td class="py-4 px-6 border-b bg-red-400 border-grey-light">{{ $product->tipo }}</td>
                                <td class="py-4 px-6 border-b bg-red-400 border-grey-light">{{ $product->fechaCaducidad }}</td>
                                <td class="py-4 px-6 border-b bg-red-400 border-grey-light">{{ $product->lote }}</td>
                                <td class="py-4 px-6 border-b bg-red-400 border-grey-light">
                                    <a href="{{ route('web.products.edit', $product->id) }}">
                                        <button
                                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 border border-blue-700 rounded">Editar</button>
                                    </a>
                                </td>
                                <td class="py-4 px-6 border-b  bg-red-400 border-grey-light">
                                    <a href="{{ route('web.products.destroy', $product->id) }}">
                                        <button
                                            class="bg-red-500 hover:bg-red-700 text-black font-bold py-2 px-4 border border-red-700 rounded">Borrar</button>
                                    </a>
                                </td>
                            </tr>
                        @else
                        <tr class="hover:bg-grey-lighter">
                            <td class="py-4 px-6 border-b border-grey-light">{{ $product->nombre }}</td>
                            <td class="py-4 px-6 border-b border-grey-light">{{ $product->stock }}</td>
                            <td class="py-4 px-6 border-b border-grey-light">{{ $product->tipo }}</td>
                            <td class="py-4 px-6 border-b border-grey-light">{{ $product->fechaCaducidad }}</td>
                            <td class="py-4 px-6 border-b border-grey-light">{{ $product->lote }}</td>
                            <td class="py-4 px-6 border-b border-grey-light">
                                <a href="{{ route('web.products.edit', $product->id) }}">
                                    <button
                                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 border border-blue-700 rounded">Editar</button>
                                </a>
                            </td>
                            <td class="py-4 px-6 border-b border-grey-light">
                                <a href="{{ route('web.products.destroy', $product->id) }}">
                                    <button
                                        class="bg-red-500 hover:bg-red-700 text-black font-bold py-2 px-4 border border-red-700 rounded">Borrar</button>
                                </a>
                            </td>
                        </tr>
                        @endif
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
    <div class="py-6">
        {{$products->links()}}
        </div>

</x-app-layout>
