<x-layouts.app>
    <div id="successMessageContainer"></div>
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
        <div class="flex justify-between items-center">
            <h1 class="text-3xl font-bold">Users</h1>
            <div class="flex items-center">
                <button class="bg-violet-800 hover:bg-violet-950 focus:ring focus:ring-violet-600 focus:ring-offset-1 text-white px-4 py-2 rounded-lg" id="createUser">Create User</button>
            </div>
        </div>
        <!-- Create user modal -->
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
                                        <input type="text" name="name" id="name" class="rounded-lg border border-violet-800 focus:outline-none focus:ring focus:ring-violet-900 focus:ring-offset-1 bg-gray-100 p-2">
                                        @if ($errors->has('name'))
                                        <span class="text-danger">{{ $errors->first('name') }}</span>
                                        @endif
                                    </div>
                                    <div class="flex flex-col space-y-1 mb-4">
                                        <label for="email" class="">Email</label>
                                        <input type="email" name="email" id="email" class="rounded-lg border border-violet-800 focus:outline-none focus:ring focus:ring-violet-900 focus:ring-offset-1 bg-gray-100 p-2">
                                        @if ($errors->has('email'))
                                        <span class="text-danger">{{ $errors->first('email') }}</span>
                                        @endif
                                    </div>
                                    <div class="flex flex-col space-y-1 mb-4">
                                        <label for="password" class="">Password</label>
                                        <input type="password" name="password" id="password" class="rounded-lg border border-violet-800 focus:outline-none focus:ring focus:ring-violet-900 focus:ring-offset-1 bg-gray-100 p-2">
                                        @if ($errors->has('password'))
                                        <span class="text-danger">{{ $errors->first('password') }}</span>
                                        @endif
                                    </div>
                                    <div class="flex flex-col space-y-1 mb-4">
                                        <label for="password_confirmation" class="">Confirm Password</label>
                                        <input type="password" name="password_confirmation" id="password_confirmation" class="rounded-lg border border-violet-800 focus:outline-none focus:ring focus:ring-violet-900 focus:ring-offset-1 bg-gray-100 p-2">
                                    </div>
                                    <div class="flex flex-row space-x-2">
                                        <div class="w-full">
                                            <button type="button" class="text-black font-semibold bg-white hover:bg-gray-200 border border-violet-800 rounded-lg px-4 py-2 mt-4 w-full shadow-sm" id="closeFormCreate">Cancel</button>
                                        </div>
                                        <div class="w-full">
                                            <button type="submit" class="text-white font-semibold bg-violet-800 hover:bg-violet-950 border border-violet-800 rounded-lg px-4 py-2 mt-4 w-full">Add User</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Edit user modal -->
        <div class="hidden relative z-10" aria-labelledby="modal-title" role="dialog" aria-modal="true" id="showEdit">
            <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
            <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
                <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                    <div class="relative transform overflow-hidden p-8 rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-xl">
                        <h2 class="text-xl font-bold mb-4 uppercase">Edit User</h2>
                        <div class="flex justify-center items-center">
                            <div class="w-full">
                                <form action="{{ route('admin.users.update', ['id' => ':id']) }}" method="post" id="editUserForm">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="user_id" id="user_id">
                                    <div class="flex flex-col space-y-1 mb-4">
                                        <label for="name" class="">Name</label>
                                        <input type="text" name="name" id="name" class="rounded-lg border border-violet-800 focus:outline-none focus:ring focus:ring-violet-900 focus:ring-offset-1 bg-gray-100 p-2">
                                        @if ($errors->has('name'))
                                        <span class="text-danger">{{ $errors->first('name') }}</span>
                                        @endif
                                    </div>
                                    <div class="flex flex-col space-y-1 mb-4">
                                        <label for="email" class="">Email</label>
                                        <input type="email" name="email" id="email" class="rounded-lg border border-violet-800 focus:outline-none focus:ring focus:ring-violet-900 focus:ring-offset-1 bg-gray-100 p-2">
                                        @if ($errors->has('email'))
                                        <span class="text-danger">{{ $errors->first('email') }}</span>
                                        @endif
                                    </div>
                                    <div class="flex flex-row space-x-2">
                                        <div class="w-full">
                                            <button type="button" class="text-black font-semibold bg-white hover:bg-gray-200 border border-violet-800 rounded-lg px-4 py-2 mt-4 w-full shadow-sm" id="closeFormEdit">Cancel</button>
                                        </div>
                                        <div class="w-full">
                                            <button type="button" class="text-white font-semibold bg-violet-800 hover:bg-violet-950 border border-violet-800 rounded-lg px-4 py-2 mt-4 w-full" id="updateUserButton">Update User</button>
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
            <div class="border border-gray-300 mt-8 rounded-lg overflow-x-auto">
                <table class="table-auto w-full">
                    <thead>
                        <tr class="bg-gray-800 text-white text-left">
                            <th class="p-4">No.</th>
                            <th class="p-4">Name</th>
                            <th class="p-4">Role</th>
                            <th class="p-4">Email</th>
                            <th class="p-4">Status</th>
                            <th class="p-4">Action</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-200">
                        @foreach($users as $user)
                        <tr class="clickable-row cursor-pointer hover:bg-gray-200" data-href="{{ route('admin.users.show', $user) }}">
                            <td class="px-4 py-2">{{ $loop->iteration }}</td>
                            <td class="px-4 py-2" id="user-name">{{ $user->name }}</td>
                            <td class="px-4 py-2 text-sm text-gray-500">
                                Admin
                            </td>
                            <td class="px-4 py-2 text-sm text-gray-500" id="user-email">{{ $user->email }}</td>
                            <td class="px-4 py-2">
                                <p class="inline-block bg-green-100 border border-green-200 text-green-800 text-xs font-bold rounded-lg px-2 py-1">Active</p>
                            </td>
                            <td class="flex flex-row px-4 py-2 space-x-2">
                                <a href="{{ route('admin.users.show', $user) }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-blue-600">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                </a>
                                <button class="editUserButton" data-user-id="{{ $user->id }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                    </svg>
                                </button>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-red-600">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                </svg>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <script type="module">
            $(document).ready(function() {
                //make row become clickable and reroute show user page
                $(".clickable-row").click(function() {
                    var href = $(this).data("href");
                    if (href) {
                        window.location = href;
                    }
                });

                $("#createUser").click(function() {
                    $("#showCreate").removeClass("hidden");
                });

                $("#closeFormCreate").click(function() {
                    $("#showCreate").addClass("hidden");
                });

                $(".editUserButton").on("click", function() {
                    event.stopPropagation(); //prevent other action in parent element (does not execute two actions at the same time)
                    var userId = $(this).data("user-id");

                    console.log("Edit Button Clicked for User ID:", userId); // Debugging statement

                    // Use AJAX to retrieve the user data by userId
                    $.ajax({
                        url: "{{ route('admin.users.edit', ['id' => ':id']) }}".replace(':id', userId),
                        method: "GET",
                        success: function(response) {
                            console.log("AJAX Response:", response); // Debugging statement

                            // Assuming the response contains user data as an object
                            // Populate the edit form fields with the user data
                            $("#showEdit input[name='user_id']").val(userId);
                            $("#showEdit input[name='name']").val(response.name);
                            $("#showEdit input[name='email']").val(response.email);

                            // Show the edit form
                            $("#showEdit").removeClass("hidden");
                        },
                        error: function(error) {
                            // Handle errors
                            console.error("AJAX Error:", error); // Debugging statement
                        }
                    });
                });
                $("#closeFormEdit").click(function() {
                    $("#showEdit").addClass("hidden");
                    $(".showEdit").addClass("hidden");
                });

                $("#updateUserButton").on("click", function() {
                    var userId = $("#user_id").val();

                    // Create an object to store the updated user data
                    var updatedUserData = {
                        name: $("#showEdit input[name='name']").val(),
                        email: $("#showEdit input[name='email']").val(),
                        // Add other fields as needed
                    };

                    // Use AJAX to send the updated user data to the server
                    $.ajax({
                        url: "{{ route('admin.users.update', ['id' => ':id']) }}".replace(':id', userId),
                        method: "PUT",
                        data: updatedUserData,
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(response) {

                            console.log("User updated successfully:", response);

                            // Display the success message
                            if (response.success) {
                                var successMessage = response.success;

                                $('#successMessageContainer').html('<div class="flex items-center p-4 mb-4 text-sm bg-green-500 text-green-50 rounded-lg" role="alert"><svg class="flex-shrink-0 inline w-4 h-4 mr-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20"><path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" /></svg><span class="font-medium mr-2">Success alert!</span>' + successMessage + '</div>');
                            }

                            $("#user-name").text(updatedUserData.name);
                            $("#user-email").text(updatedUserData.email);
                            $("#showEdit").addClass("hidden");
                        },
                        error: function(error) {
                            // Handle errors (e.g., display an error message)
                            console.error("Error updating user:", error);
                        }
                    });
                });
            });
        </script>
</x-layouts.app>