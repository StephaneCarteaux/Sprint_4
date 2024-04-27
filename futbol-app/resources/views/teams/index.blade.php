<x-layout>
    <x-slot:title>
        Equipos
    </x-slot>

    <h2 class="flex flex-row flex-nowrap items-center mt-16 uppercase">
        <span class="flex-grow block border-t border-gray-700"></span>
        <span class="flex-none block mx-4 px-4 py-2.5 text-xl rounded leading-none font-medium bg-gray-900 text-white">
            Equipos
        </span>
        <span class="flex-grow block border-t border-gray-700"></span>
    </h2>

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg border-2 border-gray-700 mt-16">


        <table class="w-full text-sm text-left rtl:text-right text-gray-400">
            <thead class="text-xs text-gray-200 uppercase bg-gray-700">
                <tr>
                    <th class="px-6 py-3">Logo</th>
                    <th class="px-6 py-3">Nombre</th>
                    <th class="px-6 py-3"></th>
                    <th class="px-6 py-3"></th>

                </tr>
            </thead>
            <tbody>
                @foreach ($teams as $team)
                    <tr class="odd:bg-gray-900 even:bg-gray-800 border-b border-gray-700 hover:bg-gray-600">
                        <td class="px-6 py-4"><img src="logos/{{ $team->logo }}"/></td>
                        <td class="px-6 py-4">{{ $team->name }}</td>

                        <!-- Edit button-->
                        <td class="px-6 py-4">
                            <form action="{{ route('teams.edit', $team->id) }}" method="get">
                                @csrf
                                <button type="submit"
                                    class="bg-blue-500 hover:bg-blue-700 text-white py-2 px-3 rounded cursor-pointer">Edit</button>
                            </form>

                        </td>
                         <!-- Delete button-->
                        <td class="px-6 py-4">
                            <form action="{{ route('teams.destroy', $team->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="bg-red-500 hover:bg-red-700 text-white py-2 px-3 rounded cursor-pointer">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach

            </tbody>

        </table>
    </div>
    <div class="flex justify-center">
        <!-- Create button -->
        <form action="{{ route('teams.create') }}" method="get">
            @csrf
            <button type="submit"
                class="mt-4 p-0.5 mb-2 bg-gray-900 hover:bg-teal-500 text-white py-2 px-4 border rounded">Crear
                equipo</button>
        </form>
    </div>
</x-layout>
