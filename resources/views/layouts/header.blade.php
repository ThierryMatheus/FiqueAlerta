<nav class="font-sans flex flex-col text-center sm:flex-row sm:text-left sm:justify-between py-4 px-6 bg-white sm:items-baseline w-full">
    <div class="mb-2 sm:mb-0">
        <a href="/" class="text-2xl font-bold ml-16">
            {{ __('Fique Alerta') }}
        </a>
    </div>
    {{--@if (Route::has('login'))--}}
        <div class="pr-16 mr-2">
            {{--@auth
                <a href="{{ url('/dashboard') }}" class="text-base text-white bg-blue-750 px-10 p-2 rounded-md">Dashboard</a>
            @else--}}
                <a href="{{ route('login') }}" class="text-sm font-bold text-blue-750 bg-white border border-blue-750 px-9 rounded-md">Entrar</a>

                @if (Route::has('register'))
                    <a href="{{ route('type') }}" class="ml-4 text-sm font-bold text-white bg-blue-750 rounded-md py-1.5 px-11">Cadastrar</a>
                @endif
            {{--@endauth--}}
        </div>
    {{--@endif--}}
</nav>

