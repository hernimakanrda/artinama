<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use RalphJSmit\Laravel\SEO\Support\SEOData;

class GenderPage extends Component
{
    use WithPagination;

    public string $param;

    public function render()
    {
        return view('livewire.gender-page', [
            'names' => \App\Models\Name::whereNotNull('scraped_at')->where('gender', $this->param)->paginate(9),
        ])->layout('layouts.app', [
            'seo' => new SEOData(
                title: 'Ide Nama Bayi ' . ucwords($this->param),
                description: 'Ayah Bunda sedang mencari ide nama bayi ' . ucwords($this->param ). '?
Kami punya 38 ide nama anak ' . ucwords($this->param) . ' yang bisa Ayah bunda pilih. ')
        ]);
    }
}
