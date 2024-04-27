<html>
    <head>
        <title>{{ $title ?? 'Liga' }}</title>
        <script src="https://cdn.tailwindcss.com"></script>
    </head>
    <body>

        <!-- Responsive navbar-->
        <nav class="flex items-center justify-between flex-wrap bg-teal-500 p-6">
            <div class="flex items-center flex-shrink-0 text-white mr-6">
              <svg class="fill-current h-8 w-8 mr-2" width="54" height="54" viewBox="0 0 54 54" xmlns="http://www.w3.org/2000/svg"><path d="M13.5 22.1c1.8-7.2 6.3-10.8 13.5-10.8 10.8 0 12.15 8.1 17.55 9.45 3.6.9 6.75-.45 9.45-4.05-1.8 7.2-6.3 10.8-13.5 10.8-10.8 0-12.15-8.1-17.55-9.45-3.6-.9-6.75.45-9.45 4.05zM0 38.3c1.8-7.2 6.3-10.8 13.5-10.8 10.8 0 12.15 8.1 17.55 9.45 3.6.9 6.75-.45 9.45-4.05-1.8 7.2-6.3 10.8-13.5 10.8-10.8 0-12.15-8.1-17.55-9.45-3.6-.9-6.75.45-9.45 4.05z"/></svg>
              <span class="font-semibold text-xl tracking-tight">Super futbol league</span>
            </div>
            <div class="block lg:hidden">
              <button class="flex items-center px-3 py-2 border rounded text-teal-200 border-teal-400 hover:text-white hover:border-white">
                <svg class="fill-current h-3 w-3" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>Menu</title><path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"/></svg>
              </button>
            </div>
            <div class="w-full block flex-grow lg:flex lg:items-center lg:w-auto">
              <div class="text-sm lg:flex-grow">
                <!-- Games -->
                <a href="{{route('games.index')}}" class="block mt-4 lg:inline-block lg:mt-0 text-teal-200 hover:text-white mr-4 {{ request()->is('games') ? 'text-white' : '' }}">
                  Partidos
                </a>
                <!-- Ranking -->
                <a href="{{route('ranking.index')}}" class="block mt-4 lg:inline-block lg:mt-0 text-teal-200 hover:text-white mr-4 {{ request()->is('ranking') ? 'text-white' : '' }}">
                  Clasificación
                </a>
                <!-- Teams -->
                <a href="{{route('teams.index')}}" class="block mt-4 lg:inline-block lg:mt-0 text-teal-200 hover:text-white mr-4 {{ request()->is('teams') ? 'text-white' : '' }}">
                  Equipos
                </a>
                <!-- Leagues -->
                <a href="{{route('leagues.index')}}" class="block mt-4 lg:inline-block lg:mt-0 text-teal-200 hover:text-white mr-4 {{ request()->is('leagues') ? 'text-white' : '' }}">
                  Gestionar ligas
                </a>
              </div>
              <div>
                <!-- Active league -->
                <span class="inline-block text-sm px-4 py-2 leading-none border rounded text-white border-white mt-4 lg:mt-0">{{$activeLeague->name}}</span>
              </div>
            </div>
          </nav>

        <hr/>
        <div class="container mx-auto px-4 max-w-screen-lg">
        {{ $slot }}
        </div>
        <!-- Footer-->
        <footer class="py-5 bg-dark">
            <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Your Website 2023</p></div>
        </footer>
        

    </body>
</html>