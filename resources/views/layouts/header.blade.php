<div class="relative flex items-top justify-center min-h-screen sm:items-center py-4 sm:pt-0">
    <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex fixed top-5 left-0 px-6 py-4 sm:block font-bold text-2xl">
        <a href="">
            {{ __('Fique Alerta') }}
        </a>
    </div>

    @if (Route::has('login'))
        <div class="hidden fixed top-5 right-0 px-6 py-4 sm:block">
            @auth
                <a href="{{ url('/dashboard') }}" class="text-base text-gray-700 dark:text-gray-500 underline">Dashboard</a>
            @else
                <a href="{{ route('login') }}" class="text-base text-blue-750 bg-white border border-blue-750 px-10 rounded-lg">Entrar</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="ml-4 text-base text-white bg-blue-750 rounded-md p-2 px-10">Registrar-se</a>
                @endif
            @endauth
        </div>
    @endif
