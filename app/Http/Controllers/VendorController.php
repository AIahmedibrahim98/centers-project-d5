<?php

namespace App\Http\Controllers;

use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class VendorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vendors = Vendor::orderBy('id','desc')->paginate(25);
        return view('vendors.index',compact('vendors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vendors.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|string|max:200',
            'logo'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $vendor = new Vendor();
        $vendor->name = $request->name;
        // $vendor->logo = $request->logo;
        // Storage::disk('public')->put('vendors', $request->logo);
        $vendor->logo = $request->file('logo')->store('vendors');
        $vendor->save();
       return redirect()->route('vendors.index')->with(['message'=>'Vendor Added']);
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
        $vendor = Vendor::find($id);
        return view('vendors.edit',compact('vendor'));
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
        $request->validate([
            'name'=>'required|string|max:200',
            'logo'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $vendor = Vendor::find($id);
        $vendor->name = $request->name;
        if($request->logo && $vendor->logo) Storage::disk('public')->delete($vendor->logo);
        if($request->logo) $vendor->logo = $request->file('logo')->store('vendors');
        $vendor->save();
       return redirect()->route('vendors.index')->with(['message'=>'Vendor Updated']);
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
    }
}
