<x-layouts.guest>
    <div class="bg-white w-1/4 p-8 rounded-lg">
        <div class="flex justify-center items-center">
            <h1 class="text-2xl font-bold uppercase mb-6">Login</h1>
        </div>
        <form action="{{ route('login.store') }}" method="POST">
            @csrf
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
        <div class="w-full">
            <button type="submit" class="w-full bg-blue-900 hover:bg-black text-white rounded-lg p-2 mt-4">Login</button>
        </div>
        </form>
    </div>
</x-layouts.guest>