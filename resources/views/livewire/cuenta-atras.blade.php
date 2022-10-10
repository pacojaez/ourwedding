
<div class="flex flex-row items-center justify-center w-full mt-2">
    <p class="mx-2 text-lg font-bold leading-none text-green-900 xl:text-xl font-abhaya-libre">
            {{ $dif }}
    </p>
    <div wire:poll.1000ms='cuentaAtras'>
        <p class="mx-2 text-lg font-bold leading-none text-green-900 xl:text-xl font-abhaya-libre">{{ $contador }}</p>
    </div>
</div>
