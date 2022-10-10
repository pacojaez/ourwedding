<div>
    <h2 class="p-2 m-2 font-semibold text-center"> ESTA ES LA IMAGEN QUE TIENES AHORA EN TU WEB. SI QUIERES
        CAMBIARLA USA ESTE FORMULARIO</h2>
    <form wire:submit.prevent="save">
        @if ($photo)
            Photo Preview:
            <img src="{{ $photo->temporaryUrl() }}">
        @endif
        <input type="file" wire:model="photo">
        <div wire:loading wire:target="photo">Uploading...</div>
        @error('photo')
            <span class="error">{{ $message }}</span>
        @enderror
        <button type="submit" class="p-2 m-2 text-gray-300 bg-green-600 rounded">Save Photo</button>
    </form>
</div>
