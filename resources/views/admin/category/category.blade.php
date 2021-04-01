@extends('admin.admin_master')

@section('admin')

    <div class="sl-pagebody">
        <div class="sl-page-title">
            <h5>Category Table</h5>

        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">
            <h6 class="card-body-title">Category List <a href="" class="btn btn-sm btn-warning float-right">Add New</a></h6>

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
                            <td>Tiger{{$item->id}}</td>
                            <td>Woods{{$item->name}}</td>
                            <td>
                                <a href="" class="btn btn-sm btn-info">Edit</a>
                                <a href=""id="delete" class="btn btn-sm btn-danger">Delete</a>
                            </td>

                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>








@endsection
