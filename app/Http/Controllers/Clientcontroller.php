<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Clientcontroller extends Controller
{
public function index()
   {
       return view('User.make_appointment');
    }
}
