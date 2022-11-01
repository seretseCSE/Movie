@extends('layouts.main')

@section('content')
    <div class="container mx-auto px-4 pt-16">
        <div class="popular-actors">
            <h2 class="uppercase tracking-wider text-orange-500 text-lg
                font-semibold">popular Actors</h2>
            <div class="grid grid-cols-4 lg:grid-cols-5">
                @foreach ($popularActors as $popularActors)
                    <div class="actor mt-8 ml-4">
                        <a href="">
                            <img src="{{ 'https://image.tmdb.org/t/p/w500'. $popularActors['profile_path']}}" alt="avatar"
                            class="hover:opacity-75 transition ease-in-out duration-150 w-64 h-64">
                        </a>
                        <div class="mt-2">
                            <div class="text-lg hover:text-gray-300">{{ $popularActors['name'] }}</div>
                            <div class="text-sm truncate text-gray-400">
                                one
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
         
    </div>
@endsection
