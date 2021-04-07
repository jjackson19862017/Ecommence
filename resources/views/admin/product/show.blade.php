@extends('admin.admin_master')
@section('admin')

    <div class="py-12">
        <div class="container">
            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">{{$product->product_name}} <a href="{{route('product.edit',$product->id)}}" class="btn btn-sm btn-info pull-right" title="Edit"><i class="fa fa-edit"></i></a> <a href="{{route('product.index')}}" class="btn btn-success btn-sm pull-right">All Products</a></h6>

                <div class="form-layout">
                    <div class="row mg-b-25">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Product Name: </label>
                                <br><strong>{{$product->product_name}}</strong>
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Product Code: </label>
                                <br><strong>{{$product->product_code}}</strong>
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Quantity: </label>
                                <br><strong>{{$product->product_quantity}}</strong>
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-4">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">Category: </label>
                                <br><strong>{{$product->category_name}}</strong>
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-4">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">Sub-Category: </label>
                                <br><strong>{{$product->subcategory_name}}</strong>
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-4">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">Brand: </label>
                                <br><strong>{{$product->brand_name}}</strong>
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Product Size: </label>
                                <br><strong>{{$product->product_size}}</strong>
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Product Colour: </label>
                                <br><strong>{{$product->product_colour}}</strong>
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Selling Price: </label>
                                <br><strong>{{$product->selling_price}}</strong>
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="form-control-label">Product Details: </label>
                                <br>
                                <p>{!! $product->product_detail !!}</p>
                            </div>
                        </div><!-- col-12 -->
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="form-control-label">Video Link:</label>
                                <br>
                                <strong><a href="{{$product->video_link}}">{{$product->video_link}}</a></strong>
                            </div>
                        </div><!-- col-12 -->
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Image One (Main Thumbnail):</label>
                                <br>


                                    <img src="{{asset($product->image_one)}}" style="height: 300px;width: 300px" alt="">

                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Image Two:</label>
                                <br>

                                <img src="{{asset($product->image_two)}}" style="height: 300px;width: 300px" alt="">
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Image Three:</label>
                                <br>

                                <img src="{{asset($product->image_three)}}" style="height: 300px;width: 300px" alt="">
                            </div>
                        </div><!-- col-4 -->


                    </div><!-- row -->

                    <hr>

                    <div class="row">
                        <div class="col-lg-2">
                            <label class="">
                                <span>Main Slider: </span><br>
                                @if($product->main_slider == 1)
                                    <span class="badge badge-success">Active</span>
                                @else
                                    <span class="badge badge-danger">Inactive</span>
                                @endif
                            </label>
                        </div><!-- col-4 -->

                        <div class="col-lg-2">
                            <label class="">
                                <span>Hot Deal: </span><br>
                                @if($product->hot_deal == 1)
                                    <span class="badge badge-success">Active</span>
                                @else
                                    <span class="badge badge-danger">Inactive</span>
                                @endif
                            </label>
                        </div><!-- col-4 -->

                        <div class="col-lg-2">
                            <label class="">
                                <span>Best Rated: </span><br>
                                @if($product->best_rated == 1)
                                    <span class="badge badge-success">Active</span>
                                @else
                                    <span class="badge badge-danger">Inactive</span>
                                @endif
                            </label>
                        </div><!-- col-4 -->

                        <div class="col-lg-2">
                            <label class="">
                                <span>Trend Product: </span><br>
                                @if($product->trend == 1)
                                    <span class="badge badge-success">Active</span>
                                @else
                                    <span class="badge badge-danger">Inactive</span>
                                @endif
                            </label>
                        </div><!-- col-4 -->

                        <div class="col-lg-2">
                            <label class="">
                                <span>Middle Slider: </span><br>
                                @if($product->mid_slider == 1)
                                    <span class="badge badge-success">Active</span>
                                @else
                                    <span class="badge badge-danger">Inactive</span>
                                @endif
                            </label>
                        </div><!-- col-4 -->

                        <div class="col-lg-2">
                            <label class="">
                                <span>Hot New: </span><br>
                                @if($product->hot_new == 1)
                                    <span class="badge badge-success">Active</span>
                                @else
                                    <span class="badge badge-danger">Inactive</span>
                                @endif
                            </label>
                        </div><!-- col-4 -->


                    </div>


                </div><!-- form-layout -->
            </div>
        </div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.8.0/bootstrap-tagsinput.min.js"></script>



@endsection


