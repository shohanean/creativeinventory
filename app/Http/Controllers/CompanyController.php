<?php

namespace App\Http\Controllers;

use Auth;
use App\Company;
use Illuminate\Http\Request;
use Carbon\Carbon;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $companies = Company::all();
        $trashed = Company::onlyTrashed()->get();
        return view('company.index', compact('companies', 'trashed'));
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
            'company_name' => 'required|unique:companies,company_name',
            'company_location' => 'required',
            'created_at' => Carbon::now()
        ]);
        Company::create($request->except('_token'));
        return back()->withSuccess('Company Added Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        return view('company.edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Company $company)
    {
        $data = request()->validate([
            'name' => 'required|unique:companies,company_name,' .$company->id,
            'location' => 'required',
        ]);
        $company->update($data);
        return redirect('/company')->withStatus($company->company_name . ' has been edited succesfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        $company->delete();
        return back()->withDelete($company->company_name. ' has been sent to trash');
    }

    public function restore($company){
        Company::withTrashed()->find($company)->restore();
        return back()->withRestore('Item has been restored');

    }

    public function forceDelete($company){
       Company::withTrashed()->find($company)->forceDelete();
       return back()->withForced('Item has been deleted permanently');
    }
}
