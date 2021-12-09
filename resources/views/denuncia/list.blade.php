<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            Minhas denúncias
        </h2>
    </x-slot>

    <div class="flex flex-col max-w-5xl mx-auto mt-5">
        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
            <table class="mx-auto border-gray-200 rounded w-full">
                <thead>
                <tr class="bg-gray-100">
                    <th class="text-gray-500 text-sm py-4 rounded">Pesquise por titulo</th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th class="text-gray-500 text-xs rounded">Todos</th>
                </tr>
                <tr>
                    <th class="font-medium font-sm text-gray-500 py-4 border-b border-b-4 border-gray-200">Título</th>
                    <th class="font-medium font-sm text-gray-500 py-4 border-b border-b-4 border-gray-200">Comentário
                    </th>
                    <th class="font-medium font-sm text-gray-500 py-4 border-b border-b-4 border-gray-200">Latitude</th>
                    <th class="font-medium font-sm text-gray-500 py-4 border-b border-b-4 border-gray-200">Longitude
                    </th>
                    <th class="font-medium font-sm text-gray-500 py-4 border-b border-b-4 border-gray-200">Categoria
                    </th>
                    <th class="border-b border-b-4 border-gray-200 py-4"></th>
                    <th class="border-b border-b-4 border-gray-200 py-4"></th>
                    <th class="border-b border-b-4 border-gray-200 py-4"></th>
                </tr>
                </thead>

                <tbody class="pt-8">
                @foreach(Auth::user()->Complaint as $denuncia)

                    <tr class="border-b border-b-4 border-gray-200 py-4">

                        <td class="text-center py-4">{{$denuncia->title}}</td>
                        <td class="text-center py-4">{{$denuncia->comment}}</td>
                        <td class="text-center py-4">{{$denuncia->latitude}}</td>
                        <td class="text-center py-4">{{$denuncia->longitude}}</td>

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
</x-app-layout>
