<x-gallery-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Team Settings') }}
        </h2>
    </x-slot>
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
        <div class="flex flex-col items-center py-4 xl:w-full justify-self-start">
            <h1 class="m-2 text-lg font-bold leading-none text-green-900 xl:text-3xl font-abhaya-libre">
                EL PLAN PARA EL FIN DE SEMANA
            </h1>
            <p class="my-4 text-lg text-gray-900">
                El día 13 de Agosto es sábado y el lunes día 15 es festivo.
            </p>
            <p class="my-4 text-lg text-gray-900">
                La noche del 13 al 14, obvio, nos quedamos todos a dormir en el Hostal Rural.
            </p>
            <p class="my-4 text-lg text-gray-900">
                Teneis la opción de pasar la noche del 14 al 15 en el Hostal, tomando el sol, el fresco o lo que queraís.
            </p>
            <p class="my-4 text-lg text-gray-900">
                Poneros en contacto con el Hostal vosotros directamente o si quereís os lo gestionamos nosotros. It´s up to you.
            </p>
            <p class="my-4 text-lg text-gray-900">
                El Hostal tiene piscina y esperemos que el tiempo acompañe y podamos darnos un bañito ya el mismo sábado por la mañana ;-))
            </p>
            <p class="my-4 text-lg text-gray-900">
                También podeis llegar el sábado 13 por la mañana y comer en el Hostal, no hay problema.
            </p>
            {{-- <div class="flex flex-col justify-center min-h-screen py-6 bg-gray-100 sm:py-12"> --}}
                {{-- <div class="relative py-3 sm:max-w-xl sm:mx-auto"> --}}
                    <a href="#" class="max-w-sm text-2xl font-bold leading-tight font-display">
                        <span class="text-black link link-underline link-underline-black">Hostal Rural Mas Blanc</span>
                    </a>
                {{-- </div> --}}
            {{-- </div> --}}
            {{-- <h3 class="p-4 bg-green-400 rounded-lg cursor-pointer">
                <a href="https://hostalruralmasblanc.com/es/" target="blank" class="p-4 m-4 text-lg font-bold leading-none text-gray-300 uppercase xl:text-xl font-abhaya-libre">
                    hostal rural mas blanc
                </a>
            </h3> --}}
            <p class="my-4 text-lg text-gray-900 lowercase">
                OS DEJAMOS TAMBIÉN EL ENLACE DEL SITIO POR SI QUEREIS ECHARLE UN VISTAZO
            </p>
            <h5 class="font-bold leading-none text-green-900 xl:text-lg font-abhaya-libre">
               Y AQUÍ TENÉIS UNAS FOTOS DEL SITIO, A NOSOTROS NOS GUSTÓ Y MUCHO
            </h5>
            @livewire('masia-photo-show')
        </div>
        <style>
            .link-underline {
                border-bottom-width: 0;
                background-image: linear-gradient(transparent, transparent), linear-gradient(#fff, #fff);
                background-size: 0 3px;
                background-position: 0 100%;
                background-repeat: no-repeat;
                transition: background-size .5s ease-in-out;
            }

            .link-underline-black {
                background-image: linear-gradient(transparent, transparent), linear-gradient(rgb(16, 145, 54), rgb(44, 228, 27))
            }

            .link-underline:hover {
                background-size: 100% 3px;
                background-position: 0 100%
            }
        </style>
</x-gallery-layout>
