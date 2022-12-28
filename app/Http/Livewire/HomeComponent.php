<?php

namespace App\Http\Livewire;

use App\Models\HomeSlider;
use App\Models\Product;
use App\Models\TopMenu;
use Livewire\Component;

class HomeComponent extends Component
{
    public function render()
    {
        $slides=HomeSlider::orderBy('created_at','DESC')->get();
        $lproduct=Product::orderBy('created_at','DESC')->get()->take(8);
        $fproducts=Product::where('featured',1)->inRandomOrder()->get()->take(8);
        $topMenu=TopMenu::orderBy('created_at','DESC')->get();
        return view('livewire.home-component',['slides'=>$slides,'lproduct'=>$lproduct,'fproducts'=>$fproducts,'topmenu'=>$topMenu]);
    }
}
