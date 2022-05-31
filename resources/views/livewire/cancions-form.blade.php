<div class="flex flex-col items-center w-full min-h-screen antialiased sans-serif">
    <div class="w-full max-w-full px-4 pt-4 pb-8 mx-auto overflow-hidden">
        <div x-data="{ loading: false, showAlertMessage: false, showSuccessMessage: false, title: '', author: '', errors: [] }"
            x-cloak>
            <div class="md:flex md:flex-wrap">
                <div class="md:w-full md:mx-auto">
                    <div class="p-6 bg-white border-t-8 border-green-900 rounded shadow opacity-100">
                        <div class="flex flex-col items-center w-full py-4">
                            @if (session()->has('message'))
                            <div class="flex p-4 mb-4 text-lg text-green-800 bg-green-100 rounded-lg" role="alert"
                                x-data="{ show: true }" x-show="show"
                                x-show.transition.opacity.out.duration.1500ms="show"
                                x-show.transition:enter.duration.500ms x-show.transition:leave.duration.1000ms x-init="setTimeout(function(){
                                    show= false
                                }, 3000)">
                                <svg class="inline w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                <div>
                                    <span class="font-medium">Hecho!</span> {{ session('message') }}
                                </div>
                            </div>
                            @endif
                            <h1 class="mb-1 text-2xl font-bold leading-tight text-gray-800">Mandanos tus sugerencias
                            </h1>
                            <p class="mb-4 text-lg text-gray-600">Rellena este formulario con las canciones que quieres
                                añadir</p>
                            {{-- <p
                                class="m-2 text-sm font-bold leading-none text-green-900 xl:text-lg font-abhaya-libre">
                                Rellena este formulario con las canciones que quieres añadir
                            </p> --}}
                            <form wire:submit.prevent="saveCancion">
                                @csrf
                                <div class="mb-4">
                                    <label for="title" class="block mb-1 font-bold text-gray-700">
                                        Título de la canción
                                    </label>
                                    <div class="relative flex flex-col w-full">
                                        <input type="text" wire:model="title">
                                        @error('title') <span
                                            class="p-4 my-4 text-orange-700 bg-orange-100 border-l-4 border-orange-500"
                                            x-transition:enter="transition ease-out duration-300"
                                            x-transition:enter-start="opacity-0 transform scale-90"
                                            x-transition:enter-end="opacity-100 transform scale-100"
                                            x-transition:leave="transition ease-in duration-300"
                                            x-transition:leave-start="opacity-100 transform scale-100"
                                            x-transition:leave-end="opacity-0 transform scale-90">
                                            {{ $message }}
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <label for="author" class="block mb-1 font-bold text-gray-700">Autor o
                                        Intérprete
                                    </label>
                                    <div class="relative flex flex-col">
                                        <input type="text" wire:model="author">
                                        @error('author') <span
                                            class="p-4 my-4 text-orange-700 bg-orange-100 border-l-4 border-orange-500"
                                            x-transition:enter="transition ease-out duration-300">
                                            {{ $message }}
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <label for="style" class="block mb-1 font-bold text-gray-700">
                                        Estilo
                                    </label>
                                    <div class="relative flex flex-col w-full">
                                        <input type="text" wire:model="style">
                                        @error('style') <span
                                            class="p-4 my-4 text-orange-700 bg-orange-100 border-l-4 border-orange-500"
                                            x-transition:enter="transition ease-out duration-300"
                                            x-transition:enter-start="opacity-0 transform scale-90"
                                            x-transition:enter-end="opacity-100 transform scale-100"
                                            x-transition:leave="transition ease-in duration-300"
                                            x-transition:leave-start="opacity-100 transform scale-100"
                                            x-transition:leave-end="opacity-0 transform scale-90">
                                            {{ $message }}
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <button type="submit"
                                    class="w-full px-4 py-2 font-bold text-white bg-green-900 rounded-lg hover:bg-green-700">
                                    Guardar Cancion
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="w-full max-w-full px-4 pt-4 pb-8 mx-auto overflow-hidden">
            @livewire('all-cancions')
        </div>
    </div>
