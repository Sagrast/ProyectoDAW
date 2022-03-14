<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Información de Usuario') }}
        </h2>
    </x-slot>
    {{-- Si el usuario tiene el rol adecuado se mostrará el menú de navegación --}}
    @if (Auth::user()->rol == 'empleado' || Auth::user()->rol == 'admin')
        @livewire('inner-menu')
    @endif

    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 py-8 capitalize">
        <div class="w-full mt-12">
               <p class="text-xl pb-3 flex items-center">
                    <i class="fas fa-list mr-3"></i> {{ __('InformacionUsuario') }}
                </p>
                <div class="bg-white overflow-auto">
                    <table class="text-left w-full border-collapse">
                        <!--Border collapse doesn't work on this site yet but it's available in newer tailwind versions -->
                        <thead>
                            <tr>
                                <th
                                    class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                                    {{ __('Nombre') }}</th>
                                <th
                                    class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                                    {{ __('Email') }}</th>
                                <th
                                    class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                                    ROL</th>
                                    <th
                                    class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                                    DNI</th>
                                    <th
                                    class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                                    {{ __('Telefono') }}</th>
                                    <th
                                    class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                                    {{ __('Direccion') }}</th>
                            </tr>
                        </thead>
                        <tbody>

                            <tr class="hover:bg-grey-lighter">
                                <td class="py-4 px-6 border-b border-grey-light">{{ $user->name }}</td>
                                <td class="py-4 px-6 border-b border-grey-light">{{ $user->email }}</td>
                                <td class="py-4 px-6 border-b border-grey-light">{{ $user->rol }}</td>
                                @if (isset($user->perfils->DNI))
                                <td class="py-4 px-6 border-b border-grey-light">{{ $user->perfils->DNI }}</td>
                                @endif
                                @if (isset($user->perfils->telefono))
                                <td class="py-4 px-6 border-b border-grey-light">{{ $user->perfils->telefono }}</td>
                                @endif
                                @if (isset($user->perfils->direccion))
                                <td class="py-4 px-6 border-b border-grey-light">{{ $user->perfils->direccion }}</td>
                                @endif
                            </tr>
                        </tbody>
                    </table>



</x-app-layout>
