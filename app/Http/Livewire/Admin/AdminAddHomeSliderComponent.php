<?php

namespace App\Http\Livewire\Admin;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\HomeSlider;
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
    public function addSlide(){

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
$slide->top_title=$this->top_title;
$slide->title=$this->title;
$slide->sub_title=$this->sub_title;
$slide->offer=$this->offer;
$slide->link=$this->link;
$imagename=Carbon::now()->timestamp.'.'.$this->image->extension();
$this->image->storeAs('slider',$imagename);
$slide->image=$imagename;
$slide->status=$this->status;
$slide->save();
session()->flash('message','სლაიდი წარმატებით დაემატა');
}
    public function render()
    {
        return view('livewire.admin.admin-add-home-slider-component');
    }
}
