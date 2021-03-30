<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MainUserController extends Controller
{
    //
    public function logout()
    {
        Auth::logout();
        return redirect()->route("login");
    }

    public function show(){
        $id = Auth::user()->id;
        $user = User::find($id);
        return view('user.profile.view_profile',compact('user'));
    }
}
