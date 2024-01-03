<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;
use RalphJSmit\Laravel\SEO\Support\SEOData;

class Page extends Component
{
    public $page;

    public function render()
    {
        return view('pages.' . $this->page);
    }
}
