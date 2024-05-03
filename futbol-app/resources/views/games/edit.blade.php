<x-layout>
    <x-slot:title>
        Editar partido
    </x-slot>
    <div>
        <h2 class="flex flex-row flex-nowrap items-center mt-16 uppercase">
            <span class="flex-grow block border-t border-gray-700"></span>
            <span
                class="flex-none block mx-4 px-4 py-2.5 text-xl rounded leading-none font-medium bg-gray-700 text-white">
                Editar partido
            </span>
            <span class="flex-grow block border-t border-gray-700"></span>
        </h2>

        <!-- Errors template -->
        <x-errors />

        <div
            class="relative overflow-x-auto shadow-md sm:rounded-lg border-2 border-gray-700 bg-gray-300 mt-16 sm:w-full md:w-1/2 lg:w-1/3 xl:w-[600px] mx-auto">
            <form action="{{ route('games.update', $game->id) }}" method="post" class="w-full max-w-sm mx-auto mt-8 mb-8">
                @csrf
                @method('PATCH')

                <!-- game info -->
                <div class="flex flex-wrap">

                    <!-- game_number -->
                    <div class="md:w-1/4 px-3 mb-5">
                        <label for="game_number" class="block mb-1 text-sm font-medium">Jornada:</label>
                        <input type="text" id="game_number" name="game_number"
                            class="border border-gray-700 text-sm rounded-lg block w-full  p-2 h-9"
                            value="{{ $game->game_number }}">
                    </div>

                    <!-- date -->
                    <div class="w-full md:w-2/4 px-3 mb-5">
                        <label for="date" class="block mb-1 text-sm font-medium">Fecha:</label>
                        <input type="date" id="date" name="date"
                            class="border border-gray-700 text-sm rounded-lg block w-full pl-2 pt-1 h-9"
                            value="{{ \Carbon\Carbon::parse($game->date)->format('Y-m-d') }}">
                    </div>
                </div>

                <!-- team 1-->
                <div class="flex flex-wrap">

                    <!-- team 1 name -->
                    <div class="w-full md:w-3/4 px-3 mb-5 relative">
                        <label for="team1_id" class="block mb-1 text-sm font-medium">Equipo
                            local:</label>
                        <select id="team1_id" name="team1_id"
                            class="border border-gray-700 appearance-none w-full text-sm rounded-lg p-2">
                            @foreach ($teams as $team)
                                <option value="{{ $team->id }}"
                                    {{ $team->id == $game->team1_id ? 'selected' : '' }}>{{ $team->name }}</option>
                            @endforeach
                        </select>
                        <div
                            class="pointer-events-none absolute inset-y-0 right-3 top-5 flex items-center px-2 text-gray-700">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                            </svg>
                        </div>
                    </div>

                    <!-- team 1 goals -->
                    <div class="w-full md:w-1/4 px-3 mb-5">
                        <label for="team1_goals" class="block mb-1 text-sm font-medium">Goles:</label>
                        <input type="text" id="team1_goals" name="team1_goals"
                            class="border border-gray-700 text-sm rounded-lg block w-full p-2"
                            value="{{ $game->team1_goals }}">
                    </div>
                </div>

                <!-- team 2 -->
                <div class="flex flex-wrap">

                    <!-- team 2 name -->
                    <div class="w-full md:w-3/4 px-3 mb-5 relative">
                        <label for="team2_id" class="block mb-1 text-sm font-medium">Equipo
                            visitante:</label>
                        <select id="team2_id" name="team2_id"
                            class="border border-gray-700 appearance-none w-full text-sm rounded-lg p-2">
                            @foreach ($teams as $team)
                                <option value="{{ $team->id }}"
                                    {{ $team->id == $game->team2_id ? 'selected' : '' }}>{{ $team->name }}</option>
                            @endforeach
                        </select>
                        <div
                            class="pointer-events-none absolute inset-y-0 right-3 top-5 flex items-center px-2 text-gray-700">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                            </svg>
                        </div>
                    </div>

                    <!-- team 2 goals -->
                    <div class="w-full md:w-1/4 px-3 mb-5">
                        <label for="team2_goals" class="block mb-1 text-sm font-medium">Goles:</label>
                        <input type="text" id="team2_goals" name="team2_goals"
                            class="border border-gray-700 text-sm rounded-lg block w-full p-2"
                            value="{{ $game->team2_goals }}">
                    </div>
                </div>

                <div class="flex justify-between mt-5 px-3">

                    <!-- Return button -->
                    <a href="{{ route('games.index') }}"
                        class="mt-4  mb-2 bg-gray-900 hover:bg-sky-800 text-white py-2 px-4 rounded">Volver</a>

                    <!-- Send button -->
                    <input type="submit" value="Enviar"
                        class="mt-4  mb-2 bg-gray-900 hover:bg-sky-800 text-white py-2 px-4 rounded">
                </div>

            </form>
        </div>
    </div>
</x-layout>
