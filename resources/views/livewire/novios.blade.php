<div>
    <form wire:submit.prevent="saveChanges">
        @csrf
        <div class="mb-4">
            <label for="novio" class="block mb-1 font-bold text-gray-700">
                NOMBRE DEL NOVIO
            </label>
            <div class="relative flex flex-col w-full">
                <input type="text" wire:model="novio">
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
        <div class="mb-4">
            <label for="novio" class="block mb-1 font-bold text-gray-700">
                NOMBRE DE LA NOVIA
            </label>
            <div class="relative flex flex-col w-full">
                <input type="text" wire:model="novia">
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

        <button type="submit"
            class="w-full px-4 py-2 font-bold text-white bg-green-900 rounded-lg hover:bg-green-700">
            Guardar Cambios
        </button>
    </form>
</div>
