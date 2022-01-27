<!-- This example requires Tailwind CSS v2.0+ -->
@auth
<header class="absolute top-6 right-0 z-20 justify-center items-center w-full p-2" id="header-fotos">
    <nav class="">
        <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
            <div class="relative flex items-center justify-center h-32">
                <!-- Mobile menu, show/hide based on menu state. -->
                <div class="lg:hidden mr-3" id="mobile-menu">
                    {{-- <div class="px-2 pt-2 pb-3 space-y-1"> --}}
                        <x-jet-dropdown align="left" width="48">
                            <x-slot name="trigger">
                                <!-- Mobile menu button-->
                                {{-- <button type="button"
                                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-gray-500 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white"
                                    aria-controls="mobile-menu" aria-expanded="false">
                                    <span class="sr-only">Open main menu</span>
                                    <img class="block rounded-xl w-auto cursor-pointer"
                                            src="{{ asset('img/OLGAPACOLOGO50x50.png')}}"
                                            alt="Olga&Paco">
                                </button> --}}
                            </x-slot>
                            <x-slot name="content">
                                @if (auth()->user()->is_admin)
                                <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                                <a href="{{ route('usuarios')}}"
                                    class="bg-gray-600 hover:bg-gray-900 text-green-200 block px-3 py-2 my-2 rounded-md text-base font-medium">
                                    INVITADOS
                                </a>
                                <a href="{{ route('presupuesto')}}"
                                    class="bg-gray-600 hover:underline text-green-200 block px-3 py-2 my-2 rounded-md text-base font-medium">
                                    PRESUPUESTO
                                </a>

                                    {{-- <div class="my-2 px-3 py-2 bg-green-200 rounded-md hover:bg-green-800">
                                        <a class="inline-block text-gray-600 no-underline hover:text-gray-200 hover:underline rounded-md text-base font-medium"
                                            href="{{ route('usuarios')}}">
                                            PANEL DE CONTROL
                                        </a>
                                    </div> --}}
                                @endif
                            </x-slot>
                        </x-jet-dropdown>
                        {{--
                    </div> --}}
                </div>
                <div class="flex-grow w-full lg:flex lg:items-center lg:w-auto mt-16"
                    :class="{ 'block shadow-3xl' }">
                    <div class="flex-1 flex items-center justify-center sm:items-stretch sm:justify-center">
                        <div class="hidden lg:flex sm:ml-6">
                            <div class="flex space-x-4">
                                @if (auth()->user()->is_admin)
                                    <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                                    <ul class="items-center justify-end flex-1 pt-6 lg:pt-4 list-reset lg:flex text-sm">
                                        <li class="mr-3 bg-orange-600 rounded-md hover:bg-green-800">
                                            <a class="inline-block px-4 py-2 text-gray-200 no-underline hover:text-gray-200 hover:underline"
                                                href="{{ route('usuarios')}}">INVITADOS
                                            </a>
                                        </li>
                                        <li class="mr-3 bg-orange-600 rounded-md hover:bg-green-800">
                                            <a class="inline-block px-4 py-2 text-gray-100 no-underline hover:text-gray-200 hover:underline"
                                                href="{{ route('presupuesto')}}">PRESUPUESTO
                                            </a>
                                        </li>
                                    </ul>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</header>
@endauth
