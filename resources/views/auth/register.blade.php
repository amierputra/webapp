<x-layouts.guest>
    <div class="bg-white w-1/4 p-8 rounded-lg">
        <div class="flex justify-center items-center">
            <h1 class="text-2xl font-bold uppercase mb-6">Register</h1>
        </div>
        <form action="{{ route('register.store') }}" method="POST">
            @csrf
            <div class="flex flex-col space-y-1 mb-4">
                <label for="name" class="">Name</label>
                <input type="text" name="name" id="name" class="rounded-lg border border-blue-800 focus:outline-none focus:border-sky-500 bg-gray-100 p-2">
                @if ($errors->has('name'))
                <span class="text-red-600">{{ $errors->first('name') }}</span>
                @endif
            </div>
            <div class="flex flex-col space-y-1 mb-4">
                <label for="email" class="">Email</label>
                <input type="email" name="email" id="email" class="rounded-lg border border-blue-800 focus:outline-none focus:border-sky-500 bg-gray-100 p-2">
                @if ($errors->has('email'))
                <span class="text-red-600">{{ $errors->first('email') }}</span>
                @endif
            </div>
            <div class="flex flex-col space-y-1 mb-4">
                <label for="password" class="">Password</label>
                <input type="password" name="password" id="password" class="rounded-lg border border-blue-800 focus:outline-none focus:border-sky-500 bg-gray-100 p-2">
                @if ($errors->has('password'))
                <span class="text-red-600">{{ $errors->first('password') }}</span>
                @endif
            </div>
            <div class="flex flex-col space-y-1 mb-4">
                <label for="password_confirmation" class="">Confirm Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="rounded-lg border border-blue-800 focus:outline-none focus:border-sky-500 bg-gray-100 p-2">
            </div>
            <div class="w-full">
                <button type="submit" class="w-full bg-blue-900 hover:bg-black text-white rounded-lg p-2 mt-4">Register</button>
            </div>
        </form>
    </div>
</x-layouts.guest>