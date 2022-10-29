<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lab;
use Auth;

class HomeController extends Controller
{

    public function home()
    {
        $labs=Lab::latest()->paginate(3);
        return view('landing.index', compact('labs'));
    }

    public function labs_page()
    {
        $labs=Lab::all();
        return view('landing.labs', compact('labs'));
    }
    public function booking($labs)
    {

        if(!Auth::user())
        {
            
            return view('LoginPage.index');
        }
        else{
            return redirect('User.index', compact('labs'));
        }
    }
}
