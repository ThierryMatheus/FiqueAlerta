<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Fique Alerta</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

</head>
<body class="antialiased flex flex-col min-h-screen">
    <header>
        @include('layouts.header')
    </header>
    <x-app-layout>
            <div id="map" style="height: 400px;"></div>
    </x-app-layout>

    @include('layouts.footer')
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
        const marker = new google.maps.Marker({
          position: {lat: -8.05428, lng: -34.8813},
          map: map,
        });
      };
  </script>
</body>
</html>
