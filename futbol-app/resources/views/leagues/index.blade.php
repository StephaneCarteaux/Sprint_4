<x-layout>
    <x-slot:title>
        Ligas
    </x-slot>

    <h2 class="flex flex-row flex-nowrap items-center mt-16 uppercase">
        <span class="flex-grow block border-t border-gray-700"></span>
        <span class="flex-none block mx-4 px-4 py-2.5 text-xl rounded leading-none font-medium bg-gray-700 text-white">
            Ligas
        </span>
        <span class="flex-grow block border-t border-gray-700"></span>
    </h2>

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg border-2 border-gray-700 mt-16 {{ $leagues->count() ? '' : 'invisible'}}">

        <table class="w-full text-sm text-left rtl:text-right">
            <thead class="text-xs text-white uppercase bg-gray-700">
                <tr>
                    <th class="px-6 py-3">Nombre</th>
                    <th class="px-6 py-3">Iniciar</th>
                    <th class="px-6 py-3">Activar</th>
                    <th class="px-6 py-3">Editar</th>
                    <th class="px-6 py-3">Eliminar</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($leagues as $league)
                    <tr class="odd:bg-gray-100 even:bg-gray-200 border-t border-gray-400">

                        <!-- League name-->
                        <td class="px-6 py-4">{{ $league->name }}</td>

                        <!-- Start button-->
                        <td class="px-6 py-4">
                            <form action="{{ route('leagues.start', $league->id) }}" method="post">
                                @csrf
                                @method('PATCH')
                                <input type="hidden" id="started" name="started" value="1">
                                <button type="submit" {{ $league->started ? 'disabled' : '' }} onclick="return confirm('¿Iniciar {{ $league->name }}?\nYa no se podrán crear ni eliminar equipos para esta liga.')"
                                    class="py-2 px-4 {{ $league->started ? 'text-green-700 cursor-not-allowed' : 'text-gray-700 hover:text-green-700' }}">
                                    <i class="fa-solid fa-play fa-xl" title="{{ $league->started ? 'Liga iniciada' : 'Iniciar'}}"></i>
                                </button>
                            </form>

                        </td>
                        <!-- Active button-->
                        <td class="px-6 py-4">
                            <form action="{{ route('leagues.activate', $league->id) }}" method="post">
                                @csrf
                                @method('PATCH')
                                <input type="hidden" id="active" name="active" value="1">
                                <button type="submit" {{ $league->active ? 'disabled' : '' }}
                                    class="py-2 px-4 {{ $league->active ? 'text-green-700 cursor-not-allowed' : 'text-gray-700 hover:text-green-700' }}">
                                    <i class="fa-solid fa-eye fa-xl" title="{{ $league->active ? 'Liga activa' : 'Activar'}}"></i>
                                </button>
                            </form>

                        </td>
                        <!-- Edit button-->
                        <td class="px-6 py-4">
                            <form action="{{ route('leagues.edit', $league->id) }}" method="get">
                                @csrf
                                <button type="submit"
                                    class="hover:text-green-700 py-2 px-4">
                                    <i class="fa-solid fa-pen-to-square fa-xl" title="Editar"></i>
                                </button>
                            </form>

                        </td>
                        <!-- Delete button-->
                        <td class="px-6 py-4">
                            <form action="{{ route('leagues.destroy', $league->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('¿Eliminar {{ $league->name }} sus equipos y partidos?\nEsta acción no se puede deshacer.')"
                                class="hover:text-red-700 py-2 px-4">
                                    <i class="fa-solid fa-trash-can fa-xl" title="Eliminar"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach

            </tbody>

        </table>
    </div>
    <div class="flex justify-center">
        <!-- Create button -->
        <form action="{{ route('leagues.create') }}" method="get">
            @csrf
            <button type="submit"
                class="mt-4 p-0.5 mb-2 bg-gray-700 hover:bg-sky-800 text-white py-2 px-4 rounded">Crear
                liga</button>
        </form>
    </div>


</x-layout>
