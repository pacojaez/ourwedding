<div>
    <div class="mr-2">
        <x-jet-button wire:click="confirmingNewMail" class="bg-orange-500 hover:bg-orange-700">
            MANDAR MAIL NOVEDADES
        </x-jet-button>
    </div>
    <x-jet-dialog-modal wire:model="confirmNewMail" class="z-40">
        <x-slot name="title">
            ENVIAR UN NUEVO MAIL A TODOS LOS INVITADOS
            <p class="font-medium text-center text-red-500">
                Ojo, este mail le llega a todos los invitados, recuerdalo.
            </p>
        </x-slot>

        <x-slot name="content">
            <div class="col-span-6 sm:col-span-4">
                <x-jet-label for="subject" value="{{ __('ASUNTO') }}" />
                <x-jet-input id="subject" type="text" class="block w-full mt-1" wire:model.defer="subject" />
                <x-jet-input-error for="subject" class="mt-2" />
            </div>

            <div class="col-span-6 mt-4 sm:col-span-4">
                <x-jet-label for="contenido" value="{{ __('CONTENIDO') }}" />
                {{-- <x-jet-input id="contenido" type="text" class="block w-full mt-1" wire:model.defer="contenido" /> --}}
                <div class="textareacontainer">
                    <textarea wire:model.defer="contenido" name="contenido" id="contenido" class="font-xs"></textarea>
                </div>
                <x-jet-input-error for="contenido" class="mt-2" />
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-jet-danger-button class="ml-2" wire:click="sendnewMail()" wire:loading.attr="disabled">
                {{ __('ENVIAR') }}
            </x-jet-danger-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>
