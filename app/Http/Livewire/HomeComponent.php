<?php

namespace App\Http\Livewire;

use App\Models\HomeSlider;
use App\Models\Product;
use App\Models\Categories_with_images;
use Livewire\Component;
class HomeComponent extends Component
{
    public function render()
    {
        $slides=HomeSlider::orderBy('created_at','DESC')->get();
        $lproduct=Product::orderBy('created_at','DESC')->get()->take(8);
        $fproducts=Product::where('featured',1)->inRandomOrder()->get()->take(8);
        $categoriesWimages=Categories_with_images::orderBy('created_at','DESC')->inRandomOrder()->get()->take(8);
        return view('livewire.home-component',['slides'=>$slides,'lproduct'=>$lproduct,'fproducts'=>$fproducts,'categoriesWimages'=>$categoriesWimages]);



    }
}
