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
        <div class="bg-white rounded shadow-lg">
            <!-- modal header -->
            <div class="px-4 py-4 flex justify-between items-center">
                <h3 class=""></h3>
                <button class="text-lg text-black close-modal">
                    <svg width="13" height="14" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M15.3837 13.233C15.5875 13.4292 15.7012 13.6937 15.7001 13.9689C15.6989 14.2441 15.5829 14.5077 15.3774 14.7022C15.1719 14.8968 14.8935 15.0066 14.6029 15.0078C14.3123 15.0089 14.033 14.9012 13.8258 14.7082L7.99481 9.18704L2.16383 14.7082C1.95666 14.9012 1.67734 15.0089 1.38672 15.0078C1.0961 15.0066 0.817721 14.8968 0.612219 14.7022C0.406717 14.5077 0.290743 14.2441 0.28956 13.9689C0.288377 13.6937 0.402079 13.4292 0.605901 13.233L6.43679 7.71177L0.605901 2.1905C0.402079 1.99433 0.288377 1.72985 0.28956 1.45467C0.290743 1.17948 0.406717 0.915888 0.612219 0.721301C0.817721 0.526714 1.0961 0.416901 1.38672 0.41578C1.67734 0.41466 1.95666 0.522323 2.16383 0.715319L7.99481 6.23651L13.8258 0.715319C14.033 0.522323 14.3123 0.41466 14.6029 0.41578C14.8935 0.416901 15.1719 0.526714 15.3774 0.721301C15.5829 0.915888 15.6989 1.17948 15.7001 1.45467C15.7012 1.72985 15.5875 1.99433 15.3837 2.1905L9.55283 7.71177L15.3837 13.233Z" fill="black" fill-opacity="0.6"/>
                    </svg>
                </button>
            </div>
            <!-- modal body -->
            <div id="modal">
                <div class="max-w-5xl mx-auto" id="form">
                    <div class="bg-white rounded shadow-sm">
                        <div class="pl-10 pr-10 pb-8">
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

                                    <legend class="text-2xl mb-8 text-center">Denúncia</legend>

                                    <div class=" items-center justify-end mt-4">
                                        <x-label class="pr-2">Título:</x-label>
                                        <div class="border-b border-b-4 border-black w-full">
                                            <x-input type="text" name="title" class="block mt-1 w-full" required/>
                                        </div>
                                    </div>
                                    <div class=" items-center justify-end mt-8">
                                        <x-label class="pr-2">Categoria:</x-label>
                                        <div class="border-b border-b-4 border-black w-full mt-2">
                                            <select type="text" id="categorias" onchange="addCategory()" name="categoria"
                                                class="block pt-0 border-none bg-transparent w-full pl-0 pb-0 font-light text-sm"
                                                required>
                                            <option value=""></option>
                                            @foreach ($categorias as $categoria)
                                                <option id="{{$categoria->id}}" name="{{$categoria->name}}"
                                                        value="{{$categoria->id}}">{{$categoria->name}}</option>
                                            @endforeach
                                        </select>
                                        </div>
                                        <input type="text" name="categorias" hidden>
                                    </div>
                                    <div class=" items-center justify-end mt-8">
                                        <x-label class="pr-2">Comentário:</x-label>
                                        <div class="border-b border-b-4 border-black w-full">
                                            <textarea type="text" name="comment"
                                                  class="block mt-1 w-full border-none bg-transparent w-full pl-0 pb-0 font-light text-sm"
                                                  required>
                                            </textarea>
                                        </div>
                                    </div>

                                    <div class="hidden">
                                        <x-label class="pr-2">Latitude:</x-label>
                                        <x-input type="text" name="latitude" id="latitude" class=""
                                                 required/>
                                    </div>
                                    <div class="hidden">
                                        <x-label class="pr-2">Longitude:</x-label>
                                        <x-input type="text" name="longitude" id="longitude" class=""
                                                 required/>
                                    </div>

                                </fieldset>
                                <div class="categoriesSelected flex space-x-4"></div>
                                <div class="flex mt-8 justify-center">
                                    <button class="text-sm text-white bg-blue-750 rounded-md p-1 px-8 text-sm font-bold">Enviar denúncia</button>
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
        <div class="flex justify-center">
            <div class="pr-6 pt-8 pl-7">
                <h3 class="font-bold pb-10 text-xl">Filtros</h3>

                <div class="text-sm font-light pb-3 mt-1">
                <label>Todas as Denúncias</label>
                <input type="checkbox" id="buttonRadioAll" onclick="filtroAll();" class="mr-1 rounded border-2 border-gray-500 text-gray-700" checked>
                </div>

                <div class="text-sm font-light pb-3 pt-4">
                    @php
                        if (Auth::user()->complaint->isEmpty()) {
                            $disabled = true;
                        } else {
                            $disabled = false;
                        }
                    @endphp
                    <label class="{{ $disabled ? 'text-gray-400' : ''}}">Minhas Denúncias</label>
                    <input type="checkbox" {{ $disabled ? 'disabled' : '' }} class="mr-1 rounded border-2 border-gray-500 text-gray-700" id="buttonRadio" onclick="myComplaint();">
                </div>

                <div class="text-sm font-light pb-3 pt-4">
                    <label>Distancia</label>
                    <div>
                        <input id="zoom" type="range" min="8" max="24" value="13" step="1" class="w-full" onchange="zoomMap()">
                    </div>
                </div>

                <div class="text-sm font-light pb-3 pt-2">
                    <label>Categoria</label>
                    <div class="border-b border-b-4 border-black">
                        <select name="type" id="type" class="block pt-0 border-none bg-transparent pr-56 pl-0 pb-0 font-light text-sm">
                            <option value="1"></option>
                            <option value="2"></option>
                            <option value="3"></option>
                        </select>
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
                     function forModal(id_denuncia) {
                         var id = id_denuncia;

                         $.ajax({
                            url: "/forModal/"+id,
                            method: "GET",
                            dataType: "json",
                            success: function (response){

                              var array = response;
                              var user = <?=Auth::user()->id?>;
                              var idDenuncia = array["id"];


                              $("#title").val(array["title"]);
                              $("#titleLegend").html(array["title"])
                              $("#commentModal").val(array["comment"]);
                            //   $("#positionModal").html(array["position"]);
                              $("#data").val(array["created_at"]);
                              $("#categoriaModal").val(array["category"]);
                            //   $('#modal-map').html();
                           
                            console.log({lat: array["position"].split(', ')[0], lng: array["position"].split(', ')[1]})
                              map = new google.maps.Map(document.getElementById("modal-map"), {
                                  center: {lat: +array["position"].split(', ')[0], lng: +array["position"].split(', ')[1]},
                                  zoom: 15,
                              });

                              if (user == array["user_id"]) { // se o meu id for igual ao id de usuario da denuncia
                                 $("#drop").removeClass('hidden');
                                 $("#idFormodal").val(idDenuncia);
                                 $("#idForedit").val(idDenuncia);
                                 $("#title").attr('disabled', true);
                                 $("#commentModal").attr('disabled', true);
                                 $("#buttonModal").addClass('hidden');
                                 $("#editPosition").addClass('hidden');

                                 $("#buttonEditModal").click(function(){ // no botão editar do dropdown libera os inputs e adiciona uma escuta no mapa do modal
                                    $("input").removeAttr('disabled');
                                    $("#buttonModal").removeClass('hidden');
                                    $("#title").removeAttr('disabled', true);
                                    $("#commentModal").removeAttr('disabled', true);

                                    $("#editPosition").removeClass('hidden');

                         map.addListener('click', (data) => { // escuta que adiciona marcadores no mapa do modal
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
                            
                            var inputLat = document.getElementById("latitudeModal");
                            var inputLng = document.getElementById("longitudeModal");
                            //map.style.display = 'none';
                            inputLat.value = lat; // coloca latitude no input
                            inputLng.value = lng; //coloca longitude no input
                        });
                                 })
                        

                            } else { // se der false, trava todas as opçoes do modal
                                $("#drop").addClass('hidden'); 
                                $("#buttonModal").addClass('hidden');
                                $("input").attr('disabled', true);
                                $("#editPosition").addClass('hidden');
                            }

                            }
                         })
                     }


                    let map;
                    let marker;
                    function initMap() {
                        map = new google.maps.Map(document.getElementById("map"), {
                            center: {lat: -8.05428, lng: -34.8813},
                            zoom: 13,
                        });
                        map.addListener('click', (data) => {
                            let icon = {
                                    url :  `{{ asset('icons/mblue.png')}} `,
                                   scaledSize : new google.maps.Size (50,60)
                                        }
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
                                icon:icon,
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
                    var arrayMarker = [];





                    function complaintAll() {
                        $.ajax({
                            url: "{{ route('denuncia_all') }}",
                            type: "get",
                            data: $(this).serialize(),
                            dataType: 'json',
                            success: function (response) {
                                var json = response;



                                  for (var i = 0; i < json.length; i++) {

                                    let icon = {
                                    url :  `{{ asset('icons') }}/${json[i]["category_id"]}.png`,
                                   scaledSize : new google.maps.Size (50,60)
                                        }

                                    var contentString = "<h1>"+json[i]["title"]+"</h1>";


                                    mark = new google.maps.Marker({
                                    position: { lat: parseFloat(json[i]["latitude"]), lng: parseFloat(json[i]["longitude"])},
                                    map: map,
                                    icon:icon,
                                    title: json[i]["title"],
                                    comment: json[i]["comment"],
                                    identified: json[i]["id"],
                                  });


                                  arrayMarker.push(mark);
                                }



                              var infowindow = new google.maps.InfoWindow();


                               for (var j = 0; j < arrayMarker.length; j++) {

                                  let marker = arrayMarker[j];
                                  const modal = document.getElementById("modal-marker");

                                 google.maps.event.addListener(marker, 'click', function(e) {
                                   modal.classList.remove('hidden')
                                   $("#closeMarker").click(function(){
                                        $("#modal-marker").addClass('hidden');
                                   })

                                      forModal(marker["identified"]);
                                 });
                               }




                            }
                        });
                    }





                   var myArrayMarker = [];

                     function myComplaint() {


                       $.ajax({
                          url: "{{ route('denuncia_my') }}",
                          dataType: "json",
                          success: function (response){

                             document.getElementById("buttonRadioAll").checked = false;
                             document.getElementById("buttonRadio").checked = true;

                              for (var i = 0; i < arrayMarker.length; i++ ) {
                              arrayMarker[i].setMap(null);
                              }
                              arrayMarker.length = 0;

                              var myJson = response;



                              for (var j = 0; j < myJson.length; j++) {
                                let icon = {
                                    url :  `{{ asset('icons') }}/${myJson[j]["category_id"]}.png`,
                                   scaledSize : new google.maps.Size (50,60)
                                        }
                                  mark = new google.maps.Marker({
                                    position: { lat: parseFloat(myJson[j]["latitude"]), lng: parseFloat(myJson[j]["longitude"])},
                                    map: map,
                                    title: myJson[j]["title"],
                                    icon: icon,
                                    identified: myJson[j]["id"]
                                  });
                                   myArrayMarker.push(mark);
                              }

                              var infowindow = new google.maps.InfoWindow();


                               for (var j = 0; j < myArrayMarker.length; j++) {

                                  let marker = myArrayMarker[j];
                                  const modal = document.getElementById("modal-marker");

                                 google.maps.event.addListener(marker, 'click', function(e) {
                                   modal.classList.remove('hidden')
                                   $("#closeMarker").click(function(){
                                        $("#modal-marker").addClass('hidden');
                                   })

                                      forModal(marker["identified"]);
                                 });
                               }
                          }
                       })
                       }



          function filtroAll() {

             $.ajax({
                url: "{{ route('denuncia_all') }}",
                dataType: "json",
                success: function (response) {

                    document.getElementById("buttonRadioAll").checked = true;
                    document.getElementById("buttonRadio").checked = false;


                        for (var i = 0; i < myArrayMarker.length; i++ ) {
                              myArrayMarker[i].setMap(null);
                              }
                              myArrayMarker.length = 0;

                             var jsonResponse = response;
                              for (var j = 0; j < jsonResponse.length; j++) {

                                let icon = {
                                    url :  `{{ asset('icons') }}/${jsonResponse[j]["category_id"]}.png`,
                                   scaledSize : new google.maps.Size (50,60)
                                        }

                                  mark = new google.maps.Marker({
                                    position: { lat: parseFloat(jsonResponse[j]["latitude"]), lng: parseFloat(jsonResponse[j]["longitude"])},
                                    map: map,
                                    icon:icon,
                                    title: jsonResponse[j]["title"],
                                    identified: jsonResponse[j]["id"]
                                  });
                                   arrayMarker.push(mark);
                              }
                              var infowindow = new google.maps.InfoWindow();

                                for (var j = 0; j < arrayMarker.length; j++) {

                                  let marker = arrayMarker[j];
                                  const modal = document.getElementById("modal-marker");

                                 google.maps.event.addListener(marker, 'click', function(e) {
                                   modal.classList.remove('hidden')
                                   $("#closeMarker").click(function(){
                                        $("#modal-marker").addClass('hidden');
                                   })

                                      forModal(marker["identified"]);
                                 });
                               }
                }
             })

          }




       $(document).ready(function(){
        complaintAll();
       })

       function zoomMap(){
        range = document.getElementById("zoom");
        value = parseInt(range.value)
        console.log(value)
        map.setZoom(value);
       }
                </script>
            </div>
        </div>

        <div id="modal-marker" class="modal h-screen w-full fixed left-0 top-0 flex justify-center items-center bg-black bg-opacity-50 hidden z-50">
        <!-- modal -->
        <div class="bg-white rounded shadow-lg">
            <!-- modal header -->
            <div class="px-4 py-4 flex justify-between items-center">
                <div id="drop">
                <x-dropdown>
                                <x-slot name="trigger" class="">
                                    <button>
                                        <svg width="4" height="15" viewBox="0 0 4 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M3.119 12.9532C3.119 13.3386 2.98867 13.6672 2.728 13.9392C2.456 14.2112 2.116 14.3472 1.708 14.3472C1.28867 14.3472 0.948667 14.2169 0.688 13.9562C0.427333 13.6842 0.297 13.3499 0.297 12.9532C0.297 12.5566 0.427333 12.2279 0.688 11.9672C0.948667 11.6952 1.28867 11.5592 1.708 11.5592C2.116 11.5592 2.456 11.6952 2.728 11.9672C2.98867 12.2392 3.119 12.5679 3.119 12.9532ZM3.119 7.50461C3.119 7.88994 2.98867 8.21861 2.728 8.49061C2.456 8.76261 2.116 8.89861 1.708 8.89861C1.28867 8.89861 0.948667 8.76827 0.688 8.50761C0.427333 8.23561 0.297 7.90127 0.297 7.50461C0.297 7.10794 0.427333 6.77927 0.688 6.51861C0.948667 6.24661 1.28867 6.11061 1.708 6.11061C2.116 6.11061 2.456 6.24661 2.728 6.51861C2.98867 6.79061 3.119 7.11927 3.119 7.50461ZM3.119 2.05597C3.119 2.44131 2.98867 2.76997 2.728 3.04197C2.456 3.31397 2.116 3.44997 1.708 3.44997C1.28867 3.44997 0.948667 3.31964 0.688 3.05897C0.427333 2.78697 0.297 2.45264 0.297 2.05597C0.297 1.65931 0.427333 1.33064 0.688 1.06997C0.948667 0.797974 1.28867 0.661974 1.708 0.661974C2.116 0.661974 2.456 0.797974 2.728 1.06997C2.98867 1.34197 3.119 1.67064 3.119 2.05597Z" fill="black"/>
                                        </svg>
                                    </button>
                                </x-slot>
            
                                <x-slot name="content" class="w-0">
                                        <form action="{{ route('deleteOnmodal') }}" method="POST" class="text-left block px-3 py-2 text-sm leading-5 text-gray-600 transition duration-150 ease-in-out">
                                                @csrf
                                                <input type="hidden" name="id" id="idFormodal">
                                                <button type="submit" onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</button>
                                            </form>
                                </x-slot>

                             <x-slot name="slot" class="w-full">
                              <button type="button" id="buttonEditModal" class="px-3 py-2 text-sm text-gray-600">Editar</button>
                            </x-slot>
                          
                      </x-dropdown>  
                      </div>
                               


                <h3 class=""></h3>
                <button id="closeMarker" class="text-lg text-black close-modal">
                    <svg width="13" height="14" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M15.3837 13.233C15.5875 13.4292 15.7012 13.6937 15.7001 13.9689C15.6989 14.2441 15.5829 14.5077 15.3774 14.7022C15.1719 14.8968 14.8935 15.0066 14.6029 15.0078C14.3123 15.0089 14.033 14.9012 13.8258 14.7082L7.99481 9.18704L2.16383 14.7082C1.95666 14.9012 1.67734 15.0089 1.38672 15.0078C1.0961 15.0066 0.817721 14.8968 0.612219 14.7022C0.406717 14.5077 0.290743 14.2441 0.28956 13.9689C0.288377 13.6937 0.402079 13.4292 0.605901 13.233L6.43679 7.71177L0.605901 2.1905C0.402079 1.99433 0.288377 1.72985 0.28956 1.45467C0.290743 1.17948 0.406717 0.915888 0.612219 0.721301C0.817721 0.526714 1.0961 0.416901 1.38672 0.41578C1.67734 0.41466 1.95666 0.522323 2.16383 0.715319L7.99481 6.23651L13.8258 0.715319C14.033 0.522323 14.3123 0.41466 14.6029 0.41578C14.8935 0.416901 15.1719 0.526714 15.3774 0.721301C15.5829 0.915888 15.6989 1.17948 15.7001 1.45467C15.7012 1.72985 15.5875 1.99433 15.3837 2.1905L9.55283 7.71177L15.3837 13.233Z" fill="black" fill-opacity="0.6"/>
                    </svg>
                </button>
            </div>
            <!-- modal body -->
            <div id="modal">
                <div class="max-w-5xl mx-auto" id="form">
                    <div class="bg-white rounded shadow-sm">
                        <div class="pl-10 pr-10 pb-8">
                            @if ($errors->any())
                                <div class="alert alert-danger text-red-600">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                         <div class="container-md">
                         <form action="{{ route('editOnmodal') }}" method="POST">
                    @csrf
                    
                    <fieldset>

                        <legend class="text-center text-2xl mb-8" id="titleLegend"></legend>

                        <div class="items-center justify-end mt-4">
                            <x-label class="pr-2">Título:</x-label>
                            <div class="border-b border-b-4 border-black w-full mt-4">
                                <x-input type="text" name="title" id="title"
                                         class="block mt-1 w-full pb-6" required/>
                            </div>
                        </div>

                        <div class="items-center justify-end mt-8">
                            <x-label class="pr-2">Comentário:</x-label>
                            <div class="border-b border-b-4 border-black w-full">
                                <textarea type="text" name="comment" id="commentModal"
                                          class="block mt-1 w-full border-none bg-transparent pl-0 pb-0 font-light resize-none"
                                          required></textarea>
                            </div>
                        </div>

                        <div>
                            <div class="w-full mt-4">
                                <x-input type="hidden" name="id" id="idForedit"
                                         class="block mt-1 w-full pb-6" required/>
                            </div>
                        </div>


                        <div class="hidden">
                            <x-label class="pr-2">Latitude:</x-label>
                            <x-input type="hidden" name="latitude" id="latitudeModal" class=""
                                     required/>
                        </div>
                        <div class="hidden">
                            <x-label class="pr-2">Longitude:</x-label>
                            <x-input type="hidden" name="longitude" id="longitudeModal" class=""
                                     required/>
                        </div>

                    </fieldset>


                    <div class="mt-3">
                         <p class="text-center" id="editPosition">Clique no mapa para editar a posição.</p>
                         {{-- <p class="text-center" id="positionModal"></p> --}}
                         <div id="modal-map" style="height: 300px; width:550px; display: block;"></div>
                         </div>

                    <div class="flex justify-center mt-8" id="buttonModal">
                        <x-button>Enviar</x-button>
                    </div>
                </form>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>