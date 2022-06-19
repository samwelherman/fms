<?php

namespace App\Http\Controllers\Water;

use App\Http\Controllers\Controller;
use App\Models\Water\Location;
use App\Models\Water\Meter;
use Illuminate\Http\Request;

class MeterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $meters = Meter::all();

        $locations = Location::pluck('name','name')->all();

        // dd($members);

        return view('water.meter.home',compact('meters', 'locations'));
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

        $request->validate([
            'name' => 'required',
            'location' => 'required',
            'regNo' => 'required',
            
        ]);

        $meters = new Meter();

        $meters->name = request('name');
        $meters->regNo = request('regNo');
        $meters->location = request('location');

        $meters->save();

    
        return redirect()->route('meter.index')->with('success', 'Saved Successfully');
   
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Water\Meter  $meter
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //

        $meter = Meter::find($id);

        return view('water.meter.show', compact('meter'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Water\Meter  $meter
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //

        $meter = Meter::find($id);

        $locations = Location::pluck('name','name')->all();

        return view('water.meter.edit', compact('meter', 'locations'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Water\Meter  $meter
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Meter $meter)
    {
        //

        $request->validate([
            'name' => 'required',
            'location' => 'required',
            'regNo' => 'required',
            
        ]);

        $meter->update($request->all());

        return redirect()->route('meter.index')->with('success', 'Updated Successfully');
   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Water\Meter  $meter
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //

        $meter = Meter::where('id', $id)->firstorFail();
        $meter->delete();

        return redirect()->route('meter.index')->with('success', 'Deleted Successfully');
 
    }
}
