<div>
    @if (session()->has('message'))
        <div class="relative flex items-center px-4 py-3 text-sm font-bold text-white bg-blue-500" role="alert"
            x-data="{ show: true }" x-show="show" x-show.transition.opacity.out.duration.1500ms="show" x-init="setTimeout(function(){
                    show= false
                }, 3000)">
            <svg class="w-4 h-4 mr-2 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                <path
                    d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z" />
            </svg>
            <p>{{ session('message') }}</p>
            <span class="absolute top-0 bottom-0 right-0 px-4 py-3" @click="show = false">
                <svg class="w-6 h-6 text-white fill-current" role="button" xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 20 20">
                    <title>Close</title>
                    <path
                        d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z" />
                </svg>
            </span>
        </div>
    @endif

    <div class="flex flex-col w-full min-h-screen bg-white">
        <div class="col-span-12">
            <div class="overflow-auto lg:overflow-visible">
                <div class="flex flex-col pb-1 border-b-2 md:flex-row lg:justify-between border-fuchsia-900">
                    <h2 class="text-2xl font-bold text-gray-500">PRESUPUESTO</h2>
                </div>

                @livewire('presupuesto-total')

                <div class="flex flex-col pb-1 border-b-2 md:flex-row lg:justify-center border-fuchsia-900">

                    <div class="flex justify-between mt-8 text-2xl">
                        <div class="mr-2">
                            <x-jet-button wire:click="confirmPresupuestoAdd" class="bg-blue-500 hover:bg-blue-700">
                                Añadir nueva linea de Presupuesto
                            </x-jet-button>
                            <x-jet-button wire:click="confirmPresupuestoMax" class="bg-blue-500 hover:bg-blue-700">
                                Modificar Presupuesto máximo
                            </x-jet-button>
                        </div>
                    </div>
                </div>
                <div class="flex flex-row justify-start mt-6 lg:justify-center">
                    <table class="table space-y-6 overflow-scroll text-sm text-gray-600 border-separate">
                        <thead class="text-white bg-blue-500">
                            <tr>
                                <th class="p-3">CONCEPTO</th>
                                <th class="p-3 text-left">CONTACTO</th>
                                <th class="p-3 text-left">OBSERVACIONES</th>
                                <th class="p-3 text-left">TOTAL</th>
                                <th class="p-3 text-left">PAGADO</th>
                                <th class="p-3 text-left">A CUENTA</th>
                                <th class="p-3 text-left">PENDIENTE</th>
                                <th class="p-3 text-left">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($presupuestos as $presupuesto)
                                <tr class="bg-blue-200 lg:text-black">
                                    <td class="p-3 font-medium capitalize">{{ $presupuesto->concepto }}</td>
                                    <td class="p-3">{{ $presupuesto->contacto }}</td>
                                    <td class="p-3">{{ $presupuesto->observaciones }}</td>
                                    <td class="p-3">{{ $presupuesto->coste }}</td>
                                    <td class="p-3 text-center">
                                        @if ($presupuesto->pagado)
                                            <span
                                                class="px-2 text-xs bg-green-400 rounded-md text-gray-50">PAGADO</span>
                                        @else
                                            <span class="px-2 text-xs bg-red-400 rounded-md text-gray-50">NO
                                                PAGADO</span>
                                        @endif
                                    </td>
                                    <td class="p-3 text-center">{{ $presupuesto->adelantado }}</td>
                                    <td class="p-3 text-center">{{ $presupuesto->coste - $presupuesto->adelantado }}
                                    </td>
                                    <td class="p-3">
                                        {{-- <a href="#" class="mr-2 text-gray-500 hover:text-gray-100">
                                        <i class="text-base material-icons-outlined">visibility</i>
                                    </a> --}}
                                        <x-jet-button wire:click="confirmPresupuestoEdit( {{ $presupuesto->id }})"
                                            class="bg-orange-500 hover:bg-orange-700">
                                            Edit
                                        </x-jet-button>
                                        <x-jet-danger-button
                                            wire:click="confirmPresupuestoDeletion( {{ $presupuesto->id }})"
                                            wire:loading.attr="disabled">
                                            Delete
                                        </x-jet-danger-button>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>

            </div>
        </div>
        <x-jet-confirmation-modal wire:model="confirmingPresupuestoDeletion" class="z-30">
            <x-slot name="title">
                {{ __('Borrar linea del Presupuesto') }}
            </x-slot>

            <x-slot name="content">
                {{ __('¿Seguro que deseas borrar la linea del Presupuesto? ') }}
            </x-slot>

            <x-slot name="footer">
                {{-- <x-jet-secondary-button wire:click="$set('confirmingPresupuestoDeletion', false)"
                    wire:loading.attr="disabled">
                    {{ __('Nevermind') }}
                </x-jet-secondary-button> --}}

                <x-jet-danger-button class="ml-2"
                    wire:click="deletePresupuesto({{ $confirmingPresupuestoDeletion }})"
                    wire:loading.attr="disabled">
                    {{ __('Eliminar') }}
                </x-jet-danger-button>
            </x-slot>
        </x-jet-confirmation-modal>

        <x-jet-dialog-modal wire:model="confirmingPresupuestoAdd" class="z-30">
            <x-slot name="title">
                {{ isset($this->presupuesto->id) ? 'Edit Presupuesto' : 'Add Presupuesto' }}
            </x-slot>

            <x-slot name="content">
                <div class="col-span-6 sm:col-span-4">
                    <x-jet-label for="presupuesto.concepto" value="{{ __('Concepto') }}" />
                    <x-jet-input id="presupuesto.concepto" type="text" class="block w-full mt-1"
                        wire:model.defer="presupuesto.concepto" />
                    @error('presupuesto.concepto')
                        <span class="p-4 my-4 text-orange-700 bg-orange-100 border-l-4 border-orange-500"
                            x-transition:enter="transition ease-out duration-300"
                            x-transition:enter-start="opacity-0 transform scale-90"
                            x-transition:enter-end="opacity-100 transform scale-100"
                            x-transition:leave="transition ease-in duration-300"
                            x-transition:leave-start="opacity-100 transform scale-100"
                            x-transition:leave-end="opacity-0 transform scale-90">
                            {{ $message }}
                        </span>
                    @enderror
                </div>

                <div class="col-span-6 mt-4 sm:col-span-4">
                    <x-jet-label for="presupuesto.contacto" value="{{ __('Contacto') }}" />
                    <x-jet-input id="presupuesto.contacto" type="text" class="block w-full mt-1"
                        wire:model.defer="presupuesto.contacto" />
                    <x-jet-input-error for="presupuesto.contacto" class="mt-2" />
                </div>

                <div class="col-span-6 mt-4 sm:col-span-4">
                    <x-jet-label for="presupuesto.observaciones" value="{{ __('Observaciones') }}" />
                    <x-jet-input id="presupuesto.observaciones" type="text" class="block w-full mt-1"
                        wire:model.defer="presupuesto.observaciones" />
                    <x-jet-input-error for="presupuesto.observaciones" class="mt-2" />
                </div>

                <div class="col-span-6 mt-4 sm:col-span-4">
                    <x-jet-label for="presupuesto.coste" value="{{ __('Coste') }}" />
                    <x-jet-input id="presupuesto.coste" type="number" class="block w-full mt-1"
                        wire:model.defer="presupuesto.coste" />
                    <x-jet-input-error for="presupuesto.coste" class="mt-2" />
                </div>

                <div class="col-span-6 mt-4 sm:col-span-4">
                    <x-jet-label for="presupuesto.pagado" value="{{ __('Pagado?') }}" />
                    <x-jet-input type="checkbox" wire:model.defer="presupuesto.pagado" class="form-checkbox" />
                    <span class="ml-2 text-sm text-gray-600">Sí, pagado</span>
                    </label>
                </div>

                <div class="col-span-6 mt-4 sm:col-span-4">
                    <x-jet-label for="presupuesto.adelantado" value="{{ __('Adelantado') }}" />
                    <x-jet-input id="presupuesto.adelantado" type="number" class="block w-full mt-1"
                        wire:model.defer="presupuesto.adelantado" />
                    <x-jet-input-error for="presupuesto.adelantado" class="mt-2" />
                </div>
            </x-slot>

            <x-slot name="footer">
                {{-- <x-jet-secondary-button wire:click="$set('confirmingPresupuestoAdd', false)" wire:loading.attr="disabled">
                    {{ __('Nevermind') }}
                </x-jet-secondary-button> --}}

                <x-jet-danger-button class="ml-2" wire:click="savePresupuesto()" wire:loading.attr="disabled">
                    {{ __('Save') }}
                </x-jet-danger-button>
            </x-slot>
        </x-jet-dialog-modal>

        <x-jet-dialog-modal wire:model="confirmingPresupuestoMax" class="z-30">
            <x-slot name="title">
                {{ 'Modificar Presupuesto Máximo' }}
            </x-slot>

            <x-slot name="content">
                <div class="col-span-6 sm:col-span-4">
                    <x-jet-label for="presupuestoMax" value="{{ __('Presupuesto Máximo Actual') }}" />
                    {{-- <x-jet-input id="presupuesto.concepto" type="text" class="block w-full mt-1" wire:model.defer="presupuesto.concepto" /> --}}
                    {{ $presupuestoMaximo->total }} €
                    {{-- <x-jet-input-error for="presupuesto.concepto" class="mt-2" /> --}}
                </div>

                <div class="col-span-6 mt-4 sm:col-span-4">
                    <x-jet-label for="presupuestoMaxNuevo" value="{{ __('Nuevo Máximo') }}" />
                    <x-jet-input id="presupuestoMaxNuevo" type="number" class="block w-full mt-1"
                        wire:model.defer="presupuestoMaxNuevo" />
                    <x-jet-input-error for="presupuestoMaxNuevo" class="mt-2" />
                </div>
            </x-slot>

            <x-slot name="footer">
                <x-jet-danger-button class="ml-2"
                    wire:click="presupuestoMaxModified({{ $presupuestoMaxNuevo }})" wire:loading.attr="disabled">
                    {{ __('Save') }}
                </x-jet-danger-button>
            </x-slot>
        </x-jet-dialog-modal>
    </div>

    @include('components.presupuestoChart')
</div>
