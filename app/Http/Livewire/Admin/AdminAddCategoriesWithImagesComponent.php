<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Categories_with_images;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Illuminate\Support\Carbon;


class AdminAddCategoriesWithImagesComponent extends Component
{
    use WithFileUploads;
    public $name;
    public $slug;
    public $image;
    public function generateSlug(){
        $this->slug=Str::slug($this->name);
    }
public function AddCategoryWithImage(){
    $this->validate([
        'name'=>'required',
        'slug'=>'required',
        'image'=>'required',
    ]);
    $Category_width_images=new Categories_with_images();
    $Category_width_images->name=$this->name;
    $Category_width_images->slug=$this->slug;
    $imageName=Carbon::now()->timestamp.'.'.$this->image->extension();
    $this->image->storeAs('category_image',$imageName);
    $Category_width_images->image=$imageName;
}
    public function render()
    {
        return view('livewire.admin.admin-add-categories-with-images-component',compact('Category_width_images'));
    }
}
