<?php

namespace App\Http\Livewire\Admin;

use App\Models\HomeSlider;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithFileUploads;
class AdminAddHomeSliderComponent extends Component
{
    use WithFileUploads;
    public $top_title;
    public $title;
    public $sub_title;
    public $offer;
    public $link;
    public $image;
    public $status;

    public function AddSlide(){

        $this->validate([
            'top_title'=>'required',
            'title'=>'required',
            'sub_title'=>'required',
            'offer'=>'required',
            'link'=>'required',
            'image'=>'required',
            'status'=>'required',
        ]);
        $slide=new HomeSlider();
        $slide->top_title= $this->top_title;
        $slide->title=$this->title;
        $slide->sub_title=$this->sub_title;
        $slide->offer=$this->offer;
        $slide->link=$this->link;
        $imageName=Carbon::now()->timestamp.'.'.$this->image->extension();
        $this->image->storeAs('slider',$imageName);
        $slide->image=$imageName;
        $slide->status=$this->status;
        $slide->save();
        session()->flash('message','სლაიდი დაემატა');
        return redirect()->route('admin.home.slider');

    }
    public function render()
    {
        $slides=HomeSlider::orderBy('created_at','DESC')->get();
        return view('livewire.admin.admin-add-home-slider-component',['slides'=>$slides]);
    }
}
