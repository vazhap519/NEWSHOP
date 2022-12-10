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
                    <span></span> სლაიდების  დამატება
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
                                    <div class="col-md-6">ახალი სლაიდის დამატება</div>
                                    <div class="col-md-6">
                                        <a href="{{route('admin.home.slider')}}" class="btn btn-success float-end">ყველა სლაიდი</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                @if(Session::has('message'))
                                    <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
                                @endif
                                <form wire:submit.prevent="AddSlide()">
                                    <div class="mb-3 mt-3">
                                        <label for="top_title" class="form-control">ზედა_აღწერა</label>
                                        <input type="text" name="top_title" placeholder="ჩაწერე სლაიდის ზედა_აღწერა " wire:model="top_title">
                                        @error('top_title')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>

                                    <div class="mb-3 mt-3">
                                        <label for="title" class="form-control">აღწერა</label>
                                        <input type="text" name="title" placeholder="ჩაწერე სლაიდის  აღწერა" wire:model="title">
                                        @error('title')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3 mt-3">
                                        <label for="sub_title" class="form-control">ქვედა_აღწერა</label>
                                        <input type="text" name="sub_title" placeholder="ჩაწერე სლაიდის ქვედა_აღწერა" wire:model="sub_title">
                                        @error('sub_title')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3 mt-3">
                                        <label for="offer" class="form-control">შეთავაზება</label>
                                        <input type="text" name="offer" placeholder="ჩაწერე სლაიდის შეთავაზება" wire:model="offer">
                                        @error('offer')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3 mt-3">
                                        <label for="link" class="form-control">პროდუქტის ბმული </label>
                                        <input type="text" name="link" placeholder="ჩაწერე სლაიდის ბმული" wire:model="link">
                                        @error('link')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>


                                    <div class="mb-3 mt-3">
                                        <label for="status" class="form-control">სლაიდის სურათი </label>
                                        <input type="file" name="image" wire:model="image">
                                        @if($newImage)
                                            <img src="{{$newImage->temporaryUrl()}}" width="100px">
                                        @else
                                            <img src="{{asset('assets/imgs/slider')}}/{{$image}}" width="100">
                                        @endif
                                        @error('image')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3 mt-3">
                                        <label for="status" class="form-control">სლაიდის სტატუსი </label>
                                        <select name="status" wire:model="status">
                                            <option value="1">აქტიური</option>
                                            <option value="0">არააქტიური</option>
                                        </select>
                                        @error('status')
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
