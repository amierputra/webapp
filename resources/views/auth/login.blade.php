<x-layouts.guest>
    <div class="bg-white w-1/4 p-8 rounded-lg">
        <div class="flex justify-center items-center">
            <h1 class="text-2xl font-bold uppercase mb-6">Login</h1>
        </div>
        <form action="{{ route('login.store') }}" method="POST">
            @csrf
            <div class="flex flex-col space-y-1 mb-4">
                <label for="email" class="">Email</label>
                <input type="email" name="email" id="email" class="rounded-lg border border-violet-800 focus:outline-none focus:ring focus:ring-violet-900 focus:ring-offset-1 bg-gray-100 p-2">
                @if ($errors->has('email'))
                <span class="text-red-600">{{ $errors->first('email') }}</span>
                @endif
            </div>
            <div class="flex flex-col space-y-1 mb-4">
                <label for="password" class="">Password</label>
                <input type="password" name="password" id="password" class="rounded-lg border border-violet-800 focus:outline-none focus:ring focus:ring-violet-900 focus:ring-offset-1 bg-gray-100 p-2">
                @if ($errors->has('password'))
                <span class="text-red-600">{{ $errors->first('password') }}</span>
                @endif
                 <div class="flex justify-end">
                <a href="" class="text-violet-800 underline">Forgot password?</a>
            </div>
            </div>
            <div class="w-full">
                <button type="submit" class="w-full bg-violet-800 hover:bg-violet-950 focus:ring focus:ring-violet-600 focus:ring-offset-1 text-white px-4 py-2 rounded-lg">Login</button>
            </div>
        </form>
        <hr class="bg-gray-900 h-0.5 mt-4">
        <div class="flex justify-center mt-4 inline-block">
            <p class="mr-2">Don't have an account?</p>
            <a href="{{ route('register') }}" class="text-violet-800 underline">Register here</a>
        </div>
    </div>
</x-layouts.guest>