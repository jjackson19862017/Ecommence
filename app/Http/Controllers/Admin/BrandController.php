<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Brand;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Image;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $brands = Brand::all();
        return view('admin.brand.brand',compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate(
            [
                'brand_name' => 'required|unique:brands|max:100|min:4',
                'brand_image' => 'required|mimes:jpg,jpeg,png',
            ],
            [
                'brand_name.required' => 'Please do not leave blank.',
                'brand_name.unique' => 'There is already a brand with this name.',
                'brand_name.max' => 'This needs to be less than 100 characters.',
                'brand_name.min' => 'This needs to be more than 4 characters.',
                'brand_image.required' => 'Please do not leave blank.',
                'brand_image.mimes' => 'You can only add jpg, jpeg, png file types.',
            ],

        );

        $brand_image = $request->file('brand_image');

        // Upload Image With Intervention Package
        $name_gen = hexdec(uniqid()) . '.' . $brand_image->getClientOriginalExtension();
        Image::make($brand_image)->resize(300, 200)->save('upload/brand/' . $name_gen);

        $last_img = 'upload/brand/' . $name_gen;

        $brand = new brand;
        $brand->brand_name = $request->brand_name;
        $brand->brand_image = $last_img;
        $brand->save();
        $notification = array(
            'message' => 'Brand Added Successfully',
            'alert-type' => 'success'
        );

        return back()->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function show(Brand $brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $brands = Brand::find($id);
        return view('admin.brand.edit', compact('brands'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validateData = $request->validate(
            [
                'brand_name' => 'required|max:100|min:4',
                'brand_image' => 'mimes:jpg,jpeg,png',
            ],
            [
                'brand_name.required' => 'Please do not leave blank.',
                'brand_name.max' => 'This needs to be less than 100 characters.',
                'brand_name.min' => 'This needs to be more than 4 characters.',
                'brand_image.mimes' => 'You can only add jpg, jpeg, png file types.',
            ],

        );

        $old_image = $request->old_image;

        // Upload Image
        $brand_image = $request->file('brand_image');

        if ($brand_image) {
            // Update image without packages
            // $name_gen = hexdec(uniqid());
            // $img_extension = strtolower($brand_image->getClientOriginalExtension());
            // $img_name = $name_gen . '.' . $img_extension;
            // $up_location = 'image/brand/';
            // $last_img = $up_location . $img_name;
            // $brand_image->move($up_location, $img_name);

            // Remove Image
            unlink($old_image);

            // Upload Image With Intervention Package
            $name_gen = hexdec(uniqid()) . '.' . $brand_image->getClientOriginalExtension();
            Image::make($brand_image)->resize(300, 200)->save('upload/brand/' . $name_gen);

            $last_img = 'upload/brand/' . $name_gen;

            $update = Brand::find($id)->update([
                'brand_name' => $request->brand_name,
                'brand_image' => $last_img,

            ]);
        } else {
            $update = Brand::find($id)->update([
                'brand_name' => $request->brand_name,

            ]);
        }
        return redirect()->route('brand.index')->with('success', 'Brand Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        // Deletes the image off the public folder
        unlink(Brand::find($id)->value('brand_image'));

        $delete = Brand::find($id)->delete();
        $notification = array(
            'message' => 'Brand Deleted Successfully',
            'alert-type' => 'success'
        );
        return back()->with($notification);

    }
}
