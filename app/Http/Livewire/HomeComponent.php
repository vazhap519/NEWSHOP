<?php

namespace App\Http\Livewire;

use App\Models\HomeSlider;
use App\Models\Product;
<<<<<<< HEAD
use App\Models\Top_Menu_Model;
use App\Models\TopMenu;
=======
>>>>>>> 6a89ec9c990e9f1d67c65b8f22e81888cea4f908
use Livewire\Component;
use App\Models\Top_Center_menu;
class HomeComponent extends Component
{
    public function render()
    {
        $slides=HomeSlider::orderBy('created_at','DESC')->get();
        $lproduct=Product::orderBy('created_at','DESC')->get()->take(8);
        $fproducts=Product::where('featured',1)->inRandomOrder()->get()->take(8);
<<<<<<< HEAD
        return view('livewire.home-component',['slides'=>$slides,'lproduct'=>$lproduct,'fproducts'=>$fproducts]);
=======
        $top_menu=new Top_Center_menu();
        return view('livewire.home-component',['slides'=>$slides,'lproduct'=>$lproduct,'fproducts'=>$fproducts,'top_menu'=>$top_menu]);
>>>>>>> 6a89ec9c990e9f1d67c65b8f22e81888cea4f908
    }
}
