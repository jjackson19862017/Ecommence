<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Brand;
use App\Models\Admin\Category;
use App\Models\Admin\Product;
use App\Http\Controllers\Controller;
use App\Models\Admin\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Image;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $products = DB::table('products')
            ->join('categories','products.category_id','categories.id')
            ->join('subcategories','products.subcategory_id','subcategories.id')
            ->join('brands','products.brand_id','brands.id')
            ->select('products.*','categories.category_name','subcategories.subcategory_name','brands.brand_name')
            ->get();

        return view('admin.product.product', compact('products'));
    }

    public function getsubcat($category_id)
    {
        $subcat = Subcategory::where('category_id', $category_id)->get();
        return json_encode($subcat);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $brands = Brand::orderBy('brand_name', 'asc')->get();
        $categorys = Category::orderBy('category_name', 'asc')->get();

        return view('admin.product.create', compact('brands', 'categorys'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
$data = [];
        $data['category_id'] = $request->category_id;
        $data['subcategory_id'] = $request->subcategory_id;
        $data['brand_id'] = $request->brand_id;
        $data['product_name'] = $request->product_name;
        $data['product_code'] = $request->product_code;
        $data['product_quantity'] = $request->product_quantity;
        $data['product_detail'] = $request->product_detail;
        $data['product_colour'] = $request->product_colour;
        $data['product_size'] = $request->product_size;
        $data['selling_price'] = $request->selling_price;
        $data['discount_price'] = $request->discount_price;
        $data['video_link'] = $request->video_link;
        $data['main_slider'] = $request->main_slider;
        $data['hot_deal'] = $request->hot_deal;
        $data['best_rated'] = $request->best_rated;
        $data['mid_slider'] = $request->mid_slider;
        $data['hot_new'] = $request->hot_new;
        $data['trend'] = $request->trend;
        $data['status'] = 1;

        $image_one = $request->image_one;
        $image_two = $request->image_two;
        $image_three = $request->image_three;

        if ($image_one && $image_two && $image_three) {
            $image_one_name = hexdec(uniqid()) . '.' . $image_one->getClientOriginalExtension();
            $image_two_name = hexdec(uniqid()) . '.' . $image_two->getClientOriginalExtension();
            $image_three_name = hexdec(uniqid()) . '.' . $image_three->getClientOriginalExtension();

            $upload_loc = 'upload/product/';

            Image::make($image_one)->resize(300, 300)->save($upload_loc . $image_one_name);
            Image::make($image_two)->resize(300, 300)->save($upload_loc . $image_two_name);
            Image::make($image_three)->resize(300, 300)->save($upload_loc . $image_three_name);

            $data['image_one'] = $upload_loc . $image_one_name;
            $data['image_two'] = $upload_loc . $image_two_name;
            $data['image_three'] = $upload_loc . $image_three_name;
        }

        $product = DB::table('products')->insert($data);
        $notification = array(
            'message' => 'Product Created',
            'type' => 'success',
        );

        return back()->with($notification);
    }

    public function inactive($id){
        DB::table('products')->where('id',$id)->update(['status'=>0]);
        $notification = array(
            'message' => 'Product is now inactive',
            'alert-type' => 'success',
        );
        return back()->with($notification);
    }

    public function active($id){
        DB::table('products')->where('id',$id)->update(['status'=>1]);
        $notification = array(
            'message' => 'Product is now active',
            'alert-type' => 'success',
        );
        return back()->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $product = DB::table('products')
            ->join('categories','products.category_id','categories.id')
            ->join('subcategories','products.subcategory_id','subcategories.id')
            ->join('brands','products.brand_id','brands.id')
            ->select('products.*','categories.category_name','subcategories.subcategory_name','brands.brand_name')
            ->where('products.id',$id)
            ->first();

        return view('admin.product.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $product = Product::find($id);
        return view('admin.product.edit',compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $data = [];
        $data['category_id'] = $request->category_id;
        $data['subcategory_id'] = $request->subcategory_id;
        $data['brand_id'] = $request->brand_id;
        $data['product_name'] = $request->product_name;
        $data['product_code'] = $request->product_code;
        $data['product_quantity'] = $request->product_quantity;
        $data['product_detail'] = $request->product_detail;
        $data['product_colour'] = $request->product_colour;
        $data['product_size'] = $request->product_size;
        $data['selling_price'] = $request->selling_price;
        $data['discount_price'] = $request->discount_price;

        $data['video_link'] = $request->video_link;
        $data['main_slider'] = $request->main_slider;
        $data['hot_deal'] = $request->hot_deal;
        $data['best_rated'] = $request->best_rated;
        $data['mid_slider'] = $request->mid_slider;
        $data['hot_new'] = $request->hot_new;
        $data['trend'] = $request->trend;


        $update = DB::table('products')->where('id',$id)->update($data);
        if ($update) {
            $notification = array(
                'message' => 'Product Updated Successfully',
                'alert-type' => 'success'
            );
        } else {
            $notification = array(
                'message' => 'Nothing to update',
                'alert-type' => 'error'
            );
        }

        return redirect()->route('product.index')->with($notification);
    }

    public function imageupdate(Request $request, $id)
    {
        //
        $old_image1 = $request->old_image1;
        $old_image2 = $request->old_image2;
        $old_image3 = $request->old_image3;

        // Upload Image
        $new_image_one = $request->file('image_one');
        $new_image_two = $request->file('image_two');
        $new_image_three = $request->file('image_three');

        if ($new_image_one) {
           // Remove Image
            unlink($old_image1);

            $image_name = hexdec(uniqid());
            $ext = strtolower($new_image_one->getClientOriginalExtension());
            $image_full_name = $image_name. '.'. $ext;
            $upload_path = 'upload/product/';
            $image_url = $upload_path.$image_full_name;
            $success = $new_image_one->move($upload_path,$image_full_name);



            // Upload Image With Intervention Package
//            $name_gen = hexdec(uniqid()) . '.' . $new_image_one->getClientOriginalExtension();
//            Image::make($new_image_one)->resize(300, 300)->save('upload/product/' . $name_gen);
//
//            $last_img = 'upload/product/' . $name_gen;

            $update = Product::find($id)->update([
                'image_one' => $image_url,
            ]);
            if($update){
                $notification = array(
                    'message' => 'Image Updated Successfully',
                    'alert-type' => 'success'
                );
            }

        }
        if ($new_image_two) {
            // Remove Image
            unlink($old_image2);

            $image_name = hexdec(uniqid());
            $ext = strtolower($new_image_two->getClientOriginalExtension());
            $image_full_name = $image_name. '.'. $ext;
            $upload_path = 'upload/product/';
            $image_url = $upload_path.$image_full_name;
            $success = $new_image_two->move($upload_path,$image_full_name);



            // Upload Image With Intervention Package
//            $name_gen = hexdec(uniqid()) . '.' . $new_image_one->getClientOriginalExtension();
//            Image::make($new_image_one)->resize(300, 300)->save('upload/product/' . $name_gen);
//
//            $last_img = 'upload/product/' . $name_gen;

            $update = Product::find($id)->update([
                'image_two' => $image_url,
            ]);
            if($update){
                $notification = array(
                    'message' => 'Image Updated Successfully',
                    'alert-type' => 'success'
                );
            }

        }
        if ($new_image_three) {
            // Remove Image
            unlink($old_image3);

            $image_name = hexdec(uniqid());
            $ext = strtolower($new_image_three->getClientOriginalExtension());
            $image_full_name = $image_name. '.'. $ext;
            $upload_path = 'upload/product/';
            $image_url = $upload_path.$image_full_name;
            $success = $new_image_three->move($upload_path,$image_full_name);



            // Upload Image With Intervention Package
//            $name_gen = hexdec(uniqid()) . '.' . $new_image_one->getClientOriginalExtension();
//            Image::make($new_image_one)->resize(300, 300)->save('upload/product/' . $name_gen);
//
//            $last_img = 'upload/product/' . $name_gen;

            $update = Product::find($id)->update([
                'image_three' => $image_url,
            ]);
            if($update){
                $notification = array(
                    'message' => 'Image Updated Successfully',
                    'alert-type' => 'success'
                );
            }

        }



        return redirect()->route('product.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        // Deletes the image off the public folder
        unlink(Product::find($id)->value('image_one'));
        unlink(Product::find($id)->value('image_two'));
        unlink(Product::find($id)->value('image_three'));

        $delete = Product::find($id)->delete();
        $notification = array(
            'message' => 'Product Deleted Successfully',
            'alert-type' => 'success'
        );
        return back()->with($notification);

    }
}
