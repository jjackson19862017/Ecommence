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
                        <th class="wd-15p">Code</th>
                        <th class="wd-15p">Name</th>
                        <th class="wd-15p">Image</th>
                        <th class="wd-15p">Brand</th>
                        <th class="wd-15p">Category / Sub</th>
                        <th class="wd-15p">Quantity</th>
                        <th class="wd-15p">Status</th>

                        <th class="wd-15p">Actions</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($products as $item)
                        <tr>
                            <td>{{$item->id}}</td>
                            <td>{{$item->product_code}}</td>
                            <td>{{$item->product_name}}</td>
                            <td><img src="{{asset($item->image_one)}}" class="mx-auto" style="max-height:50px;max-width:75px;" alt=""></td>
                            <td>{{$item->brand_name}}</td>
                            <td>{{$item->category_name}}<br>{{$item->subcategory_name}}</td>
                            <td>{{$item->product_quantity}}</td>
                            <td>
                                @if($item->status == 1)
                                    <span class="badge badge-success">Active</span>
                                @else
                                    <span class="badge badge-danger">Inactive</span>
                                @endif
                            </td>

                            <td>
                                <a href="{{route('product.edit',$item->id)}}" class="btn btn-sm btn-info" title="Edit"><i class="fa fa-edit"></i></a>
                                <a href="{{route('product.delete',$item->id)}}" id="delete" class="btn btn-sm btn-danger" title="Delete"><i class="fa fa-trash"></i></a>
                                <a href="{{route('product.show',$item->id)}}" class="btn btn-sm btn-warning" title="Show"><i class="fa fa-eye"></i></a>
                                @if($item->status == 1)
                                    <a href="{{route('product.inactive',$item->id)}}"  class="btn btn-sm btn-danger" title="Inactive"><i class="fa fa-thumbs-down"></i></a>
                                @else
                                    <a href="{{route('product.active',$item->id)}}"  class="btn btn-sm btn-info" title="Active"><i class="fa fa-thumbs-up"></i></a>
                                @endif


                            </td>

                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>









@endsection
