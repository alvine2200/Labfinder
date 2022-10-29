<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class UserController extends Controller
{
    public function index()
    {
        $users=\App\Models\User::all();
        return view('Admin.users', compact('users'));
    }

    public function make_labowner(Request $request,$id)
    {
        $user=\App\Models\User::findOrFail($id);
        $user->role_id='2';
        $user->update();

        return back()->with('success','New LabOwner Inserted Successfully');
    }

    public function logout()
    {
        $user=Auth::user();
        Auth::logout($user);
        return redirect('/login_view')->with('success','Logged Out Successful');
    }
}
