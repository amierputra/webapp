<x-layouts.app>
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
</x-layouts.app>