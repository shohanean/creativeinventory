<?php

namespace App\Http\Controllers;

use App\Requisition;
use Illuminate\Http\Request;
use App\Product;
use App\Stock;
use Carbon\Carbon;
use Auth;
use App\Assign;

class RequisitionController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $requisitions = Requisition::all();
        return view('requisition.index', compact('requisitions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $usable_products = Product::where('category_status', 1)->get();
        $reusable_products = Product::where('category_status', 2)->get();

        $products = Product::all();
        $stocks = Stock::all();

        // return $usable_products;
        return view('requisition.create', compact('products', 'stocks' , 'usable_products', 'reusable_products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        foreach ($request->product_id as $product_id_key => $product_id_value){
            $data = [
                'product_id' => $product_id_value,
                'quantity' => $request->quantity[$product_id_key],
                'note' => $request->note[$product_id_key],
                'created_at' => Carbon::now()
            ];

            Requisition::insert($data + ['user_id'=> Auth::id()]);
        }
        return back();
    }
    public function storeReusable(Request $request)
    {
        foreach ($request->product_id as $product_id_key => $product_id_value){
            $data = [
                'product_id' => $product_id_value,
                'quantity' => 1,
                'note' => $request->note[$product_id_key],
                'created_at' => Carbon::now()
            ];

            Requisition::insert($data + ['user_id'=> Auth::id()]);
        }
        return back();
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Requisition  $requisition
     * @return \Illuminate\Http\Response
     */
    public function show(Requisition $requisition)
    {
        $assigns = Assign::where('product_id', $requisition->product_id)->get();
        // dd($assign);
        // return $assign;
        return view('requisition.show', compact('requisition', 'assigns'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Requisition  $requisition
     * @return \Illuminate\Http\Response
     */
    public function edit(Requisition $requisition)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Requisition  $requisition
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Requisition $requisition)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Requisition  $requisition
     * @return \Illuminate\Http\Response
     */
    public function destroy(Requisition $requisition)
    {
        //
    }
}
