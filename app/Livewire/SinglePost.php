<?php

namespace App\Livewire;

use App\Models\Name;
use Livewire\Component;
use RalphJSmit\Laravel\SEO\Support\SEOData;

class SinglePost extends Component
{
    public Name $name;

    public function render()
    {
        if($this->name->name && !str(request()->url())->contains(['.test', 'localhost'])){
            termapi();
        }

        return view('livewire.single-post')->layout('layouts.app', [
            'seo' => new SEOData(
                title: 'Arti Nama ' . ucwords($this->name->name) . ' Beserta Kepribadiannya',
                description: 'Ayah Bunda sedang mencari arti nama ' . ucwords($this->name->name ). '?
Disini kita akan bahas mengenai arti nama ' . ucwords($this->name->name) . ' beserta kepribadian, asal kata, kecocokan untuk jenis kelamin, agama, juga asal kata. ')
        ]);
    }
}
