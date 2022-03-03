<div class="flex flex-col w-full min-h-screen bg-white">
    <div class="col-span-12">
        <div class="overflow-auto lg:overflow-visible">
            <div class="flex flex-col w-full pb-1 border-b-2 lg:justify-center border-fuchsia-900">
                <h2 class="text-2xl font-bold text-gray-500">TAREAS PENDIENTES</h2>
                <div class="flex flex-col justify-between md:flex-row mt-8 text-2xl w-full">
                    <h3 class="text-xl font-bold text-gray-700">Actualmente te quedan por hacer {{ $count }} tareas </h3>
                    <div class="mr-2">
                        <x-jet-button wire:click="confirmTodoAdd" class="bg-blue-500 hover:bg-blue-700">
                            Añadir nueva tarea
                        </x-jet-button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="bg-blue w-full p-8 flex flex-wrap justify-center space-x-2 font-sans">
        @foreach ($todos as $todo)
            <div @class([
                'p-4',
                'rounded',
                'w-64',
                'p-2',
                'm-4',
                'bg-green-200' => $todo->done,
                'font-bold' => !$todo->done,
                'bg-gray-400' => !$todo->done,
            ])>
                <div class="flex justify-between py-1">
                    <h3 class="text-lg font-bold"> {{ $todo->title }} </h3>
                </div>
                <div class="flex flex-row justify-between p-4 rounded">
                    <button wire:click="confirmTodoEdit( {{ $todo }})"
                        class="h-6 text-xs rounded font-bold bg-gray-500">
                        <svg class="h-6 fill-current text-grey-dark cursor-pointer" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 24 24">
                            <path
                                d="M5 10a1.999 1.999 0 1 0 0 4 1.999 1.999 0 1 0 0-4zm7 0a1.999 1.999 0 1 0 0 4 1.999 1.999 0 1 0 0-4zm7 0a1.999 1.999 0 1 0 0 4 1.999 1.999 0 1 0 0-4z" />
                        </svg>
                    </button>
                    @if (!$todo->done)
                        <div @class([
                            'p-4',
                            'h-6',
                            'rounded',
                            'text-xs',
                            'font-bold',
                            'justify-center',
                            'bg-red-400' => $todo->priority == 'Alta',
                            'bg-orange-300' => $todo->priority == 'Media',
                            'bg-green-200' => $todo->priority == 'Baja',
                        ])>
                            {{ $todo->priority }}
                        </div>
                    @endif
                </div>
                <div>
                    <div class="bg-white p-2 rounded mt-1 border-b border-grey cursor-pointer hover:bg-grey-lighter">
                        {{ $todo->description }}
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <x-jet-dialog-modal wire:model="confirmingTodoAdd" class="z-30">
        <x-slot name="title">
            {{ isset($this->todo->id) ? 'Editar Tarea' : 'Añadir Tarea' }}
        </x-slot>

        <x-slot name="content">
            <div class="col-span-6 sm:col-span-4">
                <x-jet-label for="todo.title" value="{{ __('Titulo') }}" />
                <x-jet-input id="todo.title" type="text" class="block w-full mt-1" wire:model.defer="todo.title" />
                @error('todo.title')
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
                <x-jet-label for="todo.description" value="{{ __('Descripcion') }}" />
                <x-jet-input id="todo.description" type="text" class="block w-full mt-1"
                    wire:model.defer="todo.description" />
                <x-jet-input-error for="todo.description" class="mt-2" />
            </div>

            <div>
                <x-jet-label for="todo.priority" value="{{ __('Prioridad') }}" />
                <select wire:model.defer="todo.priority" class="w-1/2 p-2 m-2 rounded">
                    <option value="Alta">ALTA</option>
                    <option value="Media">MEDIA</option>
                    <option value="Baja">BAJA</option>
                </select>
            </div>

            <div class="col-span-6 mt-4 sm:col-span-4">
                <x-jet-label for="todo.done" value="{{ __('Hecho') }}" />
                <input class="item-select-input" type="checkbox" wire:model.defer="todo.done">
                <x-jet-input-error for="todo.done" class="mt-2" />
            </div>

        </x-slot>

        <x-slot name="footer">
            {{-- <x-jet-secondary-button wire:click="$set('confirmingPresupuestoAdd', false)" wire:loading.attr="disabled">
                {{ __('Nevermind') }}
            </x-jet-secondary-button> --}}

            <x-jet-danger-button class="ml-2" wire:click="saveTodo()" wire:loading.attr="disabled">
                {{ __('Save') }}
            </x-jet-danger-button>
        </x-slot>
    </x-jet-dialog-modal>

    {{-- <x-jet-dialog-modal wire:model="confirmingTodoAdd" class="z-30">
        <x-slot name="title">
            'Añadir Tarea'
        </x-slot>
        <x-slot name="content">
            <div class="col-span-6 sm:col-span-4">
                <x-jet-label for="todo.title" value="{{ __('Titulo') }}" />
                <x-jet-input id="todo.title" type="text" class="block w-full mt-1" wire:model.defer="todo.title" />
                @error('todo.title')
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
                <x-jet-label for="todo.description" value="{{ __('Descripción') }}" />
                <x-jet-input id="todo.description" type="text" class="block w-full mt-1"
                    wire:model.defer="todo.description" />
                <x-jet-input-error for="todo.description" class="mt-2" />
            </div>

            <div>
                {{-- <x-jet-label for="todo.priority" value="{{ __('Prioridad') }}" /> --}}
    {{-- <select wire:model.defer="priority" class="w-1/2 p-2 m-2 rounded">
                    <option value="Alta" >ALTA</option>
                    <option value="Media" selected>MEDIA</option>
                    <option value="Baja" >BAJA</option>
                </select> --}}
    {{-- <x-jet-input-error for="todo.priority" class="mt-2" />
            </div>

            {{-- <div class="col-span-6 mt-4 sm:col-span-4">
                <x-jet-label for="done" value="{{ __('Hecho') }}" />
                <input class="item-select-input" type="checkbox"  wire:model="todo.done">
                <x-jet-input-error for="done" class="mt-2" />
            </div>
        </x-slot>

        <x-slot name="footer">
            {{-- <x-jet-secondary-button wire:click="$set('confirmingPresupuestoAdd', false)" wire:loading.attr="disabled">
                {{ __('Nevermind') }}
            </x-jet-secondary-button>

            <x-jet-danger-button class="ml-2" wire:click="saveTodo()" wire:loading.attr="disabled">
                {{ __('Save') }}
            </x-jet-danger-button>
        </x-slot>
    </x-jet-dialog-modal> --}}
</div>
