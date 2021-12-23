<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body>
@include('layouts.navigation', ['show_menu' => $menu])

<main class="flex flex-col bg-white">
    <div>
        <div class="pt-8 pb-6  lg:px-8">
            {{ $header ?? '' }}
        </div>
        <div class="mt-5">
            {{ $slot ?? ''}}
        </div>
    </div>
</main>
    @include('layouts.minfooter')
</body>
</html>
