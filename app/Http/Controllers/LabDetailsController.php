<?php

namespace App\Http\Controllers;

use App\Models\Lab;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LabDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Labowner.view_labs');
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
        $validate = $request->validate([
            'name' => 'string|required',
            'tests' => 'required',
            'location' => 'string|required',
            'profile' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $imageName = time() . '.' . $request->profile->getClientOriginalextension();

        $request->profile->move(public_path('ProfileImages'), $imageName);

        $tests = \App\Models\Lab::Create([
            'name' => $request->name,
            'tests' => implode(',', $request->tests),
            'location' => $request->location,
            'profile' => $imageName,
            'user_id' => Auth::user()->id,
        ]);

        return redirect()->back()->with('success', 'Lab Details Submitted Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $labsprofile = Lab::where('user_id', Auth::user()->id)->get();
        return view('Labowner.view_labs', compact('labsprofile'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $lab = Lab::findOrFail($id);
        return view('Labowner.edit_lab', compact('lab'));
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
        $validate = $request->validate([
            'name' => 'string',
            'location' => 'string',
        ]);



        if ($request->hasFile('profile')) {
            $lab = Lab::FindOrFail($id);
            $imageName = time() . '.' . $request->profile->getClientOriginalextension();

            $request->profile->move(public_path('ProfileImages'), $imageName);
            $values = $request->only('name', 'tests', 'location');
            $lab->name = $values['name'];
            $lab->location = $values['location'];
            $lab['tests'] = implode(',', $values['tests']);
            $lab['profile'] = $imageName;
            $lab->update();
            return redirect('view_lab_details')->with('success', 'Lab Profile updated Successfully');
        } elseif ($request->hasFile('profile') == '') {
            $lab = Lab::FindOrFail($id);
            $values = $request->only('name', 'tests', 'location');
            $lab['tests'] = implode(',', $values['tests']);
            $lab['profile'] = $lab->profile;
            $lab->location = $values['location'];
            $lab->update();
            return redirect('view_lab_details')->with('success', 'Lab Profile updated Successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $lab = Lab::findOrFail($id);
        $lab->delete();

        return back()->with('success', 'Successfully deleted');
    }
}
