<x-layouts.app>
    @if (session()->has('success'))
    <div class="flex items-center p-4 mb-4 text-sm bg-green-500 text-green-50 rounded-lg" role="alert">
        <svg class="flex-shrink-0 inline w-4 h-4 mr-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
        </svg>
        <span class="sr-only">Info</span>
        <div>
            <span class="font-medium">Success alert!</span> {{ session()->get('success') }}
        </div>
    </div>
    @endif
    <div class="flex flex-col container mx-auto">
        <div class="flex justify-between items-center py-4">
            <h1 class="text-3xl">Users</h1>
            <div class="flex items-center">
                <button class="bg-blue-900 hover:bg-black text-white px-4 py-2 rounded-md" id="createUser">Create User</button>
            </div>
        </div>
        <div class="hidden my-6 p-4 border-dashed border border-gray-900" id="showCreate">
            <div class="flex justify-end">
                <a href="" class="text-2xl font-medium" id="closeForm">x</a>
            </div>
            <div class="flex justify-center items-center">
                <div class="w-1/2">
                    <form action="{{ route('admin.users.store') }}" method="post">
                        @csrf
                        <div class="flex flex-col space-y-1 mb-4">
                            <label for="name" class="">Name</label>
                            <input type="text" name="name" id="name" class="rounded-md border border-blue-800 focus:outline-none focus:border-sky-500 bg-gray-100 p-2">
                            @if ($errors->has('name'))
                            <span class="text-danger">{{ $errors->first('name') }}</span>
                            @endif
                        </div>
                        <div class="flex flex-col space-y-1 mb-4">
                            <label for="email" class="">Email</label>
                            <input type="email" name="email" id="email" class="rounded-md border border-blue-800 focus:outline-none focus:border-sky-500 bg-gray-100 p-2">
                            @if ($errors->has('email'))
                            <span class="text-danger">{{ $errors->first('email') }}</span>
                            @endif
                        </div>
                        <div class="flex flex-col space-y-1 mb-4">
                            <label for="password" class="">Password</label>
                            <input type="password" name="password" id="password" class="rounded-md border border-blue-800 focus:outline-none focus:border-sky-500 bg-gray-100 p-2">
                            @if ($errors->has('password'))
                            <span class="text-danger">{{ $errors->first('password') }}</span>
                            @endif
                        </div>
                        <div class="flex flex-col space-y-1 mb-4">
                            <label for="password_confirmation" class="">Confirm Password</label>
                            <input type="password" name="password_confirmation" id="password_confirmation" class="rounded-md border border-blue-800 focus:outline-none focus:border-sky-500 bg-gray-100 p-2">
                        </div>
                        <div class="w-full">
                            <button type="submit" class="w-full bg-blue-900 hover:bg-black text-white rounded-md p-2 mt-4">Add User</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="flex flex-col">
            <div class="overflow-x-auto">
                <table class="table-auto mt-4 w-full">
                    <thead>
                        <tr class="bg-blue-900 text-white text-left">
                            <th class="px-4 py-2">No.</th>
                            <th class="px-4 py-2">Email</th>
                            <th class="px-4 py-2">Name</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-200">
                        @foreach($users as $user)
                        <tr class="">
                            <td class="px-4 py-2">{{ $loop->iteration }}</td>
                            <td class="px-4 py-2">{{ $user->email }}</td>
                            <td class="px-4 py-2">{{ $user->name }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <script type="module">
            $(document).ready(function() {
                $("#createUser").click(function() {
                    $("#showCreate").removeClass("hidden");
                });
                $("#closeForm").click(function() {
                    $("#showCreate").addClass("hidden");
                });
            });
        </script>
</x-layouts.app>