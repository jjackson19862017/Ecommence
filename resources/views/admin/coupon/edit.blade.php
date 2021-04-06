@extends('admin.admin_master')

@section('admin')

    <div class="py-12">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            Edit Coupon
                        </div>
                        <div class="card-body">
                            <form action="{{route('coupon.update',$coupon->id)}}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="coupon">Update Coupon</label>
                                    <input type="text" class="form-control" id="coupon"
                                           name="coupon" value="{{$coupon->coupon}}">
                                    @error('coupon')
                                    <span class="text-danger"> {{ $message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="discount">Discount</label>
                                    <input type="number" class="form-control" id="discount"
                                           name="discount" value="{{$coupon->discount}}">
                                    @error('discount')
                                    <span class="text-danger"> {{ $message}}</span>
                                    @enderror
                                </div>


                                <button type="submit" class="float-right btn btn-primary">Update Coupon</button>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
