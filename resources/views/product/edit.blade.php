@extends('master')
@section('title', 'Edit Product')

@section('body')
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-8 mx-auto">
                    <div class="card ">
                        <div class="card-header">Add Product</div>
                        <div class="card-body">
                            <p class="text-success mx-auto">{{session('message')}}</p>
                            <form action="{{route('product.update', ['id' => $product->id])}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row mb-4">
                                    <label for="" class="col-md-3">Product Name</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="name" value="{{$product->name}}">
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="" class="col-md-3">Product Price</label>
                                    <div class="col-md-9">
                                        <input type="number" class="form-control" name="price" value="{{$product->price}}">
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="" class="col-md-3">Product Description</label>
                                    <div class="col-md-9">
                                        <textarea name="description" class="form-control">{{$product->description}}"</textarea>
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <label for="" class="col-md-3">Product Image</label>
                                    <div class="col-md-9">
                                        <input type="file" class="form-control" name="image">
                                        <img src="{{asset($product->image)}}" alt="" width="100px" height="100px">
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="" class="col-md-3"></label>
                                    <div class="col-md-9">
                                        <input type="submit" class="btn btn-success" value="Update Product">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

