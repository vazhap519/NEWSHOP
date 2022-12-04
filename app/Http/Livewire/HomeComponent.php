<?php

namespace App\Http\Livewire;

use App\Models\HomeSlider;
use Livewire\Component;

class HomeComponent extends Component
{
    public function render()
    {
        $slides=HomeSlider::where('status')->get();
        return view('livewire.home-component',compact('slides'));
    }
}
