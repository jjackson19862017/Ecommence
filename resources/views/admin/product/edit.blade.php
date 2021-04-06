@extends('admin.admin_master')

@section('admin')

    <div class="py-12">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            Edit Product
                        </div>
                        <div class="card-body">
                            <form action="{{route('product.update',$products->id)}}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="form-group">
                                    <label for="product_name">Product Name</label>
                                    <input type="text" class="form-control" id="product_name" name="product_name" value="{{$products->product_name}}">
                                    @error('product_name')
                                    <span class=" text-danger"> {{ $message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="product_image">Product Image</label>
                                    <input type="file" class="form-control-file" id="product_image" name="product_image">
                                    @error('product_image')
                                    <span class="text-danger"> {{ $message}}</span>
                                    @enderror
                                </div>


                                <button type="submit" class="float-right btn btn-primary">Update Product</button>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
