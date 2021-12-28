@if (Route::has('login'))
        @auth
        <nav x-data="{ open: false }" class="">
            <!-- Primary Navigation Menu -->
            <div class="">
                <div class="">
                    <nav class="font-sans flex flex-col text-center sm:flex-row sm:text-left sm:justify-between py-4 px-6 bg-white w-full">
                        <!-- Logo -->
                        <div class="mb-2 sm:mb-0">
                            <a href="dashboard" class="text-2xl font-bold ml-16 tb-5">
                                {{ __('Fique Alerta') }}
                            </a>
                        </div>
        
                        <!-- Navigation Links -->
                        <div class="pr-2 mr-2 flex">
                            
                            <a href="">
                                <svg class="mt-2 mr-9" width="19" height="19" viewBox="0 0 23 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M9.3052 0C14.4462 0 18.6109 4.16025 18.6109 9.29082C18.6136 10.981 18.1522 12.6396 17.2768 14.0863L21.7885 18.5909L21.7728 18.6066C22.2543 19.0668 22.55 19.7201 22.55 20.4584C22.5503 21.8848 21.4122 23.0003 19.9849 23C19.2559 22.9997 18.604 22.7085 18.1387 22.2347L18.1273 22.246L13.4723 17.598C12.1792 18.2462 10.7521 18.5831 9.3052 18.5816C4.16395 18.5816 4.95911e-05 14.422 4.95911e-05 9.29082C4.95911e-05 4.16025 4.16424 0 9.3052 0ZM9.24879 14.9283C12.4621 14.9283 15.065 12.3286 15.065 9.12155C15.065 5.91506 12.4621 3.31479 9.24879 3.31479C6.0355 3.31479 3.43318 5.91477 3.43318 9.12155C3.43289 12.3286 6.0355 14.9283 9.24879 14.9283Z" fill="black"/>
                                </svg>
                            </a>
                            
                            <a href="{{ route('denuncia.index') }}" class="mr-8 text-sm font-bold rounded-md py-1.5">Denúncias</a>
        
                            <a href="">
                                <svg class="mt-2" width="17" height="18" viewBox="0 0 21 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M21 18.619V19.7143H0V18.619L2.33333 16.4286V9.85714C2.33333 6.4619 4.70167 3.4719 8.16667 2.5081V2.19048C8.16667 1.60953 8.4125 1.05237 8.85008 0.641576C9.28767 0.230782 9.88116 0 10.5 0C11.1188 0 11.7123 0.230782 12.1499 0.641576C12.5875 1.05237 12.8333 1.60953 12.8333 2.19048V2.5081C16.2983 3.4719 18.6667 6.4619 18.6667 9.85714V16.4286L21 18.619ZM12.8333 20.8095C12.8333 21.3905 12.5875 21.9476 12.1499 22.3584C11.7123 22.7692 11.1188 23 10.5 23C9.88116 23 9.28767 22.7692 8.85008 22.3584C8.4125 21.9476 8.16667 21.3905 8.16667 20.8095" fill="black"/>
                                </svg>
                            </a>
        
                                <x-dropdown>
                                    <x-slot name="trigger">
                                        <button class="mt-1 ml-5">
                                            <svg class="w-full" width="25" height="25" viewBox="0 0 35 35" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M17.5 30.1C13.125 30.1 9.2575 27.86 7 24.5C7.0525 21 14 19.075 17.5 19.075C21 19.075 27.9475 21 28 24.5C26.8431 26.2227 25.2803 27.6345 23.4492 28.6111C21.6182 29.5876 19.5752 30.0989 17.5 30.1ZM17.5 5.25C18.8924 5.25 20.2277 5.80312 21.2123 6.78769C22.1969 7.77226 22.75 9.10761 22.75 10.5C22.75 11.8924 22.1969 13.2277 21.2123 14.2123C20.2277 15.1969 18.8924 15.75 17.5 15.75C16.1076 15.75 14.7723 15.1969 13.7877 14.2123C12.8031 13.2277 12.25 11.8924 12.25 10.5C12.25 9.10761 12.8031 7.77226 13.7877 6.78769C14.7723 5.80312 16.1076 5.25 17.5 5.25ZM17.5 0C15.2019 0 12.9262 0.452651 10.803 1.33211C8.67984 2.21157 6.75066 3.50061 5.12563 5.12563C1.84374 8.40752 0 12.8587 0 17.5C0 22.1413 1.84374 26.5925 5.12563 29.8744C6.75066 31.4994 8.67984 32.7884 10.803 33.6679C12.9262 34.5474 15.2019 35 17.5 35C22.1413 35 26.5925 33.1563 29.8744 29.8744C33.1563 26.5925 35 22.1413 35 17.5C35 7.8225 27.125 0 17.5 0Z" fill="black"/>
                                            </svg>
                                        </button>
                                    </x-slot>
                
                                    <x-slot name="content">
                                        <!-- Authentication -->
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                
                                            <x-dropdown-link :href="route('logout')"
                                                    onclick="event.preventDefault();
                                                                this.closest('form').submit();">
                                                {{ __('Sair') }}
                                            </x-dropdown-link>
                                        </form>
                                    </x-slot>
                                </x-dropdown>
                        </div>
                    </nav>
        
        
                    <!-- Hamburger -->
                    <div class="-mr-2 flex items-center sm:hidden">
                        <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                            <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                                <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        
            <!-- Responsive Navigation Menu -->
            <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
                <div class="pt-2 pb-3 space-y-1">
                    <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        {{ __('Dashboard') }}
                    </x-responsive-nav-link>
                </div>
        
                <!-- Responsive Settings Options -->
                <div class="pt-4 pb-1 border-t border-gray-200">
                    <div class="px-4">
                        <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                        <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                    </div>
        
                    <div class="mt-3 space-y-1">
                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
        
                            <x-responsive-nav-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-responsive-nav-link>
                        </form>
                    </div>
                </div>
            </div>
        </nav>        
        @else
        <nav class="font-sans flex flex-col text-center sm:flex-row sm:text-left sm:justify-between py-4 px-6 bg-white sm:items-baseline w-full">
            <div class="mb-2 sm:mb-0">
                <a href="/" class="text-2xl font-bold ml-16">
                    {{ __('Fique Alerta') }}
                </a>
            </div>
            <div class="pr-16 mr-2">
                <a href="{{ route('login') }}" class="text-sm font-bold text-blue-750 bg-white border border-blue-750 px-9 rounded-md">Entrar</a>

                @if (Route::has('register'))
                    <a href="{{ route('type') }}" class="ml-4 text-sm font-bold text-white bg-blue-750 rounded-md py-1.5 px-11">Cadastrar</a>
                @endif
            </div>
        </nav>
        @endauth
@endif