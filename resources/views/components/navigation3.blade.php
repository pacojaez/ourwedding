<!-- This example requires Tailwind CSS v2.0+ -->
@auth
<header class="absolute top-0 right-0 z-20 justify-center items-center w-full p-2" id="header-fotos">
    <nav class="">
        <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
            <div class="relative flex items-center justify-center h-32">
                <!-- Mobile menu, show/hide based on menu state. -->
                <div class="lg:hidden mr-3" id="mobile-menu">
                    {{-- <div class="px-2 pt-2 pb-3 space-y-1"> --}}
                        <x-jet-dropdown align="left" width="48">
                            <x-slot name="trigger">
                                <!-- Mobile menu button-->
                                <button type="button"
                                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-gray-500 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white"
                                    aria-controls="mobile-menu" aria-expanded="false">
                                    <span class="sr-only">Open main menu</span>
                                    <img class="block rounded-xl w-auto cursor-pointer"
                                            src="{{ asset('img/OLGAPACOLOGO50x50.png')}}"
                                            alt="Olga&Paco">
                                    <!--
                                Icon when menu is closed.
                                Heroicon name: outline/menu
                                Menu open: "hidden", Menu closed: "block"
                                -->
                                    {{-- <svg class="block h-6 w-6 bg-green-600 rounded p-2 m-2" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M4 6h16M4 12h16M4 18h16" />
                                    </svg> --}}
                                    <!--
                                Icon when menu is open.
                                Heroicon name: outline/x
                                Menu open: "block", Menu closed: "hidden"
                                -->
                                    {{-- <svg class="hidden h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M6 18L18 6M6 6l12 12" />
                                    </svg> --}}
                                </button>
                            </x-slot>
                            <x-slot name="content">
                                <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                                <a href="{{ route('dashboard')}}"
                                    class="bg-gray-600 hover:bg-gray-900 text-green-200 block px-3 py-2 my-2 rounded-md text-base font-medium">
                                    CONFIRMAR ASISTENCIA
                                </a>
                                <a href="{{ route('mapa')}}"
                                    class="bg-gray-600 hover:underline text-green-200 block px-3 py-2 my-2 rounded-md text-base font-medium">
                                    MAPA
                                </a>
                                <a href="{{ route('elmenu')}}"
                                    class="bg-gray-600 hover:bg-gray-900 text-green-200 block px-3 py-2 my-2 rounded-md text-base font-medium">
                                    EL MENÚ
                                </a>
                                <a href="{{ route('cancions')}}"
                                    class="bg-gray-600 hover:bg-gray-900 text-green-200 block px-3 py-2 my-2 rounded-md text-base font-medium">
                                    CANCIONES
                                </a>
                                <a href="{{ route('galeria')}}"
                                    class="bg-gray-600 hover:bg-gray-900 text-green-200 block px-3 py-2 my-2 rounded-md text-base font-medium">
                                    GALERÍA
                                </a>
                                <a href="{{ route('elplan')}}"
                                    class="bg-gray-600 hover:bg-gray-900 text-green-200 block px-3 py-2 my-2 rounded-md text-base font-medium">
                                    EL PLAN
                                </a>
                                @if (auth()->user()->is_admin)
                                    <div class="my-2 px-3 py-2 bg-green-200 rounded-md hover:bg-green-800">
                                        <a class="inline-block text-gray-600 no-underline hover:text-gray-200 hover:underline rounded-md text-base font-medium"
                                            href="{{ route('usuarios')}}">
                                            PANEL DE CONTROL
                                        </a>
                                    </div>
                                @endif
                            </x-slot>
                        </x-jet-dropdown>
                        {{--
                    </div> --}}
                </div>
                <div class="flex-grow w-full lg:flex lg:items-center lg:w-auto"
                    :class="{ 'block shadow-3xl': isOpen, 'hidden': !isOpen }" @click.away="isOpen = false">
                    <div class="flex-1 flex items-center justify-center sm:items-stretch sm:justify-start">
                        <div class="flex-shrink-0 flex items-center">
                            {{-- <img class="block lg:hidden h-8 w-auto" src="{{ asset('img/OLGAPACOLOGO.png')}}"
                                alt="Olga&Paco"> --}}
                            <img class="hidden lg:block rounded-xl w-auto" src="{{ asset('img/OLGAPACOLOGO50x50.png')}}"
                                alt="Workflow">
                        </div>
                        <div class="hidden lg:flex sm:ml-6">
                            <div class="flex space-x-4">
                                <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                                <ul class="items-center justify-end flex-1 pt-6 lg:pt-4 list-reset lg:flex text-sm">
                                    <li class="mr-3 bg-green-600 rounded-md hover:bg-green-800">
                                        <a class="inline-block px-4 py-2 text-gray-200 no-underline hover:text-gray-200 hover:underline"
                                            href="{{ route('dashboard')}}" @click="isOpen = false">CONFIRMAR ASISTENCIA
                                        </a>
                                    </li>
                                    <li class="mr-3 bg-green-600 rounded-md hover:bg-green-800">
                                        <a class="inline-block px-4 py-2 text-gray-100 no-underline hover:text-gray-200 hover:underline"
                                            href="{{ route('mapa')}}" @click="isOpen = false">DONDE
                                        </a>
                                    </li>
                                    <li class="mr-3 bg-green-600 rounded-md hover:bg-green-800">
                                        <a class="inline-block px-4 py-2 text-gray-100 no-underline hover:text-gray-200 hover:underline"
                                            href="{{ route('elmenu')}}" @click="isOpen = false">EL MENÚ
                                        </a>
                                    </li>
                                    <li class="mr-3 bg-green-600 rounded-md hover:bg-green-800">
                                        <a class="inline-block px-4 py-2 text-gray-100 no-underline hover:text-gray-200 hover:underline"
                                            href="{{ route('cancions')}}" @click="isOpen = false">CANCIONES
                                        </a>
                                    </li>
                                    <li class="mr-3 bg-green-600 rounded-md hover:bg-green-800">
                                        <a class="inline-block px-4 py-2 text-gray-100 no-underline hover:text-gray-200 hover:underline"
                                            href="{{ route('galeria')}}" @click="isOpen = false">GALERÍA
                                        </a>
                                    </li>
                                    <li class="mr-3 bg-green-600 rounded-md hover:bg-green-800">
                                        <a class="inline-block px-4 py-2 text-gray-100 no-underline hover:text-gray-200 hover:underline"
                                            href="{{ route('elplan')}}" @click="isOpen = false">EL PLAN!!!
                                        </a>
                                    </li>
                                    @if (auth()->user()->is_admin)
                                    <li class="mr-3 bg-green-600 rounded-md hover:bg-green-800">
                                        {{-- <a class="inline-block px-4 py-2 text-gray-100 no-underline hover:text-gray-200 hover:underline"
                                            href="{{ route('usuarios')}}" @click="isOpen = false">PANEL DE CONTROL
                                        </a> --}}
                                    </li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div
                        class="absolute inset-y-0 right-0 flex items-center pr-2 lg:static lg:inset-auto sm:ml-6 sm:pr-0">
                        <!-- Profile dropdown -->
                        <div class="mr-10">
                            <x-jet-dropdown align="right" width="48">
                                <x-slot name="trigger">
                                    @auth
                                    <span class="inline-flex rounded-md">
                                        <button type="button"
                                            class="inline-flex items-center px-3 py-2 text-sm font-medium leading-4 text-green-600 transition bg-white border border-transparent rounded-md hover:text-gray-700 focus:outline-none">
                                            Holaaa {{ Auth::user()->name }}
                                            <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </button>
                                    </span>

                                    @endauth
                                </x-slot>
                                <x-slot name="content">
                                    <!-- Account Management -->
                                    <div class="block px-4 py-2 text-xs text-gray-600">
                                        {{ __('Tu cuenta') }}
                                    </div>

                                    <x-jet-dropdown-link href="{{ route('profile.show') }}">
                                        {{ __('PERFIL') }}
                                    </x-jet-dropdown-link>

                                    @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                                    <x-jet-dropdown-link href="{{ route('api-tokens.index') }}">
                                        {{ __('API Tokens') }}
                                    </x-jet-dropdown-link>
                                    @endif

                                    <div class="border-t border-gray-100"></div>

                                    <!-- Authentication -->
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf

                                        <x-jet-dropdown-link href="{{ route('logout') }}" onclick="event.preventDefault();
                                                        this.closest('form').submit();">
                                            {{ __('SALIR') }}
                                        </x-jet-dropdown-link>
                                    </form>
                                </x-slot>
                            </x-jet-dropdown>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </nav>
</header>
@endauth
