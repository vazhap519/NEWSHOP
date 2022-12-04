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
                                    <div class="col-md-6">ახალი სლაიდის  დამატება</div>
                                    <div class="col-md-6">
                                        <a href="{{route('admin.home.slider')}}" class="btn btn-success float-end">ყველა სლაიდი</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                @if(Session::has('message'))
                                    <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
                                @endif
                                <form wire:submit.prevent="addSlide">
                                    <div class="mb-3 mt-3">
                                        <label class="form-control">ზედა-აღწერა</label>
                                        <input type="text"  placeholder="ჩაწერე სლაიდერის ზედა აღწერა" wire:model="top_title" >
                                        @error('top_title')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>

                                    <div class="mb-3 mt-3">
                                        <label class="form-control">აღწერა</label>
                                        <input type="text"  placeholder="ჩაწერე სლაიდერის აღწერა" wire:model="title" >
                                        @error('title')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>

                                    <div class="mb-3 mt-3">
                                        <label class="form-control">ქვედა-აღწერა</label>
                                        <input type="text"  placeholder="ჩაწერე სლაიდერის ქვედა აღწერა" wire:model="sub_title" >
                                        @error('sub_title')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>

                                    <div class="mb-3 mt-3">
                                        <label class="form-control">შეთავაზება</label>
                                        <input type="text"  placeholder="ჩაწერე სლაიდერის  შეთავაზება" wire:model="offer" >
                                        @error('offer')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>

                                    <div class="mb-3 mt-3">
                                        <label class="form-control">პროდუქტის ბმული</label>
                                        <input type="text"  placeholder="ჩაწერე პროდუქტის ბმული აღწერა" wire:model="link" >
                                        @error('link')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3 mt-3">
                                        <label class="form-control">სურათი</label>
                                        <input type="file"  wire:model="image">
                                        @if($image)
                                            <img src="{{$image->temporaryUrl()}}">
                                        @endif
                                        @error('image')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3 mt-3">
                                        <label class="form-control">სტატუსი</label>
                                      <select wire:model="status">
                                          <option value="0">არაქტიური</option>
                                          <option value="1">აქტიური</option>
                                      </select>
                                        @error('status')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>

                                    <button type="submit" class="btn btn-primary float-end">სლაიდის დამატება</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>
