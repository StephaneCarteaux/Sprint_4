<x-layout>
    <x-slot:title>
        Editar equipo
    </x-slot>
    <div>
        <h2 class="flex flex-row flex-nowrap items-center mt-16 uppercase">
            <span class="flex-grow block border-t border-gray-700"></span>
            <span
                class="flex-none block mx-4 px-4 py-2.5 text-xl rounded leading-none font-medium bg-gray-700 text-white">
                Editar equipo
            </span>
            <span class="flex-grow block border-t border-gray-700"></span>
        </h2>

        <!-- Errors template -->
        <x-errors/>

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg border-2 border-gray-700 bg-gray-300 mt-16 sm:w-full md:w-1/2 lg:w-1/3 xl:w-[600px] mx-auto">
            <form action="{{ route('teams.update', $team->id) }} " method="post" enctype="multipart/form-data" class="max-w-sm mx-auto mt-8 mb-8">
                @csrf
                @method('PATCH')
                
                <!-- League Id -->
                <input type="hidden" id="league_id" name="league_id" value="{{ $activeLeague->id }}">

                <!-- Name -->
                <div class="mb-5 px-3">
                    <label for="name" class="block mb-1 text-sm font-medium">Name:</label>
                    <input type="text" id="name" name="name" value="{{ $team->name }}"
                        class="border border-gray-700 text-sm rounded-lg block w-full p-2">
                </div>

                <!--  Actual logo -->
                <div class="mb-5 px-3">
                    <label class="block mb-1 text-sm font-medium">Logo actual:</label>
                    <img src="{{ asset('logos/' . $team->logo) }}" alt="{{ $team->name }}" width="48" height="48">
                </div>

                <!-- New logo -->
                <div class="mb-5 px-3">
                    <label for="logo" class="block mb-1 text-sm font-medium">Nuevo logo:</label>
                    <input type="file" id="logo" name="logo"
                        class="border border-gray-700 bg-white text-sm rounded-lg block w-full p-2">
                </div>

                <div class="flex justify-between mt-5 px-3">
                    <!-- Return button -->
                    <a href="{{ route('teams.index') }}"
                        class="mt-4 p-0.5 mb-2 bg-gray-900 hover:bg-sky-800 text-white py-2 px-4 rounded">Volver</a>
                    <!-- Send button -->
                    <input type="submit" value="Enviar"
                        class="mt-4 p-0.5 mb-2 bg-gray-900 hover:bg-sky-800 text-white py-2 px-4 rounded">
                </div>
            </form>
        </div>
    </div>
</x-layout>
