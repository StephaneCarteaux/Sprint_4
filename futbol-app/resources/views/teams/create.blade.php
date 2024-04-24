<x-layout>
    <x-slot:title>
        Crear equipo
    </x-slot>
    <div>
        <h2 class="flex flex-row flex-nowrap items-center mt-16 uppercase">
            <span class="flex-grow block border-t border-purple-700"></span>
            <span class="flex-none block mx-4 px-4 py-2.5 text-xl rounded leading-none font-medium bg-gray-900 text-white">
                Crear un equipo nuevo
            </span>
            <span class="flex-grow block border-t border-purple-700"></span>
        </h2>
        
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg border-2 border-purple-700 bg-gray-700 mt-16 sm:w-full md:w-1/2 lg:w-1/3 xl:w-[600px] mx-auto">
            <form action="{{route('teams.store')}}" method="post" class="max-w-sm mx-auto mt-8 mb-8">
                @csrf
                <div class="mb-5">
                    <label for="logo" class="block mb-1 text-sm font-medium text-white">Logo:</label>
                    <input type="text" id="logo" name="logo" class="text-sm rounded-lg block w-full p-2 bg-gray-900 text-white" value="<?php echo isset($_POST['logo']) ? $_POST['logo'] : ''; ?>">
                </div>
                <div class="mb-5">
                    <label for="name" class="block mb-1 text-sm font-medium text-white">Name:</label>
                    <input type="text" id="name" name="name" class="text-sm rounded-lg block w-full p-2 bg-gray-900 text-white" value="<?php echo isset($_POST['name']) ? $_POST['name'] : ''; ?>">
                </div>
        
                <div class="flex justify-between mt-5">
                    <!-- Return button -->
                    <a href="/teams" class="relative inline-flex items-center justify-center p-0.5 overflow-hidden text-sm font-medium text-white rounded-lg group bg-gradient-to-br from-purple-600 to-blue-500 group-hover:from-purple-600 group-hover:to-blue-500 hover:text-white focus:ring-4 focus:outline-none focus:ring-blue-800">
                        <span class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-gray-900 rounded-md group-hover:bg-opacity-0">
                            Volver
                        </span>
                    </a>
                    <!-- Send button -->
                    <span class="relative inline-flex items-center justify-center p-0.5 overflow-hidden text-sm font-medium text-white rounded-lg group bg-gradient-to-br from-purple-600 to-blue-500 group-hover:from-purple-600 group-hover:to-blue-500 hover:text-white focus:ring-4 focus:outline-none focus:ring-blue-800">
                        <input type="submit" value="Enviar" class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-gray-900 rounded-md group-hover:bg-opacity-0">
                    </span>
                </div>
            </form>
        </div>
    </div>
</x-layout>
