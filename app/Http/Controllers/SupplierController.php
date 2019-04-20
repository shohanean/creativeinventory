<?php

namespace App\Http\Controllers;

use App\Supplier;
use Illuminate\Http\Request;
use Auth;
use Carbon\Carbon;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $trashed = Supplier::onlyTrashed()->get();
        $suppliers= Supplier::all();
        return view('supplier.index', compact('suppliers', 'trashed'));
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
        $request->validate([
            'name' => 'required|unique:suppliers,name',
            'created_at' => Carbon::now()
        ]);

        Supplier::create($request->except('_token') + ['user_id' => Auth::id(), 'location' => $request->location, 'note' => $request->note]);
        return back()->withSuccess('Supplier added succesfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function show(Supplier $supplier)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function edit(Supplier $supplier)
    {
        return view('supplier.edit', compact('supplier'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Supplier $supplier)
    {
        $data=request()->validate([
            'name' => 'required|unique:suppliers,name',
            'created_at' => Carbon::now()
        ]);
        $supplier->update($data + ['location' => $request->location, 'note' => $request->note] );
        return redirect('/supplier')->withStatus($supplier->name. ' has been edited Succesfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function destroy(Supplier $supplier)
    {
        $supplier->delete();

        return back()->withDelete($supplier->name. ' has been sent to trash');
    }

    public function restore($supplier){
        // $data = Supplier::first('name');

        Supplier::withTrashed()->find($supplier)->restore();
        
        return back()->withRestore('Item has been restored');
    }

    public function forceDelete($supplier){
        // $data = Warehouse::first('name');
       Supplier::withTrashed()->find($supplier)->forceDelete();
    
       return back()->withForced('Item has been deleted permanently');
    }

}