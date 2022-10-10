<x-app-layout>
    <x-slot name="header">
        {{-- <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Team Settings') }}
        </h2> --}}
    </x-slot>
    {{-- <x-slot name="content"> --}}
    <div class="flex flex-col items-center justify-center py-2 sm:w-5/6 xl:w-full">
        <h2 class="text-2xl font-bold leading-none text-green-900 lg:text-4xl font-abhaya-libre">
            ENS CASEM!!!!
        </h2>
        <h1 class="mb-4 text-3xl font-bold leading-none text-purple-900 lg:text-6xl font-dancing">
           ¡{{ $novia->name }} + {{ $novio->name }}!
        </h1>
        <h2 class="mb-4 text-2xl font-bold leading-none text-green-900 lg:text-4xl font-abhaya-libre">
            NOS CASAMOS!!!!
        </h2>
        <p class="p-2 mb-0 text-center text-gray-700 xl:text-lg font-alegraya-sans">
            Si has recibido un mail con un usuario y una contraseña, accede al login donde podrás ver toda la info de la boda....
        </p>
        <a href="{{ route('login')}}"
            class="p-2 text-center text-white uppercase bg-green-900 rounded-full shadow-lg font-montserrat sm:font-xl sm:py-4 sm:px-8 hover:bg-green-800 sm:mt-16">
            LOGIN
        </a>
    </div>
{{-- </x-slot> --}}
</x-app-layout>
