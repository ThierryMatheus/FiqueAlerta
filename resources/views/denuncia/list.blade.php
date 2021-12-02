

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
                        <th class="px-2">Comentário</th>
                        <th class="px-2">Latitude</th>
                        <th class="px-2">Longitude</th>
                        <th class="px-2">Categoria</th>
                        <th class="px-2"></th>
                        <th class="px-2"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach(Auth::user()->Complaint as $d)
                        @php
                            $categorias= 'App\models\Complaint'::find($d->id)->categories;
                        @endphp

                    <tr class="border border-gray-200">
                        <td class="text-center">{{$d->title}}</td>
                        <td class="text-center">{{$d->comment}}</td>
                        <td class="text-center">{{$d->latitude}}</td>
                        <td class="text-center">{{$d->longitude}}</td>
                        
                            @foreach($categorias as $c)
                            <td text-center>{{$c->name}}</td>
                             @endforeach
                       
                        <td class="text-green-500"><a href="/denuncia/{{$d->id}}/edit">Editar</a></td>
                        <td>
                        <form action="/denuncia/{{ $d->id }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500">Excluir</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            
            </div>
       </div>
    </div>
    <!--div class="min-w-0 flex-auto px-4 sm:px-6 xl:px-8 pt-10 pb-24 lg:pb-16">
      <div class="rounded-t-xl overflow-hidden bg-gradient-to-r from-fuchsia-50 to-fuchsia-100 bg-gray-100 p-8">
          <div class="grid grid-cols-3 gap-4">      
           @foreach(Auth::user()->Complaint as $d)       
            <div class="h-12 flex items-center bg-white rounded-md text-center pl-2">{{$d->title}}</div>
          @endforeach
          <a href="/dashboard">Voltar</a>
          </div>
      </div>    
 </div-->
</x-app-layout>