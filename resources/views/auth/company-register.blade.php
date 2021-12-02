<x-guest-layout>
    @include('layouts.header')
    <x-auth-card>
        <x-slot name="logo">
            <h1 class="text-4xl font-bold flex justify-center p-6 mb-12 mt-8">Fique Alerta</h1>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('store_company') }}">
            @csrf

            <!-- Name -->
            <div class="border-b border-b-4 border-black">
                <x-label for="name" :value="__('Nome')" />

                <x-input id="name" class="block mt-1 w-full" type="text" name="user[name]" :value="old('name')" required />
            </div>

            <!-- Email Address -->
            <div class="mt-4 border-b border-b-4 border-black">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="user[email]" :value="old('email')" required />
            </div>
            <div class="mt-4 border-b border-b-4 border-black">
                <x-label for="Fantasy_name" :value="__('Nome Fantasia')" />

                <x-input id="Fantasy_name" class="block mt-1 w-full" type="text" name="company[fantasy_name]" :value="old('fantasy_name')" required />
            </div>
            <div class="mt-4 border-b border-b-4 border-black">
                <x-label for="type" :value="__('Publico/Privado')" />

                <select name="company[type]" id="type" class="block mt-2 w-full border-none">
                    <option value="" selected disabled></option>
                    <option value="1">Público</option>
                    <option value="2">Privada</option>
                </select>
            </div>
            <div class="mt-4 border-b border-b-4 border-black">
                <x-label for="cnpj" :value="__('CNPJ')" />

                <x-input id="cnpj" class="block mt-1 w-full" type="text" name="company[cnpj]" :value="old('cnpj')" onkeypress="$(this).mask('00.000.000/0000-00')" required />
            </div>
            <!-- Password -->
            <div class="mt-4 border-b border-b-4 border-black w-6/12">
                <x-label for="password" :value="__('Senha')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="user[password]"
                                required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4 border-b border-b-4 border-black w-6/12">
                <x-label for="password_confirmation" :value="__('Confirme a senha')" />

                <x-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="user[password_confirmation]" required />
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
    </x-auth-card>
    @include('layouts.minfooter')
</x-guest-layout>
<script type="text/javascript">
	$(document).ready(function(){
		$("#cnpj").mask("99.999.999/9999-99");
	});
</script>
