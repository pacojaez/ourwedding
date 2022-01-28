<x-app-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <div class="mb-4 text-sm text-gray-600">
            {{ __('¿OLVIDASTE TU PASSWORD? NO PROBLEM, TE MANDAMOS UN MAIL PARA QUE REGENERES LA CONTRASEÑA') }}
        </div>

        @if (session('status'))
            <div class="mb-4 text-sm font-medium text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="block">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block w-full mt-1" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-jet-button>
                    {{ __('Enviar mail para resetear contraseña') }}
                </x-jet-button>
            </div>
        </form>
        <div class="flex items-center justify-center mt-4">
            <x-jet-button class="m-2">
                <a class="text-sm hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Volver a Log in') }}
                </a>
            </x-jet-button>
        </div>
    </x-jet-authentication-card>
</x-app-layout>
