<div>
    @error('photo')
        <span class="error">{{ $message }}</span>
    @enderror
    @if ($photo)
        <div class="m-8 bg-green-300 rounded shadow-lg w-96 h-96">
            PREVISUALIZACIÓN:
            <img src="{{ $photo->temporaryUrl() }}" class="w-96 h-96">
        </div>
    @endif
    <form wire:submit.prevent="save" method="POST" enctype="multipart/form-data">
        <label for="photoUpload">TAMAÑO MÁXIMO 10Mb</label>
        <input type="file" wire:model="photo"
            class="w-64 p-2 m-2 text-gray-300 bg-green-600 border-2 rounded-xl sm:w-full" />
        <div class="flex flex-col justify-center w-full mb-4">
            <label for="description" class="block mb-1 font-bold text-gray-700">Breve descripción</label>
            <div class="flex flex-col justify-center">
                <input type="text" wire:model="description" class="w-64 text-center sm:w-full">
                @error('description')
                    <span class="p-4 my-4 text-orange-700 bg-orange-100 border-l-4 border-orange-500"
                        x-transition:enter="transition ease-out duration-300">
                        {{ $message }}
                    </span>
                @enderror
            </div>
        </div>
        <button type="submit" class="p-2 m-2 text-gray-300 bg-green-500 border-2 rounded-xl">GUARDAR FOTO</button>
    </form>
    <div wire:loading wire:target="photo">Uploading...</div>
</div>
