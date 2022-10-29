<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('LoginPage.index');
    }
    public function login_user(Request $request)
    {
        $validator=Validator::make($request->all(),[
            'email'=>'required|string',
            'password'=>'required',
        ]);

        if($validator->fails())
        {
            return back()->with('fail',$validator->errors());
        }

        $credentials=$request->only('email','password');

        if(Auth::attempt($credentials))
        {
            $user=Auth::user();
           // dd($user);
            if($user->role_id == '1')
            {
                return view('Admin.index');
            }
            elseif($user->role_id == '2')
            {
                return view('Labowner.index');
            }
            else{

                return view('User.index');
            }
        }

        else{
            return back()->with('fail','Sorry, Check Your Login Credentials');
        }
    }
}
