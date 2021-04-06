@extends('admin.admin_master')

@section('admin')

    <div class="sl-pagebody">
        <div class="sl-page-title">
            <h5>Coupon Table</h5>

        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">
            <h6 class="card-body-title">Coupon List <a class="btn btn-sm btn-warning float-right"
                                                             data-toggle="modal" data-target="#addCoupon">Add
                    New</a></h6>

            <div class="table-wrapper">
                <table id="datatable1" class="table display responsive nowrap">
                    <thead>
                    <tr>
                        <th class="wd-15p">ID</th>
                        <th class="wd-15p">Coupon</th>
                        <th class="wd-15p">Discount</th>
                        <th class="wd-15p">Actions</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($coupon as $item)
                        <tr>
                            <td>{{$item->id}}</td>
                            <td>{{$item->coupon}}</td>
                            <td>{{$item->discount}} %</td>
                            <td>
                                <a href="{{route('coupon.edit',$item->id)}}" class="btn btn-sm btn-info">Edit</a>
                                <a href="{{route('coupon.delete',$item->id)}}" id="delete"
                                   class="btn btn-sm btn-danger">Delete</a>
                            </td>

                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <div id="addCoupon" class="modal fade">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content tx-size-sm">
                <div class="modal-header pd-x-20">
                    <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Add Coupon</h6>
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
                <form action="{{route('coupon.store')}}" method="post">
                    @csrf
                    <div class="modal-body pd-20">

                        <div class="form-group">
                            <label for="coupon">Sub-Category Name</label>
                            <input type="text" class="form-control" name="coupon" id="add"
                                   aria-describedby="helpId"
                                   placeholder="Coupon Name">
                        </div>
                        <div class="form-group">
                            <label for="discount">Discount (%)</label>
                            <input type="number" class="form-control" name="discount" id="add"
                                   aria-describedby="helpId"
                                   placeholder="Discount Percentage">
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
