<x-layout>
    <x-slot:title>
        Clasificación
    </x-slot>

    <h2 class="flex flex-row flex-nowrap items-center mt-16 uppercase">
        <span class="flex-grow block border-t border-gray-700"></span>
        <span class="flex-none block mx-4 px-4 py-2.5 text-xl rounded leading-none font-medium bg-gray-900 text-white">
            Clasificación {{ $activeLeague ? $activeLeague->name : '' }}
        </span>
        <span class="flex-grow block border-t border-gray-700"></span>
    </h2>

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg border-2 border-gray-700 mt-16">

        <table class="w-full text-sm text-left rtl:text-right text-gray-400">
            <thead class="text-xs text-gray-200 uppercase bg-gray-700">
                <tr>
                    <th class="px-6 py-3"></th>
                    <th class="px-6 py-3"></th>
                    <th class="px-6 py-3"></th>
                    <th class="px-6 py-3">PJ</th>
                    <th class="px-6 py-3">V</th>
                    <th class="px-6 py-3">E</th>
                    <th class="px-6 py-3">D</th>
                    <th class="px-6 py-3">GF</th>
                    <th class="px-6 py-3">GC</th>
                    <th class="px-6 py-3">DG</th>
                    <th class="px-6 py-3">Pts</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($teams as $team)
                    <tr class="odd:bg-gray-900 even:bg-gray-800 border-b border-gray-700">
                        <td class="px-6 py-4">{{ $team->ranking_position }}</td>
                        <td class="px-6 py-4"><img src="{{ asset('logos/' . $team->logo) }}" alt="{{ $team->name }}"
                                style="width: 24px; height: 24px;"></td>
                        <td class="px-6 py-4">{{ $team->name }}</td>
                        <td class="px-6 py-4">{{ $team->games_played }}</td>
                        <td class="px-6 py-4">{{ $team->games_won }}</td>
                        <td class="px-6 py-4">{{ $team->games_drawn }}</td>
                        <td class="px-6 py-4">{{ $team->games_lost }}</td>
                        <td class="px-6 py-4">{{ $team->goals_scored }}</td>
                        <td class="px-6 py-4">{{ $team->goals_conceded }}</td>
                        <td class="px-6 py-4">{{ $team->goals_difference }}</td>
                        <td class="px-6 py-4">{{ $team->points }}</td>
                    </tr>
                @endforeach

            </tbody>

        </table>
    </div>
    
</x-layout>