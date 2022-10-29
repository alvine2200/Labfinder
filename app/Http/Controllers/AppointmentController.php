<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lab;
use Auth;
use App\Models\Appointment;
use Validator;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $labs=Lab::all();
        return view('User.appointment_index')->with(['labs'=>$labs]);
    }


    public function appointment_show($id)
    {
        $lab=Lab::findOrFail($id);
        return view('User.make_appointment')->with(['lab'=>$lab]);

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, $id)
    {
       $lab=Lab::findOrFail($id);
       $validator=Validator::make($request->all(),[
            'test_name'=>'required|string',
            'date'=>'required|date|after:today',
            'time'=>'required|string',
        ]);

        if($validator->fails())
        {
            return back()->with('fail',$validator->errors());
        }

        $time=Appointment::where('lab_id',$lab->id)->get();
        if(!$time)
        {
             if($time['date'] == $request->date && $time['time'] == $request->time)
            {
                return back()->with('fail','Time Or day Already booked');
            }
        }
        else{

            $appointment= Appointment::create([
                'lab_id'=>$lab->id,
                'fullname'=> Auth::user()->name,
                'phone'=>Auth::user()->phone,
                'test'=>$request->test_name,
                'location'=>$lab->location,
                'lab'=>$lab->name,
                'date'=>$request->date,
                'time'=>$request->time,
            ]);

             return back()->with('success','Appointment Successfully Submitted');
        }

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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function approve($id)
    {
        $appoint=Appointment::find($id);
        $appoint->status='Approved';
        $appoint->save();

        return back()->with('success','Appointment approved Successfully');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $appointments=Appointment::where('phone',Auth::user()->phone)->get();
        return view('User.view', compact('appointments'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }


    public function cancel()
    {
        $appoint=Appointment::where('phone',Auth::user()->phone)->first();
        $appoint->status='cancelled';
        $appoint->save();

        return back()->with('success','Appointment is cancelled');
    }



    public function destroy($id)
    {

    }


    public function searchforlabortest(Request $request)
    {
        $field=$request->search;
        $find=Lab::where('name','like','%'.$field.'%')->orWhere('tests','like','%'.$field.'%')->get();
        return view('User.search_view')->with(['find'=>$find]);
    }
}
