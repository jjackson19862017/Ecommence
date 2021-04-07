@extends('admin.admin_master')
@section('admin')

    @php

        $categorys = DB::table('categories')->get();
        $brands = DB::table('brands')->get();
        $subcategorys = DB::table('subcategories')->get();

    @endphp


    <div class="py-12">
        <div class="container">
            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">Update Product <a href="{{route('product.index')}}"
                                                              class="btn btn-success btn-sm pull-right">All Products</a>
                </h6>
                <p class="mg-b-20 mg-sm-b-30">Update Product Form</p>
                <form action="{{route('product.update',$product->id)}}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="form-layout">
                        <div class="row mg-b-25">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label">Product Name: <span
                                            class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="product_name"
                                           value="{{$product->product_name}}">
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label">Product Code: <span
                                            class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="product_code"
                                           value="{{$product->product_code}}">
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label">Quantity: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="number" name="product_quantity"
                                           value="{{$product->product_quantity}}">
                                </div>
                            </div><!-- col-4 -->

                            <div class="col-lg-6">
                                <div class="form-group mg-b-10-force">
                                    <label class="form-control-label">Category: <span class="tx-danger">*</span></label>
                                    <select class="form-control select2 "
                                            data-value="Choose country" name="category_id">
                                        <option label="Choose Category"></option>
                                        @foreach($categorys as $cat)
                                            <option value="{{$cat->id}}"
                                                    @if($cat->id == $product->category_id) selected @endif>{{$cat->category_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-6">
                                <div class="form-group mg-b-10-force">
                                    <label class="form-control-label">Sub-Category: <span
                                            class="tx-danger">*</span></label>
                                    <select class="form-control select2 "
                                            data-value="Choose country" name="subcategory_id">

                                        @foreach($subcategorys as $subcat)
                                            <option value="{{$subcat->id}}"
                                                    @if($subcat->id == $product->subcategory_id) selected @endif>{{$subcat->subcategory_name}}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-6">
                                <div class="form-group mg-b-10-force">
                                    <label class="form-control-label">Brands: <span class="tx-danger">*</span></label>
                                    <select class="form-control select2 "
                                            data-value="Choose country" name="brand_id">
                                        <option label="Choose Brand"></option>

                                        @foreach($brands as $brand)
                                            <option value="{{$brand->id}}"
                                                    @if($brand->id == $product->brand_id) selected @endif>{{$brand->brand_name}}</option>

                                        @endforeach
                                    </select>
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label">Product Size: <span
                                            class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="product_size" id="size"
                                           data-role="tagsinput" value="{{$product->product_size}}">
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label">Product Colour: <span
                                            class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="product_colour" id="colour"
                                           data-role="tagsinput" value="{{$product->product_colour}}">
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label">Selling Price: <span
                                            class="tx-danger">*</span></label>
                                    <input class="form-control" type="number" name="selling_price"
                                           value="{{$product->selling_price}}">
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label">Discount Price: <span
                                            class="tx-danger">*</span></label>
                                    <input class="form-control" type="number" name="discount_price"
                                           value="{{$product->discount_price}}">
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="form-control-label">Product Details: <span class="tx-danger">*</span></label>
                                    <textarea class="form-control" name="product_detail"
                                              id="summernote">{!! $product->product_detail !!}</textarea>
                                </div>
                            </div><!-- col-12 -->
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label">Video Link:</label>
                                    <input class="form-control" type="text" name="video_link"
                                           value="{{$product->video_link}}">
                                </div>
                            </div><!-- col-12 -->


                        </div><!-- row -->

                        <hr>

                        <div class="row">
                            <div class="col-lg-6">
                                <label class="ckbox">
                                    <input type="checkbox" name="main_slider" value="1"
                                           @if($product->main_slider ==1) checked @endif>
                                    <span>Main Slider</span>
                                </label>
                            </div><!-- col-4 -->

                            <div class="col-lg-6">
                                <label class="ckbox">
                                    <input type="checkbox" name="hot_deal" value="1"
                                           @if($product->hot_deal ==1) checked @endif>
                                    <span>Hot Deal</span>
                                </label>
                            </div><!-- col-4 -->

                            <div class="col-lg-6">
                                <label class="ckbox">
                                    <input type="checkbox" name="best_rated" value="1"
                                           @if($product->best_rated ==1) checked @endif>
                                    <span>Best Rated</span>
                                </label>
                            </div><!-- col-4 -->

                            <div class="col-lg-6">
                                <label class="ckbox">
                                    <input type="checkbox" name="trend" value="1"
                                           @if($product->trend ==1) checked @endif>
                                    <span>Trend Product</span>
                                </label>
                            </div><!-- col-4 -->

                            <div class="col-lg-6">
                                <label class="ckbox">
                                    <input type="checkbox" name="mid_slider" value="1"
                                           @if($product->mid_slider ==1) checked @endif>
                                    <span>Middle Slider</span>
                                </label>
                            </div><!-- col-4 -->

                            <div class="col-lg-6">
                                <label class="ckbox">
                                    <input type="checkbox" name="hot_new" value="1"
                                           @if($product->hot_new ==1) checked @endif>
                                    <span>Hot New</span>
                                </label>
                            </div><!-- col-4 -->


                        </div>
                        <hr>
                        <br>
                        <div class="form-layout-footer">
                            <button class="btn btn-info mg-r-5 float-right">Update Product</button>
                        </div><!-- form-layout-footer -->
                    </div><!-- form-layout -->
                </form>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="card pd-20 pd-sm-40">
            <h6 class="card-body-title">Update Images </h6>
            <form action="{{route('product.imageupdate',$product->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">


                    <div class="col-lg-6 col-sm-6">

                        <label class="form-control-label">Image One (Main Thumbnail):</label><br>
                        <label class="custom-file">
                            <input type="file" id="file" class="custom-file-input" name="image_one"
                                   onchange="readURL1(this);" >
                            <span class="custom-file-control"></span>
                            <input type="hidden" value="{{$product->image_one}}" name="old_image1">
                            <img src="#" id="one" alt="">

                        </label>
                    </div><!-- col-4 -->
                    <div class="col-lg-6 col-sm-6">
                        <div>
                            <img src="{{asset($product->image_one)}}" style="height: 100px; width: 100px;">
                        </div>

                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-sm-6">
                        <div class="form-group">
                            <label class="form-control-label">Image Two:</label><br>
                            <label class="custom-file">
                                <input type="file" id="file" class="custom-file-input" name="image_two"
                                       onchange="readURL2(this);" >
                                <span class="custom-file-control"></span>
                                <input type="hidden" value="{{$product->image_two}}" name="old_image2">

                                <img src="#" id="two" alt="">

                            </label>
                        </div>
                    </div>

                    <div class="col-lg-6 col-sm-6">
                        <div>
                            <img src="{{asset($product->image_two)}}" style="height: 100px; width: 100px;">
                        </div>

                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6 col-sm-6">
                        <div class="form-group">
                            <label class="form-control-label">Image Three:</label><br>
                            <label class="custom-file">
                                <input type="file" id="file" class="custom-file-input" name="image_three"
                                       onchange="readURL3(this);" >
                                <span class="custom-file-control"></span>
                                <input type="hidden" value="{{$product->image_three}}" name="old_image3">

                                <img src="#" id="three" alt="">

                            </label>
                        </div>
                    </div>

                    <div class="col-lg-6 col-sm-6">
                        <div>
                            <img src="{{asset($product->image_three)}}" style="height: 100px; width: 100px;">
                        </div>

                    </div>
                </div>
                <button type="submit" class="btn btn-sm btn-warning float-right">Update Photo</button>
            </form>



    </div>
    </div>



    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.8.0/bootstrap-tagsinput.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $('select[name="category_id"]').on('change', function () {
                var category_id = $(this).val();
                if (category_id) {

                    $.ajax({
                        url: "{{ url('/get/subcategory/') }}/" + category_id,
                        type: "GET",
                        dataType: "json",
                        success: function (data) {
                            var d = $('select[name="subcategory_id"]').empty();
                            $.each(data, function (key, value) {

                                $('select[name="subcategory_id"]').append('<option value="' + value.id + '">' + value.subcategory_name + '</option>');

                            });
                        },
                    });

                } else {
                    alert('danger');
                }

            });
        });

    </script>

    <script type="text/javascript">
        function readURL1(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#one')
                        .attr('src', e.target.result)
                        .width(100)
                        .height(100);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>

    <script type="text/javascript">
        function readURL2(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#two')
                        .attr('src', e.target.result)
                        .width(100)
                        .height(100);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>

    <script type="text/javascript">
        function readURL3(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#three')
                        .attr('src', e.target.result)
                        .width(100)
                        .height(100);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
    <script>

        $(function () {
            'use strict';

            // Inline editor
            var editor = new MediumEditor('.editable');

            // Summernote editor
            $('#summernote').summernote({
                height: 150,
                tooltip: false
            })
        });

    </script>

@endsection


