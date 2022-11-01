<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;

class SearchDropdown extends Component
{
    public $search = '';

    public function render()
    {
        $searchResults = [];
        if(strlen($this->search)>1)
        {
            $searchResults = Http::get('https://api.themoviedb.org/3/search/movie?query=
                        '.$this->search.'&api_key=8b9cec112f6d2a59f1140a7ccd9072dd')
            ->json()['results'];
        }
        //dump($searchResults);

        return view('livewire.search-dropdown', [
            'searchResults' => collect($searchResults)->take(7),
        ]);
    }

}
