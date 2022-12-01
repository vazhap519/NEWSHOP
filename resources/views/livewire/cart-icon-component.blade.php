<div>
    <div class="header-action-icon-2">
        <a class="mini-cart-icon" href="{{route('shop.cart')}}">
            <img alt="Surfside Media" src="{{asset('assets/imgs/theme/icons/icon-cart.svg')}}">
            @if(Cart::instance('cart')->count() >0)
            <span class="pro-count blue">{{Cart::count()}}</span>
        </a>

        <div class="cart-dropdown-wrap cart-dropdown-hm2">

            <ul>

                @foreach(Cart::instance('cart')->content() as $cartIconProducts)
                <li>
                    <div class="shopping-cart-img">
{{--                        <a href="{{route('product.details',['slug'=>$cartIconProducts->slug])}}">--}}
                            <img alt="" src="{{asset('/assets/imgs/products')}}/{{$cartIconProducts->model->image}}">სურათი</a>
                    </div>
                    <div class="shopping-cart-title">
                        <h4><a href="{{route('product.details',['slug'=>$cartIconProducts->model->slug])}}">{{substr($cartIconProducts->model->name,0,20)}}</a></h4>
                        <h4><span>{{$cartIconProducts->qty}}</span>X{{$cartIconProducts->model->regular_price}}</h4>
                    </div>
                    <div class="shopping-cart-delete">
                        <a href="#"><i class="fi-rs-cross-small"></i></a>
                    </div>
                </li>
                @endforeach
            </ul>@endif
            <div class="shopping-cart-footer">
                <div class="shopping-cart-total">
                    <h4>Total <span>${{Cart::instance('cart')->total()}}</span></h4>
                </div>
                <div class="shopping-cart-button">
                    <a href="{{route('shop.cart')}}" class="outline">View cart</a>
                    <a href="checkout.html">Checkout</a>
                </div>
            </div>
        </div>
    </div>
</div>
