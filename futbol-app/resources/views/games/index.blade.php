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
                    <th class="px-6 py-3">Jornada</th>
                    <th class="px-6 py-3">Equipo local</th>
                    <th class="px-6 py-3">Goles</th>
                    <th class="px-6 py-3">Goles</th>
                    <th class="px-6 py-3">Equipo visitante</th>
                    <th class="px-6 py-3">Fecha</th>
                    <th class="px-6 py-3">Editar</th>
                    <th class="px-6 py-3">Eliminar</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($games as $game)
                    <tr class="odd:bg-gray-900 even:bg-gray-800 border-b border-gray-700">
                        <!-- Game number-->
                        <td class="px-6 py-4">{{ $game->game_number }}</td>

                        <!-- Team 1 -->
                        <td class="px-6 py-4">Team 1</td>

                        <!-- Team 1 goals -->
                        <td class="px-6 py-4">Team 1 goals</td>

                        <!-- Team 2 goals -->
                        <td class="px-6 py-4">Team 2 goals</td>

                        <!-- Team 2 -->
                        <td class="px-6 py-4">Team 2</td>

                        <!-- Date -->
                        <td class="px-6 py-4">Date</td>

                        <!-- Edit -->
                        <td class="px-6 py-4">Edit</td>

                        <!-- Delete -->
                        <td class="px-6 py-4">Delete</td>

                    </tr>
                @endforeach

            </tbody>

        </table>
    </div>
    <div class="flex justify-center">
        <!-- Create button -->
        <form action="{{ route('games.create') }}" method="get">
            @csrf
            <button type="submit" class="mt-4 p-0.5 mb-2 bg-gray-900 hover:bg-teal-500 text-white py-2 px-4 rounded">Crear partido</button>
        </form>
    </div>
</x-layout>
