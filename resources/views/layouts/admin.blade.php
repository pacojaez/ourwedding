<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Our Weeding</title>
    {{-- <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet" /> --}}
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/animationsvg.css') }}">
    <link href="https://tailwindcomponents.com/css/component.nature.css" rel="stylesheet">

    @livewireStyles
    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
    </style>

    <link
        href="https://fonts.googleapis.com/css?family=Abhaya+Libre:400,800|Montserrat:600|Alegreya+Sans:500&display=swap"
        rel="stylesheet" />

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>

    <!-- ANIME -->
    <script src="{{ asset('js/anime.min.js')}}"></script>

</head>

<body class="overflow-x-hidden">
    @livewire('cuenta-atras')
    {{-- @include('components.navigation') --}}
    <div class="flex flex-row items-center justify-center w-full">
        @include('components.navigation2')
        <!--Container for content-->
        <div class="container h-full m-auto bg-green-300">
            <div class="flex items-center justify-center h-screen overflow-hidden" style="background: #0f4479;">
                <main class="absolute w-full h-full bg-white font-abhaya-libre">
                    <div class="container relative flex flex-col items-center px-6 mx-auto sm:px-12 sm:flex-row">
                        <div class="items-center justify-between block w-full py-32 lg:flex">
                            <div class="lg:w-full">
                                <div class="flex flex-col md:flex-row justify-between">
                                    <h2 class="items-center text-xl font-semibold leading-tight text-gray-800">Panel de Control de invitados y Presupuesto</h2>
                                    <ul class="items-center justify-end flex-1 pt-6 lg:pt-4 list-reset lg:flex">
                                        <li class="mr-3 my-3 bg-blue-600 rounded-md">
                                            <a class="inline-block px-4 py-2 text-gray-100 no-underline hover:text-gray-200 hover:underline"
                                                href="{{ route('usuarios')}}" @click="isOpen = false">INVITADOS
                                            </a>
                                        </li>
                                        <li class="mr-3 my-3 bg-blue-600 rounded-md">
                                            <a class="inline-block px-4 py-2 text-gray-100 no-underline hover:text-gray-200 hover:underline"
                                                href="{{ route('presupuesto')}}" @click="isOpen = false">PRESUPUESTO
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                {{ $slot }}
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
    </div>
    <!-- Alpine v3 -->
    @livewireScripts    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

    @stack('scripts')
</body>

</html>
