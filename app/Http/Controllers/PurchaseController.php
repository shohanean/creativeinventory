<?php

namespace App\Http\Controllers;

use App\Purchase;
use Illuminate\Http\Request;
use App\Product;
use App\Supplier;
use App\Company;
use App\Stock;
use Carbon\Carbon;
use Validator;

class PurchaseController extends Controller
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
        $purchases = Purchase::all();

        return view('purchase.index', compact('purchases'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies = Company::all();
        $suppliers = Supplier::all();
        $products = Product::all();

        return view('purchase.create', compact('products', 'suppliers', 'companies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        foreach ($request->product_id as $product_id_key => $product_id_value) {
            // echo "<p>".$product_id_key."<p>";
            // echo "<p>Product ID".$product_id_value."<p>";
            // echo "<p>Quantity ".$request->quantity[$product_id_key]."<p>";
            // echo "<p>Unit Price ".$request->unit_price[$product_id_key]."<p>";
            // echo "<p>total price ".$request->total_price[$product_id_key]."<p>";
            // echo "<p>exp.date ".$request->exp_date[$product_id_key]."<p>";


            $data = [
                'product_id' => $product_id_value,
                'quantity' => $request->quantity[$product_id_key],
                'unit_price' => $request->unit_price[$product_id_key],
                'total_price' => $request->total_price[$product_id_key],
                'exp_date' => $request->exp_date[$product_id_key],
                'created_at' => Carbon::now()
            ];

            $data1 = [
                'company_id' => $request->company_id,
                'supplier_id' => $request->supplier_id,
                'note' => $request->note,
                'invoice_details' => $request->invoice_details,
                'product_id' => $product_id_value,
                'created_at' => Carbon::now()
            ];
            
            Purchase::insert($data1);

            Stock::insert($data);
        }
        return back()->withSuccess('Purchase Record Added Successfully!');;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function show(Purchase $purchase)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function edit(Purchase $purchase)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Purchase $purchase)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function destroy(Purchase $purchase)
    {
        $purchase->delete();
        return back();
    }

    public function trashView(){
        $trashed = Purchase::onlyTrashed()->get();
       return view('purchase.trashView', compact('trashed'));
    }

    
    public function restore($purchase){
        Purchase::withTrashed()->find($purchase)->restore();
        return back()->withRestore('Item has been restored');
    }

    public function forceDelete($purchase){
       Purchase::withTrashed()->find($purchase)->forceDelete();
       return back()->withForced('Item has been deleted permanently');
    }
}
