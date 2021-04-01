@extends('admin.admin_master')

@section('admin')

    <div class="sl-pagebody">
        <div class="sl-page-title">
            <h5>Category Table</h5>

        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">
            <h6 class="card-body-title">Category List <a class="btn btn-sm btn-warning float-right" data-toggle="modal" data-target="#addCategory">Add New</a></h6>

            <div class="table-wrapper">
                <table id="datatable1" class="table display responsive nowrap">
                    <thead>
                    <tr>
                        <th class="wd-15p">ID</th>
                        <th class="wd-15p">Name</th>
                        <th class="wd-15p">Actions</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($category as $item)
                        <tr>
                            <td>{{$item->id}}</td>
                            <td>{{$item->category_name}}</td>
                            <td>
                                <a href="{{route('category.edit',$item->id)}}" class="btn btn-sm btn-info">Edit</a>
                                <a href="{{route('category.delete',$item->id)}}" id="delete" class="btn btn-sm btn-danger">Delete</a>
                            </td>

                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <div id="addCategory" class="modal fade">
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
                <form action="{{route('category.store')}}" method="post">
                    @csrf
                <div class="modal-body pd-20">
                    <div class="form-group">
                        <label for="category_name">Category Name</label>
                        <input type="text" class="form-control" name="category_name" id="add" aria-describedby="helpId"
                               placeholder="Category Name">
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
