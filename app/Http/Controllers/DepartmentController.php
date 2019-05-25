<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Department;
use Carbon\Carbon;

class DepartmentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('checkRole');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $trashed = Department::onlyTrashed()->get();
        $departments= Department::all();
        return view('department.index', compact('departments', 'trashed'));
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
            'department_name' => 'required|unique:departments,department_name',
            'created_at' => Carbon::now()
        ]);

        Department::create($request->except('_token')); //STORE EXCEPT TOKEN AND PASS ON USER ID AS AUTH ID
        return back()->withSuccess('Department added succesfully'); //'withVariable' is laravel sweetener to store variable
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
    public function edit(Department $department)
    {
        return view('department.edit', compact('department'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Department $department)
    {

        // return $request->all();
        $data = request()->validate([
            'department_name' => 'required|unique:departments,department_name,' .$department->id, //VALIDATE EXCEPT DESIRED ID
        ]);
        $department->update($data);
        return redirect('/department')->withStatus($department->department_name . ' has been edited succesfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Department $department)
    {
        $department->delete();
        return back()->withDelete($department->department_name. ' has been sent to trash');
    }

    public function restore($department){
        // $data = Warehouse::first('name');
        Department::withTrashed()->find($department)->restore();
        return back()->withRestore('Item has been restored');
    }

    public function forceDelete($department){
       Department::withTrashed()->find($department)->forceDelete();
       return back()->withForced('Item has been deleted permanently');
    }
}
