<?php

namespace App\Http\Livewire;

use App\Models\HomeSlider;
use App\Models\Product;
use Livewire\Component;
use App\Models\Top_Center_menu;
class HomeComponent extends Component
{
    public function render()
    {
        $slides=HomeSlider::orderBy('created_at','DESC')->get();
        $lproduct=Product::orderBy('created_at','DESC')->get()->take(8);
        $fproducts=Product::where('featured',1)->inRandomOrder()->get()->take(8);
        $top_menu=new Top_Center_menu();
        return view('livewire.home-component',['slides'=>$slides,'lproduct'=>$lproduct,'fproducts'=>$fproducts,'top_menu'=>$top_menu]);
    }
}
