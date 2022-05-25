<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('bienvenido') }}
        </h2>
    </x-slot>
    <div id="fadeJs">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <section class="relative">
                <div class="container flex flex-col-reverse lg:flex-row items-center gap-2 mt-14 lg:mt-28">
                    <!-- Content -->
                    <div class="flex flex-1 flex-col items-center lg:items-start">
                        {{-- Texto robado vilmente de: https://www.olevending.es/dentro-de-la-empresa/ --}}
                        <h2 class="text-bookmark-blue text-3xl md:text-4 lg:text-5xl text-center lg:text-left mb-6">
                            {{ __('solucionesParaEmpresa') }}
                        </h2>
                        <p class="text-bookmark-grey text-lg text-center lg:text-left mb-6">
                            {{ __('solucionesDesc') }}
                        </p>

                    </div>
                    <!-- Image -->
                    <div class="flex justify-center flex-1 mb-10 md:mb-16 lg:mb-0 z-10">
                        {{-- Imagen procedente de: https://www.pexels.com/photo/store-facade-2966345/ --}}
                        <img class="w-full h-80 object-cover object-center" src="/img/post/1.jpg" alt="" />
                    </div>
                </div>
                <!-- Rounded Rectangle -->
<!-- Carrousel -->
<div class="sliderAx h-auto mt-14">
    <div id="slider-1" class="container mx-auto">
        <div class="bg-cover bg-center  h-auto text-white py-24 px-10 object-fill"
            style="background-image: url(/img/post/3.jpg)">            
        </div> <!-- container -->
        <br>
    </div>

    <div id="slider-2" class="container mx-auto">
        <div class="bg-cover bg-top  h-auto text-white py-24 px-10 object-fill"
            style="background-image: url(/img/post/4.jpg)">

        </div> <!-- container -->
        <br>
    </div>    
    
</div>
<div class="flex justify-between w-12 mx-auto pb-2">
    <button id="sButton1" onclick="sliderButton1()" class="bg-purple-400 rounded-full w-4 pb-2 "></button>
    <button id="sButton2" onclick="sliderButton2() " class="bg-purple-400 rounded-full w-4 p-2"></button>
</div>

                <!-- Feature #1 -->
                <div class="relative mt-20 lg:mt-24">
                    <div class="container flex flex-col lg:flex-row items-center justify-center gap-x-24">
                        <!-- Image -->
                        <div class="flex flex-1 justify-center z-10 mb-10 lg:mb-0">
                            <img class="w-full h-80 object-cover object-center" src="/img/post/2.jpg"" alt="" />
                    </div>
                    <!-- Content -->
                    <div class="  flex flex-1 flex-col items-center lg:items-start">
                            <h1 class="text-3xl text-bookmark-blue">{{ __('areadescanso') }}</h1>
                            <p class="text-bookmark-grey my-4 text-center lg:text-left sm:w-3/4 lg:w-full">
                                {!! __('areadescansoDesc') !!}
                            </p>
                        </div>
                    </div>
                    <!-- Rounded Rectangle -->
                    <div
                        class="
              hidden
              lg:block
              overflow-hidden
              bg-bookmark-purple
              rounded-r-full
              absolute
              h-80
              w-2/4
              -bottom-24
              -left-36
            ">
                    </div>
                </div>
            </section>
            

        </div>

</x-app-layout>
