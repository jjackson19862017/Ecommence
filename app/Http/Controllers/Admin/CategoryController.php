<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
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
        return view('admin.category.category', compact('category'));
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
            'category_name' => 'required|unique:categories|max:255',
        ],
            [
                'category_name.required' => 'Please do not leave blank.',
                'category_name.unique' => 'There is already a category with this name.',
                'category_name.max' => 'This needs to be less than 255 characters.',
            ]
        );


        $category = new Category;
        $category->category_name = $request->category_name;
        $category->save();

        $notification = array(
            'message' => 'Category Created Successfully',
            'type' => 'success',
        );
        return back()->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Category $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Category $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $categories = Category::find($id);
        return view('admin.category.edit', compact('categories'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Category $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $validateData = $request->validate(
            [
                'category_name' => 'required|max:255',
            ],
            [
                'category_name.required' => 'Please do not leave blank.',

                'category_name.max' => 'This needs to be less than 255 characters.',
            ]
        );

        $data = [];
        $data['category_name'] = $request->category_name;
        $update=DB::table('categories')->where('id',$id)->update($data);
        if ($update) {
            $notification = array(
                'message' => 'Category Updated Successfully',
                'alert-type' => 'success'
            );
        } else {
            $notification = array(
                'message' => 'Nothing to update',
                'alert-type' => 'error'
            );
        }

        return redirect()->route('category.index')->with($notification);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Category $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Category::find($id)->delete();
        $notification = array(
            'message' => 'Category Deleted Successfully',
            'type' => 'success',
        );
        return back()->with($notification);

    }
}
