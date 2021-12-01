<x-guest-layout>
    @include('layouts.header')
    <x-auth-card>
        <x-slot name="logo">
            <h1 class="text-4xl font-bold flex justify-center mb-20 mt-4">Fique Alerta</h1>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors"/>

        <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
            <div class="border-b border-b-4 border-black">
                <x-label for="name" :value="__('Nome')" class="text-base font-bold"/>
                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required/>
            </div>

            <!-- Email Address -->
            <div class="mt-10 border-b border-b-4 border-black">
                <x-label for="name" :value="__('Email')" class="text-base font-bold"/>
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required/>
            </div>

            <!-- Password -->
            <div class="mt-10 border-b border-b-4 border-black w-6/12">
                <x-label for="name" :value="__('Senha')" class="text-base font-bold"/>
                <x-input id="password" class="block mt-1 w-full"
                         type="password"
                         name="password"
                         required autocomplete="new-password"/>
            </div>

            <!-- Confirm Password -->
            <div class="mt-10 border-b border-b-4 border-black w-6/12">
                <x-label for="name" :value="__('Confirme a senha')" class="text-base font-bold"/>
                <x-input id="password_confirmation" class="block mt-1 w-full"
                         type="password"
                         name="password_confirmation"
                         required/>
            </div>

            <div class="flex text-center mt-16">
                <p class="">Ao criar uma conta, você está de acordo com nossos
                    <span class="text-blue-750 font-bold">Termos de serviços</span> e
                    <span class="text-blue-750 font-bold">Política de privacidade</span></p>
            </div>

            <div class="block mt-4 flex justify-center">
                <x-button class="ml-4">
                    {{ __('Cadastrar') }}
                </x-button>
            </div>


            <div class="flex items-center justify-center mt-4">
                <a class="text-base text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Já possui cadastro?') }}
                </a>
            </div>
        </form>
        <footer>
            @include('layouts.minfooter')
        </footer>
    </x-auth-card>
</x-guest-layout>
