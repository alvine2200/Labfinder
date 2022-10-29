<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Labownercontroller;
use App\Models\Lab;
use App\Models\Appointment;
use Auth;

class labownercontroller extends Controller
{
    public function index()
    {
         return view('Labowner.lab_profile');
    }

    public function view_appointments()
    {
        $lab=Lab::where('user_id',Auth::user()->id)->first();
        $appointments=Appointment::where('lab_id',$lab->id)->get();
        return view('Labowner.view_appointments')->with(['appointments'=>$appointments]);
    }
}

