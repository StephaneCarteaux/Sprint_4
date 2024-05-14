<x-app-layout>
    <x-slot:title>
        {{ __('ranking_title') }}
    </x-slot>

    <h2 class="flex flex-row flex-nowrap items-center mt-16 uppercase">
        <span class="flex-grow block border-t border-gray-700"></span>
        <span class="flex-none block mx-4 px-4 py-2.5 text-xl rounded leading-none font-medium bg-gray-700 text-white">
            {{ __('ranking_title') }} {{ $activeLeague ? $activeLeague->name : '' }}
        </span>
        <span class="flex-grow block border-t border-gray-700"></span>
    </h2>

    <div
        class="relative overflow-x-auto shadow-md sm:rounded-lg border-2 border-gray-700 mt-16 {{ $teams ? '' : 'invisible' }}">

        <table class="w-full text-sm text-left rtl:text-right">
            <thead class="text-xs text-white uppercase bg-gray-700">
                <tr>
                    <th class="px-6 py-3"></th>
                    <th class="px-6 py-3 min-w-20"></th>
                    <th class="px-6 py-3 min-w-40"></th>
                    <th class="px-6 py-3 text-center">{{ __('ranking_played') }}</th>
                    <th class="px-6 py-3 text-center">{{ __('ranking_won') }}</th>
                    <th class="px-6 py-3 text-center">{{ __('ranking_drawn') }}</th>
                    <th class="px-6 py-3 text-center">{{ __('ranking_lost') }}</th>
                    <th class="px-6 py-3 text-center">{{ __('ranking_gf') }}</th>
                    <th class="px-6 py-3 text-center">{{ __('ranking_ga') }}</th>
                    <th class="px-6 py-3 text-center">{{ __('ranking_ga') }}</th>
                    <th class="px-6 py-3 text-center">{{ __('ranking_points') }}</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($teams as $team)
                    <tr class="odd:bg-gray-100 even:bg-gray-200 border-t border-gray-00">

                        <!-- Team ranking -->
                        <td class="px-6 py-4">
                            <div>
                                {{ $team->ranking_position }}
                            </div>
                        </td>

                        <!-- Team logo -->
                        <td class="px-6 py-4">
                            <div>
                                <img src="{{ asset('logos/' . $team->logo) }}" alt="{{ $team->name }}"
                                    style="width: 24px; height: 24px;">
                            </div>
                        </td>

                        <!-- Team name -->
                        <td class="px-6 py-4">
                            <div>
                                {{ $team->name }}
                            </div>
                        </td>

                        <!-- Games played -->
                        <td class="px-6 py-4">
                            <div class="flex justify-center">
                                {{ $team->games_played }}
                            </div>
                        </td>

                        <!-- Games won -->
                        <td class="px-6 py-4">
                            <div class="flex justify-center">
                                {{ $team->games_won }}
                            </div>
                        </td>

                        <!-- Games drawn -->
                        <td class="px-6 py-4">
                            <div class="flex justify-center">
                                {{ $team->draws }}
                            </div>
                        </td>

                        <!-- Games lost -->
                        <td class="px-6 py-4">
                            <div class="flex justify-center">
                                {{ $team->games_lost }}
                            </div>
                        </td>

                        <!-- Goals scored -->
                        <td class="px-6 py-4">
                            <div class="flex justify-center">
                                {{ $team->goals_scored }}
                            </div>
                        </td>

                        <!-- Goals conceded -->
                        <td class="px-6 py-4">
                            <div class="flex justify-center">
                                {{ $team->goals_conceded }}
                            </div>
                        </td>

                        <!-- Goals difference -->
                        <td class="px-6 py-4">
                            <div class="flex justify-center">
                                {{ $team->goals_difference }}
                            </div>
                        </td>

                        <!-- Points -->
                        <td class="px-6 py-4 font-bold">
                            <div class="flex justify-center">
                                {{ $team->points }}
                            </div>
                        </td>

                    </tr>
                @endforeach

            </tbody>

        </table>
    </div>
    <div class="flex justify-center my-5">
        <!-- Create button -->
        @if (!$teams)
            <span
            class="mx-4 mb-2 px-4 py-2.5 flex-none block border-2 border-gray-700 rounded leading-none font-medium">
            {{ __('ranking_no_games') }}
            </span>
        @endif

    </div>

</x-app-layout>
