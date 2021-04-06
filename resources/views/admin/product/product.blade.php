@extends('admin.admin_master')

@section('admin')

    <div class="sl-pagebody">
        <div class="sl-page-title">
            <h5>Product Table</h5>

        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">
            <h6 class="card-body-title">Product List <a class="btn btn-sm btn-warning float-right" data-toggle="modal" data-target="#addProduct">Add New</a></h6>

            <div class="table-wrapper">
                <table id="datatable1" class="table display responsive nowrap">
                    <thead>
                    <tr>
                        <th class="wd-15p">ID</th>
                        <th class="wd-15p">Name</th>
                        <th class="wd-15p">Image</th>
                        <th class="wd-15p">Actions</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($products as $item)
                        <tr>
                            <td>{{$item->id}}</td>
                            <td>{{$item->product_name}}</td>
                            <td><img src="{{asset($item->product_image)}}" class="mx-auto" style="max-height:50px;max-width:75px;" alt=""></td>
                            <td>
                                <a href="{{route('product.edit',$item->id)}}" class="btn btn-sm btn-info">Edit</a>
                                <a href="{{route('product.delete',$item->id)}}" id="delete" class="btn btn-sm btn-danger">Delete</a>
                            </td>

                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <div id="addProduct" class="modal fade">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content tx-size-sm">
                <div class="modal-header pd-x-20">
                    <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Add Category</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <p class="ml-0">{{$error}}</p>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="modal-body pd-20">
                        <div class="form-group">
                            <label for="product_name">Product Name</label>
                            <input type="text" class="form-control" id="product_name" name="product_name" aria-describedby="emailHelp">
                            @error('product_name')
                            <span class="text-danger"> {{ $message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="product_image">Product Image</label>
                            <input type="file" class="form-control-file" id="product_image" name="product_image" aria-describedby="emailHelp">
                            @error('product_image')
                            <span class="text-danger"> {{ $message}}</span>
                            @enderror
                        </div>

                    </div><!-- modal-body -->
                <div class="modal-footer">
                    <button type="submit" class="btn btn-info pd-x-20">Add</button>
                    <button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal">Cancel</button>
                </div>
                </form>
            </div>
        </div><!-- modal-dialog -->
    </div><!-- modal -->






@endsection
