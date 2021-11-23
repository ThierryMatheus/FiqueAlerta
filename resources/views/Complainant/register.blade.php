<x-app-layout>
    <div class="max-w-5xl mx-auto my-12">
        <div class="bg-white rounded shadow-sm">
           <div class="p-6">
           <form action="{{ route('reclamante.store') }}" method="POST">
                     @csrf    
                    <fieldset>
                          
                        <legend class="text-center text-2xl border-b border-gray-800">Completar perfil</legend>

                        <div class="flex items-center justify-end mt-4">
                            <x-label class="pr-2">Cpf:</x-label>
                            <x-input type="text" name="cpf" class="block mt-1 w-full"/>
                        </div>
                        <div class="flex items-center justify-end mt-4">
                            <x-label class="pr-2">Endereço</x-label>
                            <textarea type="text" name="address" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"></textarea>
                        </div>
                        <div class="flex items-center justify-end mt-4">
                            <x-label class="pr-2">Data de nascimento</x-label>
                            <x-input type="date" name="birthdate" class="block mt-1 w-full"/>
                        </div>
                        <div class="flex items-center justify-end mt-4">
                            <x-label class="pr-2">Celular:</x-label>
                            <input type="text" name="cellphone" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        </div>
                        </fieldset>
                        <div class="flex items-center justify-end mt-4">
                            <x-button>Enviar</x-button>
                        </div>
                    </form>
           </div>
        </div>
    </div>
</x-app-layout>