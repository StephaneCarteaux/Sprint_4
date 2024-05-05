<html>

<head>
    <title>{{ $title ?? 'Liga' }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="/js/mobileMenu.js"></script>
    <script src="/js/leaguesDropdown.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>

<body class="flex flex-col h-screen justify-between bg-gray-50 text-gray-700">

    <!-- Responsive Header -->
    <nav class="flex items-center justify-between flex-wrap bg-sky-800 p-6">

        <!-- Logo and tilte -->
        <div class="flex items-center flex-shrink-0 text-white mr-6">

            <!-- Logo -->
            <svg class="mr-2" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
                xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="44px" height="44px"
                viewBox="0 0 44 44" fill="rgb(255, 255, 255)" xml:space="preserve">
                <g>
                    <g>
                        <path points="271.942,209.614 338.425,114.466 257.523,39.026 144.542,79.657 148.303,186.135 		"
                            d="m24.123 18.594 5.898 -8.441 -7.178 -6.692 -10.022 3.604 0.333 9.445Z" />
                        <path points="228.868,402.407 289.71,465.777 395.984,420.409 413.34,326.511 307.844,313.522 		"
                            d="m20.302 35.696 5.397 5.621 9.427 -4.024L36.667 28.965l-9.359 -1.151Z" />
                        <path
                            d="m1.396 29.877 0.119 0.147C4.723 38.204 12.682 44 22 44c12.151 0 22 -9.849 22 -22S34.151 0 22 0 0 9.85 0 22c0 2.721 0.497 5.325 1.401 7.729zM1.147 22c0 -2.779 0.551 -5.428 1.542 -7.856l5.204 -6.457 1.349 -2.163a20.745 20.745 0 0 1 12.759 -4.376c0.116 0 0.229 0.007 0.345 0.007l2.326 0.857 5.13 0.654a20.965 20.965 0 0 1 8.367 6.18l-0.854 3.72 3.37 9.505 2.153 0.544c-0.331 11.213 -9.547 20.233 -20.838 20.233 -5.622 0 -10.727 -2.24 -14.482 -5.868l4.047 -3.477 -3.862 -9.956 -6.043 -2.083 -0.139 4.44a20.941 20.941 0 0 1 -0.374 -3.909" />
                    </g>
                </g>
            </svg>

            <!-- Title -->
            <span class="font-semibold text-xl tracking-tight">Super futbol league</span>

        </div>

        <!-- Hamburger Menu -->
        <button id="mobile-menu-button"
            class="block lg:hidden border border-white rounded px-2 py-1 mt-3 text-white hover:bg-gray-700 focus:outline-none focus:bg-gray-700">
            <i class="fas fa-bars"></i>
        </button>

        <!-- Menu -->
        <div id="mobile-menu" class="hidden w-full flex-grow lg:flex lg:items-center lg:w-auto">

            <!-- Games -->
            <a href="{{ route('games.index') }}"
                class="block mt-4 lg:inline-block lg:mt-0 text-gray-200 hover:text-white mr-4 {{ request()->is('games*') ? 'text-white underline underline-offset-8 decoration-2' : '' }}">
                Partidos
            </a>
            <!-- Ranking -->
            <a href="{{ route('ranking.index') }}"
                class="block mt-4 lg:inline-block lg:mt-0 text-gray-200 hover:text-white mr-4 {{ request()->is('ranking*') ? 'text-white underline underline-offset-8 decoration-2' : '' }}">
                Clasificación
            </a>
            <!-- Teams -->
            <a href="{{ route('teams.index') }}"
                class="block mt-4 lg:inline-block lg:mt-0 text-gray-200 hover:text-white mr-4 {{ request()->is('teams*') ? 'text-white underline underline-offset-8 decoration-2' : '' }}">
                Equipos
            </a>
            <!-- Leagues -->
            <a href="{{ route('leagues.index') }}"
                class="block mt-4 lg:inline-block lg:mt-0 text-gray-200 hover:text-white mr-4 {{ request()->is('leagues*') ? 'text-white underline underline-offset-8 decoration-2' : '' }}">
                Gestionar ligas
            </a>

            <!-- League dropdown -->

            <!-- Button -->
            <div class="relative inline-block text-left lg:ml-2">
                <div>
                    <button type="button"
                        class="inline-flex w-full justify-center gap-x-1.5 rounded-md px-3 py-2 text-sm mt-6 lg:mt-0 text-white ring-1 ring-inset ring-white"
                        id="activeLeagueButton">
                        {{ $activeLeague ? $activeLeague->name : 'Liga activa' }}
                        <svg id="activeLeagueButtonIcon" class="-mr-1 h-5 w-5 text-white" viewBox="0 0 20 20"
                            fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd"
                                d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z"
                                clip-rule="evenodd" />
                        </svg>
                    </button>
                </div>

                <!-- Menu -->
                <div class="hidden absolute right-0 z-10 mt-2 w-56 origin-top-right left-0 rounded-md bg-gray-50 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none {{ !$activeLeague ? 'invisible' : '' }}"
                    tabindex="-1" id="activeLeagueMenu">
                    <div class="py-2" role="none">

                        @foreach ($allLeagues as $league)
                            <form action="{{ route('leagues.dropdown', $league->id) }}" method="post">
                                @csrf
                                @method('PATCH')
                                <input type="hidden" id="active" name="active" value="1">
                                <button type="submit" {{ $league->active ? 'disabled' : '' }}
                                    class="text-gray-700 block px-4 text-sm" role="menuitem" tabindex="-1"
                                    id="menu-item-0">
                                    {{ $league->name }}
                                </button>
                            </form>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <hr />

    <!-- Container -->
    <div class="container mx-auto px-4 max-w-screen-lg mb-auto">
        {{ $slot }}
    </div>

    <!-- Footer-->
    <footer class="bg-sky-800 text-center">
        <div class="text-white text-sm p-3">
            <span clas="font-semibold">© {{ now()->year }} Super futbol league</span>
        </div>
    </footer>

</body>

</html>
