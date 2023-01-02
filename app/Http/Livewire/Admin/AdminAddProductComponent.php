<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use App\Models\Colors;
use App\Models\Product;
use Carbon\Carbon;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class AdminAddProductComponent extends Component
{
    use WithPagination;
    use WithFileUploads;
    public $name;
    public $slug;
    public $short_description;
    public $description;
    public $regular_price;
    public $sale_price;
    public $SKU;
    public $stock_status="instock";
    public $featured=0;
    public $quantity;
    public $image;
    public $images=[];
    public $category_id;
public $meta_name;
public $meta_description;
public $meta_keywoards;

    public function generateSlug(){
        $this->slug=Str::slug($this->name);
    }
    public function addProduct(){
$this->validate([
    'name'=>'required',
    'slug'=>'required',
    'short_description'=>'required',
    'description'=>'required',
    'regular_price'=>'required',
    'sale_price'=>'required',
    'SKU'=>'required',
    'stock_status'=>'required',
    'featured'=>'required',
    'quantity'=>'required',
    'image'=>'required',
    'images.*'=>'required',
    'category_id'=>'required',
    'meta_name'=>'require',
    'meta_description'=>'require',
    'meta_keywoards'=>'require',
]);

        $product=new Product();
        $product->name=$this->name;
        $product->slug=$this->slug;
        $product->short_description=$this->short_description;
        $product->description=$this->description;
        $product->regular_price=$this->regular_price;
        $product->sale_price=$this->sale_price;
        $product->SKU=$this->SKU;
        $product->stock_status=$this->stock_status;
        $product->featured=$this->featured;
        $product->quantity=$this->quantity;
        $imageName=Carbon::now()->timestamp.'.'.$this->image->extension();
        $this->image->storeAs('products',$imageName);
        $product->image=$imageName;
foreach ($this->images as $img){
    $img->store('products/products_gallery');
}

        $product->category_id=$this->category_id;
         $product->meta_name=$this->meta_name;
         $product->meta_description=$this->meta_description;
        $product->meta_keywoards=$this->meta_keywoards;
        $product->save();
        session()->flash('message','პროდუქტი დაემატა');
        return redirect()->route('admin.products');
    }
    public function render()
    {
        $products=Product::orderBy('name','ASC');
        $categories=Category::orderBy('name','ASC')->get();
        return view('livewire.admin.admin-add-product-component',['products'=>$products,'categories'=>$categories,]);
    }
}
