<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Localizacion') }}
        </h2>
    </x-slot>
    <div id="fadeJs" class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 py-8">
        <h1 class="font-semibold text-4xl text-gray-800 leading-tight py-6 text-center"> {{__('DondeEstamos')}}? </h1>
        <div class="grid grid-cols-1 gap-6 lg:grid-cols-3 mx-auto">
                        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="lg:col-span-3 mx-auto px-6">
                    <div id="map-container-google-4" class="col-span-1">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4338.981490144176!2d-8.205683542884938!3d43.48166455603426!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd2e75eba1271083%3A0x21c2bb893e673999!2sCentro%20P%C3%BAblico%20Integrado%20de%20Formaci%C3%B3n%20Profesional%20Rodolfo%20Ucha%20Pi%C3%B1eiro%20(Ferrol)!5e1!3m2!1ses!2sus!4v1643723239650!5m2!1ses!2sus"
                            width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                    </div>
                </div>
            </div>
            <aside">
                <h1 class="text-4xl font-bold text-gray-600 mb-4 text-center">{{__('Direccion')}}</h1>
                <h1 class="text-1xl font-bold text-gray-600 mb-4 text-center"> Av. De Castelao, 64</h1>
                <h1 class="text-1xl font-bold text-gray-600 mb-4 text-center"> 15404, Ferrol</h1>
                <h1 class="text-3xl font-bold text-gray-600 mb-4 text-center">{{__('contacto')}}</h1>
                <h1 class="text-1xl font-bold text-gray-600 mb-4 text-center"> {{__('Telefono')}} : +34 555-2368 </h1>
                <h1 class="text-1xl font-bold text-gray-600 mb-4 text-center"> {{__('email')}}: contacto@hellheimvending.com </h1>
                <h1 class="text-3xl font-bold text-gray-600 mb-4 text-center">{{__('Horario')}}</h1>
                <h1 class="text-1xl font-bold text-gray-600 mb-4 text-center"> {{__('Horas')}} </h1>
                <h1 class="text-1xl font-bold text-gray-600 mb-4 text-center"> {{__('FinSemana')}}</h1>
            </aside>
        </div>

    </div>

</x-app-layout>
