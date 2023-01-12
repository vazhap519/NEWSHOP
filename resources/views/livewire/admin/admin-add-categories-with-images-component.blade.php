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
                    <span></span> სურათიანი კატეგორია
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
                                    <div class="col-md-6">ახალი სურათიანი კატეგორიის დამატება</div>
                                    <div class="col-md-6">
                                        <a href="{{route('admin.categories.with.images')}}" class="btn btn-success float-end">ყველა სურათიანი კატეგორია</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                @if(Session::has('message'))
                                    <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
                                @endif
                                <form wire:submit.prevent="AddCategoryWithImage()">
                                    <div class="mb-3 mt-3">
                                        <label for="name" class="form-control">სახელი</label>
                                        <input type="text" name="name" placeholder="სახელი" wire:model="name">
                                        @error('name')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3 mt-3">
                                        <label for="slug" class="form-control">სლაგი</label>
                                        <input type="text" name="slug" placeholder="სლაგი" wire:model="slug">
                                        @error('slug')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>




                                    <div class="mb-3 mt-3">
                                        <label for="image" class="form-control">სლაიდის სურათი </label>
                                 <input type="file" name="image" wire:model="image">
@if($image)
    <img src="{{$image->temporaryUrl()}}" width="100px">
                                        @endif
                                        @error('image')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>

                                    <button type="submit" class="btn btn-primary float-end">სლაიდის  შექმნა</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>
