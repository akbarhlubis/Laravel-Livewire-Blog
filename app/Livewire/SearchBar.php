<?php

namespace App\Livewire;

use Livewire\Component;

class SearchBar extends Component
{
    public $search = '';
    public function render()
    {
        // $results = [];
        // if(strlen($this->search) >= 1){
        //     $results = \App\Models\Post::where('title', 'like', '%'.$this->search.'%')
        //         ->orWhere('content', 'like', '%'.$this->search.'%')
        //         ->limit(3)
        //         ->get();
        // }
        return view('livewire.search-bar');
    }
}
