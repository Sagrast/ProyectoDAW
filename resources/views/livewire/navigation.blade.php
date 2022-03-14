<nav class="bg-gray-600" x-data="{open: false}">

{{-- Guardamos en un array todos los enlaces que aparecerán en los links de navegación. --}}
    @php
    $nav_links = [

        [
        'name' => 'Noticias',
        'route' => "/news",
        'active' => request()->routeIs('web.nodos.news'),

        ],
        [
            'name' => 'Servicios',
            'route' => '/services',
            'active' => request()->routeIs('services')
        ],
        [
            'name' => 'Contacto',
            'route' => '/contact',
            'active' => request()->routeIs('web.nodos.contact')
        ],
        [
            'name' => 'Localización',
            'route' => '/location',
            'active' => request()->routeIs('location')
        ]
];
@endphp
    <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
      <div class="relative flex items-center justify-between h-16">
        <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
          <!-- Mobile menu button-->
          <button x-on:click="open = true" type="button" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white" aria-controls="mobile-menu" aria-expanded="false">
            {{-- <span class="sr-only">Open main menu</span> --}}
            <!--
              Icon when menu is closed.

              Heroicon name: outline/menu

              Menu open: "hidden", Menu closed: "block"
            -->
            <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
            <!--
              Icon when menu is open.

              Heroicon name: outline/x

              Menu open: "block", Menu closed: "hidden"
            -->
            <svg class="hidden h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
          </button>
        </div>
        {{-- Logotipo --}}
        <div class="flex-1 flex items-center justify-center sm:items-stretch sm:justify-start">
         {{-- Link de Logotipo con redirección a la página principal--}}
          <a href="/" class="flex-shrink-0 flex items-center">
            <img class="block lg:hidden h-8 w-auto" src="/img/post/logo.png" alt="Workflow">
            <img class="hidden lg:block h-8 w-auto" src="/img/post/logo.png" alt="Workflow">
        </a>
          <div class="hidden sm:block sm:ml-6">
            <div class="flex space-x-4">
              <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->{{--
              <a href="#" class="bg-gray-900 text-white px-3 py-2 rounded-md text-sm font-medium" aria-current="page">Dashboard</a> --}}

        {{-- Recorremos con un ForEach el array creado previamente con las atributos de los campos de la barra de navegación --}}
              @foreach ($nav_links as $nav_link)
              <a href="{{$nav_link['route']}}" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">{{$nav_link['name']}}</a>

              @endforeach
            </div>
          </div>
        </div>



        <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">

          {{-- Boton Notificacion --}}
           {{--  <button type="button" class="bg-gray-800 p-1 rounded-full text-gray-400 hover:text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white">
            <span class="sr-only">View notifications</span>
            <!-- Heroicon name: outline/bell -->
            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
            </svg>
          </button> --}}
          <div>
            <a href="{{url('/locale/es')}}">
                <img src="/img/lang/spn.png" class="object-scale-down h-10 w-10" alt=""/>
            </a>
         </div>
         <div>
            <a href="{{url('/locale/gl')}}">
                <img src="/img/lang/gz.png" class="rounded-full object-scale-down h-8 w-8" alt=""/>
            </a>
         </div>
         <div>
            <a href="{{url('/locale/uk')}}">
                <img src="/img/lang/uk.png" class="rounded-full object-scale-down h-8 w-8" alt=""/>
            </a>
         </div>
         @auth
          <!-- Profile dropdown -->
          {{-- Añadimos el evento Alpine on Click para cambiar el valor de la variable Open de la etiqueta x-data --}}
          <div x-on:click="open = true"  class="ml-3 relative" x-data="{ open: false}">
            <div>
              <button type="button" class="bg-gray-800 flex text-sm rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                {{-- <span class="sr-only">Open user menu</span> --}}
                {{-- Mediante el metodo Auth-> propiedad User() -> profile_phot_url accedemos a la url de la foto de perfil de usuario, que se mostrará en el acceso
                    al menú de usuario --}}
                <img class="h-8 w-8 rounded-full" src="{{auth()->user()->profile_photo_url}}" alt="">
              </button>
            </div>

            {{--
            Usando los metodos de Alpine hacemos que cambie el valor de la variable Open:
            x-Show = Mostrará el contenido del Div cuando la variable pase a true:
            x-on:click.away = La variable open pasará a false cuando se haga click en cualquier otro lado de la pantalla --}}
            <div x-show="open" x-on:click.away="open = false" class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
              <!-- Active: "bg-gray-100", Not Active: "" -->
              <x-jet-dropdown-link href="{{ route('profile.show') }}">
                {{ __('Perfil') }}
            </x-jet-dropdown-link>

            @if (Auth::user()->rol == 'comercial' || Auth::user()->rol == 'admin')
            <x-jet-dropdown-link href="{{ route('web.nodos.create') }}">
                {{ __('Añadir Noticia') }}
            </x-jet-dropdown-link>
            @endif
            @if (Auth::user()->rol == 'comercial' || Auth::user()->rol == 'admin')
            <x-jet-dropdown-link href="{{ route('web.admin.list') }}">
                {{ __('Listar Noticias') }}
            </x-jet-dropdown-link>
            @endif
            @if (Auth::user()->rol == 'admin')
            <x-jet-dropdown-link href="{{ route('admin.users.index') }}">
                {{ __('Control Usuarios') }}
            </x-jet-dropdown-link>
            @endif
            @if (Auth::user()->rol == 'empleado' || Auth::user()->rol == 'admin')
            <x-jet-dropdown-link href="{{ route('web.clientes.index') }}">
                {{ __('Gestion') }}
            </x-jet-dropdown-link>
            @endif


              <form method="POST" action="{{ route('logout') }}">
                @csrf
                <x-jet-responsive-nav-link href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                this.closest('form').submit();">
                    {{ __('Salir') }}
                </x-jet-responsive-nav-link>
            </form>

            </div>
          </div>

        </div>
        @else
        <a href="{{route('login')}}" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Login</a>
        <a href="{{route('register')}}" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Registro</a>

        @endauth
      </div>
    </div>

    <!-- Mobile menu, show/hide based on menu state. -->
    <div class="sm:hidden" id="mobile-menu" x-show="open" x-on:click.away = "open = false">
      <div class="px-2 pt-2 pb-3 space-y-1">


        <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
        {{-- <a href="#" class="bg-gray-900 text-white block px-3 py-2 rounded-md text-base font-medium" aria-current="page">Dashboard</a> --}}
        @foreach ($nav_links as $nav_link)
        <a href="{{$nav_link['route']}}" class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">{{$nav_link['name']}}</a>
        @endforeach
      </div>
    </div>
  </nav>

