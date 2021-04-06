@extends('admin.admin_master')
@section('admin')

    <div class="py-12">
        <div class="container">
            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">New Product</h6>
                <p class="mg-b-20 mg-sm-b-30">New Product Add Form</p>
                <form action="{{route('product.store')}}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="form-layout">
                        <div class="row mg-b-25">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Product Name: <span
                                            class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="product_name"
                                           placeholder="Enter Product Name">
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Product Code: <span
                                            class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="product_code" value="McDoe"
                                           placeholder="Enter Product Code">
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Quantity: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="number" name="product_quantity"
                                           placeholder="Enter Quantity">
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-4">
                                <div class="form-group mg-b-10-force">
                                    <label class="form-control-label">Category: <span class="tx-danger">*</span></label>
                                    <select class="form-control select2 "
                                            data-placeholder="Choose country" name="category_id">
                                        <option label="Choose Category"></option>
                                        @foreach($categorys as $cat)
                                            <option value="{{$cat->id}}">{{$cat->category_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-4">
                                <div class="form-group mg-b-10-force">
                                    <label class="form-control-label">Sub-Category: <span
                                            class="tx-danger">*</span></label>
                                    <select class="form-control select2 "
                                            data-placeholder="Choose country" name="subcategory_id">
                                        <option label="Choose Sub-Category"></option>


                                    </select>
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-4">
                                <div class="form-group mg-b-10-force">
                                    <label class="form-control-label">Brands: <span class="tx-danger">*</span></label>
                                    <select class="form-control select2 "
                                            data-placeholder="Choose country" name="brand_id">
                                        <option label="Choose Brand"></option>

                                        @foreach($brands as $brand)
                                            <option value="{{$brand->id}}">{{$brand->brand_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Product Size: <span
                                            class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="product_size" id="size"
                                           data-role="tagsinput">
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Product Colour: <span
                                            class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="product_colour" id="colour"
                                           data-role="tagsinput">
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Selling Price: <span
                                            class="tx-danger">*</span></label>
                                    <input class="form-control" type="number" name="selling_price"
                                           placeholder="Selling Price">
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="form-control-label">Product Details: <span class="tx-danger">*</span></label>
                                    <input class="form-control" name="product_detail" id="summernote">
                                </div>
                            </div><!-- col-12 -->
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="form-control-label">Video Link:</label>
                                    <input class="form-control" type="text" name="video_link"
                                           placeholder="Video Link">
                                </div>
                            </div><!-- col-12 -->
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Image One (Main Thumbnail):</label>
                                    <label class="custom-file">
                                        <input type="file" id="file" class="custom-file-input" name="image_one" onchange="readURL1(this);">
                                        <span class="custom-file-control"></span>
                                        <img src="#" id="one" alt="">
                                    </label>
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Image Two:</label>
                                    <label class="custom-file">
                                        <input type="file" id="file" class="custom-file-input" name="image_two" onchange="readURL2(this);">
                                        <span class="custom-file-control"></span>
                                        <img src="#" id="two" alt="">
                                    </label>
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Image Three:</label>
                                    <label class="custom-file">
                                        <input type="file" id="file" class="custom-file-input" name="image_three" onchange="readURL3(this);">
                                        <span class="custom-file-control"></span>
                                        <img src="#" id="three" alt="">
                                    </label>
                                </div>
                            </div><!-- col-4 -->


                        </div><!-- row -->

                        <hr>

                        <div class="row">
                            <div class="col-lg-4">
                                <label class="ckbox">
                                    <input type="checkbox" name="main_slider" value="1">
                                    <span>Main Slider</span>
                                </label>
                            </div><!-- col-4 -->

                            <div class="col-lg-4">
                                <label class="ckbox">
                                    <input type="checkbox" name="hot_deal" value="1">
                                    <span>Hot Deal</span>
                                </label>
                            </div><!-- col-4 -->

                            <div class="col-lg-4">
                                <label class="ckbox">
                                    <input type="checkbox" name="best_rated" value="1">
                                    <span>Best Rated</span>
                                </label>
                            </div><!-- col-4 -->

                            <div class="col-lg-4">
                                <label class="ckbox">
                                    <input type="checkbox" name="trend" value="1">
                                    <span>Trend Product</span>
                                </label>
                            </div><!-- col-4 -->

                            <div class="col-lg-4">
                                <label class="ckbox">
                                    <input type="checkbox" name="mid_slider" value="1">
                                    <span>Middle Slider</span>
                                </label>
                            </div><!-- col-4 -->

                            <div class="col-lg-4">
                                <label class="ckbox">
                                    <input type="checkbox" name="hot_new" value="1">
                                    <span>Hot New</span>
                                </label>
                            </div><!-- col-4 -->


                        </div>
                        <hr>
                        <br>


                        <div class="form-layout-footer">
                            <button class="btn btn-info mg-r-5">Submit Form</button>
                            <button class="btn btn-secondary">Cancel</button>
                        </div><!-- form-layout-footer -->
                    </div><!-- form-layout -->
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
                            .width(80)
                            .height(80);
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
                            .width(80)
                            .height(80);
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
                            .width(80)
                            .height(80);
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


