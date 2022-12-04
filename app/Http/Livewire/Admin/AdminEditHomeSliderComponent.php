<?php

namespace App\Http\Livewire\Admin;
use App\Models\Category;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\HomeSlider;
class AdminEditHomeSliderComponent extends Component{
    use WithFileUploads;
    public $slider_id;
    public $top_title;
    public $title;
    public $sub_title;
    public $offer;
    public $link;
    public $image;
    public $status;
    public $newImage;

public function mount($slider_id){
$slide=HomeSlider::find($slider_id);
$this->slider_id=$slide->id;
$this->top_title=$slide->top_title;
$this->title=$slide->title;
$this->sub_title=$slide->sub_title;
$this->offer=$slide->offer;
$this->link=$slide->link;
$this->status=$slide->status;
$this->image=$slide->image;
}


public function updateSlide(){
    $this->validate([
        'top_title'=>'required',
        'title'=>'required',
        'sub_title'=>'required',
        'offer'=>'required',
        'link'=>'required',
        'image'=>'required',
        'status'=>'required',
    ]);

    $slide=HomeSlider::find($this->slider_id);

    $slide->top_title=$this->top_title;
    $slide->title=$this->title;
    $slide->sub_title=$this->sub_title;
    $slide->offer=$this->offer;
    $slide->link=$this->link;
    if ($this->newImage){
        $imagename=Carbon::now()->timestamp.'.'.$this->newImage->extension();
        unlink('assets/imgs/products/'.$slide->image);
        $this->image->storeAs('products',$imagename);
        $slide->image=$imagename;
    }
    $slide->status=$this->status;
    $slide->save();
    session()->flash('message','სლაიდი წარმატებით განახლდა');
}

    public function render()
    {
        $slide=HomeSlider::find($this->slider_id);
        return view('livewire.admin.admin-edit-home-slider-component',compact('slide'));
    }
}
