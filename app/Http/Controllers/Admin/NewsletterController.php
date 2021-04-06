<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Newsletter;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class NewsletterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $newsletter = Newsletter::all();
        return view('admin.newsletter.newsletter',compact('newsletter'));
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
            'email' => 'email|required|unique:newsletters|max:255',

        ],
            [
                'email.required' => 'Please do not leave blank.',

                'email.unique' => 'There is already a category with this name.',
                'email.max' => 'This needs to be less than 255 characters.',
            ]
        );

        $data = [];
        $data['email'] = $request->email;

        DB::table('newsletters')->insert($data);
        $notification = array(
            'message' => 'Thanks for subscribing',
            'type' => 'success',
        );
        return redirect()->back()->with($notification);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Newsletter  $newsletter
     * @return \Illuminate\Http\Response
     */
    public function show(Newsletter $newsletter)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Newsletter  $newsletter
     * @return \Illuminate\Http\Response
     */


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Newsletter  $newsletter
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Newsletter::find($id)->delete();
        $notification = array(
            'message' => 'Newsletter Deleted Successfully',
            'type' => 'success',
        );
        return back()->with($notification);

    }

    public function unsubscribe($id)
    {
        $delete = Newsletter::find($id)->delete();
        $notification = array(
            'message' => 'Newsletter Deleted Successfully',
            'type' => 'success',
        );
        return back()->with($notification);

    }
}
