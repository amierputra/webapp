<x-layouts.guest>
    <div class="bg-white w-1/4 p-8 rounded-lg">
        <div class="flex justify-center items-center">
            <h1 class="text-2xl font-bold uppercase mb-6">Register</h1>
        </div>
        <form action="{{ route('register.store') }}" method="POST">
            @csrf
            <div class="flex flex-col space-y-1 mb-4">
                <label for="name" class="">Name</label>
                <input type="text" name="name" id="name" class="rounded-lg border border-violet-800 focus:outline-none focus:ring focus:ring-violet-900 focus:ring-offset-1 bg-gray-100 p-2">
                @if ($errors->has('name'))
                <span class="text-red-600">{{ $errors->first('name') }}</span>
                @endif
            </div>
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
            </div>
            <div class="flex flex-col space-y-1 mb-4">
                <label for="password_confirmation" class="">Confirm Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="rounded-lg border border-violet-800 focus:outline-none focus:ring focus:ring-violet-900 focus:ring-offset-1 bg-gray-100 p-2">
            </div>
            <div class="w-full">
                <button type="submit" class="w-full bg-violet-800 hover:bg-violet-950 focus:ring focus:ring-violet-600 focus:ring-offset-1 text-white px-4 py-2 rounded-lg mt-4">Register</button>
            </div>
        </form>
        <hr class="bg-gray-900 h-0.5 mt-4">
        <div class="flex justify-center mt-4 inline-block">
            <p class="mr-2">Already have an account?</p>
            <a href="{{ route('login') }}" class="text-violet-800 underline">Login here</a>
        </div>
    </div>
</x-layouts.guest>