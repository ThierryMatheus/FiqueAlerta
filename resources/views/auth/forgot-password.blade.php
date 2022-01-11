<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <h1 class="text-4xl font-bold flex justify-center mb-14 mt-16 pt-3">Fique Alerta</h1>
        </x-slot>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <!-- Email Address -->
            <div class="px-14">
                <div class="mb-6 text-sm text-gray-600 text-center">
                    {{ __('Insira o email e enviaremos um link para você voltar a acessar a sua conta.') }}
                </div>

                <div class="border-b border-b-4 border-black">
                    <x-input id="email" class="text-sm" type="email" name="email" :value="old('email')" placeholder="Email" required autofocus /> 
                </div>

                <div class="block mt-4 flex justify-center mb-7">
                    <x-button class="mt-4 font-bold text-sm content-center">
                        {{ __('Enviar') }}
                    </x-button>
                </div>

                <div class="my-2 mt-4 flex justify-center">
                    <span class="absolute bg-white px-12 text-sm font-semibold">ou</span>
                    <div class="w-full bg-black mt-3 h-px">
                    </div>
                </div>
                
                <div class="block mt-12 mb-7 flex justify-center">
                    <a href="{{ route('type') }}" class="text-blue-750 text-sm font-bold">Criar nova conta </a>
                </div>
            </div>
        </form>
    </x-auth-card>
    @include('layouts.minfooter')
</x-guest-layout>
