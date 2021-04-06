@extends('admin.admin_master')

@section('admin')

    <div class="py-12">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            Edit Sub-Category
                        </div>
                        <div class="card-body">
                            <form action="{{route('subcategory.update',$subcat->id)}}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="subcategory_name">Update Sub-Category Name</label>
                                    <input type="text" class="form-control" id="subcategory_name"
                                           name="subcategory_name" value="{{$subcat->subcategory_name}}">
                                    @error('subcategory_name')
                                    <span class="text-danger"> {{ $message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="category_id">Category Name</label>
                                    <select class="form-control" name="category_id" id="category_id">

                                        @foreach($category as $item)


                                            <option value="{{$item->id}}" @if($item->id == $subcat->category_id)
                                                selected
                                                @endif>{{$item->category_name}}</option>

                                        @endforeach
                                    </select>
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
