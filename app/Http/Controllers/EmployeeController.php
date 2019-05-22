<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Employee;
use App\Department;
use App\User;
use Carbon\Carbon;
use Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\AccountConfirmation;

class EmployeeController extends Controller
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
        $departments = Department::all();
        $trashed = Department::onlyTrashed()->get();
        return view('employee.index', compact('departments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departments = Department::all();
        return view('employee.index', compact('departments'));
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
            'department_id' => 'required',
            'employee_name' => 'required',
            'employee_no' => 'required|unique:employees,employee_no',
            'email_address' => 'email|unique:users,email'
        ]);

        $generated_password = Str::random(8);
        $user_id = User::insertGetId([
            'name' => $request->employee_name,
            'email' => $request->email_address,
            'password' => bcrypt($generated_password),
            'created_at' => Carbon::now()
        ]);

        Employee::insert( $request->except('_token', 'employee_name', 'email_address') + [
            'user_id' => $user_id,
            'added_by' => Auth::id()
        ]);

        $email_address = $request->email_address;
        Mail::to($email_address)->send(new AccountConfirmation($email_address, $generated_password));
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        return view('employee.edit', compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
        $data = $request->validate([
            'department_id' => 'required',
            'employee_name' => 'required',
            'employee_no' => 'required|unique:employees,employee_no',
            'email_address' => 'email|unique:users,email'
        ]);

        $employee->update($data);
        return redirect('/employee')->withStatus($employee->employee_name . ' has been edited succesfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        $employee->delete();
        return back()->withDelete($employee->company_name. ' has been sent to trash');
    }

    public function restore($employee){
        Employee::withTrashed()->find($employee)->restore();
        return back()->withRestore('Item has been restored');

    }

    public function forceDelete($employee){
       Employee::withTrashed()->find($employee)->forceDelete();
       return back()->withForced('Item has been deleted permanently');
    }
}
