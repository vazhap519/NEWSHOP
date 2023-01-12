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
                    <span></span> სლაიდები
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
                                    <div class="col-md-6">
                                        სლაიდები
                                    </div>
                                    <div class="col-md-6">
                                        <a href="{{route('admin.brads.add')}}" class="btn btn-primary float-end">შექმენი ახალი ბრენდი</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                @if(Session::has('message'))
                                    <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
                                @endif
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <td>#</td>
                                        <td> ბრენდის მეტა სახელი</td>
                                        <td> ბრენდის მეტა აღწერა</td>
                                        <td> ბრენდის მეტა სიტყვები</td>
                                        <td> ბრენდის სტატუსი</td>
                                        <td> ბრენდის სურათი</td>

                                     <td>მოქმედება</td>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php
                                        $i=0;
                                    @endphp
                                    @foreach($featuredBrands as $Brands)
                                        <tr>
                                            <td>{{++$i}}</td>
                                            <td>{{$featuredBrands->brand_meta_name}}</td>
                                            <td>{{$featuredBrands->brand_meta_description}}</td>
                                            <td>{{$featuredBrands->brand_meta_keywoards}}</td>
                                            <td><img src="{{asset('assets/imgs/FeaturedBrands')}}/{{$featuredBrands->brand_image}}" width="100"></td>
                                            <td>{{$featuredBrands->status==1 ? 'Active':'Inactive'}}</td>
                                            <td>
{{--                                                <a href="{{route('admin.home.slider.edit',['slide_id'=>$slide->id])}}" class="text-info">განახლება</a>--}}
{{--                                                <a href="#" class="text-danger" style="margin-left: 20px" onclick="deleteConfirmation('{{$slide->id}}')">წაშლა</a>--}}
                                            </td>

                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>

<div class="modal" id="deleteConfirmation">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body pb-30 pt-30">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h4 class="pb-3">დარმუნებული ხარ რომ გნებავს წაშალო სლაიდი?</h4>
                        <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#deleteConfirmation">გაუქმება</button>
                        <button class="btn btn-danger" onclick="deleteSlide()">წაშლა</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>





@push('scripts')
    <script>
        function deleteConfirmation(id){
        @this.set ( 'slide_id' , id );
            $('#deleteConfirmation').show();
        }

        function deleteSlide(){
        @this.call('deleteSlide');
            $('#deleteConfirmation').hide();
        }
    </script>
@endpush
