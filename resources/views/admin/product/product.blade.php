@extends('admin.admin_master')

@section('admin')

    <div class="sl-pagebody">
        <div class="sl-page-title">
            <h5>Product Table</h5>

        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">
            <h6 class="card-body-title">Product List <a class="btn btn-sm btn-warning float-right" href="{{route('product.add')}}">Add New</a></h6>

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
                            <td><img src="{{asset($item->image_one)}}" class="mx-auto" style="max-height:50px;max-width:75px;" alt=""></td>
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









@endsection
