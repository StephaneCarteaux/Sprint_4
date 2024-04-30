<x-layout>
    <x-slot:title>
        Crear liga
    </x-slot>
    <div>
        <h2 class="flex flex-row flex-nowrap items-center mt-16 uppercase">
            <span class="flex-grow block border-t border-gray-700"></span>
            <span
                class="flex-none block mx-4 px-4 py-2.5 text-xl rounded leading-none font-medium bg-gray-900 text-white">
                Crear nueva liga
            </span>
            <span class="flex-grow block border-t border-gray-700"></span>
        </h2>

        <!-- Errors template -->
        <x-errors/>
        
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg  bg-gray-700 mt-16 sm:w-full md:w-1/2 lg:w-1/3 xl:w-[600px] mx-auto">
            <form action="{{ route('leagues.store') }}" method="post" class="max-w-sm mx-auto mt-8 mb-8">
                @csrf
                <!-- Active -->
                <input type="hidden" id="active" name="active" value="1">
                <!-- Started -->
                <input type="hidden" id="started" name="started" value="0">

                <!-- Name -->
                <div class="mb-5">
                    <label for="name" class="block mb-1 text-sm font-medium text-white">Nombre:</label>
                    <input type="text" id="name" name="name"
                        class="text-sm rounded-lg block w-full p-2 bg-gray-900 text-white" value="<?php echo isset($_POST['name']) ? $_POST['name'] : ''; ?>">
                </div>

                <div class="flex justify-between mt-5">
                    <!-- Return button -->
                    <a href="{{ route('leagues.index') }}"
                        class="mt-4 p-0.5 mb-2 bg-gray-900 hover:bg-teal-500 text-white py-2 px-4 rounded">Volver</a>
                    <!-- Send button -->
                    <input type="submit" value="Enviar"
                        class="mt-4 p-0.5 mb-2 bg-gray-900 hover:bg-teal-500 text-white py-2 px-4 rounded">
                </div>
            </form>
        </div>
    </div>
</x-layout>
