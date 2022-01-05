<x-app-layout>
    <div class="max-w-5xl mx-auto my-12">
        <div class="bg-white rounded shadow-sm">
            <div class="p-6">
                @if ($errors->any())
                    <div class="alert alert-danger text-red-600">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="/denuncia/{{ $denuncia->id }}" method="POST">
                    @csrf
                    @method('PUT')
                    <fieldset>

                        <legend class="text-center text-2xl mb-8">Editar Denúncia</legend>

                        <div class="items-center justify-end mt-4">
                            <x-label class="pr-2">Título:</x-label>
                            <div class="border-b border-b-4 border-black w-full mt-4">
                                <x-input type="text" name="title" value="{{ ucwords($denuncia->title) }}"
                                         class="block mt-1 w-full pb-6" required/>
                            </div>
                        </div>

                        <div class="items-center justify-end mt-8">
                            <x-label class="pr-2">Comentário:</x-label>
                            <div class="border-b border-b-4 border-black w-full">
                                <textarea type="text" name="comment"
                                          class="block mt-1 w-full border-none bg-transparent pl-0 pb-0 font-light resize-none"
                                          required>{{ ucwords($denuncia->comment) }}</textarea>
                            </div>
                        </div>

                        <div class="items-center justify-end mt-8">
                            <x-label class="pr-2">Categoria:</x-label>
                            <div class="border-b border-b-4 border-black w-full">

                                <select type="text" id="categorias" onchange="addCategory()" name="categoria"
                                        class="block mt-1 w-full border-none bg-transparent pl-0 pb-0 font-light pb-6"
                                        required>
                                    <option value="">Categorias</option>
                                    @foreach ($categorias as $categoria)
                                        <option id="{{$categoria->id}}" name="{{$categoria->name}}"
                                                value="{{$categoria->id}}">{{$categoria->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <input type="text" name="categorias" hidden>
                            <input type="text" name="remove" id="RemovedCategories" hidden>
                        </div>

                        <div class="hidden">
                            <x-label class="pr-2">Latitude:</x-label>
                            <x-input type="hidden" name="latitude" value="{{ $denuncia->latitude }}" id="latitude" class=""
                                     required/>
                        </div>
                        <div class="hidden">
                            <x-label class="pr-2">Longitude:</x-label>
                            <x-input type="hidden" name="longitude" value="{{ $denuncia->longitude }}" id="longitude" class=""
                                     required/>
                        </div>

                    </fieldset>

                    <div class="categoriesSelected flex mt-4">
                        @php
                            $categoriesSelected = $denuncia::find($denuncia->id)->categories;
                        @endphp
                        <input type="text" id="selectedCategories" value="{{$categoriesSelected}}" hidden>

                        @foreach($categoriesSelected as $categoria)
                            <p id="categoria{{$categoria->id}}" onclick="removeCategory(categoria{{$categoria->id}})"
                               class="categorySelected text-center cursor-pointer">{{$categoria->name}}</p>
                        @endforeach
                    </div>

                    <div class="flex justify-center mt-4">
                        <x-button>Enviar</x-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        let categoriesadded = []
        let categoriesremoved = []
        let removedcategories = document.getElementById("RemovedCategories");
        let c = document.getElementsByClassName("categorySelected").length

        for (i = 0; i < c; i++) {
            let id = document.getElementsByClassName("categorySelected")[i].id.slice(-1)
            categoriesadded.push(id)
        }
        let inp = document.getElementsByName("categorias")[0]


        function addCategory() {

            let value = document.getElementById("categorias").value;

            let name = document.getElementById(value).text;
            if (!categoriesadded.includes(value)) {
                let categorySelected = document.createElement("p");
                let title = document.createTextNode(name);
                categorySelected.appendChild(title);
                categoriesadded.push(value);
                inp.value = categoriesadded;
                categorySelected.setAttribute("id", "categoria" + value);
                let cat = "categoria" + value
                categorySelected.setAttribute("onclick", `removeCategory(${cat})`);


                document.getElementsByClassName("categoriesSelected")[0].appendChild(categorySelected);

            }


        }

        function removeCategory(category) {

            let value = category.id.slice(-1)


            let index = categoriesadded.indexOf(value)
            if (index > -1) {
                categoriesadded.splice(index, 1);
                categoriesremoved.push(value)
                removedcategories.value = categoriesremoved;
                let categoryremoved = document.getElementById("categoria" + value);
                document.getElementsByClassName("categoriesSelected")[0].removeChild(categoryremoved);
                inp.value = categoriesadded;
            }
        }


    </script>
</x-app-layout>
