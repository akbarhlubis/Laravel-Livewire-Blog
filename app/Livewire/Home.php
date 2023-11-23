<?php

namespace App\Livewire;

use Livewire\Attributes\Title;
use Livewire\Component;

// Attributes\Title is a Livewire attribute that allows you to set the page title from within the component.
#[Title('Home')]

class Home extends Component
{
    public $search = '';
    public function render()
    {
        $results = [];
        if(strlen($this->search) >= 1){
            $results = \App\Models\Post::where('title', 'like', '%'.$this->search.'%')
                ->orWhere('content', 'like', '%'.$this->search.'%')
                ->limit(3)
                ->get();
        }
        $posts = \App\Models\Post::latest()->get()->where('status',1);
        return view('livewire.home',compact('posts','results'));
    }
}
