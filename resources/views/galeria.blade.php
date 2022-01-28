<x-gallery-layout>
    <x-slot name="header">
        {{-- <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Team Settings') }}
        </h2> --}}
    </x-slot>
    @if (session()->has('message'))
        <div class="flex p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg" role="alert"
            x-data="{ show: true }"
            x-show="show"
            x-show.transition.opacity.out.duration.1500ms="show"
            x-show.transition:enter.duration.500ms
            x-show.transition:leave.duration.1000ms
            x-init="setTimeout(function(){
                show= false
            }, 3000)"
        >
            <svg class="inline w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
            <div>
                <span class="font-medium">Hecho!</span>  {{ session('message') }}
            </div>
        </div>
    @endif
    {{-- <x-slot name="content"> --}}
        <div class="flex flex-col items-center py-4 xl:w-full justify-self-start">
            <h2 class="m-2 text-lg font-bold leading-none text-green-900 uppercase xl:text-xl font-abhaya-libre">
                ¿Y si entre todos hacemos el álbum de fotos? Seguro que es divertido!!!!
            </h2>
            <h4 class="m-2 text-lg font-bold leading-none text-green-900 xl:text-xl font-abhaya-libre">
                Queremos que nuestras fotos de la boda sean hechas por vosotros.
            </h4>
            @livewire('photo-upload')
        </div>

        {{-- <div class="flex flex-row items-start py-24 xl:w-full sm:py-0 justify-self-start">            --}}
            @livewire('photo-show')
        {{-- </div> --}}

    {{-- </x-slot> --}}
</x-gallery-layout>
