<div class="flex flex-col bg-blue-950 min-h-screen w-64 border-r dark:border-blue-900 sticky top-0 left-0">
    <div class="container mx-auto py-6 border-b border-gray-300 dark:border-gray-900 flex justify-center items-center">
        <h3 class="text-2xl text-white font-bold">Vite</h3>
    </div>
    <div class="flex flex-col py-8 px-4">
        <ul class="text-white">
            <a href="{{ route('home') }}">
                <li class="{{ request()->routeIs('home') ? 'bg-blue-600':'' }} hover:bg-blue-600 px-4 py-2 rounded-md mb-2">
                    Home
                </li>
            </a>
            <a href="{{ route('admin.users') }}">
                <li class="{{ request()->routeIs('admin.users') ? 'bg-blue-600':'' }} hover:bg-blue-600 px-4 py-2 rounded-md mb-2">
                    Users
                </li>
            </a>
        </ul>
    </div>
</div>