<x-layout>
    <x-slot:title>
        Crear equipo
    </x-slot>
    <div>
        <h2 class="flex flex-row flex-nowrap items-center mt-16 uppercase">
            <span class="flex-grow block border-t border-gray-700"></span>
            <span
                class="flex-none block mx-4 px-4 py-2.5 text-xl rounded leading-none font-medium bg-gray-900 text-white">
                Crear un nuevo equipo para: {{ $activeLeague->name }}
            </span>
            <span class="flex-grow block border-t border-gray-700"></span>
        </h2>

        <!-- Errors template -->
        <x-errors/>

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg border-2 border-purple-700 bg-gray-700 mt-16 sm:w-full md:w-1/2 lg:w-1/3 xl:w-[600px] mx-auto">
            <form action="{{ route('teams.store') }}" method="post" enctype="multipart/form-data"
                class="max-w-sm mx-auto mt-8 mb-8">
                @csrf
                <input type="hidden" id="league_id" name="league_id" value="{{ $activeLeague->id }}">
                <!-- Name -->
                <div class="mb-5">
                    <label for="name" class="block mb-1 text-sm font-medium text-white">Name:</label>
                    <input type="text" id="name" name="name"
                        class="text-sm rounded-lg block w-full p-2 bg-gray-900 text-white">
                </div>
                <!-- Logo -->
                <div class="mb-5">
                    <label for="logo" class="block mb-1 text-sm font-medium text-white">Logo:</label>
                    <input type="file" id="logo" name="logo"
                        class="text-sm rounded-lg block w-full p-2 bg-gray-900 text-white">
                </div>

                <div class="flex justify-between mt-5">
                    <!-- Return button -->
                    <a href="{{ route('teams.index') }}"
                    class="mt-4 p-0.5 mb-2 bg-gray-900 hover:bg-teal-500 text-white py-2 px-4 rounded">Volver</a>
                    <!-- Send button -->
                        <input type="submit" value="Enviar"
                        class="mt-4 p-0.5 mb-2 bg-gray-900 hover:bg-teal-500 text-white py-2 px-4 rounded">
                </div>
                
            </form>
        </div>
    </div>
</x-layout>
