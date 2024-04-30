@if (session('error'))
    <div class="sm:w-full md:w-1/2 lg:w-1/3 xl:w-[600px] mx-auto bg-red-100 border border-red-400 text-red-700 text-sm px-4 py-3 mt-8 rounded relative" role="alert"">
        <ul>
            <li>{{ session('error') }}</li>
        </ul>
    </div>
@endif