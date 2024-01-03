<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Blade;
use Livewire\Component;
use Livewire\WithPagination;
use RalphJSmit\Laravel\SEO\Support\SEOData;

class AlphabetPage extends Component
{
    use WithPagination;

    public string $param;

    public function render()
    {
        return view('livewire.alphabet-page', [
            'names' => \App\Models\Name::whereNotNull('scraped_at')->where('first_char', $this->param)->paginate(9),
        ])->layout('layouts.app', [
            'seo' => new SEOData(
                title: 'Ide Nama Bayi dengan Huruf Awal ' . ucwords($this->param),
                description: 'Ayah Bunda sedang mencari ide nama bayi dengan awalan ' . ucwords($this->param ). '?
Kami punya 38 ide nama anak dengan awalan ' . ucwords($this->param) . ' yang bisa Ayah bunda pilih. ')
        ]);
    }
}
