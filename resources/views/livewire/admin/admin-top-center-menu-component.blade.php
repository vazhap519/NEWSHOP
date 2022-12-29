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
                    <span></span>  პროდუქტები
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
                                        პროდუქტები
                                    </div>
                                    <div class="col-md-6">
                                        <a href="{{route('admin.products.add')}}" class="btn btn-primary float-end">პროდუქტის დამატება</a>
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
                                        <td>ნომერი</td>
                                        <td>სურათი</td>
                                        <td>პროდუქტის  სახელი</td>
                                        <td>მარაგები</td>
                                        <td>ფასი</td>
                                        <td>კატეგორია</td>
                                        <td>თარიღი</td>
                                        <td>მოქმედება</td>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php
                                        $i=($products->currentPage()-1)*$products->perPage();
                                    @endphp
                                    @foreach($products as $product)
                                        <tr>
                                            <td>{{++$i}}</td>
                                            <td> <img class="default-img" src="{{asset('/assets/imgs/products')}}/{{$product->image}}" alt="{{$product->name}}" style="width: 120px"></td>
                                            <td>{{$product->name}}</td>
                                            <td>{{$product->stock_status}}</td>
                                            <td>{{$product->regular_price}}</td>
                                            <td>{{$product->category->name}}</td>
                                            <td>{{$product->created_at}}</td>
                                            <td>
                                                <a href="{{route('admin.products.edit',['product_id'=>$product->id])}}" class="text-info">განახლება</a>
                                                <a href="#" class="text-danger" style="margin-left: 20px" onclick="deleteConfirmation('{{$product->id}}')">წაშლა</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                {{$products->links()}}
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
                        <h4 class="pb-3">დარმუნებული ხარ რომ გნებავს წაშალო კატეგორია?</h4>
                        <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#deleteConfirmation">გაუქმება</button>
                        <button class="btn btn-danger" onclick="deleteProduct()">წაშლა</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>





@push('scripts')
    <script>
        function deleteConfirmation(id){
        @this.set ('product_id',id );
            $('#deleteConfirmation').show()
        }

        function deleteProduct(){
        @this.call('deleteProduct');
            $('#deleteConfirmation').hide();
        }
    </script>
@endpush
