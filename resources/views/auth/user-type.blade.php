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
    <div class="flex justify-center mt-6 mb-7 text-3xl font-bold">
        <h1>Escolha como quer se cadastrar</h1>
    </div>
    <div class="flex justify-center text-center">
        <a href="/register" class="ml-auto text-2xl mr-32"><x-user-type-icon type="consumidor"/></a>
        <div class="border-r-2 h-48 mt-28 border-gray-400"></div>
        <a href="/register/company" class="mr-auto ml-24"><x-user-type-icon type="empresa"/></a>
    </div>
</main>

@include('layouts.minfooter')

</body>
</html>
