<x-app-layout>
    <x-slot name="header">
        <div class="pt-8 pb-6  lg:px-8">
            <h2 class="font-bold text-xl ml-14">
                Minhas denúncias
            </h2>
        </div>
    </x-slot>

<div class=" container">
    <div class="max-w-5xl ml-14 mt-5">
        <div class="align-middle inline-block ml-8">
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
                <tr class="grid gap-32 grid-cols-6 border-b border-b-4 border-gray-200 pl-3">
                    <th class="font-medium mt-1 text-sm text-left text-gray-500 py-3">Título</th>
                    <th class="font-medium mt-1 text-sm text-left text-gray-500 py-3">Descrição</th>
                    <th class="font-medium mt-1 text-sm text-left text-gray-500 py-3">Categoria</th>
                    <th class="font-medium mt-1 text-sm text-left text-gray-500 py-3">Data</th>
                    <th class="font-medium mt-1 text-sm text-left text-gray-500 py-3">Hora</th>
                    <th class="py-3"></th>
                </tr>
                </thead>

                <tbody class="pt-8">
                @foreach(Auth::user()->Complaint as $denuncia)

                    <tr class="grid gap-32 grid-cols-6 border-b border-b-4 border-gray-200 pl-3">

                        <td class="font-semibold mt-1 text-sm text-left py-3">{{$denuncia->title}}</td>
                        <td class="font-semibold mt-1 text-sm text-left py-3">{{$denuncia->comment}}</td>

                        @php 
                        $categorias = $denuncia::find($denuncia->id)->categories;
                        @endphp

                        @foreach($categorias as $categoria)
                            <td class="font-semibold mt-1 text-sm text-left py-3">{{$categoria->name}}</td>
                        @endforeach

                        <td class="font-semibold mt-1 text-sm text-left py-3">{{$denuncia->created_at->format('d/m/y')}}</td>
                        <td class="text-center mt-1 py-3">{{$denuncia->created_at->format('h:i:s')}}</td>

                        <td class="py-3 px-7">
                            
                            <x-dropdown>
                                <x-slot name="trigger" class="">
                                    <button>
                                        <svg width="4" height="15" viewBox="0 0 4 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M3.119 12.9532C3.119 13.3386 2.98867 13.6672 2.728 13.9392C2.456 14.2112 2.116 14.3472 1.708 14.3472C1.28867 14.3472 0.948667 14.2169 0.688 13.9562C0.427333 13.6842 0.297 13.3499 0.297 12.9532C0.297 12.5566 0.427333 12.2279 0.688 11.9672C0.948667 11.6952 1.28867 11.5592 1.708 11.5592C2.116 11.5592 2.456 11.6952 2.728 11.9672C2.98867 12.2392 3.119 12.5679 3.119 12.9532ZM3.119 7.50461C3.119 7.88994 2.98867 8.21861 2.728 8.49061C2.456 8.76261 2.116 8.89861 1.708 8.89861C1.28867 8.89861 0.948667 8.76827 0.688 8.50761C0.427333 8.23561 0.297 7.90127 0.297 7.50461C0.297 7.10794 0.427333 6.77927 0.688 6.51861C0.948667 6.24661 1.28867 6.11061 1.708 6.11061C2.116 6.11061 2.456 6.24661 2.728 6.51861C2.98867 6.79061 3.119 7.11927 3.119 7.50461ZM3.119 2.05597C3.119 2.44131 2.98867 2.76997 2.728 3.04197C2.456 3.31397 2.116 3.44997 1.708 3.44997C1.28867 3.44997 0.948667 3.31964 0.688 3.05897C0.427333 2.78697 0.297 2.45264 0.297 2.05597C0.297 1.65931 0.427333 1.33064 0.688 1.06997C0.948667 0.797974 1.28867 0.661974 1.708 0.661974C2.116 0.661974 2.456 0.797974 2.728 1.06997C2.98867 1.34197 3.119 1.67064 3.119 2.05597Z" fill="black"/>
                                        </svg>
                                    </button>
                                </x-slot>
            
                                <x-slot name="content" class="w-0">
                                            <button class="w-full text-left font-medium text-sm block px-3 py-2 text-sm leading-5 text-gray-600 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out"><a href="/denuncia/{{$denuncia->id}}/edit">Editar</a></button>
                                            
                                            <form action="/denuncia/{{ $denuncia->id }}" method="post" class="text-left block px-3 py-2 text-sm leading-5 text-gray-600 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</button>
                                            </form>
                                </x-slot>
                            </x-dropdown>

                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            </div>

        </div>
    </div>
</div>
</x-app-layout>
