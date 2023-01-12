<?php

namespace App\Http\Livewire\Admin;
use App\Models\featured_brands;
use Livewire\Component;
use Livewire\WithPagination;

class AdminFeaturesBrandsComponent extends Component
{
    public function render()
    {

        $featuredBrands=featured_brands::all();
        return view('livewire.admin.admin-features-brands-component',['featuredBrands'=>$featuredBrands]);
    }
}
