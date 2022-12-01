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
                    <span></span> კატეგორიები
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
                                        კატეგორიები
                                    </div>
                                    <div class="col-md-6">
                                        <a href="{{route('admin.add.category')}}" class="btn btn-primary float-end">შექმენი ახალი კატეგორია</a>
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
                                        <td>კატეგორიის სახელი</td>
                                        <td>სლაგი</td>
                                        <td>მოქმედება</td>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php
                                    $i=($categories->currentPage()-1)*$categories->perPage();
                                        @endphp
                                    @foreach($categories as $category)
                                        <tr>
                                            <td>{{++$i}}</td>
                                            <td>{{$category->name}}</td>
                                            <td>{{$category->slug}}</td>
                                            <td>
                                                <a href="{{route('admin.category.edit',['category_id'=>$category->id])}}" class="text-info">განახლება</a>
                                                <a href="#" class="text-danger" style="margin-left: 20px" onclick="deleteConfirmation('{{$category->id}}')">წაშლა</a>
                                            </td>

                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                {{$categories->links()}}
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
                        <button class="btn btn-danger" onclick="deleteCategory()">წაშლა</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>





@push('scripts')
    <script>
        function deleteConfirmation(id){
        @this.set ( 'category_id' , id );
        $('#deleteConfirmation').show();
        }

        function deleteCategory(){
@this.call('deleteCategory');
            $('#deleteConfirmation').hide();
        }
    </script>
@endpush
