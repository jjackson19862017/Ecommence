@extends('admin.admin_master')

@section('admin')

    <div class="sl-pagebody">
        <div class="sl-page-title">
            <h5>Subscriber Table</h5>

        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">
            <h6 class="card-body-title">Subscriber List <a class="btn btn-sm btn-warning float-right"
                                                             data-toggle="modal" data-target="#addNewsletter">Delete All</a></h6>

            <div class="table-wrapper">
                <table id="datatable1" class="table display responsive nowrap">
                    <thead>
                    <tr>
                        <th class="wd-5p">ID</th>
                        <th class="wd-25p">Email</th>
                        <th class="wd-15p">Signed up</th>
                        <th class="wd-5p">Actions</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($newsletter as $item)
                        <tr>
                            <td><input type="checkbox"> {{$item->id}}</td>
                            <td>{{$item->email}}</td>
                            <td>{{\Carbon\Carbon::parse($item->created_at)->diffForHumans()}}</td>

                            <td>

                                <a href="{{route('newsletter.delete',$item->id)}}" id="delete"
                                   class="btn btn-sm btn-danger">Delete</a>
                            </td>

                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>






@endsection
