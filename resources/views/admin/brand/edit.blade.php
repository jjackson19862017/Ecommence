@extends('admin.admin_master')

@section('admin')

    <div class="py-12">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            Edit Brand
                        </div>
                        <div class="card-body">
                            <form action="{{route('brand.update',$brands->id)}}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="form-group">
                                    <label for="brand_name">Brand Name</label>
                                    <input type="text" class="form-control" id="brand_name" name="brand_name" value="{{$brands->brand_name}}">
                                    @error('brand_name')
                                    <span class=" text-danger"> {{ $message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="brand_image">Brand Image</label>
                                    <input type="file" class="form-control-file" id="brand_image" name="brand_image">
                                    @error('brand_image')
                                    <span class="text-danger"> {{ $message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">Old Brand Image</label>
                                    <img src="{{asset($brands->brand_image)}}" class="mx-auto" style="max-height:200px;max-width:400px;" alt="">
                                    <input type="hidden" name="old_image" value="{{($brands->brand_image)}}">
                                </div>

                                <button type="submit" class="float-right btn btn-primary">Update Brand</button>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
