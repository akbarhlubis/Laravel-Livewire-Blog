<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Title;

// Attributes\Title is a Livewire attribute that allows you to set the page title from within the component.
#[Title('Contact')]
class Contact extends Component
{
    public function render()
    {
        return view('livewire.contact');
    }
}
