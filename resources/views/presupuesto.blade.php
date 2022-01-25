<x-admin-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Panel de Control de invitados y Presupuesto') }}
        </h2>
    </x-slot>
    <div class="py-2">
        <div class="mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">
                @livewire('admin.presupuesto-table')
            </div>
        </div>
    </div>
</x-admin-layout>
