<div class="flex flex-col justify-start w-full mt-6 lg:flex-row lg:justify-center">
    <div class="flex flex-col items-center justify-center p-2 m-2 bg-gray-300 rounded lg:w-1/4">
        <h2 class="text-xl font-bold text-gray-700">PRESUPUESTO:</h2>
        <h3 class="text-xl font-bold text-gray-600">{{ $presupuestoMaximo }} €</h3>
    </div>
    <div class="flex flex-col items-center justify-center p-2 m-2 bg-gray-300 rounded lg:w-1/4">
        <h2 class="text-xl font-bold text-gray-700">Pagado: </h2>
        <h3 class="text-xl font-bold text-gray-600">{{ $paid }} €</h3>
    </div>
    <div class="flex flex-col items-center justify-center p-2 m-2 bg-gray-300 rounded lg:w-1/4">
        <h2 class="text-xl font-bold text-gray-700">Pendiente de pago: </h2>
        <h3 class="text-xl font-bold text-gray-600">{{ $pending }} €</h3>
    </div>
    <div class="flex flex-col items-center justify-center p-2 m-2 bg-gray-300 rounded lg:w-1/4">
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
