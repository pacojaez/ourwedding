<div>
    <div class="px-2 mx-auto my-10">
        <div class="flex flex-row flex-wrap justify-center">
            @foreach ($paths as $path)
            <div class="flex flex-col flex-wrap justify-center w-full p-2 m-2 border-gray-300 rounded-sm lg:w-1/5 sm:w-1/2 border-1 ring-2 ring-green-500">
                <img class="rounded-sm cursor-pointer" onclick="ver(this)" src="storage\{{ $path->photo}}" alt="" title="">
            </div>
            @endforeach
        </div>
    </div>
</div>
