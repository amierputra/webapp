<div class="flex flex-col bg-slate-900 min-h-screen w-64 border-r dark:border-violet-950 sticky top-0 left-0">
    <div class="container mx-auto py-6 flex justify-center items-center shadow-md">
        <h3 class="text-2xl text-white font-bold">WebApp</h3>
    </div>
    <div class="flex flex-col py-8 px-4">
        <ul class="text-white">
            <a href="{{ route('home') }}">
                <li class="{{ request()->routeIs('home') ? 'bg-violet-800':'' }} hover:bg-violet-800 px-4 py-2 rounded-md mb-2">
                    Home
                </li>
            </a>
            <a href="{{ route('admin.users') }}">
                <li class="{{ request()->routeIs('admin.users') ? 'bg-violet-800':'' }} hover:bg-violet-800 px-4 py-2 rounded-md mb-2">
                    Users
                </li>
            </a>
        </ul>
    </div>
</div>