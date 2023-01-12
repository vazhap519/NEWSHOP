<?php

namespace App\Http\Livewire\Admin;

use App\Models\featured_brands;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithFileUploads;

class AdminAddFeaturesBrandsComponent extends Component
{
    use WithFileUploads;
    public $brand_image;
    public $brand_meta_name;
    public $brand_meta_description;
    public $brand_meta_keywoards;
    public $brands_status;
    public function AddFeaturedBrands(){
        $this->validate(
            [
                'brand_image'=>'required',
                'brand_meta_name'=>'required',
                'brand_meta_description'=>'required',
                'brand_meta_keywoards'=>'required',
                'brands_status'=>'required',
            ]
        );
        $FeaturedBrands=new featured_brands();

        $imageName=Carbon::now()->timestamp.'.'.$this->brand_image->extension();
        $this->brand_image->storeAs('FeaturedBrands',$imageName);
        $FeaturedBrands->brand_image=$imageName;

        $FeaturedBrands->brand_meta_name=$this->brand_meta_name;
        $FeaturedBrands->brand_meta_description=$this->brand_meta_description;
        $FeaturedBrands->brand_meta_keywoards=$this->brand_meta_keywoards;
        $FeaturedBrands->brands_status=$this->brands_status;

        $FeaturedBrands->save();
          session()->flash('message','ბრენდი დაემატა');
        return redirect()->route('admin.brends');
    }
    public function render()
    {
        $FeaturedBrands =featured_brands::orderBy('created_at','desc');
        return view('livewire.admin.admin-add-features-brands-component',['featuredbrands'=>$FeaturedBrands]);
    }
}
