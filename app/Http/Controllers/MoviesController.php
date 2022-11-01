<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MoviesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $popularMovies = Http::withToken(config('services.tmdb.token'))
                            ->get('https://api.themoviedb.org/3/movie/popular?api_key=8b9cec112f6d2a59f1140a7ccd9072dd')
                            ->json()['results'];

        $nowPlaying = Http::withToken(config('services.tmdb.token'))
                            ->get('https://api.themoviedb.org/3/movie/now_playing?api_key=8b9cec112f6d2a59f1140a7ccd9072dd')
                            ->json()['results'];

        $genreArray = Http::withToken(config('services.tmdb.token'))
                            ->get('https://api.themoviedb.org/3/genre/movie/list?api_key=8b9cec112f6d2a59f1140a7ccd9072dd')
                            ->json()['genres'];

        $genre = collect($genreArray)->mapWithKeys(function($genres) {
            return[$genres['id'] => $genres['name']];
        });

        return view('movies.index', compact('popularMovies', 'genre', 'nowPlaying'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $moviedetail = Http::withToken(config('services.tmdb.token'))
                            ->get('https://api.themoviedb.org/3/movie/'.$id.'?api_key=8b9cec112f6d2a59f1140a7ccd9072dd')
                            ->json();
        $credits = Http::withToken(config('services.tmdb.token'))
                            ->get('https://api.themoviedb.org/3/movie/'.$id.'/credits?api_key=8b9cec112f6d2a59f1140a7ccd9072dd')
                            ->json();
        $videos = Http::withToken(config('services.tmdb.token'))
                            ->get('https://api.themoviedb.org/3/movie/'.$id.'/videos?api_key=8b9cec112f6d2a59f1140a7ccd9072dd')
                            ->json();
        $images = Http::withToken(config('services.tmdb.token'))
                            ->get('https://api.themoviedb.org/3/movie/'.$id.'/images?api_key=8b9cec112f6d2a59f1140a7ccd9072dd')
                            ->json();
        //dd($videos['results'][0]['key']);
        return view('movies.show', compact('moviedetail', 'credits', 'videos', 'images'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
