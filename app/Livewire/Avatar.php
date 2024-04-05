<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On;

class Avatar extends Component
{
    #[On('updated')]
    public function refresh()
    {
    }
    public function render()
    {
        return view('livewire.avatar');
    }
}
