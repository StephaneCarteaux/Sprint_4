<x-layout>
    <x-slot:title>
        Partidos
    </x-slot>

    <h2 class="flex flex-row flex-nowrap items-center mt-16 uppercase">
        <span class="flex-grow block border-t border-gray-700"></span>
        <span class="flex-none block mx-4 px-4 py-2.5 text-xl rounded leading-none font-medium bg-gray-900 text-white">
            Partidos
        </span>
        <span class="flex-grow block border-t border-gray-700"></span>
    </h2>

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg border-2 border-gray-700 mt-16">

        <table class="w-full text-sm text-left rtl:text-right text-gray-400">
            <thead class="text-xs text-gray-200 uppercase bg-gray-700">
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
                @foreach ($games->groupBy('game_number') as $game_number => $groupedGames)

                    <tr>
                        <!-- Game number -->
                        <td class="px-6 py-4 min-w-20 bg-gray-600" colspan="6">
                            Jornada {{ $game_number }}
                        </td>
                    </tr>

                    @foreach ($groupedGames as $game)
                        <tr class="{{ $loop->even ? 'bg-gray-900' : 'bg-gray-800' }}">
                            <!-- Team 1 -->
                            <td class="px-6 py-4 min-w-20">
                                <img src="{{ asset('logos/' . $game->team1->logo) }}" alt="{{ $game->team1->name }}"
                                    style="width: 24px; height: 24px;">
                            </td>
                            <td class="px-6 py-4 min-w-40">
                                {{ $game->team1->name }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $game->team1_goals }}
                            </td>
                            <!-- Date -->
                            <td class="border-b border-gray-700 px-6 py-4" rowspan="2">
                                {{ date('d/m/Y', strtotime($game->date)) }}
                            </td>
                            <!-- Edit -->
                            <td class="border-b border-gray-700 px-6 py-4" rowspan="2">
                                Edit
                            </td>
                            <!-- Delete -->
                            <td class="border-b border-gray-700 px-6 py-4" rowspan="2">
                                Delete
                            </td>
                        </tr>
                        <tr class="border-b border-gray-700 {{ $loop->even ? 'bg-gray-900' : 'bg-gray-800' }}">
                            <!-- Team 2 -->
                            <td class="px-6 py-4">
                                <img src="{{ asset('logos/' . $game->team2->logo) }}" alt="{{ $game->team2->name }}"
                                    width="24" height="24s">
                            </td>
                            <td class="px-6 py-4">
                                {{ $game->team2->name }}
                            </td>
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
                class="mt-4 p-0.5 mb-2 bg-gray-900 hover:bg-teal-500 text-white py-2 px-4 rounded">Crear
                partido</button>
        </form>
    </div>
</x-layout>
