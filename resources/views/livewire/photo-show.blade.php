<div class="pb-10 mb-10">
    <h2>HAY {{ $count }} fotos de momento</h2>
    <div class="px-2 mx-auto my-10">
        <div class="flex flex-row flex-wrap justify-center">
            @foreach ($photos as $key => $photo)
            <div class="flex flex-col flex-wrap justify-center w-full p-2 m-2 bg-gray-200 border-gray-300 rounded-sm lg:w-1/5 sm:w-1/2 border-1">
                <figure id="">
                    <img class="rounded-sm cursor-pointer" onclick="ver(this)" src="storage/{{ $photo->route }}" alt="" title="" />
                    {{-- <img class="rounded-sm cursor-pointer" onclick="ver(this)" src="/{{ $photo->route }}" alt="" title="" /> --}}

                </figure>
                <h3 class="">{{ $photo->description }}</h3>
                <h3>Creada el {{ $photo->created_at }}</h3>
                <h3>Subida por {{ $photo->user->name }}</h3>
            </div>
            @endforeach
        </div>
        <div class="mt-2">
            @if ($loadAmount >= $count)
                <p class="p-2 m-2 text-2xl font-bold text-center text-gray-800 bg-red-500 rounded-xl">Estas son todas las fotos que tenemos de momento!</p>
            @else
                <button wire:click.prevent="loadMore" class="p-2 m-2 text-gray-300 bg-green-500 border-2 rounded-xl">Load more</button>
            @endif
        </div>
    </div>
</div>
