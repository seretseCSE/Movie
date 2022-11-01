@extends('layouts.main')

@section('content')
    <div class="container mx-auto px-4 pt-16">
        <div class="popular-movie">
            <h2 class="uppercase tracking-wider text-orange-500 text-lg font-semibold">popular movie</h2>
            <div class="grid grid-cols-4 gap-8">
                @foreach ($popularMovies as $movies)
                    <x-movie-card :movies="$movies" :genre="$genre"/>
               @endforeach
            </div>
        </div>
        <div class="mt-16">
            <h2 class="uppercase tracking-wider text-orange-500 text-lg font-semibold">Now Playing</h2>
            <div class="grid grid-cols-4 gap-8">
                @foreach ($nowPlaying as $movies)
                    <x-movie-card :movies="$movies" :genre="$genre"/>
                @endforeach
            </div>
        </div>
    </div>
@endsection
