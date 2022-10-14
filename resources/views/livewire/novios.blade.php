<div >

    <form wire:submit.prevent="saveChanges" method="POST" >
        @csrf
        <div class="flex flex-col md:flex-row justify-center">

            <div class="m-5">
                <h2 class="font-bold text-xl">DATOS DE LA NOVIA</h2>
                <div class="m-4">
                    <label for="novia" class="block mb-1 font-semibold text-gray-700">
                        NOMBRE
                    </label>
                    <div class="relative flex flex-col w-full">
                        <input type="text" wire:model="novia" placeholder="NOMBRE">
                        @error('novia') <span
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
                <div class="m-4">
                    <label for="noviaemail" class="block mb-1 font-bold text-gray-700">
                        EMAIL
                    </label>
                    <div class="relative flex flex-col w-full">
                        <input type="text" wire:model="noviaemail" placeholder="email">
                        @error('noviaemail') <span
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
                <div class="m-4">
                    <label for="noviaphone" class="block mb-1 font-bold text-gray-700">
                        TELÉFONO
                    </label>
                    <div class="relative flex flex-col w-full">
                        <input type="text" wire:model="noviaphone" placeholder="Teléfono">
                        @error('noviaphone') <span
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
            </div>
            <div class="m-5">
                <h2 class="font-bold text-xl">DATOS DEL NOVIO</h2>
                <div class="m-4">
                    <label for="novio" class="block mb-1 font-semibold text-gray-700">
                        NOMBRE
                    </label>
                    <div class="relative flex flex-col w-full">
                        <input type="text" wire:model="novio" placeholder="NOMBRE">
                        @error('novio') <span
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
                <div class="m-4">
                    <label for="novioemail" class="block mb-1 font-bold text-gray-700">
                        EMAIL
                    </label>
                    <div class="relative flex flex-col w-full">
                        <input type="text" wire:model="novioemail" placeholder="email">
                        @error('novioemail') <span
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
                <div class="m-4">
                    <label for="noviophone" class="block mb-1 font-bold text-gray-700">
                        TELÉFONO
                    </label>
                    <div class="relative flex flex-col w-full">
                        <input type="text" wire:model="noviophone" placeholder="Teléfono">
                        @error('noviophone') <span
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
            </div>

        </div>
        <button type="submit"
            class="w-full px-4 py-2 font-bold text-white bg-green-900 rounded-lg hover:bg-green-700">
            Guardar Cambios
        </button>
    </form>
</div>
