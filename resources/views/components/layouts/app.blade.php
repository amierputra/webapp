<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-zinc-50">
    <div class="flex flex-row">
        <div>
            <x-sidebar />
        </div>
        <div class="flex flex-col w-full">
            <header class="bg-white border-b border-gray-300 shadow-md sticky top-0">
                <div class="container mx-auto px-4 py-6 flex justify-between items-center">
                    <h3 class="text-2xl font-bold">Vite</h3>
                    <nav>
                        <ul class="flex">
                            <li class="mr-6">
                                <a href="#" class="hover:text-blue-600">Home</a>
                            </li>
                            <li class="mr-6">
                                <a href="#" class="hover:text-blue-600">About</a>
                            </li>
                            <li class="">
                                <a href="#" class="hover:text-blue-600">Contact</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </header>
            <main class="py-8 px-4 min-h-screen">
                {{ $slot }}
            </main>
        </div>
    </div>
</body>

</html>