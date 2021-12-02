<nav class="font-sans flex flex-col text-center sm:flex-row sm:text-left sm:justify-between py-4 px-6 bg-white sm:items-baseline w-full">
    <div class="mb-2 sm:mb-0">
        <a href="/" class="text-2xl font-bold">
            {{ __('Fique Alerta') }}
        </a>
    </div>
    @if (Route::has('login'))
        <div>
            @auth
                <a href="{{ url('/dashboard') }}" class="text-base text-white bg-blue-750 px-10 p-2 rounded-md">Dashboard</a>
            @else
                <a href="{{ route('login') }}" class="text-base text-blue-750 bg-white border border-blue-750 px-10 rounded-lg">Entrar</a>

                @if (Route::has('register'))
                    <a href="{{ route('type') }}" class="ml-4 text-base text-white bg-blue-750 rounded-md p-2 px-10">Cadastrar</a>
                @endif
            @endauth
        </div>
    @endif
</nav>

