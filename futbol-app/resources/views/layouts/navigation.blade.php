<nav x-data="{ open: false }" class="bg-gray-50 border-b border-gray-200">

    <!-- Primary Navigation Menu -->
    <div class="flex justify-between mx-auto p-6 bg-sky-800">

        <!-- Left section -->
        <div class="flex">

            <!-- Logo and tilte -->
            <div class="flex items-center flex-shrink-0 text-white mr-6">

                <!-- Logo -->
                <x-application-logo />

                <!-- Title  -->
                <span class="font-semibold text-xl tracking-tight">Super futbol league</span>

            </div>

            <!-- Navigation Links -->
            <div class="hidden space-x-2 sm:-my-px sm:ms-0 lg:flex">

                <!-- Games -->
                <x-nav-link :href="route('games.index')" :active="request()->routeIs('games*')">
                    {{ __('nav_games') }}
                </x-nav-link>

                <!-- Ranking -->
                <x-nav-link :href="route('ranking.index')" :active="request()->routeIs('ranking*')">
                    {{ __('nav_ranking') }}
                </x-nav-link>

                @auth
                    <!-- Teams -->
                    <x-nav-link :href="route('teams.index')" :active="request()->routeIs('teams*')">
                        {{ __('nav_teams') }}
                    </x-nav-link>

                    <!-- Leagues -->
                    <x-nav-link :href="route('leagues.index')" :active="request()->routeIs('leagues*')">
                        {{ __('nav_manage_leagues') }}
                    </x-nav-link>
                @endauth

            </div>

            <!-- League Dropdown -->
            <div class="hidden lg:flex items-center lg:ml-4">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button
                            class="max-w-36 xl:max-w-64 overflow-hidden inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md ring-1 ring-inset ring-white text-white focus:outline-none transition ease-in-out duration-150">
                            <div class="truncate">{{ $activeLeague ? $activeLeague->name : 'Liga activa' }}</div>

                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <!-- Content -->
                    <x-slot name="content">
                        @foreach ($allLeagues as $league)
                            <form action="{{ route('leagues.dropdown', $league) }}" method="post">
                                @csrf
                                @method('PATCH')

                                <input type="hidden" id="active" name="active" value="1">

                                @if (!$league->active)
                                    <x-dropdown-link :href="route('leagues.dropdown', $league)"
                                        onclick="event.preventDefault();
                                            this.closest('form').submit();">
                                        {{ $league->name }}
                                    </x-dropdown-link>
                                @elseif ($league->active)
                                    <x-dropdown-link href="#" class="pointer-events-none"
                                        onclick="event.preventDefault();">
                                        {{ $league->name }}
                                    </x-dropdown-link>
                                @endif
                            </form>
                        @endforeach
                    </x-slot>
                </x-dropdown>
            </div>

        </div>

        <!-- Right section -->
        <div class="flex">
            <!-- Unauthenticated -->
            @guest
                <nav class="hidden -mx-3 lg:flex justify-end">
                    <!-- Login -->
                    <x-nav-link :href="route('login')">
                        {{ __('Log in') }}
                    </x-nav-link>
                    <!-- Register -->
                    <x-nav-link :href="route('register')">
                        {{ __('Register') }}
                    </x-nav-link>
                </nav>
            @endguest

            <!-- Authenticated -->
            @auth
                <div class="hidden lg:flex md:items-center sm:ms-6">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button
                                class="max-w-36 xl:max-w-64 inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md ring-1 ring-inset ring-white text-white focus:outline-none transition ease-in-out duration-150 whitespace-nowrap">
                                <div class="truncate">{{ Auth::user()->name }}</div>

                                <div class="ms-1">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>

                        <!-- Content -->
                        <x-slot name="content">
                            <!-- Profile -->
                            <x-dropdown-link :href="route('profile.edit')">
                                {{ __('Profile') }}
                            </x-dropdown-link>

                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                    {{ __('Log out') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                </div>
            @endauth

            <!-- Hamburger -->
            <div class="-me-2 flex items-center lg:hidden justify-end">
                <button @click="open = ! open"
                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <!-- Languages -->
            <div class="hidden lg:flex items-center ms-4">

                <a href="{{ route('locale.change', ['locale' => 'es_ES']) }}"
                    class="p-2 {{ app()->getLocale() == 'es_ES' ? 'pointer-events-none bg-gray-50/30 rounded' : '' }} ">
                    <x-flag-es-ES />
                </a>

                <a href="{{ route('locale.change', ['locale' => 'en_US']) }}"
                    class="p-2 {{ app()->getLocale() == 'en_US' ? 'pointer-events-none bg-gray-50/30 rounded' : '' }} ">
                    <x-flag-en-US />
                </a>
            </div>
        </div>

    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{ 'block': open, 'hidden': !open }" class="hidden lg:hidden">

        <!-- Responsive Navigation Links -->
        <div class="pt-4 pb-1 border-t border-gray-200">

            <div class="mt-3 space-y-1">

                <!-- Games -->
                <x-responsive-nav-link :href="route('games.index')" :active="request()->routeIs('games.index')">
                    {{ __('nav_games') }}
                </x-responsive-nav-link>

                <!-- Ranking -->
                <x-responsive-nav-link :href="route('ranking.index')" :active="request()->routeIs('ranking.index')">
                    {{ __('nav_ranking') }}
                </x-responsive-nav-link>

                @auth
                    <!-- Teams -->
                    <x-responsive-nav-link :href="route('teams.index')" :active="request()->routeIs('teams.index')">
                        {{ __('nav_teams') }}
                    </x-responsive-nav-link>

                    <!-- Leagues -->
                    <x-responsive-nav-link :href="route('leagues.index')" :active="request()->routeIs('leagues.index')">
                        {{ __('nav_manage_leagues') }}
                    </x-responsive-nav-link>
                @endauth

            </div>
        </div>

        <!-- Unauthenticated -->
        @guest
            <div class="pt-4 pb-1 border-t border-gray-200">
                <!-- Login -->
                <x-responsive-nav-link :href="route('login')">
                    {{ __('Log in') }}
                </x-responsive-nav-link>

                <!-- Register -->
                <x-responsive-nav-link :href="route('register')">
                    {{ __('Register') }}
                </x-responsive-nav-link>
            </div>
        @endguest


        <!-- Responsive User Links -->
        @auth
            <div class="pt-4 pb-1 border-t border-gray-200">

                <div class="space-y-1">

                    <!-- Profile -->
                    <x-responsive-nav-link :href="route('profile.edit')">
                        {{ __('Profile') }}
                    </x-responsive-nav-link>

                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                            {{ __('Log out') }}
                        </x-responsive-nav-link>
                    </form>
                </div>
            </div>
        @endauth

        <!-- Languages -->
        <div class="py-2 border-t border-gray-200">
            <div class="flex items-center ms-4">

                <a href="{{ route('locale.change', ['locale' => 'es_ES']) }}"
                    class=" {{ app()->getLocale() == 'es_ES' ? 'pointer-events-none bg-gray-50/30 rounded' : '' }} ">
                    <x-flag-es-ES />
                </a>

                <a href="{{ route('locale.change', ['locale' => 'en_US']) }}"
                    class="p-2 {{ app()->getLocale() == 'en_US' ? 'pointer-events-none bg-gray-50/30 rounded' : '' }} ">
                    <x-flag-en-US />
                </a>
            </div>

        </div>

    </div>
</nav>
