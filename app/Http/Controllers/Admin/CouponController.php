<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Coupon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $coupon = Coupon::all();
        return view('admin.coupon.coupon',compact('coupon'));
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
        //
        $validateData = $request->validate([
            'coupon' => 'required|unique:coupons|max:255',
            'discount' => 'required',
        ],
            [
                'coupon.required' => 'Please do not leave blank.',
                'discount.required' => 'Please do not leave blank.',
                'coupon.unique' => 'There is already a category with this name.',
                'coupon.max' => 'This needs to be less than 255 characters.',
            ]
        );

        $data = [];
        $data['coupon'] = $request->coupon;
        $data['discount'] = $request->discount;
        DB::table('coupons')->insert($data);
        $notification = array(
            'message' => 'Coupon Created Successfully',
            'type' => 'success',
        );
        return back()->with($notification);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function show(Coupon $coupon)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $coupon = Coupon::find($id);
        return view('admin.coupon.edit', compact('coupon'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validateData = $request->validate([
            'coupon' => 'required|max:255',
            'discount' => 'required',
        ],
            [
                'coupon.required' => 'Please do not leave blank.',
                'discount.required' => 'Please do not leave blank.',

                'coupon.max' => 'This needs to be less than 255 characters.',
            ]
        );

        $data = [];
        $data['coupon'] = $request->coupon;
        $data['discount'] = $request->discount;
        $update = DB::table('coupons')->whereId($id)->update($data);
        if ($update) {
            $notification = array(
                'message' => 'Coupon Updated Successfully',
                'alert-type' => 'success'
            );
        } else {
            $notification = array(
                'message' => 'Nothing to update',
                'alert-type' => 'error'
            );
        }

        return redirect()->route('coupon.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Coupon::find($id)->delete();
        $notification = array(
            'message' => 'Coupon Deleted Successfully',
            'type' => 'success',
        );
        return back()->with($notification);

    }
}
