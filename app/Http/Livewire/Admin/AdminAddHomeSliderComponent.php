<?php

namespace App\Http\Livewire\Admin;

use App\Models\HomeSlider;
use Livewire\Component;

class AdminAddHomeSliderComponent extends Component
{
    public function render()
    {
        $slides=HomeSlider::orderBy('created_at','DESC')->get();
        return view('livewire.admin.admin-add-home-slider-component',['slides'=>$slides]);
    }
}
