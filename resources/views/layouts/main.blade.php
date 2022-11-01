<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/main.css') }}" rel="stylesheet">
    <title>Movie app</title>
    @livewireStyles
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="font-sans bg-gray-900 text-white">
    <nav class="border-b border-gray-800">
        <div class="container mx-auto flex items-center justify-between px-4 py-6">
            <ul class="flex items-center">
                <li>
                    <a href="{{ route('movies.index') }}" >
                        <img height="25" width="25" src="{{ asset('img/actor1.jpg') }}" alt="profile image" class="hover:opacity-75 transition ease-in-out duration-150">
                    </a>
                </li>
                <li class="ml-16">
                    <a href="{{ route('movies.index') }}" class="hover:text-gray-300">Movies</a>
                </li>
                <li class="ml-4">
                    <a href="#" class="hover:text-gray-300">Tv Shows</a>
                </li>
                <li class="ml-4">
                    <a href="{{ route('actors.index') }}" class="hover:text-gray-300">Actors</a>
                </li>
            </ul>
            <div class="flex items-center">
                <div class="relative">
                    @livewire('search-dropdown')
                </div>
                <div class="ml-4">
                    <a href="#">
                        <img src="{{ asset('img/avatar.jpg') }}" alt="avatar" class="rounded-full w-8 h-8">
                    </a>
                </div>
            </div>
        </div>
    </nav>
</div>
@yield('content')
@livewireScripts
</body>
</html>
