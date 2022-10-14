<div >
    <form wire:submit.prevent="saveChanges" method="POST" >
        @csrf
        <div class="flex flex-col md:flex-row justify-center">
            <div class="m-5">
                <h2 class="font-bold text-xl">DIRECCIÓN</h2>
                <div class="m-4">
                    <label for="novia" class="block mb-1 font-semibold text-gray-700">
                        DIRECCIÓN
                    </label>
                    <div class="relative flex flex-col w-full">
                        <input type="text" wire:model="adress" placeholder="{{ $adress }}">
                        @error('adress') <span
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
            Guardar Cambios Dirección
        </button>
    </form>
</div>
