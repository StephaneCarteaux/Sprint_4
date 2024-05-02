<x-layout>
    <x-slot:title>
        Editar partido
    </x-slot>
    <div>
        <h2 class="flex flex-row flex-nowrap items-center mt-16 uppercase">
            <span class="flex-grow block border-t border-gray-700"></span>
            <span
                class="flex-none block mx-4 px-4 py-2.5 text-xl rounded leading-none font-medium bg-gray-900 text-white">
                Editar partido
            </span>
            <span class="flex-grow block border-t border-gray-700"></span>
        </h2>

        <!-- Errors template -->
        <x-errors />

        <div
            class="relative overflow-x-auto shadow-md sm:rounded-lg  bg-gray-700 mt-16 sm:w-full md:w-1/2 lg:w-1/3 xl:w-[600px] mx-auto">
            <form action="{{ route('games.update', $game->id) }}" method="post" class="w-full max-w-sm mx-auto mt-8 mb-8">
                @csrf
                @method('PATCH')

                <!-- game info -->
                <div class="flex flex-wrap">

                    <!-- game_number -->
                    <div class="md:w-1/4 px-3 mb-5">
                        <label for="game_number" class="block mb-1 text-sm font-medium text-white">Jornada:</label>
                        <input type="text" id="game_number" name="game_number"
                            class="text-sm rounded-lg block w-full  p-2 h-9 bg-gray-900 text-white"
                            value="{{ $game->game_number }}">
                    </div>

                    <!-- date -->
                    <div class="w-full md:w-2/4 px-3 mb-5">
                        <label for="date" class="block mb-1 text-sm font-medium text-white">Fecha:</label>
                        <input type="date" id="date" name="date"
                            class="text-sm rounded-lg block w-full p-2 h-9 bg-gray-900 text-white"
                            value="{{ \Carbon\Carbon::parse($game->date)->format('Y-m-d') }}">
                    </div>
                </div>

                <!-- team 1-->
                <div class="flex flex-wrap">

                    <!-- team 1 name -->
                    <div class="w-full md:w-3/4 px-3 mb-5">
                        <label for="team1_id" class="block mb-1 text-sm font-medium text-white">Equipo
                            local:</label>
                        <select id="team1_id" name="team1_id"
                            class="appearance-none w-full text-sm rounded-lg p-2 bg-gray-900 text-white">
                            @foreach ($teams as $team)
                                <option value="{{ $team->id }}"
                                    {{ $team->id == $game->team1_id ? 'selected' : '' }}>{{ $team->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- team 1 goals -->
                    <div class="w-full md:w-1/4 px-3 mb-5">
                        <label for="team1_goals" class="block mb-1 text-sm font-medium text-white">Goles:</label>
                        <input type="text" id="team1_goals" name="team1_goals"
                            class="text-sm rounded-lg block w-full p-2 bg-gray-900 text-white"
                            value="{{ $game->team1_goals }}">
                    </div>
                </div>

                <!-- team 2 -->
                <div class="flex flex-wrap">

                    <!-- team 2 name -->
                    <div class="w-full md:w-3/4 px-3 mb-5">
                        <label for="team2_id" class="block mb-1 text-sm font-medium text-white">Equipo
                            visitante:</label>
                        <select id="team2_id" name="team2_id"
                            class="appearance-none w-full text-sm rounded-lg p-2 bg-gray-900 text-white">
                            @foreach ($teams as $team)
                                <option value="{{ $team->id }}"
                                    {{ $team->id == $game->team2_id ? 'selected' : '' }}>{{ $team->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- team 2 goals -->
                    <div class="w-full md:w-1/4 px-3 mb-5">
                        <label for="team2_goals" class="block mb-1 text-sm font-medium text-white">Goles:</label>
                        <input type="text" id="team2_goals" name="team2_goals"
                            class="text-sm rounded-lg block w-full p-2 bg-gray-900 text-white"
                            value="{{ $game->team2_goals }}">
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
