<div class="relative mt-3 md:mt-0" x-data="{ isOpen: true }" x-on:click.outside="isOpen = false">
    <input wire:model="search" type="text" class="bg-gray-800 text-sm rounded-full w-64 px-4 pl-8 py-1
    focus:outline-none focus:shadow-outline" placeholder="Search"
        @focus="isOpen = true"
        @keydown="isOpen = true"
        @keydown.escape.window="isOpen = false"
        @keydown.shift.tab="isOpen = false">
        {{-- <i class="fa-solid fa-magnifying-glass"></i> --}}
    @if(strlen($search)>=2)
        @if($searchResults->count()>0)
            <div class="absolute bg-gray-800 text-sm-rounded w-64 mt-4 py-3"
             x-show="isOpen">
                <ul>
                    @foreach ($searchResults as $results)
                        <li class="border-b border-gray-800">
                            <a href="{{ route('movies.show', $results['id']) }}"
                                class="hover:bg-gray-700 px-3 py-3 flex items-center">
                                @if ($results['poster_path'])
                                    <img src="https://image.tmdb.org/t/p/w92/{{ $results['poster_path'] }}" alt="poster" class="w-8">
                                @else
                                    <img src="https://via.placeholder.com/50x75" alt="poster" class="w-8">
                                @endif
                                <span class="ml-4"> {{ $results['title'] }} </span>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        @else
            <div class="absolute bg-gray-800 text-sm-rounded w-64 mt-4 py-3">
                No results for {{ $search }}
            </div>
        @endif
    @endif
</div>
