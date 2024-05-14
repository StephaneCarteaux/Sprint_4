<x-app-layout>
    <x-slot:title>
        {{ __('game_title') }}
    </x-slot>

    <h2 class="flex flex-row flex-nowrap items-center mt-16 uppercase">
        <span class="flex-grow block border-t border-gray-700"></span>
        <span class="flex-none block mx-4 px-4 py-2.5 text-xl rounded leading-none font-medium bg-gray-700 text-white">
            {{ __('game_title') }} {{ $activeLeague ? $activeLeague->name : '' }}
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
                    @auth
                        <th class="px-6 py-3 text-center">{{ __('edit') }}</th>
                        <th class="px-6 py-3 text-center">{{ __('delete') }}</th>
                    @endauth

                </tr>
            </thead>
            <tbody>

                @foreach ($groupedGames as $game_number => $groupedGames)
                    <tr class="border-t border-gray-400">

                        <!-- Game number -->
                        <td class="px-6 py-1 bg-gray-300" colspan="6">
                            <div>
                                {{ __('matchweek') }} {{ $game_number }}
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
                            @auth
                                <td class="border-t border-gray-400 px-6 py-4" rowspan="2">
                                    <div class="flex justify-center">
                                        <a href="{{ route('games.edit', $game) }}">
                                            <i class="fa-solid fa-pen-to-square fa-xl" title="{{ __('edit') }}"></i>
                                        </a>
                                    </div>
                                </td>
                            @endauth

                            <!-- Delete button -->
                            @auth
                                <td class="border-t border-gray-400 px-6 py-4" rowspan="2">
                                    <div class="flex justify-center">
                                        <form action="{{ route('games.destroy', $game) }}" method="post" class="mb-0">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                onclick="return confirm('{{ __('game_delete') }}')"
                                                class="hover:text-red-700 py-2 px-4">
                                                <i class="fa-solid fa-trash-can fa-xl" title="{{ __('delete') }}"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            @endauth
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
    @auth
        <div class="flex justify-center my-5">
            @if ($activeLeagueIsStarted)
                <x-secondary-button>
                    <a href="{{ route('games.create') }}">{{ __('game_create') }}</a>
                </x-secondary-button>
            @else
                <span
                    class="mx-4 mb-2 px-4 py-2.5 flex-none block border-2 border-gray-700 rounded leading-none font-medium">
                    {{ __('game_create_disabled') }}
                </span>
            @endif
        </div>
    @endauth

</x-app-layout>
