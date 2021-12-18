<!DOCTYPE html>
<html>
<head>
</head>
<body>

<x-app-layout>





    <div class="max-w-5xl mx-auto my-12" id="form" style="display: none;">
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

                        <legend class="text-center text-2xl border-b border-gray-800">Criar Denúncia</legend>

                        <div class="flex items-center justify-end mt-4">
                            <x-label class="pr-2">Título:</x-label>
                            <x-input type="text" name="title" class="block mt-1 w-full"/>
                        </div>
                        <div class="flex items-center justify-end mt-4">
                            <x-label class="pr-2">Comentário:</x-label>
                            <textarea type="text" name="comment" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"></textarea>
                        </div>
                        <div class="flex items-center justify-end mt-4">
                            <x-label class="pr-2">Data de Reclamação:</x-label>
                            <x-input type="date" name="claim_date" class="block mt-1 w-full"/>
                        </div>
                        <div class="flex items-center justify-end mt-4">
                            <x-label class="pr-2">Latitude:</x-label>
                            <input type="text" name="latitude" id="latitude" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        </div>
                        <div class="flex items-center justify-end mt-4">
                            <x-label class="pr-2">Longitude:</x-label>
                            <input type="text" name="longitude" id="longitude" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        </div>
                        </fieldset>
                        <div class="flex items-center justify-end mt-4">
                            <x-button>Enviar</x-button>
                        </div>
                    </form>
           </div>
        </div>
    </div>



    <div class="max-w-7xl mx-auto my-12">
    <div class="bg-white rounded shadow-sm">
       <div class="p-6">
        <legend class="text-center">Marque a Localização no mapa.</legend>
         <div id="map" style="height: 400px;display: block;"></div>
       </div>
    </div>
</div>

<script
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDy_BoYMtuOPg56qqmooJ3fq1bX1TXKucw&callback=initMap&v=weekly"
    async
  ></script>
  <script>
    let map;
    function initMap() {
        map = new google.maps.Map(document.getElementById("map"), {
           center: {lat: -8.05428, lng: -34.8813},
           zoom: 13,
        });

        map.addListener('click', (data) => {
         let lat = data.latLng.lat();
         let lng =  data.latLng.lng();
      
      const marker = new google.maps.Marker({ 
        position: {lat,lng},
        map: map,
        title: lat+" , "+lng,
        });

         var form = document.getElementById("form");
         var inputLat = document.getElementById("latitude");
         var inputLng = document.getElementById("longitude");

         //map.style.display = 'none';
         form.style.display = 'block';
         inputLat.value = lat;
         inputLng.value = lng;
       
        });
      };
  </script>

</x-app-layout>
</body>
</html>