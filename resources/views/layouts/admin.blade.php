<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" x-data="{ darkMode: false }">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased flex flex-col min-h-screen">
    <div class="flex-col w-full md:flex md:flex-row md:min-h-screen flex-grow">
        <div @click.away="open = false" class="flex flex-col flex-shrink-0 w-full md:w-64" :class="{ 'bg-gray-800 text-gray-200': darkMode, 'bg-white text-gray-700': !darkMode }" x-data="{ open: false }">
            <div class="flex flex-row items-center justify-between flex-shrink-0 px-8 py-4">
                <a href="#" class="text-lg font-semibold tracking-widest uppercase rounded-lg focus:outline-none focus:shadow-outline" :class="{ 'text-white': darkMode, 'text-gray-900': !darkMode }">{{ config('app.name', 'Laravel') }}</a>
                <button class="rounded-lg md:hidden focus:outline-none focus:shadow-outline" @click="open = !open">
                    <svg fill="currentColor" viewBox="0 0 20 20" class="w-6 h-6">
                        <path x-show="!open" fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM9 15a1 1 0 011-1h6a1 1 0 110 2h-6a1 1 0 01-1-1z" clip-rule="evenodd"></path>
                        <path x-show="open" fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>
            <nav :class="{'block': open, 'hidden': !open}" class="flex-grow px-4 pb-4 md:block md:pb-0 md:overflow-y-auto">
                <a class="block px-4 py-2 mt-2 text-sm font-semibold rounded-lg focus:outline-none focus:shadow-outline" :class="{ 'bg-gray-700 text-white hover:bg-gray-600 focus:bg-gray-600': darkMode, 'bg-gray-200 text-gray-900 hover:bg-gray-200 focus:bg-gray-200': !darkMode }" href="#">Blog</a>
                <a class="block px-4 py-2 mt-2 text-sm font-semibold rounded-lg focus:outline-none focus:shadow-outline" :class="{ 'bg-transparent text-gray-200 hover:bg-gray-600 focus:bg-gray-600': darkMode, 'bg-transparent text-gray-900 hover:bg-gray-200 focus:bg-gray-200': !darkMode }" href="#">Portfolio</a>
                <a class="block px-4 py-2 mt-2 text-sm font-semibold rounded-lg focus:outline-none focus:shadow-outline" :class="{ 'bg-transparent text-gray-200 hover:bg-gray-600 focus:bg-gray-600': darkMode, 'bg-transparent text-gray-900 hover:bg-gray-200 focus:bg-gray-200': !darkMode }" href="#">About</a>
                <a class="block px-4 py-2 mt-2 text-sm font-semibold rounded-lg focus:outline-none focus:shadow-outline" :class="{ 'bg-transparent text-gray-200 hover:bg-gray-600 focus:bg-gray-600': darkMode, 'bg-transparent text-gray-900 hover:bg-gray-200 focus:bg-gray-200': !darkMode }" href="#">Contact</a>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a :href="route('logout')"
                       class="block px-4 py-2 mt-2 text-sm font-semibold rounded-lg focus:outline-none focus:shadow-outline"
                       :class="{ 'bg-transparent text-gray-200 hover:bg-gray-600 focus:bg-gray-600': darkMode, 'bg-transparent text-gray-900 hover:bg-gray-200 focus:bg-gray-200': !darkMode }"
                       @click.prevent="this.closest('form').submit();">
                        Log Out
                    </a>
                </form>
            </nav>
        </div>

        <div class="flex w-full p-8">{{ $slot }}</div>
    </div>

    <button @click="darkMode = !darkMode" class="fixed bottom-4 right-4 p-2 bg-gray-800 text-white rounded-full focus:outline-none flex items-center z-50">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
            <path d="M10 2a8 8 0 100 16 8 8 0 000-16zm0 14a6 6 0 110-12 6 6 0 010 12z"/>
        </svg>
        Toggle Dark Mode
    </button>

    <footer :class="{ 'bg-gray-800 text-white': darkMode, 'bg-white text-gray-700': !darkMode }" class="p-4 mt-8 w-full fixed bottom-0 transition duration-500 ease-in-out transform hover:scale-105">
        <div class="container mx-auto text-center">
            <div class="flex items-center justify-center space-x-2">
            <span class="animate-bounce">&copy; {{ date('Y') }} {{ config('app.name', 'Laravel') }}. All rights reserved.</span>
            <span class="animate-pulse">|</span>
            <span class="animate-bounce">Developed by
                <a href="https://github.com/abdurrahman-akash" class="text-gray-500 hover:text-gray-700 transition duration-300 ease-in-out transform hover:scale-110 animate-spin" target="_blank">Abdur Rahman AKASH</a>.
            </span>
            </div>
        </div>
    </footer>
</body>
</html>
