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
            <p class="text-gray-900 text-lg my-4">
                El día 13 de Agosto es sábado y el lunes día 15 es festivo.
            </p>
            <p class="text-gray-900 text-lg my-4">
                La noche del 13 al 14, obvio, nos quedamos todos a dormir en el Hostal Rural.
            </p>
            <p class="text-gray-900 text-lg my-4">
                Teneis la opción de pasar la noche del 14 al 15 en el Hostal, tomando el sol, el fresco o lo que queraís.
            </p>
            <p class="text-gray-900 text-lg my-4">
                Poneros en contacto con el Hostal vosotros directamente o si quereís os lo gestionamos nosotros. It´s up to you.
            </p>
            <p class="text-gray-900 text-lg my-4">
                El Hostal tiene piscina y esperemos que el tiempo acompañe y podamos darnos un bañito ya el mismo sábado por la mañana (si a las chicas no les importa ir despeinadas ;-))
            </p>
            <p class="text-gray-900 text-lg my-4">
                También podeis llegar el sábado 13 por la mañana y comer en el Hostal, no hay problema.
            </p>
            <h5 class="font-bold leading-none text-green-900 xl:text-lg font-abhaya-libre">
                OS DEJAMOS UNAS FOTOS DEL SITIO, A NOSOTROS NOS GUSTÓ Y MUCHO
            </h5>
            @livewire('masia-photo-show')

            <h3 class="bg-gray-700 rounded-lg cursor-pointer">
                <a href="https://hostalruralmasblanc.com/es/" target="blank" class=" uppercase text-lg font-bold leading-none text-gray-300 xl:text-xl p-4 m-4 font-abhaya-libre">
                    hostal rural mas blanc
                </a>
            </h3>

            <h5 class="m-2 font-bold leading-none text-green-900 xl:text-lg font-abhaya-libre mb-20">
                OS DEJAMOS TAMBIÉN EL ENLACE DEL SITIO POR SI QUEREIS ECHARLE UN VISTAZO
            </h5>
        </div>
</x-gallery-layout>
