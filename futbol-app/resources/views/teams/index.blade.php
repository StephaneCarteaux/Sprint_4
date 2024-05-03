<x-layout>
    <x-slot:title>
        Equipos
    </x-slot>

    <h2 class="flex flex-row flex-nowrap items-center mt-16 uppercase">
        <span class="flex-grow block border-t border-gray-700"></span>
        <span class="flex-none block mx-4 px-4 py-2.5 text-xl rounded leading-none font-medium bg-gray-700 text-white">
            Equipos {{ $activeLeague ? $activeLeague->name : '' }}
        </span>
        <span class="flex-grow block border-t border-gray-700"></span>
    </h2>

    <div
        class="relative overflow-x-auto shadow-md sm:rounded-lg border-2 border-gray-700 mt-16 {{ $teams->count() ? '' : 'invisible' }}">

        <table class="w-full text-sm text-left rtl:text-right">
            <thead class="text-xs text-white uppercase bg-gray-700">
                <tr>
                    <th class="px-6 py-3">Logo</th>
                    <th class="px-6 py-3">Nombre</th>
                    <th class="px-6 py-3">Editar</th>
                    <th class="px-6 py-3">Eliminar</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($teams as $team)
                    <!-- Team logo-->
                    <tr class="odd:bg-gray-100 even:bg-gray-200 border-t border-gray-400">
                        <td class="px-6 py-4"><img src="{{ asset('logos/' . $team->logo) }}" alt="{{ $team->name }}"
                                style="width: 48px; height: 48px;">
                        </td>

                        <!-- Team name-->
                        <td class="px-6 py-4">{{ $team->name }}</td>

                        <!-- Edit button-->
                        <td class="px-6 py-4">
                            <form action="{{ route('teams.edit', $team->id) }}" method="get">
                                @csrf
                                <button type="submit" class="hover:text-green-700 py-2 px-4">
                                    <i class="fa-solid fa-pen-to-square fa-xl" title="Editar"></i>
                                </button>
                            </form>

                        </td>
                        <!-- Delete button-->
                        <td class="px-6 py-4">
                            <form action="{{ route('teams.destroy', $team->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" {{ $team->league->started ? 'disabled' : '' }}
                                    onclick="return confirm('¿Eliminar {{ $team->name }}?')"
                                    class="py-2 px-4 {{ $team->league->started ? 'text-gray-400 cursor-not-allowed' : 'hover:text-red-700' }}">
                                    <i class="fa-solid fa-trash-can fa-xl"
                                        title="{{ $team->league->started ? 'Liga iniciada. No se pueden eliminar equipos' : 'Eliminar' }}"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach

            </tbody>

        </table>
    </div>
    <div class="flex justify-center">
        @if ($getLeagues->count() > 0)
            <!-- Create button -->
            <form action="{{ route('teams.create') }}" method="get">
                @csrf
                <button type="submit"
                    class="mt-4 p-0.5 mb-2 bg-gray-700 hover:bg-sky-800 text-white py-2 px-4 border rounded {{ $activeLeagueIsStarted ? 'hidden' : '' }}">
                    Crear equipo
                </button>
            </form>
        @else
            <span
                class="mt-4 p-0.5 mb-2 flex-none block mx-4 px-4 py-2.5 border-2 border-gray-700 rounded leading-none font-medium">
                Tienes que crear una liga para poder crear equipos
            </span>
        @endif

    </div>
</x-layout>
