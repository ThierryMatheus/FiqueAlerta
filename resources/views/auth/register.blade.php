<x-guest-layout>
    @include('layouts.header')
    <x-auth-card2>
        <x-slot name="logo">
            <h1 class="text-3xl font-bold flex justify-center mb-8 mt-6">Cadastro</h1>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors"/>

        <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
            <div class="px-28">
                <div class="flex pb-6 justify-center items-center font-semibold">
                    <x-social icon="google"/>
                    <a href="{{ route('login.google') }}" class="ml-1 text-sm mr-5">Entrar com o Google</a>
                </div>

                <div class="flex justify-center">
                    <span class="absolute bg-white px-12 text-sm font-semibold">ou</span>
                    <div class="w-full bg-black mt-3 h-px">
                    </div>
                </div>
            </div>
            <div class="px-20 mt-9">
                <div class="border-b border-b-4 border-black">
                    <x-label for="name" :value="__('Nome')" class="text-sm font-bold"/>
                    <x-input id="name" class="block w-full" type="text" name="name" :value="old('name')" required/>
                </div>

                <!-- Email Address -->
                <div class="mt-5 border-b border-b-4 border-black">
                    <x-label for="name" :value="__('Email')" class="text-sm font-bold"/>
                    <x-input id="email" class="block w-full" type="email" name="email" :value="old('email')" required/>
                </div>

                <!-- Password -->
                <div class="mt-6 border-b border-b-4 border-black w-7/12">
                    <x-label for="name" :value="__('Senha')" class="text-sm font-bold"/>
                    <x-input id="password" class="block w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password"/>
                </div>

                <!-- Confirm Password -->
                <div class="mt-5 border-b border-b-4 border-black w-7/12">
                    <x-label for="name" :value="__('Confirmar senha')" class="text-sm font-bold"/>
                    <x-input id="password_confirmation" class="block w-full"
                            type="password"
                            name="password_confirmation"
                            required/>
                </div>

                <div class="flex text-xs mt-12 ml-7">
                    <p class="text-center">Ao criar uma conta, você está de acordo com nossos<br>
                        <span class="text-blue-750 font-bold">Termos de serviços</span> e
                        <span class="text-blue-750 font-bold">Política de privacidade</span></p>
                </div>
    
                <div class="block mt-4 flex justify-center mb-5">
                    <x-button class="text-sm font-bold">
                        {{ __('Cadastrar') }}
                    </x-button>
                </div>
            </div>

        </form>
    </x-auth-card>
            @include('layouts.minfooter')
</x-guest-layout>
