<x-guest-layout>
    @include('layouts.header')
    <x-auth-card2
    >
        <x-slot name="logo">
            <h1 class="text-3xl font-bold flex justify-center mb-8 mt-6">Cadastro</h1>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors"/>

        <form method="POST" action="{{ route('complete.company.post') }}">
            @csrf

            <div class="px-20 mt-9">

                <div class="border-b border-b-4 border-black">
                    <x-label for="cnpj" :value="__('CNPJ')" class="text-sm font-bold"/>

                    <x-input id="cnpj" class="block mt-1 w-full" type="text" name="cnpj" :value="old('cnpj')"
                            onkeypress="$(this).mask('00.000.000/0000-00')" required/>
                </div>

                <div class="mt-5 border-b border-b-4 border-black">
                    <x-label for="type" :value="__('Publico/Privado')" class="text-sm font-bold"/>

                    <select name="type" id="type" class="block pt-0 border-none w-full">
                        <option value="" selected disabled></option>
                        <option value="1">Público</option>
                        <option value="2">Privada</option>
                    </select>
                </div>

                <div class="mt-5 border-b border-b-4 border-black">
                    <x-label for="Fantasy_name" :value="__('Nome Fantasia')" class="text-sm font-bold"/>

                    <x-input id="Fantasy_name" class="block mt-1 w-full" type="text" name="fantasy_name"
                            :value="old('fantasy_name')" required/>
                </div>

                <div class="mt-5 border-b border-b-4 border-black">
                    <x-label for="address" :value="__('Endereço')" class="text-sm font-bold"/>

                    <x-input id="address" class="block mt-1 w-full" type="text" name="address" :value="old('address')" required/>
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

    </x-auth-card2>
    @include('layouts.minfooter')
</x-guest-layout>

<script type="text/javascript">
    $(document).ready(function () {
        $("#cnpj").mask("99.999.999/9999-99");
    });
</script>
