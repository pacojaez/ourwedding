<div>
    <div class="flex flex-row justify-center mt-2">
        <form method="POST" wire:submit.prevent="save">
            @csrf
            {{-- <div>
                <x-jet-label for="attendance" value="{{ __('Attendance') }}" />
                <x-jet-input id="attendance" class="block mt-1 w-full" type="attendance" name="attendance" required autofocus />
            </div> --}}
                @if (!auth()->user()->confirmed)
                    <div class="text-center text-xl">
                        CLARO QUE VOY!!!!!!!!!
                    </div>
                    <div class="flex justify-center mt-4">
                        <x-jet-button class="ml-4 bg-green-600 text-xl">
                            {{ __('Confirmar asistencia') }}
                        </x-jet-button>
                    </div>
                @else
                    <div class="flex flex-col justify-center text-center text-xl">
                        <div class="ml-4 bg-green-600 text-xl cursor-none inline-flex items-center px-4 py-2 border border-transparent rounded-md font-semibold text-white uppercase tracking-widest disabled:opacity-25 transition">
                            {{ __('GUAY, TE ESPERAMOS ;-))') }}
                        </div>
                        <div class="text-center text-base">
                            Revisa tu mail, cualquier duda tienes nuestro contacto
                        </div>
                    </div>
                @endif

                <div wire:loading>
                    <div class="flex justify-center mt-4" wire:model='confirmingAttendance'>
                        <x-jet-button class="ml-4 bg-green-800">
                            {{ __('Espera, estamos mandandote un Mail para que no se te pase nada!!') }}
                        </x-jet-button>
                    </div>
                </div>
                {{-- @if( $confirmingAttendance)
                    <x-jet-button class="ml-4 bg-green-600 text-xl">
                        UN MOMENTO, TE ESTAMOS MANDANDO UN MAIL CON TODA LA INFO
                    </x-jet-button>
                @endif --}}
        </form>
    </div>
</div>
