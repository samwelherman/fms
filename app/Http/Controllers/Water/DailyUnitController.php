<?php

namespace App\Http\Controllers\Water;

use App\Http\Controllers\Controller;
use App\Models\Water\DailyUnit;
use Illuminate\Http\Request;

class DailyUnitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $dailys = DailyUnit::all();

        return view('water.dailyUnit.home',compact('dailys'));
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
            'meter' => 'required'
            
        ]);

        $dailys = new DailyUnit();

        $dailys->meter = request('meter');

        $dailys->save();

    
        return redirect()->route('daily.index')->with('success', 'Saved Successfully');
   
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Water\DailyUnit  $dailyUnit
     * @return \Illuminate\Http\Response
     */
    public function show(DailyUnit $dailyUnit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Water\DailyUnit  $dailyUnit
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $daily = DailyUnit::find($id);

         return view('water.dailyUnit.edit',compact('daily'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Water\DailyUnit  $daily
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DailyUnit $daily)
    {
        //
        $request->validate([
            'meter' => 'required'
            
        ]);

        $daily->update($request->all());

        return redirect()->route('daily.index')->with('success', 'Updated Successfully');
   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Water\DailyUnit  $dailyUnit
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //

        $daily = DailyUnit::where('id', $id)->firstorFail();
        $daily->delete();

        return redirect()->route('daily.index')->with('success', 'Deleted Successfully');
   
    }
}
