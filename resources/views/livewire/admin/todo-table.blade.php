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
                <div class="flex flex-row justify-between p-4 rounded ">
                    <button wire:click="confirmTodoEdit( {{ $todo }})"
                        class="h-6 hover:bg-gray-200 rounded font-bold bg-gray-500">
                        <svg class="h-6 fill-current text-grey-dark cursor-pointer" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 24 24">
                            <path
                                d="M5 10a1.999 1.999 0 1 0 0 4 1.999 1.999 0 1 0 0-4zm7 0a1.999 1.999 0 1 0 0 4 1.999 1.999 0 1 0 0-4zm7 0a1.999 1.999 0 1 0 0 4 1.999 1.999 0 1 0 0-4z" />
                        </svg>
                    </button>
                    @if (!$todo->done)
                        <div @class([
                            'h-8',
                            'rounded',
                            'justify-center',
                            'items-center',
                            'bg-red-400' => $todo->priority == 'Alta',
                            'bg-orange-300' => $todo->priority == 'Media',
                            'bg-green-200' => $todo->priority == 'Baja',
                        ])>
                            <p class="m-1 text-sm font-bold">
                                {{ $todo->priority }}
                            </p>
                        </div>
                    @endif
                </div>
                <div>
                    <div class="bg-white p-2 rounded mt-1 border-b border-grey cursor-pointer hover:bg-grey-lighter">
                        {{ $todo->description }}
                    </div>
                </div>
                @if ( $todo->link )
                    <div class="flex flex-row bg-white p-2 text-sm rounded mt-1 border-b border-grey cursor-pointer hover:bg-gray-500">
                            <svg class="svg-icon mr-2" viewBox="0 0 20 20" class="h-8 w-8">
                                <path d="M16.469,8.924l-2.414,2.413c-0.156,0.156-0.408,0.156-0.564,0c-0.156-0.155-0.156-0.408,0-0.563l2.414-2.414c1.175-1.175,1.175-3.087,0-4.262c-0.57-0.569-1.326-0.883-2.132-0.883s-1.562,0.313-2.132,0.883L9.227,6.511c-1.175,1.175-1.175,3.087,0,4.263c0.288,0.288,0.624,0.511,0.997,0.662c0.204,0.083,0.303,0.315,0.22,0.52c-0.171,0.422-0.643,0.17-0.52,0.22c-0.473-0.191-0.898-0.474-1.262-0.838c-1.487-1.485-1.487-3.904,0-5.391l2.414-2.413c0.72-0.72,1.678-1.117,2.696-1.117s1.976,0.396,2.696,1.117C17.955,5.02,17.955,7.438,16.469,8.924 M10.076,7.825c-0.205-0.083-0.437,0.016-0.52,0.22c-0.083,0.205,0.016,0.437,0.22,0.52c0.374,0.151,0.709,0.374,0.997,0.662c1.176,1.176,1.176,3.088,0,4.263l-2.414,2.413c-0.569,0.569-1.326,0.883-2.131,0.883s-1.562-0.313-2.132-0.883c-1.175-1.175-1.175-3.087,0-4.262L6.51,9.227c0.156-0.155,0.156-0.408,0-0.564c-0.156-0.156-0.408-0.156-0.564,0l-2.414,2.414c-1.487,1.485-1.487,3.904,0,5.391c0.72,0.72,1.678,1.116,2.696,1.116s1.976-0.396,2.696-1.116l2.414-2.413c1.487-1.486,1.487-3.905,0-5.392C10.974,8.298,10.55,8.017,10.076,7.825"></path>
                            </svg>
                            <a href="{{ $todo->link }}" target="blank" class="truncate">
                                {{ $todo->link }}
                            </a>
                    </div>
                @endif
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

            <div class="col-span-6 mt-4 sm:col-span-4">
                <x-jet-label for="todo.link" value="{{ __('Link') }}" />
                <x-jet-input id="todo.link" type="text" class="block w-full mt-1"
                    wire:model.defer="todo.link" />
                <x-jet-input-error for="todo.link" class="mt-2" />
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
