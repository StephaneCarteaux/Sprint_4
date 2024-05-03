<x-layout>
    <x-slot:title>
        Partidos
    </x-slot>

    <h2 class="flex flex-row flex-nowrap items-center mt-16 uppercase">
        <span class="flex-grow block border-t border-gray-700"></span>
        <span class="flex-none block mx-4 px-4 py-2.5 text-xl rounded leading-none font-medium bg-gray-700 text-white">
            Partidos {{ $activeLeague ? $activeLeague->name : '' }}
        </span>
        <span class="flex-grow block border-t border-gray-700"></span>
    </h2>

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg border-2 border-gray-700 mt-16">

        <table class="w-full text-sm text-left rtl:text-right">
            <thead class="text-xs text-white uppercase bg-gray-700">
                <tr>
                    <th style="width: 80px;" class="px-6 py-3"></th>
                    <th class="px-6 py-3"></th>
                    <th class="px-6 py-3"></th>
                    <th class="px-6 py-3"></th>
                    <th class="px-6 py-3">Editar</th>
                    <th class="px-6 py-3">Eliminar</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($groupedGames as $game_number => $groupedGames)

                    <tr class="border-t border-gray-400">
                        <!-- Game number -->
                        <td class="px-6 py-1 min-w-20 bg-gray-300" colspan="6">
                            Jornada {{ $game_number }}
                        </td>
                    </tr>

                    @foreach ($groupedGames as $game)
                        <tr class="{{ $loop->even ? 'bg-gray-100' : 'bg-gray-200' }}">
                            <!-- Team 1 logo -->
                            <td class="border-t border-gray-400 px-6 py-4 min-w-20">
                                <img src="{{ asset('logos/' . $game->team1->logo) }}" alt="{{ $game->team1->name }}"
                                    style="width: 24px; height: 24px;">
                            </td>
                            <!-- Team 1 name -->
                            <td class="border-t border-gray-400 px-6 py-4 min-w-40">
                                {{ $game->team1->name }}
                            </td>
                            <!-- Team 1 goals -->
                            <td class="border-t border-gray-400 px-6 py-4">
                                {{ $game->team1_goals }}
                            </td>
                            <!-- Date -->
                            <td class="border-t border-gray-400 px-6 py-4" rowspan="2">
                                {{ \Carbon\Carbon::parse($game->date)->translatedFormat('D d/m/y') }}
                            </td>
                            <!-- Edit button -->
                            <td class="border-t border-gray-400 px-6 py-4" rowspan="2">
                                <form action="{{ route('games.edit', $game->id) }}" method="get">
                                    @csrf
                                    <button type="submit"
                                        class="hover:text-green-700 py-2 px-4">
                                        <i class="fa-solid fa-pen-to-square fa-xl" title="Editar"></i>
                                    </button>
                                </form>
                            </td>
                            <!-- Delete button -->
                            <td class="border-t border-gray-400 px-6 py-4" rowspan="2">
                                <form action="{{ route('games.destroy', $game->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('¿Eliminar ese partido?\nEsta acción no se puede deshacer.')"
                                    class="hover:text-red-700 py-2 px-4">
                                        <i class="fa-solid fa-trash-can fa-xl" title="Eliminar"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        <tr class="{{ $loop->even ? 'bg-gray-100' : 'bg-gray-200' }}">
                            <!-- Team 2 logo -->
                            <td class="px-6 py-4">
                                <img src="{{ asset('logos/' . $game->team2->logo) }}" alt="{{ $game->team2->name }}"
                                    width="24" height="24s">
                            </td>
                            <!-- Team 2 name -->
                            <td class="px-6 py-4">
                                {{ $game->team2->name }}
                            </td>
                            <!-- Team 2 goals -->
                            <td class="px-6 py-4">
                                {{ $game->team2_goals }}
                            </td>
                        </tr>
                    @endforeach
                @endforeach

            </tbody>

        </table>
    </div>
    <div class="flex justify-center">
        <!-- Create button -->
        <form action="{{ route('games.create') }}" method="get">
            @csrf
            <button type="submit"
                class="mt-4 p-0.5 mb-2 bg-gray-700 hover:bg-green-700 text-white py-2 px-4 rounded">Crear
                partido</button>
        </form>
    </div>
</x-layout>
