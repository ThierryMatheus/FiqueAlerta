<x-guest-layout>
    @include('layouts.header')
    <x-auth-card>
        <x-slot name="logo">
            <h1 class="text-4xl font-bold flex justify-center p-6 mb-12 mt-8">Fique Alerta</h1>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors"/>

        <form method="POST" action="{{ route('complete.company.post') }}">
            @csrf
            <div class="mt-4 border-b border-b-4 border-black">
                <x-label for="Fantasy_name" :value="__('Nome Fantasia')" class="text-base font-bold"/>

                <x-input id="Fantasy_name" class="block mt-1 w-full" type="text" name="fantasy_name"
                         :value="old('fantasy_name')" required/>
            </div>
            <div class="mt-4 border-b border-b-4 border-black">
                <x-label for="type" :value="__('Publico/Privado')" class="text-base font-bold"/>

                <select name="type" id="type" class="block mt-2 w-full border-none">
                    <option value="" selected disabled></option>
                    <option value="1">Público</option>
                    <option value="2">Privada</option>
                </select>
            </div>
            <div class="mt-4 border-b border-b-4 border-black">
                <x-label for="cnpj" :value="__('CNPJ')" class="text-base font-bold"/>

                <x-input id="cnpj" class="block mt-1 w-full" type="text" name="cnpj" :value="old('cnpj')"
                         onkeypress="$(this).mask('00.000.000/0000-00')" required/>
            </div>

            <div class="flex text-center mt-8 mb-8">
                <p class="">Ao criar uma conta, você está de acordo com nossos
                    <span class="text-blue-750 font-bold">Termos de serviços</span> e
                    <span class="text-blue-750 font-bold">Política de privacidade</span></p>
            </div>

            <div class="block mt-4 flex justify-center">
                <x-button class="ml-4">
                    {{ __('Cadastrar') }}
                </x-button>
            </div>

        </form>

    </x-auth-card>
    @include('layouts.minfooter')
</x-guest-layout>

<script type="text/javascript">
    $(document).ready(function () {
        $("#cnpj").mask("99.999.999/9999-99");
    });
</script>
