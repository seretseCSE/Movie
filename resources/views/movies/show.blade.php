@extends('layouts.main')

@section('content')
    <div class="movie-info border-b border-gray-800">
        <div class="container mx-auto px-4 py-16 flex">
            <img src="{{ 'https://image.tmdb.org/t/p/w500/'. $moviedetail['poster_path'] }}" alt="avatar" class="w-96">
            <div class="ml-24">
                <h2 class="text-4xl font-semibold">
                    {{ $moviedetail['title'] }}
                </h2>
                <div class="flex items-center text-gray-400 text-sm">
                    <span>star</span>
                    <span class="ml-1">{{ $moviedetail['vote_average'] *10 }}%</span>
                    <span class="mx-2">|</span>
                    <span>{{ \Carbon\Carbon::parse($moviedetail['release_date'])->format('M d, Y') }} </span>
                    <span class="mx-2">|</span>
                    <span>
                        @foreach ($moviedetail['genres'] as $genres)
                              {{ $genres ['name'] }}  @if (!$loop->last) ,@endif
                        @endforeach
                    </span>
                </div>

                <div class="text-gray-300 mt-8">
                    {{ $moviedetail['overview'] }}
                </div>
                <div class="mt-12">
                    <h4 class="text-white font-semibold">Casts</h4>
                    <div class="flex mt-4">
                        @foreach ($credits['crew'] as $crew)
                            @if ($loop->index<3)
                                <div class="mr-8">
                                    <div>{{ $crew['name'] }}</div>
                                    <div class="text-sm text-gray-300">{{ $crew['job'] }}</div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>

                <div class="mt-12">
                    @if ($videos['results'][0]['key'])
                        <a href="https://www.youtube.com/watch>v=/{{ $videos['results'][1]['key'] }}" target="blank"class="flex items-center inline-flex bg-orange-500 text-gray-900 rounded font-semibold
                        px-5 py-4 hover:bg-orange:600 transition ease-in-out duration-500">
                            <span class="ml-4">Play trailor</span>
                        </a>
                    @endif
                </div>

            </div>
        </div>
        <div class="movie-cast border-b border-gray-800">
            <div class="container mx-auto px-4 py-16">
                <h2 class="text-4xl font-semibold">Cast</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
                    @foreach ($credits['cast'] as $cast)
                        @if ($cast['profile_path'] && $loop->index<5)
                            <div class="mt-8">
                                <img src="{{ 'https://image.tmdb.org/t/p/w500/'. $cast['profile_path'] }}" alt="actor1" class="hover:opacity-75 transition ease-in-out duration-150">
                                <div class="mt-2">
                                    <a href="#" class="text-lg mt-2 hover:text-gray:300">{{ $cast['name'] }}</a>
                                    <div class="text-sm text-gray-400">
                                        {{ $cast['character'] }}
                                    </div>
                                </div>
                            </div>
                        @endif

                    @endforeach
                </div>
            </div>
        </div> <!-- end movie-cast -->

        <div class="movie-images" x-data="{ isOpen: false, image: ''}">
            <div class="container mx-auto px-4 py-16">
                <h2 class="text-4xl font-semibold">Images</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
                    @foreach ($images['backdrops'] as $image)
                        <div class="mt-8">
                            <a
                                @click.prevent="
                                    isOpen = true
                                    image='{{ 'https://image.tmdb.org/t/p/original/'.$image['file_path'] }}'
                                "
                                href="#"
                            >
                                <img src="{{ 'https://image.tmdb.org/t/p/w500/'.$image['file_path'] }}" alt="image1" class="hover:opacity-75 transition ease-in-out duration-150">
                            </a>
                        </div>
                    @endforeach
                </div>

                <div
                    style="background-color: rgba(0, 0, 0, .5);"
                    class="fixed top-0 left-0 w-full h-full flex items-center shadow-lg overflow-y-auto"
                    x-show="isOpen">
                    <div class="container mx-auto lg:px-32 rounded-lg overflow-y-auto">
                        <div class="bg-gray-900 rounded">
                            <div class="flex justify-end pr-4 pt-2">
                                <button
                                    @click="isOpen = false"
                                    @keydown.escape.window="isOpen = false"
                                    class="text-3xl leading-none hover:text-gray-300">&times;
                                </button>
                            </div>
                            <div class="modal-body px-8 py-8">
                                <img :src="image" alt="poster">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
