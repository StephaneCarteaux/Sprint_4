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

    <div
        class="relative overflow-x-auto shadow-md sm:rounded-lg border-2 border-gray-700 mt-16  {{ $groupedGames->count() ? '' : 'invisible' }}">

        <table class="w-full text-sm text-left rtl:text-right">
            <thead class="text-xs text-white uppercase bg-gray-700">
                <tr>
                    <th class="px-6 py-3 min-w-20"></th>
                    <th class="px-6 py-3 min-w-40"></th>
                    <th class="px-6 py-3"></th>
                    <th class="px-6 py-3 min-w-40"></th>
                    <th class="px-6 py-3 text-center">Editar</th>
                    <th class="px-6 py-3 text-center">Eliminar</th>

                </tr>
            </thead>
            <tbody>

                @foreach ($groupedGames as $game_number => $groupedGames)
                    <tr class="border-t border-gray-400">

                        <!-- Game number -->
                        <td class="px-6 py-1 bg-gray-300" colspan="6">
                            <div>
                                Jornada {{ $game_number }}
                            </div>
                        </td>
                    </tr>

                    @foreach ($groupedGames as $game)
                        <tr class="{{ $loop->odd ? 'bg-gray-100' : 'bg-gray-200' }}">

                            <!-- Team 1 logo -->
                            <td class="border-t border-gray-400 px-6 py-4">
                                <div>
                                    <img src="{{ asset('logos/' . $game->team1->logo) }}" alt="{{ $game->team1->name }}"
                                        style="width: 24px; height: 24px;">
                                </div>
                            </td>

                            <!-- Team 1 name -->
                            <td class="border-t border-gray-400 px-6 py-4">
                                <div>
                                    {{ $game->team1->name }}
                                </div>
                            </td>

                            <!-- Team 1 goals -->
                            <td class="border-t border-gray-400 px-6 py-4">
                                <div>
                                    {{ $game->team1_goals }}
                                </div>
                            </td>

                            <!-- Date -->
                            <td class="border-t border-gray-400 px-6 py-4" rowspan="2">
                                <div>
                                    {{ \Carbon\Carbon::parse($game->date)->translatedFormat('D d/m/y') }}
                                </div>
                            </td>

                            <!-- Edit button -->
                            <td class="border-t border-gray-400 px-6 py-4" rowspan="2">
                                <div class="flex justify-center">
                                    <a href="{{ route('games.edit', $game) }}">
                                        <i class="fa-solid fa-pen-to-square fa-xl" title="Editar"></i>
                                    </a>
                                </div>
                            </td>

                            <!-- Delete button -->
                            <td class="border-t border-gray-400 px-6 py-4" rowspan="2">
                                <div class="flex justify-center">
                                    <form action="{{ route('games.destroy', $game) }}" method="post"
                                        class="mb-0">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            onclick="return confirm('¿Eliminar ese partido?\nEsta acción no se puede deshacer.')"
                                            class="hover:text-red-700 py-2 px-4">
                                            <i class="fa-solid fa-trash-can fa-xl" title="Eliminar"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>

                        <tr class="{{ $loop->odd ? 'bg-gray-100' : 'bg-gray-200' }}">

                            <!-- Team 2 logo -->
                            <td class="px-6 py-4">
                                <div>
                                    <img src="{{ asset('logos/' . $game->team2->logo) }}"
                                        alt="{{ $game->team2->name }}" width="24" height="24s">
                                </div>
                            </td>

                            <!-- Team 2 name -->
                            <td class="px-6 py-4">
                                <div>
                                    {{ $game->team2->name }}
                                </div>
                            </td>

                            <!-- Team 2 goals -->
                            <td class="px-6 py-4">
                                <div>
                                    {{ $game->team2_goals }}
                                </div>
                            </td>

                        </tr>

                    @endforeach
                @endforeach

            </tbody>

        </table>

    </div>

     <!-- Create button -->
    <div class="flex justify-center">
        @if ($activeLeagueIsStarted)
            <a href="{{ route('games.create') }}"
                class="mt-4 p-0.5 mb-2 bg-gray-700 hover:bg-sky-800 text-white py-2 px-4 rounded">
                Crear partido
            </a>
        @else
            <span
                class="mt-4 p-0.5 mb-2 flex-none block mx-4 px-4 py-2.5 border-2 border-gray-700 rounded leading-none font-medium">
                Tienes que iniciar la liga para poder crear partidos
            </span>
        @endif

    </div>
</x-layout>
