<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-xl ml-14">
            Minhas denúncias
        </h2>
    </x-slot>

    <div class="flex flex-col max-w-5xl ml-14">
        <div class="align-middle inline-block min-w-full ml-8">
            <div class="overflow-auto" style="height: 430px;">
            <table class="border-gray-200 w-full">
                <thead>
                <tr class="bg-gray-50 sm:text-left bg-gray-50">
                    <th class="pr-12 pl-3 py-3 text-left text-xs text-gray-500 tracking-wider font-semibold flex sm:justify-between">
                        <div class="border-b border-b-4 border-black w-52 -mr-52">
                           <x-input id="search" type="search" class="text-sm -mr-20"/>
                        </div>
                        <div class="border-b border-b-4 border-black">
                            <select name="type" id="type" class="block pt-0 border-none bg-transparent w-full mr-3 pl-0 pb-0 text-sm">
                                <option value="1">Todos</option>
                                <option value="2"></option>
                                <option value="3"></option>
                            </select>
                        </div>
                    </th>
                </tr>
                <tr class="grid gap-32 grid-cols-6 border-b border-b-4 border-gray-200">
                    <th class="font-medium text-sm text-left text-gray-500 py-4">Título</th>
                    <th class="font-medium text-sm text-left text-gray-500 py-4">Descrição</th>
                    <th class="font-medium text-sm text-left text-gray-500 py-4">Categoria</th>
                    <th class="font-medium text-sm text-left text-gray-500 py-4">Data</th>
                    <th class="font-medium text-sm text-left text-gray-500 py-4">Hora</th>
                    <th class="py-4"></th>
                </tr>
                </thead>

                <tbody class="pt-8">
                @foreach(Auth::user()->Complaint as $denuncia)

                    <tr class="border-b border-b-4 border-gray-200 py-4">

                        <td class="text-center py-4">{{$denuncia->title}}</td>
                        <td class="text-center py-4">{{$denuncia->comment}}</td>
                        <td class="text-center py-4">{{$denuncia->latitude}}</td>
                        <td class="text-center py-4">{{$denuncia->longitude}}</td>

                        @php 
                        $categorias = $denuncia::find($denuncia->id)->categories;
                        @endphp

                        @foreach($categorias as $categoria)
                            <td class="text-center">{{$categoria->name}}</td>
                        @endforeach

                        <td class="text-green-500"><a href="/denuncia/{{$denuncia->id}}/edit">Editar</a></td>
                        <td>
                            <form action="/denuncia/{{ $denuncia->id }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500"
                                        onclick="return confirm('Tem certeza que deseja excluir?')">Excluir
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            </div>

        </div>
    </div>
</x-app-layout>
