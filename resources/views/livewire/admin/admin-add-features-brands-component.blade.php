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
                    <span></span>
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
                                    <div class="col-md-6">ახალი ბრენდის დამატება</div>
                                    <div class="col-md-6">
                                        <a href="{{route('admin.brends')}}" class="btn btn-success float-end">ყველა ბრენდი</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                @if(Session::has('message'))
                                    <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
                                @endif
                                <form wire:submit.prevent="AddFeaturedBrands">
                                    <div class="mb-3 mt-3">
                                        <label for="brand_image" class="form-control">ბრენდის სურათი </label>
                                        <input type="file" name="brand_image" wire:model="brand_image">
                                        @if($brand_image)
                                            <img src="{{$brand_image->temporaryUrl()}}" width="100px">
                                        @endif
                                        @error('brand_image')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>

                                    <div class="mb-3 mt-3">
                                        <label for="brand_meta_name" class="form-control">ბრენდის მეტა სახელი </label>
                                        <input type="text" name="brand_meta_name" wire:model="brand_meta_name">

                                        @error('brand_meta_name')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3 mt-3">
                                        <label for="brand_meta_description" class="form-control">ბრენდის მეტა აღწერა </label>
                                        <textarea type="text" name="brand_meta_description" wire:model="brand_meta_description"></textarea>

                                        @error('brand_meta_description')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3 mt-3">
                                        <label for="brand_meta_keywoards" class="form-control">ბრენდის მეტა სიტყვები </label>
                                        <input type="text" name="brand_meta_keywoards" wire:model="brand_meta_keywoards">

                                        @error('brand_meta_keywoards')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3 mt-3">
                                        <label for="brands_status" class="form-control">ბრენდის სტატუსი </label>
                                        <select type="text" name="brands_status" wire:model="brands_status">
                                            <option value="1">არის</option>
                                            <option value="0">არ არის</option>
                                        </select>

                                        @error('brands_status')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <button type="submit" class="btn btn-primary float-end">ბრენდების დამატება</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>
