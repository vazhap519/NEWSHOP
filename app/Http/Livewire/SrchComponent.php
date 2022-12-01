<?php

namespace App\Http\Livewire;
use App\Models\Category;
use App\Models\Product;
use http\Env\Request;
use Livewire\Component;
use Livewire\WithPagination;
use Cart;

class  SrchComponent extends Component
{
    use WithPagination;
    public $pageSize=12;
    public $OrderBy="DefaultSort";
    public $q;
    public $search_term;
    public $min_value=0;
    public $max_value=5000;
    public function removeToWish($product_id){
        foreach (Cart::instance('wishlist')->content() as $witem)
        {
            if ($witem->id===$product_id){
                Cart::instance('wishlist')->remove($witem->rowId);
                $this->emitTo('wishlist-icon-component','refreshComponent');
                return;
            }
        }
    }
    public function store($product_id,$product_name,$product_price){
        Cart::instance('cart')->add($product_id,$product_name,1,$product_price)->associate('\App\Models\Product');
        $this->emitTo('cart-icon-component','refreshComponent');
        session()->flash('succsess_message','Item added In Cart');
        return redirect()->route('shop.cart');
    }
    public function changePageSize($size){
        $this->pageSize=$size;
    }

    public function ChangeOrderBy($order){
        $this->OrderBy=$order;
    }
public function mount(){
    $this->fill(request()->only('q'));
    $this->search_term='%'.$this->q . '%';
}
    public function render()
    {

        if($this->OrderBy=='Price: Low to High'){
            $products=Product::whereBetween('regular_price',[$this->min_value,$this->max_value])->where('name','LIKE',$this->search_term)->OrderBy('regular_price','ASC')->paginate($this->pageSize);
        }elseif ($this->OrderBy=='Price: High to Low'){
            $products=Product::whereBetween('regular_price',[$this->min_value,$this->max_value])->where('name','LIKE',$this->search_term)->OrderBy('regular_price','DESC')->paginate($this->pageSize);
        }elseif ($this->OrderBy=='Sort by Newness'){
            $products=Product::whereBetween('regular_price',[$this->min_value,$this->max_value])->where('name','LIKE',$this->search_term)->OrderBy('created_at','DESC')->paginate($this->pageSize);
        }else{
            $products=Product::whereBetween('regular_price',[$this->min_value,$this->max_value])->where('name','LIKE',$this->search_term)->paginate($this->pageSize);
        }
        $categories=Category::orderBy('name','ASC')->get();
        return view('livewire.shop-component',['products'=>$products,'categories'=>$categories]);
    }
}
