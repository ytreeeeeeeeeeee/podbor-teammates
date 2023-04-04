<?php

namespace App\Http\Livewire;

use App\Models\Game;
use Livewire\Component;

class SearchGame extends Component
{
    public $term;

    public function render()
    {
//        sleep(1);
        if ($this->term == '') {
            $games = Game::all();
        }
        else {
            $games = Game::where('title', 'like', '%' . $this->term . '%')->get();
        }
        return view('livewire.search-game', compact('games'));
    }
}
