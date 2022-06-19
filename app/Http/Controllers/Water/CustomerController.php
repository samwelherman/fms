<?php

namespace App\Http\Controllers\Water;

use App\Http\Controllers\Controller;
use App\Models\Water\Customer;
use App\Models\Water\Location;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $customers = Customer::all();

        $locations = Location::pluck('name','name')->all();

        // dd($members);

        return view('water.client.home',compact('customers', 'locations'));
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
            'phoneNo' => 'required',
            
        ]);

        $customers = new Customer();

        $customers->name = request('name');
        $customers->phoneNo = request('phoneNo');
        $customers->location = request('location');

        $customers->save();

    
        return redirect()->route('customer.index')->with('success', 'Saved Successfully');
   
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Water\Customer  $customer
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $customer = Customer::find($id);

        return view('water.client.show', compact('customer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Water\Customer  $customer
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $customer = Customer::find($id);

        $locations = Location::pluck('name','name')->all();

        return view('water.client.edit', compact('customer', 'locations'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Water\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        //

        $request->validate([
            'name' => 'required',
            'location' => 'required',
            'phoneNo' => 'required',
            
        ]);

        $customer->update($request->all());

        return redirect()->route('customer.index')->with('success', 'Updated Successfully');
   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Water\Customer  $customer
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //

        $customer = Customer::where('id', $id)->firstorFail();
        $customer->delete();

        return redirect()->route('customer.index')->with('success', 'Deleted Successfully');
 
    }
}
