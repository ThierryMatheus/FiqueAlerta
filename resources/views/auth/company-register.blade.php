<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('store_company') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-label for="name" :value="__('Name')" />

                <x-input id="name" class="block mt-1 w-full" type="text" name="user[name]" :value="old('name')" required autofocus />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="user[email]" :value="old('email')" required />
            </div>
            <div class="mt-4">
                <x-label for="Fantasy_name" :value="__('Nome Fantasia')" />

                <x-input id="Fantasy_name" class="block mt-1 w-full" type="text" name="company[fantasy_name]" :value="old('fantasy_name')" required />
            </div>
            <div class="mt-4">
                <x-label for="type" :value="__('Publico/Privado')" />

                <select name="company[type]" id="type" class="block mt-1 w-full">
                    <option value="">Selecionar</option>
                    <option value="1">Público</option>
                    <option value="2">Privada</option>
                </select>
            </div>
            <div class="mt-4">
                <x-label for="cnpj" :value="__('CNPJ')" />

                <x-input id="cnpj" class="block mt-1 w-full" type="text" name="company[cnpj]" :value="old('cnpj')" onkeypress="$(this).mask('00.000.000/0000-00')" required />
            </div>
            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="user[password]"
                                required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="user[password_confirmation]" required />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Já está registrado?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Registrar') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
<script type="text/javascript">
	$(document).ready(function(){	
		$("#cnpj").mask("99.999.999/9999-99");
	});
</script>