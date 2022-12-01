<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Product;



use http\Env\Request;
use Livewire\Component;
use Livewire\WithPagination;
use Cart;

class  CategoryComponent extends Component
{
    use WithPagination;
    public $pageSize=12;
    public $OrderBy="DefaultSort";
    public $slug;
    public $min_value=0;
    public $max_value=5000;

    public function store($product_id,$product_name,$product_price){
        Cart::add($product_id,$product_name,1,$product_price)->associate('\App\Models\Product');
        session()->flash('succsess_message','Item added In Cart');
        return redirect()->route('shop.cart');
    }
    public function changePageSize($size){
        $this->pageSize=$size;
    }

    public function ChangeOrderBy($order){
        $this->OrderBy=$order;
    }
public function mount($slug){
        $this->slug=$slug;
}

    public function render()
    {
$category=Category::where('slug',$this->slug)->first();
$category_id=$category->id;
$category_name=$category->name;
        if($this->OrderBy=='Price: Low to High'){
            $products=Product::where('category_id',$category_id)->OrderBy('regular_price','ASC')->paginate($this->pageSize);
        }elseif ($this->OrderBy=='Price: High to Low'){
            $products=Product::where('category_id',$category_id)->OrderBy('regular_price','DESC')->paginate($this->pageSize);
        }elseif ($this->OrderBy=='Sort by Newness'){
            $products=Product::where('category_id',$category_id)->OrderBy('created_at','DESC')->paginate($this->pageSize);
        }else{
            $products=Product::where('category_id',$category_id)->paginate($this->pageSize);
        }
        $rproducts=Product::where('category_id',$category->category_id)->inRandomOrder()->limit(4)->get();
        $categories=Category::orderBy('name','ASC')->get();
        $nproducts=Product::latest()->take(4)->get();
        return view('livewire.category-component',['products'=>$products,'categories'=>$categories,'category_name'=>$category_name,'rproducts'=>$rproducts,'nproducts'=>$nproducts,]);

    }
}
