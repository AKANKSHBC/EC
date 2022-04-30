<nav x-data="{ open : false }" class="fixed top-0 left-0 right-0">
    {{-- Responsive: Mobile  --}}
    <div class="flex justify-between items-center mx-auto px-4 h-20 border-b-2 2sm:justify-start bg-white">
        <div class="flex items-center 2sm:hidden">
                <button class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out"
                x-on:click="open = ! open">
                    <svg class="h-7 w-7" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                    <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
        </div>
        <div class="shrink-0 flex items-center 2sm:ml-16">
            <a href="{{ route('home') }}">
                <x-application-logo class="block h-10 w-auto fill-current text-gray-600" />
            </a>
            <a href="{{ route('home') }}" class="hidden 2sm:block pl-2 text-xl">EC&CC</a>
        </div>
        <div class="flex 2sm:basis-auto 2sm:grow 2sm:justify-between 2sm:mr-16">
            <div class="hidden space-x-8 sm:-my-px sm:ml-10 2sm:flex 2sm:ml-16">
                @auth
                <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                    {{ __('Dashboard') }}
                </x-nav-link>
                @endauth
                <x-nav-link :href="route('activity')" :active="request()->routeIs('activity')">
                    {{ __('Activity') }}
                </x-nav-link>
                <x-nav-link :href="route('about')" :active="request()->routeIs('about')">
                    {{ __('About') }}
                </x-nav-link>
            </div>
            <div>
                @auth
                {{-- <x-slot name="trigger">
                    <button class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </button>
                </x-slot> --}}
                <x-dropdown x-align="right" width="48">
                    <x-slot name="trigger">
                        <button class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                            <div class="ml-1">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
                @else
                    <a href="{{ route('login') }}" class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-gray-500 hover:text-gray-700 hover:border-gray-800 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out pr-2">Log in</a>
    
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-gray-500 hover:text-gray-700 hover:border-gray-800 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">Register</a>
                    @endif
                @endauth  
                
            </div>
        </div>
        
    </div>
    <div  :class="{'block': open, 'hidden': ! open}" class="hidden 2sm:hidden container w-3/5 h-screen border-2 bg-white">
        <div class="flex h-[calc(100%_-_83px)] flex-col justify-between">
                <div class="pt-2 pb-3 space-y-1">
                    @auth
                        <x-sidebarNav :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                            {{ __('Dasboard') }}
                        </x-sidebarNav>
                    @endauth
                    <x-sidebarNav :href="route('activity')" :active="request()->routeIs('activity')">
                        {{ __('Activity') }}
                    </x-sidebarNav>
                    <x-sidebarNav :href="route('about')" :active="request()->routeIs('about')">
                        {{ __('About') }}
                    </x-sidebarNav>
                </div>
                <hr>
                @if (Route::has('login'))
                    <div class="py-4">
                        @auth
                            <div class="px-4 font-medium text-base text-gray-800">{{ Auth::user()->name }}
                            </div>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
            
                                <x-responsive-nav-link :href="route('logout')"
                                        onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-responsive-nav-link>
                            </form>
                        @else
                        <x-sidebarNav :href="route('login')" :active="false">
                            {{ __('Login') }}
                        </x-sidebarNav>
        
                            @if (Route::has('register'))
                            <x-sidebarNav :href="route('register')" :active="false">
                                {{ __('Register') }}
                            </x-sidebarNav>
                            @endif
                        @endauth
                    </div>
                @endif
        </div>    
    </div>
</nav>
<div class="" style="height: 82px;">

</div>

  