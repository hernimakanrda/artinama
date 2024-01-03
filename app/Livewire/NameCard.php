<?php

namespace App\Livewire;

use App\Models\Name;
use Livewire\Component;

class NameCard extends Component
{
    public Name $name;
    public $simple = false;
    public $cta = true;
    public $logo = true;
    public function render()
    {
        return view('livewire.name-card');
    }
}
