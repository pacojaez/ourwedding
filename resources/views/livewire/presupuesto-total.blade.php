<div class="flex flex-col lg:flex-row justify-start w-full mt-6 lg:justify-center">
    <div class="flex flex-col justify-center lg:w-1/4 items-center m-2 p-2 bg-gray-300 rounded">
        <h2 class="text-xl font-bold text-gray-700">PRESUPUESTO:</h2>
        <h3 class="text-xl font-bold text-gray-600">{{ $presupuestoMaximo }} €</h3>
    </div>
    <div class="flex flex-col justify-center lg:w-1/4 items-center m-2 p-2 bg-gray-300 rounded">
        <h2 class="text-xl font-bold text-gray-700">Pagado: </h2>
        <h3 class="text-xl font-bold text-gray-600">{{ $paid }} €</h3>
    </div>
    <div class="flex flex-col justify-center lg:w-1/4 items-center m-2 p-2 bg-gray-300 rounded">
        <h2 class="text-xl font-bold text-gray-700">Pendiente de pago: </h2>
        <h3 class="text-xl font-bold text-gray-600">{{ $pending }} €</h3>
    </div>
    <div class="flex flex-col justify-center lg:w-1/4 items-center m-2 p-2 bg-gray-300 rounded">
        <h2 class="text-xl font-bold text-gray-700">
            Balance
        </h2>
        @if ($balance > 0)
            <h3 class="text-xl font-bold">
                <span class="text-green-600"> {{ $balance }} €</span>
            </h3>
        @else
            <h3 class="text-xl font-bold">
                <span class="text-red-600"> {{ $balance }} €</span>
            </h3>
        @endif
    </div>
</div>
