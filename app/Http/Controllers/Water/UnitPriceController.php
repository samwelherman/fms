<?php

namespace App\Http\Controllers\Water;

use App\Http\Controllers\Controller;
use App\Models\Water\Location;
use App\Models\Water\UnitPrice;
use Illuminate\Http\Request;

class UnitPriceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $units = UnitPrice::all();

        $locations = Location::pluck('name','name')->all();

        // dd($members);

        return view('water.unitPrice.home',compact('units', 'locations'));
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
            'season' => 'required',
            'location' => 'required',
            'price' => 'required',
            
        ]);

        $units = new UnitPrice();

        $units->season = request('season');
        $units->price = request('price');
        $units->location = request('location');

        $units->save();

    
        return redirect()->route('unit.index')->with('success', 'Saved Successfully');
   
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Water\UnitPrice  $unitPrice
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $unit = UnitPrice::find($id);

        return view('water.unitPrice.show', compact('unit'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Water\UnitPrice  $unitPrice
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $unit = UnitPrice::find($id);

        $locations = Location::pluck('name','name')->all();

        return view('water.unitPrice.edit',compact('unit', 'locations'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Water\UnitPrice  $unit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UnitPrice $unit)
    {
        //
        $request->validate([
            'season' => 'required',
            'location' => 'required',
            'price' => 'required',
            
        ]);

        $unit->update($request->all());

        return redirect()->route('unit.index')->with('success', 'Updated Successfully');
   

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Water\UnitPrice  $unitPrice
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //

        $unit = UnitPrice::where('id', $id)->firstorFail();
        $unit->delete();

        return redirect()->route('unit.index')->with('success', 'Deleted Successfully');
   
    }
}
