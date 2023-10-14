<x-layouts.app>
    <div class="flex flex-col container mx-auto py-3">
        <div class="mb-8">
            <a href="{{ route('admin.users') }}" class=" flex items-center text-violet-800 font-medium">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3.0" stroke="currentColor" class="w-4 h-4 text-violet-800 mr-2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
            </svg>
            Back
        </a>
        </div>
        <h1 class="text-3xl font-bold uppercase">User Details</h1>
        <div class="flex flex-row space-x-4">
            <div class="w-3/4 bg-sky-50 px-8 py-4 mt-6 border rounded-lg shadow-md">
                <dl class="divide-y divide-gray-400">
                    <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                        <dt class="text-sm font-medium leading-6 text-gray-900">Full name</dt>
                        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{$user->name}}</dd>
                    </div>
                    <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                        <dt class="text-sm font-medium leading-6 text-gray-900">Email</dt>
                        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{$user->email}}</dd>
                    </div>
                </dl>
            </div>
            <div class="w-1/4 bg-gray-800 px-8 py-4 mt-6 rounded-lg shadow-lg text-white space-y-4">
                <div class="px-4">
                    <h3 class="font-medium">Register Date</h3>
                    <p class="text-white text-sm">
                        {{ date('j F Y, g:i a', strtotime($user->created_at)) }}
                    </p>
                </div>
                <div class="px-4 space-y-1">
                    <h3 class="font-medium">Status</h3>
                    <p class="inline-block bg-green-300 text-green-800 text-xs font-bold rounded-full px-4 py-1">
                        Active
                    </p>
                </div>
            </div>
        </div>
    </div>

</x-layouts.app>