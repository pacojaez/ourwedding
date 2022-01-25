<div>
    @if(session()->has('message'))
    <div class="relative flex items-center px-4 py-3 text-sm font-bold text-white bg-blue-500" role="alert"
        x-data="{show: true}" x-show="show">
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
                <div class="flex flex-col md:flex-row pb-1 border-b-2 lg:justify-between border-fuchsia-900">
                    <h2 class="text-2xl font-bold text-gray-500">TODOS LOS INVITADOS</h2>
                    <h3 class="text-xl font-bold text-gray-700">Actualmente hay confirmados {{ $confirmed }} invitados</h3>
                    <div class="flex justify-between mt-8 text-2xl">
                        <div class="mr-2">
                            <x-jet-button wire:click="confirmUsuarioAdd" class="bg-blue-500 hover:bg-blue-700">
                                Añadir nuevo invitado
                            </x-jet-button>
                        </div>
                    </div>
                    {{-- <div class="flex-auto text-center">
                        <input type="text" name="name" placeholder="Search..."
                            class="w-1/3 py-2 border-b-2 border-blue-600 outline-none focus:border-yellow-400" />
                    </div> --}}

                    {{-- <div>
                        <a href="#">
                            <button class="px-3 py-1 text-white bg-blue-500 rounded-full hover:bg-blue-700 sm">
                                All
                            </button>
                        </a>
                        <a href="#">
                            <button class="px-3 py-1 text-white bg-blue-500 rounded-full hover:bg-blue-700 sm">
                                Admin
                            </button>
                        </a>
                        <a href="#">
                            <button class="px-3 py-1 text-white bg-blue-500 rounded-full hover:bg-blue-700 sm">
                                User
                            </button></a>
                    </div> --}}
                </div>
                <div class="flex flex-row justify-start lg:justify-center mt-6">
                    <table class="overflow-scroll table space-y-6 text-sm text-gray-600 border-separate">
                        <thead class="text-white bg-blue-500">
                            <tr>
                                <th class="p-3">NOMBRE</th>
                                <th class="p-3 text-left">email</th>
                                <th class="p-3 text-left">ADMIN</th>
                                <th class="p-3 text-left">Confirmado</th>
                                <th class="p-3 text-left">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                            <tr class="bg-blue-200 lg:text-black">
                                <td class="p-3 font-medium capitalize">{{ $user->name }}</td>
                                <td class="p-3">{{ $user->email }}</td>
                                <td class="p-3 uppercase">
                                    @if ($user->is_admin)
                                    ADMIN
                                    @else
                                    INVITADO
                                    @endif
                                </td>
                                <td class="p-2">
                                    @if ($user->confirmed)
                                    <span class="px-2 bg-green-400 rounded-md text-gray-50 text-xs lg:text-lg">CONFIRMADO</span>
                                    @else
                                    <span class="px-2 bg-red-400 rounded-md text-gray-50 text-xs lg:text-lg">NO CONFIRMADO</span>
                                    @endif
                                </td>
                                <td class="p-3">
                                    {{-- <a href="#" class="mr-2 text-gray-500 hover:text-gray-100">
                                        <i class="text-base material-icons-outlined">visibility</i>
                                    </a> --}}
                                    <x-jet-button wire:click="confirmUsuarioEdit( {{ $user->id }})"
                                        class="bg-orange-500 hover:bg-orange-700">
                                        Edit
                                    </x-jet-button>
                                    <x-jet-danger-button wire:click="confirmUsuarioDeletion( {{ $user->id }})"
                                        wire:loading.attr="disabled">
                                        Delete
                                    </x-jet-danger-button>
                                    {{-- <button wire:click='$emit("openModal", "edit-user", @json(["name" => "Philo"]))'
                                        type="button">Open Child</button>
                                    <button onclick="Livewire.emit('openModal', 'edit-user')">Open hello world</button> --}}
                                    {{-- <button
                                        wire:click="$emit('openModal', 'admin.edit-user', {{ @json(['name => 'Philo']) }})">Open
                                        Modal</button> --}}
                                    <!-- Outside of any Livewire component -->
                                    {{-- <button
                                        onclick='Livewire.emit("openModal", "admin.edit-user", {{ json_encode(["id" => $user->id]) }})'
                                        class="mx-2 text-yellow-400 hover:text-gray-100">
                                        Edit User
                                    </button> --}}
                                    <!-- Inside existing Livewire component -->
                                    {{-- <button
                                        wire:click='$emit("openModal", "admin.edit-user", {{ json_encode(["id" => $user->id]) }})'>Edit
                                        INSIDE</button> --}}
                                    {{-- <button
                                        onclick="Livewire.emit('openModal', 'admin.edit-user', {{ json_encode(['id' => $user->id]) }})"
                                        class="mx-2 text-yellow-400 hover:text-gray-100">Edit User</button> --}}
                                    {{-- <a href="#" class="mx-2 text-yellow-400 hover:text-gray-100">
                                        <i class="text-base material-icons-outlined">edit</i>
                                    </a> --}}
                                    {{-- <a href="#" class="ml-2 text-red-400 hover:text-gray-100">
                                        <i class="text-base material-icons-round">delete_outline</i>
                                    </a> --}}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        @if($users->hasMorePages())
            <div class="flex flex-row justify-center my-4">
                <x-jet-button wire:click.prevent="loadMore" class="bg-blue-500 hover:bg-blue-700 text-center">
                    Load more
                </x-jet-button>
            </div>
        @endif
        <x-jet-confirmation-modal wire:model="confirmingUsuarioDeletion" class="z-30">
            <x-slot name="title">
                {{ __('Borrar Invitado') }}
            </x-slot>

            <x-slot name="content">
                {{ __('¿Estás seguro? ') }}
            </x-slot>

            <x-slot name="footer">
                {{-- <x-jet-secondary-button wire:click="$set('confirmingUsuarioDeletion', false)"
                    wire:loading.attr="disabled">
                    {{ __('Nevermind') }}
                </x-jet-secondary-button> --}}

                <x-jet-danger-button class="ml-2" wire:click="deleteUsuario({{ $confirmingUsuarioDeletion }})"
                    wire:loading.attr="disabled">
                    {{ __('Eliminar') }}
                </x-jet-danger-button>
            </x-slot>
        </x-jet-confirmation-modal>

        <x-jet-dialog-modal wire:model="confirmingUsuarioAdd" class="z-30">
            <x-slot name="title">
                {{ isset( $this->user->id) ? 'Edit Usuario' : 'Add Usuario'}}
            </x-slot>

            <x-slot name="content">
                <div class="col-span-6 sm:col-span-4">
                    <x-jet-label for="user.name" value="{{ __('Name') }}" />
                    <x-jet-input id="user.name" type="text" class="block w-full mt-1" wire:model.defer="user.name" />
                    <x-jet-input-error for="user.name" class="mt-2" />
                </div>

                <div class="col-span-6 mt-4 sm:col-span-4">
                    <x-jet-label for="user.email" value="{{ __('Email') }}" />
                    <x-jet-input id="user.email" type="text" class="block w-full mt-1" wire:model.defer="user.email" />
                    <x-jet-input-error for="user.email" class="mt-2" />
                </div>

                <div class="col-span-6 mt-4 sm:col-span-4">
                    <x-jet-label for="user.confirmed" value="{{ __('Confirmado?') }}" />
                    <x-jet-input type="checkbox" wire:model.defer="user.confirmed" class="form-checkbox" />
                    <span class="ml-2 text-sm text-gray-600">Sí, confirmado</span>
                    </label>
                </div>
            </x-slot>

            <x-slot name="footer">
                {{-- <x-jet-secondary-button wire:click="$set('confirmingUsuarioAdd', false)" wire:loading.attr="disabled">
                    {{ __('Nevermind') }}
                </x-jet-secondary-button> --}}

                <x-jet-danger-button class="ml-2" wire:click="saveUsuario()" wire:loading.attr="disabled">
                    {{ __('Save') }}
                </x-jet-danger-button>
            </x-slot>
        </x-jet-dialog-modal>
    </div>
</div>
