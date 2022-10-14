<div>
    <h2 class="p-2 m-2 font-semibold text-center"> ESTA ES LA IMAGEN QUE TIENES AHORA EN TU WEB. SI QUIERES
        CAMBIARLA USA ESTE FORMULARIO</h2>
    <form wire:submit.prevent="save">
        @if ($photo)
            Photo Preview:
            <img src="{{ $photo->temporaryUrl() }}">
        @endif
        <input type="file" wire:model="photo">
        <div wire:loading wire:target="photo">
            Uploading...
            <div class="absolute right-1/2 bottom-1/2  transform translate-x-1/2 translate-y-1/2 ">
                <div
                    class="border-t-transparent border-solid animate-spin  rounded-full border-blue-400 border-8 h-64 w-64">

                </div>
            </div>
        </div>
        @error('photo')
            <span class="error">{{ $message }}</span>
        @enderror
        <button type="submit" class="p-2 m-2 text-gray-300 bg-green-600 rounded">Save Photo</button>
    </form>
</div>
