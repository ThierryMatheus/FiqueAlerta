<x-guest-layout>
    @include('layouts.header')
    <x-auth-card>
        <x-slot name="logo">
            <h1 class="text-4xl font-bold flex justify-center p-6 mb-24 mt-16">Fique Alerta</h1>
        </x-slot>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')"/>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors"/>

        <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
            <div class="border-b border-b-4 border-black">
                <x-input id="email" class="" type="email" name="email" :value="old('email')" placeholder="Email"
                         required/>
            </div>

            <!-- Password -->
            <div class="border-b border-b-4 border-black mt-10">
                <x-input id="password" class="block mt-1 w-full"
                         type="password"
                         name="password"
                         placeholder="Senha"
                         required autocomplete="current-password"/>
            </div>
            <div class="block mt-6 flex justify-center">
                <x-button class="ml-3 mt-4 content-center">
                    {{ __('Entrar') }}
                </x-button>
            </div>

            <div class="my-2 mt-6 flex justify-center">
                <span class="absolute bg-white px-20">OU</span>
                <div class="w-full bg-black mt-3 h-px">
                </div>
            </div>

            <div class="flex pt-4 justify-center items-center font-bold">
                <x-social icon="google"/>
                <a href="{{ route('login.google') }}" class="mr-5">Entrar com o Google</a>
            </div>

            <div class="flex items-center justify-center mt-4">
                @if (Route::has('password.request'))
                    <a class="text-base text-gray-700 hover:text-gray-900"
                       href="{{ route('password.request') }}">
                        {{ __('Esqueceu a senha?') }}
                    </a>
                @endif
            </div>

            <!-- Remember Me -->
            <div class="block mt-16 flex justify-center mb-8">
                <a href="{{ route('type') }}" class="text-blue-750 text-base font-bold">Cadastre-se</a>
            </div>
        </form>
    </x-auth-card>
            @include('layouts.minfooter')
</x-guest-layout>
