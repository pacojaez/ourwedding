<header class="absolute top-0 right-0 z-20 flex items-center h-24 sm:h-32">
    <div class="container flex items-center justify-end px-6 mx-auto sm:px-12">
        <nav class="container relative z-20 flex flex-col items-center px-6 mx-auto sm:px-12 lg:flex-row"
            x-data="{ isOpen: false }" @keydown.escape="isOpen = false"
            :class="{ 'shadow-lg bg-white-200' : isOpen , 'bg-green-100' : !isOpen}">

            <!--Toggle button (hidden on large screens)-->
            <button @click="isOpen = !isOpen" type="button"
                class="block px-2 text-gray-500 lg:hidden hover:text-white focus:outline-none focus:text-white"
                :class="{ 'transition transform-180': isOpen }">
                <svg class="w-6 h-6 fill-current" xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 24 24">
                    <path x-show="isOpen" fill-rule="evenodd" clip-rule="evenodd"
                        d="M18.278 16.864a1 1 0 0 1-1.414 1.414l-4.829-4.828-4.828 4.828a1 1 0 0 1-1.414-1.414l4.828-4.829-4.828-4.828a1 1 0 0 1 1.414-1.414l4.829 4.828 4.828-4.828a1 1 0 1 1 1.414 1.414l-4.828 4.829 4.828 4.828z" />
                    <path x-show="!isOpen" fill-rule="evenodd"
                        d="M4 5h16a1 1 0 0 1 0 2H4a1 1 0 1 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2z" />
                </svg>
            </button>

            <!--Menu-->
            @auth
                <div class="flex-grow w-full lg:flex lg:items-center lg:w-auto"
                    :class="{ 'block shadow-3xl': isOpen, 'hidden': !isOpen }" @click.away="isOpen = false"
                    x-show.transition="true">
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
                            <a class="inline-block px-4 py-2 text-gray-100 no-underline hover:text-gray-200 hover:underline"
                                href="{{ route('usuarios')}}" @click="isOpen = false">PANEL DE CONTROL
                            </a>
                        </li>
                        @endif

                        <li class="mr-3 bg-green-800">
                            <x-jet-dropdown align="right" width="48">
                                <x-slot name="trigger">
                                    @auth
                                    <span class="inline-flex rounded-md">
                                        <button type="button"
                                            class="inline-flex items-center px-3 py-2 text-sm font-medium leading-4 text-green-600 transition bg-white border border-transparent rounded-md hover:text-gray-700 focus:outline-none">
                                            Holaaa {{ Auth::user()->name }}
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
                        </li>


                    </ul>
                </div>
            @endauth
        </nav>
    </div>
</header>
