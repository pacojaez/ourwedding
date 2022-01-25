<div class="mb-10">
    <h2>HAY {{ $count }} fotos de momento</h2>
    <div class="px-2 mx-auto my-10">
        <div class="flex flex-row flex-wrap justify-center">
            @foreach ($photos as $photo)
            <div class="flex flex-col flex-wrap justify-center w-full p-2 bg-gray-200 border-gray-300 rounded-sm lg:w-1/5 sm:w-1/2 border-1 m-2">
                <figure id="">
                    <img class="rounded-sm cursor-pointer" onclick="ver(this)" src="storage/{{ $photo->route }}" alt="" title="" />
                </figure>
                <h3 class="">{{ $photo->description }}</h3>
                <h3>Creada el {{ $photo->created_at }}</h3>
                <h3>Subida por {{ $photo->user->name }}</h3>
            </div>
            @endforeach
        </div>
        <div class="mt-2">
            @if ($loadAmount >= $count)
                <p class="bg-red-500 my-10 text-2xl font-bold text-center text-gray-800">No Quedan Más Fotos Por Cargar!</p>
            @else
                <button wire:click.prevent="loadMore" class="bg-green-500 border-2 rounded-xl p-2 m-2 text-gray-300">Load more</button>
            @endif
        </div>
    </div>
</div>
