<div>
    <style>
        nav svg{
            height: 20px;
        }
        nav .hidden{
            display: block;
        }
    </style>
    <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="/" rel="nofollow">მთავარი</a>
                    <span></span> პროდუქტის  განახლება
                </div>
            </div>
        </div>
        <section class="mt-50 mb-50">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-md-6">პროდუქტეის განახლება</div>
                                    <div class="col-md-6">
                                        <a href="{{route('admin.products')}}" class="btn btn-success float-end">ყველა პროდუქტი</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                @if(Session::has('message'))
                                    <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
                                @endif
                                <form wire:submit.prevent="updateProduct" enctype="multipart/form-data">
                                    <div class="mb-3 mt-3">
                                        <label for="name" class="form-control">სახელი</label>
                                        <input type="text" name="name" placeholder="ჩაწერე განახლებული პროდუქტის სახელი" wire:model="name" wire:keyup="generateSlug" value="">
                                        @error('name')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>

                                    <div class="mb-3 mt-3">
                                        <label for="slug" class="form-control">სლაგი</label>
                                        <input type="text" name="slug" placeholder="ჩაწერე პროდუქტის სლაგი" wire:model="slug" >
                                        @error('slug')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>

                                    <div class="mb-3 mt-3">
                                        <label for="short_description" class="form-control">მოკლე აღწერა</label>
                                        <textarea name="short_description" class="form-control" placeholder="პროდუქტის მოკლე აღწერა" wire:model="short_description" ></textarea>
                                        @error('short_description')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>

                                    <div class="mb-3 mt-3">
                                        <label for="description" class="form-control">აღწერა</label>
                                        <textarea name="description" class="form-control" placeholder="პროდუქტის  აღწერა" wire:model="description"></textarea>
                                        @error('description')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>

                                    <div class="mb-3 mt-3">
                                        <label for="regular_price" class="form-control">ფასი</label>
                                        <input type="text" name="regular_price" placeholder="ჩაწერე პროდუქტის ფასი" wire:model="regular_price">
                                        @error('regular_price')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>

                                    <div class="mb-3 mt-3">
                                        <label for="sale_price" class="form-control">ფასდაკლება</label>
                                        <input type="text" name="sale_price" placeholder="ჩაწერე პროდუქტის დაკლებული ფასი" wire:model="sale_price">
                                        @error('sale_price')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>

                                    <div class="mb-3 mt-3">
                                        <label for="SKU" class="form-control">SKU</label>
                                        <input type="text" name="SKU" placeholder="ჩაწერე პროდუქტის დაკლებული SKU" wire:model="SKU">
                                        @error('SKU')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>

                                    <div class="mb-3 mt-3">
                                        <label for="sale_price" class="form-control">მარაგი</label>
                                        <select class="form-control" name="stock_status" wire:model="stock_status">
                                            <option value="instock">მარაგშია</option>
                                            <option value="outofstock">არ არის მარაგში</option>
                                        </select>
                                        @error('SKU')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>

                                    <div class="mb-3 mt-3">
                                        <label for="featured" class="form-control">სამომავლო</label>
                                        <select class="form-control" name="featured" wire:model="featured">
                                            <option value="0">არა</option>
                                            <option value="1">კი</option>
                                        </select>
                                        @error('featured')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>

                                    <div class="mb-3 mt-3">
                                        <label for="quantity" class="form-control">პროდუქტის რაოდენობა</label>
                                        <input type="text" name="quantity" placeholder="პროდუქტის რაოდენობა" wire:model="quantity">
                                        @error('quantity')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>

                                    <div class="mb-3 mt-3">

                                        <label for="image" class="form-control">პროდუქტის სურათი</label>
                                        <input type="file" class="form-control" name="image" wire:model="newImage">
                                        @if($newImage)
                                            <img src="{{$image->temporaryUrl()}}" width="200px">
                                        @else
                                            <img src="{{asset('assets/imgs/products')}}/{{$image}}">
                                        @endif
                                        @error('image')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3 mt-3">
                                        <label for="image" class="form-control">პროდუქტის გალერეა</label>
                                        <input type="file" class="form-control" name="images" wire:model="images" multiple>
                                        @if($newImage)
                                            @foreach($images as $gallery)
                                                <img src="{{$gallery->temporaryUrl()}}" style="width: 120px">
                                            @endforeach
                                        @endif
                                        @error('images')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3 mt-3">
                                        <label for="category_id" class="form-control">პროდუქტის კატეგორია</label>
                                        <select class="form-control" name="category_id" wire:model="category_id">
                                            <option value="">აირჩიე კატეგორია</option>
                                            @foreach($categories as $category)
                                                <option value="{{$category->id}}">{{$category->name}}</option>
                                            @endforeach

                                        </select>
                                        @error('category_id')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>

                                    <button type="submit" class="btn btn-primary float-end">პროდუქტის განახლება</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>
