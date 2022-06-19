<?php

namespace App\Http\Controllers\Water;

use App\Http\Controllers\Controller;
use App\Models\Water\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $waters = Location::all();

        return view('water.location.home',compact('waters'));
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
            'name' => 'required'
            
        ]);

        $waters = new Location();

        $waters->name = request('name');

        $waters->save();

    
        return redirect()->route('water.index')->with('success', 'Saved Successfully');
   
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //

        $water = Location::find($id);

         return view('water.location.edit',compact('water'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Water\Location  $water
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Location  $water)
    {
        //
        $request->validate([
            'name' => 'required'
            
        ]);

        $water->update($request->all());

        return redirect()->route('water.index')->with('success', 'Updated Successfully');
   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $water=Location::where('id', $id)->firstorFail();
        $water->delete();

        return redirect()->route('water.index')->with('success', 'Deleted Successfully');
   
    }
}
