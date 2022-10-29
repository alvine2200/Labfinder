<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class RegistrationController extends Controller
{
    public function index()
    {
        return view('Register.index');
    }

    public function register_user(Request $request)
    {
        $validator=Validator::make($request->all(),[
             'name'=>'required|string',
             'role'=>'required|string',
            'email'=>'required|email|unique:users,email',
            'phone'=>'required|string:min:10',
            'password'=>'required|confirmed|min:5',
            'password_confirmation'=>'required|min:5',
        ]);

        if($validator->fails())
        {
            return back()->with('fail',$validator->errors());
        }

        $user=\App\Models\User::create([
             'name'=>$request->name,
             'email'=>$request->email,
             'phone'=>$request->phone,
             'role_id'=>$request->role,
             'password'=>Hash::make($request->password),
        ]);

        return redirect('/login_view')->with('success','Registration is a success, Login now');
    }
}
