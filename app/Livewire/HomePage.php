<?php

namespace App\Livewire;

use App\Models\Name;
use Livewire\Component;
use RalphJSmit\Laravel\SEO\Support\SEOData;

class HomePage extends Component
{
    public function mount()
    {
        if(isset($_GET['nerd'])){
            $name = Name::whereNotNull('scraped_at')->inRandomOrder()->firstOrFail();
            echo route('single_post', $name, true);
            die;
        }
    }

    public function render()
    {
        return view('livewire.home-page')->layout('layouts.app', [
            'seo' => new SEOData(
                title: config('app.name'),
                description: 'Ayah Bunda sedang mencari ide nama untuk si kecil? Yuk telusuri koleksi nama kami disini. Ayah Bunda bisa mendapatkan ide nama berdasarkan huruf awal, agama, maupun suku & asalnya.')
        ]);
    }
}
