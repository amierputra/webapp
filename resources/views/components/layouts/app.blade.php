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
        <div class="" id="mainSidebar">
            <x-sidebar />
        </div>
        <div class="flex flex-col w-full">
            <header class="bg-white border-b border-gray-300 shadow-md sticky top-0">
                <div class="container mx-auto px-4 py-6 flex justify-between items-center">
                    <button type="button" id="hideSidebar">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.0" stroke="currentColor" class="w-8 h-8 text-blue-900">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                        </svg>
                    </button>
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

<script type="module">
    $(document).ready(function() {
        $("#hideSidebar").click(function() {
            $("#mainSidebar").toggleClass("hidden");
        });
    });
</script>

</html>