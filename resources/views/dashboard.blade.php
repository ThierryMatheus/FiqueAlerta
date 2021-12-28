<x-app-layout>

    {{--    <div class="min-w-0 flex-auto px-4 sm:px-6 xl:px-8 pt-10 pb-24 lg:pb-16">--}}
    {{--        <div class="rounded-t-xl overflow-hidden bg-gradient-to-r from-fuchsia-50 to-fuchsia-100 p-8">--}}
    {{--            <div class="grid grid-cols-3 gap-4" id="complaint">--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </div>--}}

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js"></script>

    <div
        class="modal h-screen w-full fixed left-0 top-0 flex justify-center items-center bg-black bg-opacity-50 hidden z-50">
        <!-- modal -->
        <div class="bg-white rounded shadow-lg w-1/2">
            <!-- modal header -->
            <div class="border-b px-4 py-2 flex justify-between items-center">
                <h3 class="font-semibold text-lg">Modal Title</h3>
                <button class="text-black close-modal">&cross;</button>
            </div>
            <!-- modal body -->
            <div id="modal">
                <div class="max-w-5xl mx-auto my-12" id="form">
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
                            <form action="{{ route('denuncia.store') }}" method="POST">
                                @csrf
                                <fieldset>

                                    <legend class="text-center text-2xl border-b border-gray-800">Criar Denúncia
                                    </legend>

                                    <div class="flex items-center justify-end mt-4">
                                        <x-label class="pr-2">Título:</x-label>
                                        <x-input type="text" name="title" class="block mt-1 w-full" required/>
                                    </div>
                                    <div class="flex items-center justify-end mt-4">
                                        <x-label class="pr-2">Comentário:</x-label>
                                        <textarea type="text" name="comment"
                                                  class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                                  required></textarea>
                                    </div>
                                    <div class="flex items-center justify-end mt-4">
                                        <x-label class="pr-2">Data de Reclamação:</x-label>
                                        <x-input type="date" name="claim_date" class="block mt-1 w-full" required/>
                                    </div>
                                    <div class="flex items-center justify-end mt-4">
                                        <x-label class="pr-2">Latitude:</x-label>
                                        <x-input type="text" name="latitude" id="latitude" class="block mt-1 w-full"
                                                 required/>
                                    </div>
                                    <div class="flex items-center justify-end mt-4">
                                        <x-label class="pr-2">Longitude:</x-label>
                                        <x-input type="text" name="longitude" id="longitude" class="block mt-1 w-full"
                                                 required/>
                                    </div>
                                    <div class="flex items-center justify-end mt-4">
                                        <x-label class="pr-2">Categoria:</x-label>
                                        <select type="text" id="categorias" onchange="addCategory()" name="categoria"
                                                class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                                required>
                                            <option value="">Categorias</option>
                                            @foreach ($categorias as $categoria)
                                                <option id="{{$categoria->id}}" name="{{$categoria->name}}"
                                                        value="{{$categoria->id}}">{{$categoria->name}}</option>
                                            @endforeach
                                        </select>
                                        <input type="text" name="categorias" hidden>
                                </fieldset>
                                <div class="categoriesSelected flex space-x-4 mt-5"></div>
                                <div class="flex items-center justify-end mt-4">
                                    <x-button>Enviar</x-button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- preciso pensar num jeito de pegar o nome da categoria no javascript
        Vou criar um input hidden com o value que é um array de todas categorias selecionadas-->
        <div class="flex sm:justify-between">
            <div class="pr-6 pt-8 pl-7">
                <h3 class="font-bold pb-10 text-xl">Filtros</h3>

                <div>
                    <p class="text-sm font-light pb-2">Localização</p>
                    <div class="border-b border-b-4 border-black">
                        <select name="type" id="type" class="block pt-0 border-none bg-transparent pr-56 pl-0 pb-0 font-light text-sm">
                            <option value="1"></option>
                            <option value="2"></option>
                            <option value="3"></option>
                        </select>
                    </div>
                </div>

                <div>
                    <p class="text-sm font-light pb-3 pt-8">Distancia</p>
                    <div>
                        <input type="range" class="w-full">
                    </div>
                </div>

                <div>
                    <p class="text-sm font-light pb-3 pt-8">Categoria</p>
                    <div class="border-b border-b-4 border-black">
                        <select name="type" id="type" class="block pt-0 border-none bg-transparent pr-56 pl-0 pb-0 font-light text-sm">
                            <option value="1"></option>
                            <option value="2"></option>
                            <option value="3"></option>
                        </select>
                    </div>
                </div>

                <div>
                    <p class="text-sm font-light pb-2 pt-8">Empresa</p>
                    <div class="flex mt-3">
                        <div class="flex w-full">
                            <input type="checkbox" class="mr-1">
                            <p class="text-xs">Públicas</p>
                        </div>
                        <div class="flex">
                            <input type="checkbox" class="mr-1">
                            <p class="text-xs mr-5">Privadas</p>
                        </div> 
                    </div>
                </div>
                <div class="mt-16 ml-12">
                    <button class="text-sm text-white bg-blue-750 rounded-md p-1 px-10 text-sm font-bold">Aplicar</button>
                </div>

            </div>
            <div class="container relative">
                <div>
                    <div id="map" style="height: 595px; display: block;"></div>
                </div>
    
                <script
                    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDy_BoYMtuOPg56qqmooJ3fq1bX1TXKucw&callback=initMap&v=weekly"
                    async
                ></script>
                <script>
                    let map;
                    let marker;
    
                    function initMap() {
                        map = new google.maps.Map(document.getElementById("map"), {
                            center: {lat: -8.05428, lng: -34.8813},
                            zoom: 13,
                        });
    
                        map.addListener('click', (data) => {
                            let lat = data.latLng.lat();
                            let lng = data.latLng.lng();
                            const modal = document.querySelector('.modal');
                            const closeModal = document.querySelectorAll('.close-modal');
    
    
                            if (marker && marker.setMap) {
                                marker.setMap(null)
                            }
    
                            marker = new google.maps.Marker({
                                position: {lat, lng},
                                map: map,
                                title: lat + " , " + lng,
                            });
    
                            /* logica do modal */
    
                            modal.classList.remove('hidden')
    
                            closeModal.forEach(close => {
                                close.addEventListener('click', function () {
                                    modal.classList.add('hidden')
                                });
                            });
    
    
                            var inputLat = document.getElementById("latitude");
                            var inputLng = document.getElementById("longitude");
    
                            //map.style.display = 'none';
    
                            inputLat.value = lat;
                            inputLng.value = lng;
    
                        });
                    };
                </script>
    
                <script>
                    let categoriesadded = []
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
                        let index = categoriesadded.indexOf(value);
                        if (index > -1) {
                            categoriesadded.splice(index, 1);
                            let categoryremoved = document.getElementById("categoria" + value);
                            document.getElementsByClassName("categoriesSelected")[0].removeChild(categoryremoved);
                            inp.value = categoriesadded;
                        }
                    }
    
    
                </script>
    
                <script>
    
                    $(function () {
                        $.ajax({
                            url: "{{ route('denuncia_all') }}",
                            type: "get",
                            data: $(this).serialize(),
                            dataType: 'json',
                            success: function (response) {
                                var json = response;
    
                                for (i = 0; i < json.length; i++) {
                                    var div = document.getElementById("complaint");
                                    var divDenuncia = document.createElement("div");
                                    var a = document.createElement("a");
    
                                    divDenuncia.className = 'h-12 flex items-center bg-gray-200 rounded-md text-center pl-2';
                                    divDenuncia.id = i;
                                    a.id = i + 'denuncia';
                                    a.innerHTML = json[i]["title"];
    
    
                                    div.appendChild(divDenuncia);
                                    divDenuncia.appendChild(a);
                                }
                            }
                        });
                    });
                </script>
            </div>
        </div>
</x-app-layout>
