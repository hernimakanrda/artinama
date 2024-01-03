<?php

namespace App\Livewire;

use Livewire\Component;

class NavBarDropdown extends Component
{
    public array $items = [];
    public string $title;

    public string $route = 'alphabet_page';

    public function render()
    {
        return view('livewire.nav-bar-dropdown');
    }
}
