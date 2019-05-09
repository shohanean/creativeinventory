<?php

namespace App\Http\Controllers;

use App\Warehouse;
use Illuminate\Http\Request;
use Auth;
use Carbon\Carbon;

class WarehouseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('checkRole');
    }
    
    public function index()
    {
        $trashed = Warehouse::onlyTrashed()->get();
        $warehouses= Warehouse::all();
        return view('warehouse.index', compact('warehouses', 'trashed'));
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
            'name' => 'required|unique:warehouses,name',
            'location' => 'required',
            'created_at' => Carbon::now()
        ]);

        Warehouse::create($request->except('_token') + ['user_id' => Auth::id()]); //STORE EXCEPT TOKEN AND PASS ON USER ID AS AUTH ID
        return back()->withSuccess('Warehouse added succesfully'); //'withVariable' is laravel sweetener to store variable

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Warehouse  $warehouse
     * @return \Illuminate\Http\Response
     */
    public function show(Warehouse $warehouse)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Warehouse  $warehouse
     * @return \Illuminate\Http\Response
     */
    public function edit(Warehouse $warehouse)
    {

        return view('warehouse.edit', compact('warehouse'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Warehouse  $warehouse
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Warehouse $warehouse)
    {

        $data = request()->validate([
            'name' => 'required|unique:warehouses,name,' . $warehouse->id, //VALIDATE EXCEPT DESIRED ID
            'location' => 'required', 
        ]);
        $warehouse->update($data);
        return redirect('/warehouse')->withStatus($warehouse->name . ' has been edited succesfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Warehouse  $warehouse
     * @return \Illuminate\Http\Response
     */
    public function destroy(Warehouse $warehouse)
    {
        $warehouse->delete();
        return back()->withDelete($warehouse->name. ' has been sent to trash');
    }

    public function restore($warehouse){
        // $data = Warehouse::first('name');
        Warehouse::withTrashed()->find($warehouse)->restore();
        return back()->withRestore('Item has been restored');
    }

    public function forceDelete($warehouse){
       Warehouse::withTrashed()->find($warehouse)->forceDelete();
       return back()->withForced('Item has been deleted permanently');
    }
}
