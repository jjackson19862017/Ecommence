@extends('admin.admin_master')

@section('admin')

    <div class="py-12">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            Edit Category
                        </div>
                        <div class="card-body">
                            <form action="{{route('category.update',$categories->id)}}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="category_name">Update Category Name</label>
                                    <input type="text" class="form-control" id="category_name" name="category_name" value="{{$categories->category_name}}">
                                    @error('category_name')
                                    <span class="text-danger"> {{ $message}}</span>
                                    @enderror
                                </div>

                                <button type="submit" class="float-right btn btn-primary">Update Category</button>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
