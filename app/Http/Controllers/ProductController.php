<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use App\Warehouse;
use App\Supplier;
use App\Category;
// use App\Validator;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use App\Company;

class ProductController extends Controller
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
        $products = Product::all();
        return view('product.index', compact('products'));

        // foreach ($products as $product) {
        //     dd($product->category(['id'])->name);
        // }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies = Company::all();
        $products = Product::all();


        // dd($categories);
        // dd($warehouses);

        return view('product.create', compact('products', 'companies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $data = request()->validate([
            'name'=> 'required|unique:products,name',
            'company_id'=> 'required'
        ]);
        Product::create($data + ['category_status' => 1, 'unique_id' => 000]);

        return back()->withSuccess('Product added succesfully');
    }

    public function reusableStore(Request $request){

        // $validator = Validator::make($request->all(), [
        //     'name' => 'required',
        //     'unique_id' => 'required'
        // ]);
        foreach ($request->name as $request_key => $request_value) {

            Product::insert([
                'name'=> $request_value,
                'unique_id' => $request->unique_id[$request_key],
                'company_id' => $request->company_id[$request_key],
                'category_status' => 2,
                'created_at' => Carbon::now()
            ]);
        }
        return back()->withSuccess('Product added succesfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('product.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $data = request()->validate([
            'name'=> 'required|unique:products,name,' .$product->id,
            'category_status'=> 'required'
        ]);
        $product->update($data);

        return redirect('/product');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */

    public function destroy(Product $product)
    {
        $product->delete();
    }


    public function trashView(){
        
        $trashed = Product::onlyTrashed()->get();
       return view('product.trashView', compact('trashed'));
    }


    public function restore($product){
        Product::withTrashed()->find($product)->restore();
        return back()->withRestore('Item has been restored');
    }


    public function forceDelete($product){
        // $data = Warehouse::first('name');
       Product::withTrashed()->find($product)->forceDelete();
       return back()->withForced('Item has been deleted permanently');
    }


}
