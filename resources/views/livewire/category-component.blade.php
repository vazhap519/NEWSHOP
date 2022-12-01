<div>
    <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="{{route('home.index')}}" rel="nofollow">Home</a>
                    <span></span> Shop
                </div>
            </div>
        </div>
        <section class="mt-50 mb-50">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9">
                        <div class="shop-product-fillter">
                            <div class="totall-product">
                                <p> We found <strong class="text-brand">{{$products->total()}}</strong> items for you! <strong class="text-brand">{{$category_name}}</strong></p>
                            </div>
                            <div class="sort-by-product-area">
                                <div class="sort-by-cover mr-10">
                                    <div class="sort-by-product-wrap">
                                        <div class="sort-by">
                                            <span><i class="fi-rs-apps"></i>Show:</span>
                                        </div>
                                        <div class="sort-by-dropdown-wrap">
                                            <span> {{$pageSize}} <i class="fi-rs-angle-small-down"></i></span>
                                        </div>
                                    </div>
                                    <div class="sort-by-dropdown">
                                        <ul>
                                            <li><a class="{{$pageSize==12 ? 'active': ''}}" href="#"  wire:click.prevent="changePageSize(12)">12</a></li>
                                            <li><a class="{{$pageSize==15 ? 'active': ''}}" href="#" wire:click.prevent="changePageSize(15)">15</a></li>
                                            <li><a class="{{$pageSize==25 ? 'active': ''}}" href="#" wire:click.prevent="changePageSize(25)">25</a></li>
                                            <li><a class="{{$pageSize==50 ? 'active': ''}}" href="#" wire:click.prevent="changePageSize(50)">50</a></li>

                                        </ul>
                                    </div>
                                </div>
                                <div class="sort-by-cover">
                                    <div class="sort-by-product-wrap">
                                        <div class="sort-by">
                                            <span><i class="fi-rs-apps-sort"></i>სორტირება:</span>
                                        </div>
                                        <div class="sort-by-dropdown-wrap">
                                            <span> პროდუქტის ფილტრი <i class="fi-rs-angle-small-down"></i></span>
                                        </div>
                                    </div>
                                    <div class="sort-by-dropdown">
                                        <ul>
                                            <li><a href="#" class="{{$OrderBy=='DefaultSort' ? 'active': ''}}" wire:click.prevent="ChangeOrderBy('DefaultSort')">ძირითადი</a></li>
                                            <li><a href="#" class="{{$OrderBy=='Price: Low to High' ? 'active': ''}}" wire:click.prevent="ChangeOrderBy('Price: Low to High')">ფასი: დაბლიდან მაღლა</a></li>
                                            <li><a href="#" class="{{$OrderBy=='Price: High to Low' ? 'active': ''}}"  wire:click.prevent="ChangeOrderBy('Price: High to Low')">მასი:მაღლიდან დაბლა</a></li>
                                            <li><a href="#" class="{{$OrderBy=='Sort by Newness' ? 'active': ''}}" wire:click.prevent="ChangeOrderBy('Sort by Newness')">ახალი პროდუქტები</a></li>

                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="row product-grid-3">
                            @foreach($products as $product)
                                <div class="col-lg-4 col-md-4 col-6 col-sm-6">
                                    <div class="product-cart-wrap mb-30">
                                        <div class="product-img-action-wrap">
                                            <div class="product-img product-img-zoom">
                                                <a href="{{route('product.details',['slug'=>$product->slug])}}">
                                                    <img class="default-img"   src="{{asset('/assets/imgs/products')}}/{{$product->image}}" alt="{{$product->name}}">
                                                    <img class="hover-img"   src="{{asset('/assets/imgs/products')}}/{{$product->image}}" alt="{{$product->name}}">

                                                </a>
                                            </div>
                                            <div class="product-action-1">
                                                <a aria-label="Quick view" class="action-btn hover-up" data-bs-toggle="modal" data-bs-target="#quickViewModal">
                                                    <i class="fi-rs-search"></i></a>
                                                <a aria-label="Add To Wishlist" class="action-btn hover-up" href="wishlist.php"><i class="fi-rs-heart"></i></a>
                                                <a aria-label="Compare" class="action-btn hover-up" href="compare.php"><i class="fi-rs-shuffle"></i></a>
                                            </div>
                                            <div class="product-badges product-badges-position product-badges-mrg">
                                                <span class="hot">Hot</span>
                                            </div>
                                        </div>
                                        <div class="product-content-wrap">
                                            <div class="product-category">
                                                <a href="shop.html">Music</a>
                                            </div>
                                            <h2><a href="">{{$product->name}}</a></h2>
                                            <div class="rating-result" title="90%">
                                            <span>
                                                <span>90%</span>
                                            </span>
                                            </div>
                                            <div class="product-price">
                                                <span>{{$product->regular_price}}</span>
                                            </div>
                                            <div class="product-action-1 show">
                                                <a aria-label="Add To Cart" class="action-btn hover-up" href="#" wire:click.prevent="store({{$product->id}},'{{$product->name}}',{{$product->regular_price}})"><i class="fi-rs-shopping-bag-add"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <!--pagination-->
                        <div class="pagination-area mt-15 mb-sm-5 mb-lg-0">
                            {{$products->links()}}

                        </div>
                    </div>
                    <div class="col-lg-3 primary-sidebar sticky-sidebar">
                        <div class="row">
                            <div class="col-lg-12 col-mg-6"></div>
                            <div class="col-lg-12 col-mg-6"></div>
                        </div>
                        <div class="widget-category mb-30">
                            <h5 class="section-title style-1 mb-30 wow fadeIn animated">კატეგორიები</h5>
                            <ul class="categories">
                                @foreach($categories  as $category)
                                    <li><a href="{{route('product.category',['slug'=>$category->slug])}}">{{$category->name}}</a></li>
                                @endforeach

                            </ul>
                        </div>
                        <!-- Fillter By Price -->
                        <div class="sidebar-widget price_range range mb-30">
                            <div class="widget-header position-relative mb-20 pb-10">
                                <h5 class="widget-title mb-10">გაფილტრე ფასით</h5>
                                <div class="bt-1 border-color-1"></div>
                            </div>
                            <div class="price-filter">
                                <div class="price-filter-inner">
                                    <div id="slider-range" wire:ignore></div>
                                    <div class="price_slider_amount">
                                        <div class="label-input">
                                            <span>ფასის რეინჯი:</span>
                                            <span class="text-info">{{$min_value}}</span>
                                            -
                                            <span class="text-info">{{$max_value}}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="list-group">
                                <div class="list-group-item mb-10 mt-10">
                                    <label class="fw-900">Color</label>
                                    <div class="custome-checkbox">
                                        <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox1" value="">
                                        <label class="form-check-label" for="exampleCheckbox1"><span>Red (56)</span></label>
                                        <br>
                                        <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox2" value="">
                                        <label class="form-check-label" for="exampleCheckbox2"><span>Green (78)</span></label>
                                        <br>
                                        <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox3" value="">
                                        <label class="form-check-label" for="exampleCheckbox3"><span>Blue (54)</span></label>
                                    </div>
                                    <label class="fw-900 mt-15">Item Condition</label>
                                    <div class="custome-checkbox">
                                        <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox11" value="">
                                        <label class="form-check-label" for="exampleCheckbox11"><span>New (1506)</span></label>
                                        <br>
                                        <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox21" value="">
                                        <label class="form-check-label" for="exampleCheckbox21"><span>Refurbished (27)</span></label>
                                        <br>
                                        <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox31" value="">
                                        <label class="form-check-label" for="exampleCheckbox31"><span>Used (45)</span></label>
                                    </div>
                                </div>
                            </div>
                            <a href="shop.html" class="btn btn-sm btn-default"><i class="fi-rs-filter mr-5"></i> Fillter</a>
                        </div>

                        <!-- Product sidebar Widget -->
                        <div class="sidebar-widget product-sidebar  mb-30 p-30 bg-grey border-radius-10">
                            <div class="widget-header position-relative mb-20 pb-10">
                                <h5 class="widget-title mb-10">ახალი პროდუქტები</h5>
                                <div class="bt-1 border-color-1"></div>
                                @foreach($nproducts as $nproduct)
                                    <div class="single-post clearfix">
                                        <div class="image">
                                            <img src="{{asset('/assets/imgs/products')}}/{{$product->image}}"  alt="{{$nproduct->name}}">

                                        </div>
                                        <div class="content pt-10">
                                            <h5><a href="{{route('product.details',['slug'=>$nproduct->slug])}}">{{$nproduct->name}}</a></h5>
                                            <p class="price mb-0 mt-5">{{$nproduct->regular_price}}</p>
                                            <div class="product-rate">
                                                <div class="product-rating" style="width:90%"></div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>


                        </div>





                    </div>
                </div>
            </div>
        </section>
    </main>
</div>
@push('scripts')
    <script>
        var sliderrange = $('#slider-range');
        var amountprice = $('#amount');
        $(function() {
            sliderrange.slider({
                range: true,
                min: 0,
                max: 1000,
                values: [0, 1000],
                slide: function(event, ui) {
                    // amountprice.val("$" + ui.values[0] + " - $" + ui.values[1]);
                @this.set('min_value',ui.values[0]);
                @this.set('max_value',ui.values[1]);

                }
            });

        });
    </script>

@endpush
