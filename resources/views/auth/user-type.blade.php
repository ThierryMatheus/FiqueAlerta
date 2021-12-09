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

<main class="flex-grow">
    <div class="flex justify-center mt-24 text-4xl font-bold">
        <h1>Cadastre-se como:</h1>
    </div>
    <div class="flex justify-center text-center">
        <a href="/register" class="mt-64 ml-auto mr-96 text-2xl font-bold"><x-user-type-icon type="consumidor"/>Consumidor</a>
            <a href="/register/company" class="mt-64 mr-auto ml-96 text-2xl font-bold"><x-user-type-icon type="empresa"/>Empresa</a>
    </div>
</main>

@include('layouts.minfooter')

</body>
</html>
