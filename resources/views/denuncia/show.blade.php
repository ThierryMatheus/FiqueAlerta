

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ Auth::User()->name }}
        </h2>
    </x-slot>


    <div class="flex flex-col max-w-5xl mx-auto mt-5">
       <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
           <div class="bg-white rounded shadow p-3">
            <table class="mx-auto border border-gray-200 rounded w-full">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="px-2">Denúncia</th>
                        <th class="px-2">Descrição</th>
                        <th class="px-2">Latitude</th>
                        <th class="px-2">Longitude</th>
                        <th class="px-2"></th>
                        <th class="px-2"></th>
                    </tr>
                </thead>
                <tbody>
                    
                    <tr class="border border-gray-200">
                        <td class="text-center">{{$denuncia->title}}</td>
                        <td class="text-center">{{$denuncia->comment}}</td>
                        <td class="text-center">{{$denuncia->latitude}}</td>
                        <td class="text-center">{{$denuncia->longitude}}</td>

                    </tr>
                    
                </tbody>
            </table>
    
            <h3>Comentarios:</h3>
            <form action="">
              @csrf
              <x-input type="text" name="comment" class="block mt-1 w-full"/>                
             <button type="submit" class="text-red-500">Enviar</button>
            </form>

            </div>
       </div>
    </div>

</x-app-layout>