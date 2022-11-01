{{-- List of Movies --}}
<div class="mt-8">
    <a href="{{ route('movies.show', $movies['id']) }}">
        <img src="{{ 'https://image.tmdb.org/t/p/w500/'. $movies['poster_path'] }}" alt="avatar" class="hover:opacity-75
        transition ease-in-out duration-150 w-64 h-64">
    </a>
    <div class="mt-2">
        <a href="$movies['id']" class="text-lg mt-2 hover:text-gray-300">{{ $movies['title'] }}</a>
        <div class="flex items-center text-gray-400  text-sm">
            <span>star</span>
            <span class="ml-1">{{ $movies['vote_average'] *10 }}%</span>
            <span class="mx-2">|</span>
            <span>{{ \Carbon\Carbon::parse($movies['release_date'])->format("M d, Y") }}  </span>
        </div>
        <div class="text-gray-400 text-sm">
            @foreach ($movies['genre_ids'] as $genres)
                {{ $genre->get($genres) }} @if (!$loop->last) , @endif
            @endforeach
        </div>
    </div>
</div>

