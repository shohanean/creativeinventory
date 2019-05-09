<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Carbon\Carbon;

class CategoryController extends Controller
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
        $trashed = Category::onlyTrashed()->get();
        $categories= Category::all();
        return view('category.index', compact('categories', 'trashed'));
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
            'name' => 'required|unique:categories,name',
            'created_at' => Carbon::now()
        ]);

        Category::create($request->except('_token')); //STORE EXCEPT TOKEN AND PASS ON USER ID AS AUTH ID
        return back()->withSuccess('Category added succesfully'); //'withVariable' is laravel sweetener to store variable
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $data = request()->validate([
            'name' => 'required|unique:categories,name,' . $category->id, //VALIDATE EXCEPT DESIRED ID
        ]);
        $category->update($data);
        return redirect('/category')->withStatus($category->name . ' has been edited succesfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return back()->withDelete($category->name. ' has been sent to trash');
    }
    public function restore($category){
        // $data = Warehouse::first('name');
        Category::withTrashed()->find($category)->restore();
        return back()->withRestore('Item has been restored');
    }

    public function forceDelete($category){
       Category::withTrashed()->find($category)->forceDelete();
       return back()->withForced('Item has been deleted permanently');
    }
}
