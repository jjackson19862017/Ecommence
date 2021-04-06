<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Category;
use App\Models\Admin\Subcategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class SubcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $category = Category::all();
        $subcat = DB::table('subcategories')
            ->join('categories', 'subcategories.category_id', 'categories.id')
            ->select('subcategories.*', 'categories.category_name')
            ->get();
        return view('admin.subcategory.subcategory', compact('category', 'subcat'));
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validateData = $request->validate([
            'subcategory_name' => 'required|unique:subcategories|max:255',
        ],
            [
                'subcategory_name.required' => 'Please do not leave blank.',
                'subcategory_name.unique' => 'There is already a category with this name.',
                'subcategory_name.max' => 'This needs to be less than 255 characters.',
            ]
        );

        $data = [];
        $data['category_id'] = $request->category_id;
        $data['subcategory_name'] = $request->subcategory_name;
        DB::table('subcategories')->insert($data);
        $notification = array(
            'message' => 'Sub-Category Created',
            'type' => 'success',
        );
        return redirect()->route('subcategory.index')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Subcategory $subcategory
     * @return \Illuminate\Http\Response
     */
    public function show(Subcategory $subcategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Subcategory $subcategory
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $subcat = Subcategory::find($id);
        $category = Category::all();

        return view('admin.subcategory.edit', compact('subcat','category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Subcategory $subcategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $validateData = $request->validate(
            [
                'subcategory_name' => 'required|max:255',
            ],
            [
                'subcategory_name.required' => 'Please do not leave blank.',

                'subcategory_name.max' => 'This needs to be less than 255 characters.',
            ]
        );
        $data = [];
        $data['category_id'] = $request->category_id;
        $data['subcategory_name'] = $request->subcategory_name;
        $update=DB::table('subcategories')->where('id',$id)->update($data);
        if ($update) {
            $notification = array(
                'message' => 'Sub-Category Updated Successfully',
                'alert-type' => 'success'
            );
        } else {
            $notification = array(
                'message' => 'Nothing to update',
                'alert-type' => 'error'
            );
        }
        return redirect()->route('subcategory.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Subcategory $subcategory
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $delete = Subcategory::find($id)->delete();
        $notification = array(
            'message' => 'Sub-Category Deleted Successfully',
            'type' => 'success',
        );
        return back()->with($notification);
    }
}
