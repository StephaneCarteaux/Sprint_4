<x-layout>
    <x-slot:title>
        Crear partido
    </x-slot>
    <div>
        <h2 class="flex flex-row flex-nowrap items-center mt-16 uppercase">
            <span class="flex-grow block border-t border-gray-700"></span>
            <span
                class="flex-none block mx-4 px-4 py-2.5 text-xl rounded leading-none font-medium bg-gray-900 text-white">
                Crear nuevo partido para: {{ $activeLeague->name }}
            </span>
            <span class="flex-grow block border-t border-gray-700"></span>
        </h2>

        <!-- Errors template -->
        <x-errors />

        <div
            class="relative overflow-x-auto shadow-md sm:rounded-lg  bg-gray-700 mt-16 sm:w-full md:w-1/2 lg:w-1/3 xl:w-[600px] mx-auto">
            <form action="{{ route('games.store') }}" method="post" class="w-full max-w-sm mx-auto mt-8 mb-8">
                @csrf

                <!-- league_id -->
                <input type="hidden" id="league_id" name="league_id" value="{{ $activeLeague->id }}">

                <!-- game info -->
                <div class="flex flex-wrap">

                    <!-- game_number -->
                    <div class="w-full md:w-1/2 px-3 mb-5">
                        <label for="game_number" class="block mb-1 text-sm font-medium text-white">Jornada:</label>
                        <input type="text" id="game_number" name="game_number"
                            class="text-sm rounded-lg block w-12 p-2 h-9 bg-gray-900 text-white">
                    </div>

                    <!-- date -->
                    <div class="w-full md:w-1/2 px-3 mb-5">
                        <label for="date" class="block mb-1 text-sm font-medium text-white">Fecha:</label>
                        <input type="date" id="date" name="date"
                            class="text-sm rounded-lg block w-full p-2 h-9 bg-gray-900 text-white">
                    </div>
                </div>

                <!-- teams -->
                <div class="flex flex-wrap">

                    <!-- team1_id -->
                    <div class="w-full md:w-1/2 px-3 mb-5">
                        <label for="team1_id" class="block mb-1 text-sm font-medium text-white">Equipo
                            local:</label>
                        <select id="team1_id" name="team1_id" class="appearance-none w-full text-sm rounded-lg p-2 bg-gray-900 text-white">
                            @foreach ($teams as $team)
                                <option value="{{ $team->id }}">{{ $team->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- team2_id -->
                    <div class="w-full md:w-1/2 px-3 mb-5">
                        <label for="team2_id" class="block mb-1 text-sm font-medium text-white">Equipo
                            visitante:</label>
                        <select id="team2_id" name="team2_id" class="appearance-none w-full text-sm rounded-lg p-2 bg-gray-900 text-white">
                            @foreach ($teams as $team)
                                <option value="{{ $team->id }}">{{ $team->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <!-- scores -->
                <div class="flex flex-wrap">

                    <!-- score1 -->
                    <div class="w-full md:w-1/2 px-3 mb-5">
                        <label for="score1" class="block mb-1 text-sm font-medium text-white">Goles:</label>
                        <input type="text" id="score1" name="score1"
                            class="text-sm rounded-lg block w-12 p-2 bg-gray-900 text-white">
                    </div>

                    <!-- score2 -->
                    <div class="w-full md:w-1/2 px-3 mb-5">
                        <label for="score2" class="block mb-1 text-sm font-medium text-white">Goles:</label>
                        <input type="text" id="score2" name="score2"
                            class="text-sm rounded-lg block w-12 p-2 bg-gray-900 text-white">
                    </div>
                </div>

                <div class="flex justify-between mt-5 px-3">

                    <!-- Return button -->
                    <a href="{{ route('games.index') }}"
                        class="mt-4  mb-2 bg-gray-900 hover:bg-teal-500 text-white py-2 px-4 rounded">Volver</a>
                        
                    <!-- Send button -->
                    <input type="submit" value="Enviar"
                        class="mt-4  mb-2 bg-gray-900 hover:bg-teal-500 text-white py-2 px-4 rounded">
                </div>

            </form>
        </div>
    </div>
</x-layout>
