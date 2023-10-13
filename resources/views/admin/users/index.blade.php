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
                <button class="bg-blue-900 hover:bg-black text-white px-4 py-2 rounded-lg" id="createUser">Create User</button>
            </div>
        </div>
        <div class="hidden relative z-10" aria-labelledby="modal-title" role="dialog" aria-modal="true" id="showCreate">
            <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
            <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
                <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                    <div class="relative transform overflow-hidden p-8 rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-xl">
                        <h2 class="text-xl font-bold mb-4 uppercase">Create User</h2>
                        <div class="flex justify-center items-center">
                            <div class="w-full">
                                <form action="{{ route('admin.users.store') }}" method="post">
                                    @csrf
                                    <div class="flex flex-col space-y-1 mb-4">
                                        <label for="name" class="">Name</label>
                                        <input type="text" name="name" id="name" class="rounded-lg border border-blue-800 focus:outline-none focus:ring focus:ring-blue-900 focus:ring-offset-1 bg-gray-100 p-2">
                                        @if ($errors->has('name'))
                                        <span class="text-danger">{{ $errors->first('name') }}</span>
                                        @endif
                                    </div>
                                    <div class="flex flex-col space-y-1 mb-4">
                                        <label for="email" class="">Email</label>
                                        <input type="email" name="email" id="email" class="rounded-lg border border-blue-800 focus:outline-none focus:ring focus:ring-blue-900 focus:ring-offset-1 bg-gray-100 p-2">
                                        @if ($errors->has('email'))
                                        <span class="text-danger">{{ $errors->first('email') }}</span>
                                        @endif
                                    </div>
                                    <div class="flex flex-col space-y-1 mb-4">
                                        <label for="password" class="">Password</label>
                                        <input type="password" name="password" id="password" class="rounded-lg border border-blue-800 focus:outline-none focus:ring focus:ring-blue-900 focus:ring-offset-1 bg-gray-100 p-2">
                                        @if ($errors->has('password'))
                                        <span class="text-danger">{{ $errors->first('password') }}</span>
                                        @endif
                                    </div>
                                    <div class="flex flex-col space-y-1 mb-4">
                                        <label for="password_confirmation" class="">Confirm Password</label>
                                        <input type="password" name="password_confirmation" id="password_confirmation" class="rounded-lg border border-blue-800 focus:outline-none focus:ring focus:ring-blue-900 focus:ring-offset-1 bg-gray-100 p-2">
                                    </div>
                                    <div class="flex flex-row space-x-2">
                                        <div class="w-full">
                                            <button type="button" class="text-black font-semibold border-2 bg-white hover:bg-gray-200 border-gray-300 hover:border-gray-400 rounded-lg px-4 py-2 mt-4 w-full shadow-sm" id="closeForm">Cancel</button>
                                        </div>
                                        <div class="w-full">
                                            <button type="submit" class="text-white font-semibold bg-blue-900 hover:bg-black rounded-lg px-4 py-2 mt-4 w-full">Add User</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="hidden my-6 p-4 border-dashed border border-gray-900">
            <div class="flex justify-end">
                <a href="" class="text-2xl font-medium" id="closeForm">x</a>
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