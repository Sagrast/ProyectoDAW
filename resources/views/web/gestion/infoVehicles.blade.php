<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Vehiculos') }}
        </h2>
    </x-slot>
    @if (Auth::user()->rol == 'empleado' || Auth::user()->rol == 'admin')
    @livewire('inner-menu')
    @endif

    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 py-8 capitalize">
        <div class="w-full mt-12">
            <form action="{{ route('web.vehicles.filter') }}" method="post">
                @csrf


            <p class="text-xl pb-3 flex items-center">
                <i class="fas fa-list mr-3"></i> Usuarios
            </p>
            <div class="bg-white overflow-auto">
                <table class="text-left w-full border-collapse">
                    <!--Border collapse doesn't work on this site yet but it's available in newer tailwind versions -->
                    <thead>
                        <tr>
                            <th
                                class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                                Modelo</th>
                            <th
                                class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                                Matricula</th>
                            <th
                                class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                                Kilometros</th>
                            <th
                                class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                                Vencimiento ITV</th>
                                <th
                                class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                                Detalles</th>
                            <th
                                class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                                Editar</th>
                            <th
                                class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                                Borrar</th>
                        </tr>
                    </thead>
                    <tbody>
                       @foreach ($data as $car)
                            <tr class="hover:bg-grey-lighter">
                                <td class="py-4 px-6 border-b border-grey-light">{{ $car->name }}</td>                                {
                                <td class="py-4 px-6 border-b border-grey-light">
                                    <a href="{{ route('web.vehicles.index') }}">
                                        <button
                                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 border border-blue-700 rounded">Volver</button>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
