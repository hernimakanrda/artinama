<?php

namespace App\Livewire;

use App\Models\Name;
use Livewire\Component;

class NavBar extends Component
{
    public string $term = '';
    public $names;

    public function search()
    {
        if(strlen($this->term) >= 3){
            $this->names = Name::whereNotNull('scraped_at')->where('name', 'LIKE', '%' . $this->term . '%')->take(15)->select('id', 'slug', 'name')->get();
        }
        else{
            $this->names = [];
        }
    }
    public function render()
    {
        return view('livewire.nav-bar');
    }
}
