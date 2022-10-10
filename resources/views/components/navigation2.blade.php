<!-- This example requires Tailwind CSS v2.0+ -->
@auth
    <header class="absolute top-0 right-0 z-20 items-center justify-center w-full p-2" id="header-fotos">
        <nav class="">
            <div class="px-2 mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="relative flex items-center justify-center h-32">
                    <!-- Mobile menu, show/hide based on menu state. -->
                    <div class="mr-3 lg:hidden" id="mobile-menu">
                        {{-- <div class="px-2 pt-2 pb-3 space-y-1"> --}}
                        <x-jet-dropdown align="left" width="48">
                            <x-slot name="trigger">
                                <!-- Mobile menu button-->
                                <button type="button"
                                    class="inline-flex items-center justify-center p-2 text-gray-400 rounded-md hover:text-white hover:bg-gray-500 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white"
                                    aria-controls="mobile-menu" aria-expanded="false">
                                    <span class="sr-only">Open main menu</span>
                                    <img class="hidden w-auto cursor-pointer lg:block rounded-xl"
                                        src="{{ asset('img/OLGAPACOLOGO50x50.png') }}" alt="Olga&Paco">
                                    <div class="block w-auto cursor-pointer lg:hidden rounded-xl">
                                        <span class="p-1 text-xs text-white bg-green-600 rounded ">Menu</span>
                                        <svg class="block w-6 h-6 p-2 m-2 bg-green-600 rounded"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M4 6h16M4 12h16M4 18h16" />
                                        </svg>
                                    </div>
                                    <!--
                                            Icon when menu is closed.
                                            Heroicon name: outline/menu
                                            Menu open: "hidden", Menu closed: "block"
                                            -->
                                    {{-- <svg class="block w-6 h-6 p-2 m-2 bg-green-600 rounded" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M4 6h16M4 12h16M4 18h16" />
                                    </svg> --}}
                                    <!--
                                            Icon when menu is open.
                                            Heroicon name: outline/x
                                            Menu open: "block", Menu closed: "hidden"
                                            -->
                                    {{-- <svg class="hidden w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M6 18L18 6M6 6l12 12" />
                                    </svg> --}}
                                </button>
                            </x-slot>
                            <x-slot name="content" class="text-xs">
                                <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                                <a href="{{ route('dashboard') }}"
                                    class="block px-3 py-2 my-2 text-xs text-green-200 bg-gray-600 rounded-md hover:bg-gray-900">
                                    CONFIRMAR ASISTENCIAs
                                </a>
                                <a href="{{ route('mapa') }}"
                                    class="block px-3 py-2 my-2 text-xs text-green-200 bg-gray-600 rounded-md hover:underline">
                                    MAPA
                                </a>
                                <a href="{{ route('elmenu') }}"
                                    class="block px-3 py-2 my-2 text-xs text-green-200 bg-gray-600 rounded-md hover:bg-gray-900">
                                    EL MENÚ
                                </a>
                                <a href="{{ route('cancions') }}"
                                    class="block px-3 py-2 my-2 text-xs text-green-200 bg-gray-600 rounded-md hover:bg-gray-900">
                                    CANCIONES
                                </a>
                                <a href="{{ route('galeria') }}"
                                    class="block px-3 py-2 my-2 text-xs text-green-200 bg-gray-600 rounded-md hover:bg-gray-900">
                                    GALERÍA
                                </a>
                                <a href="{{ route('elplan') }}"
                                    class="block px-3 py-2 my-2 text-xs text-green-200 bg-gray-600 rounded-md hover:bg-gray-900">
                                    EL PLAN
                                </a>
                                @if (auth()->user()->is_admin)
                                    <div class="px-3 py-2 my-2 bg-green-200 rounded-md hover:bg-green-800">
                                        <a class="inline-block text-xs text-gray-600 no-underline rounded-md hover:text-gray-200 hover:underline"
                                            href="{{ route('usuarios') }}">
                                            USUARIOS
                                        </a>
                                    </div>
                                    <div class="px-3 py-2 my-2 bg-green-200 rounded-md hover:bg-green-800">
                                        <a class="inline-block text-xs text-gray-600 no-underline rounded-md hover:text-gray-200 hover:underline"
                                            href="{{ route('habitacions') }}">
                                            HABITACIONES
                                        </a>
                                    </div>
                                    <div class="px-3 py-2 my-2 bg-green-200 rounded-md hover:bg-green-800">
                                        <a class="inline-block text-xs text-gray-600 no-underline rounded-md hover:text-gray-200 hover:underline"
                                            href="{{ route('presupuesto') }}">
                                            PRESUPUESTO
                                        </a>
                                    </div>
                                    <div class="px-3 py-2 my-2 bg-green-200 rounded-md hover:bg-green-800">
                                        <a class="inline-block text-xs text-gray-600 no-underline rounded-md hover:text-gray-200 hover:underline"
                                            href="{{ route('todos') }}">
                                            COSAS PENDIENTES
                                        </a>
                                    </div>
                                    <div class="px-3 py-2 my-2 bg-green-200 rounded-md hover:bg-green-800">
                                        <a class="inline-block text-xs text-gray-600 no-underline rounded-md hover:text-gray-200 hover:underline"
                                            href="{{ route('clearcache') }}">
                                            CLEAR CACHE
                                        </a>
                                    </div>
                                    <div class="px-3 py-2 my-2 bg-green-200 rounded-md hover:bg-green-800">
                                        <a class="inline-block text-xs text-gray-600 no-underline rounded-md hover:text-gray-200 hover:underline"
                                            href="{{ route('changeInvitation') }}">
                                            CAMBIAR INVITACIÓN
                                        </a>
                                    </div>
                                @endif
                            </x-slot>
                        </x-jet-dropdown>
                        {{-- </div> --}}
                    </div>
                    <div class="flex-grow w-full lg:flex lg:items-center lg:w-auto" {{-- :class="{ 'block shadow-3xl': isOpen, 'hidden': !isOpen }" @click.away="isOpen = false" --}}
                        x-show.transition="true">
                        <div class="flex items-center justify-center flex-1 sm:items-stretch sm:justify-start">
                            <div class="flex items-center flex-shrink-0">
                                {{-- <img class="block w-auto h-8 lg:hidden" src="{{ asset('img/OLGAPACOLOGO.png')}}"
                                alt="Olga&Paco"> --}}
                                <img class="hidden w-auto lg:block rounded-xl"
                                    src="{{ asset('img/OLGAPACOLOGO50x50.png') }}" alt="Workflow">
                            </div>
                            <div class="hidden lg:flex sm:ml-6">
                                <div class="flex space-x-4">
                                    <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                                    <ul class="items-center justify-end flex-1 pt-6 text-xs lg:pt-4 list-reset lg:flex">
                                        <li class="mr-3 bg-green-600 rounded-md hover:bg-green-800">
                                            <a class="inline-block px-4 py-2 text-gray-200 no-underline hover:text-gray-200 hover:underline"
                                                href="{{ route('dashboard') }}" {{-- @click="isOpen = false" --}}>
                                                CONFIRMAR ASISTENCIA
                                            </a>
                                        </li>
                                        <li class="mr-3 bg-green-600 rounded-md hover:bg-green-800">
                                            <a class="inline-block px-4 py-2 text-gray-100 no-underline hover:text-gray-200 hover:underline"
                                                href="{{ route('mapa') }}" {{-- @click="isOpen = false" --}}>
                                                DONDE
                                            </a>
                                        </li>
                                        <li class="mr-3 bg-green-600 rounded-md hover:bg-green-800">
                                            <a class="inline-block px-4 py-2 text-gray-100 no-underline hover:text-gray-200 hover:underline"
                                                href="{{ route('elmenu') }}" {{-- @click="isOpen = false" --}}>
                                                EL MENÚ
                                            </a>
                                        </li>
                                        <li class="mr-3 bg-green-600 rounded-md hover:bg-green-800">
                                            <a class="inline-block px-4 py-2 text-gray-100 no-underline hover:text-gray-200 hover:underline"
                                                href="{{ route('cancions') }}" {{-- @click="isOpen = false" --}}>
                                                CANCIONES
                                            </a>
                                        </li>
                                        <li class="mr-3 bg-green-600 rounded-md hover:bg-green-800">
                                            <a class="inline-block px-4 py-2 text-gray-100 no-underline hover:text-gray-200 hover:underline"
                                                href="{{ route('galeria') }}" {{-- @click="isOpen = false" --}}>
                                                GALERÍA
                                            </a>
                                        </li>
                                        <li class="mr-3 bg-green-600 rounded-md hover:bg-green-800">
                                            <a class="inline-block px-4 py-2 text-gray-100 no-underline hover:text-gray-200 hover:underline"
                                                href="{{ route('elplan') }}" {{-- @click="isOpen = false" --}}>
                                                EL PLAN!!!
                                            </a>
                                        </li>
                                        @if (auth()->user()->is_admin)
                                            <x-jet-dropdown align="right" width="48">
                                                <x-slot name="trigger">
                                                    @auth
                                                        <span class="inline-flex rounded-md">
                                                            <button type="button"
                                                                class="inline-flex items-center px-3 py-2 text-sm font-medium leading-4 text-green-600 transition bg-white border border-transparent rounded-md hover:text-gray-700 focus:outline-none">
                                                                PANEL DE CONTROL
                                                                <svg class="ml-2 -mr-0.5 h-4 w-4"
                                                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                                    fill="currentColor">
                                                                    <path fill-rule="evenodd"
                                                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                                        clip-rule="evenodd" />
                                                                </svg>
                                                            </button>
                                                        </span>

                                                    @endauth
                                                </x-slot>
                                                <x-slot name="content" class="bg-indigo-400">
                                                    <!-- Account Management -->
                                                    <div class="block px-4 py-2 text-xs text-gray-600">
                                                        {{ __('ONLY ADMINS') }}
                                                    </div>

                                                    <x-jet-dropdown-link href="{{ route('novios') }}">
                                                        {{ __('NOVIOS') }}
                                                    </x-jet-dropdown-link>

                                                    <x-jet-dropdown-link href="{{ route('usuarios') }}">
                                                        {{ __('INVITADOS') }}
                                                    </x-jet-dropdown-link>

                                                    <x-jet-dropdown-link href="{{ route('habitacions') }}">
                                                        {{ __('HABITACIONS') }}
                                                    </x-jet-dropdown-link>

                                                    <x-jet-dropdown-link href="{{ route('presupuesto') }}">
                                                        {{ __('PRESUPUESTO') }}
                                                    </x-jet-dropdown-link>

                                                    <x-jet-dropdown-link href="{{ route('todos') }}">
                                                        {{ __('COSAS PENDIENTES') }}
                                                    </x-jet-dropdown-link>

                                                    <x-jet-dropdown-link href="{{ route('clearcache') }}">
                                                        {{ __('Clear cache') }}
                                                    </x-jet-dropdown-link>

                                                    <x-jet-dropdown-link href="{{ route('changeInvitation') }}">
                                                        {{ __('CAMBIAR INVITACIÓN') }}
                                                    </x-jet-dropdown-link>

                                                    <div class="border-t border-gray-100"></div>

                                                    <!-- Authentication -->

                                                </x-slot>
                                            </x-jet-dropdown>
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
