<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company, App\Supplier, App\Warehouse, App\User, App\Product;
use App\Charts\TestChart;
use App\Requisition;
use App\Stock;
use App\Assign;
use App\Purchase;
// use App\Product;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        // $this->middleware('checkRole');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $TestChart = new TestChart;
        $TestChart->labels(['One', 'Two', 'Three', 'Four']);
        $TestChart->dataset('My dataset', 'pie', [1, 2, 3, 50]);
        $company_count = Company::count();
        $supplier_count = Supplier::count();
        $warehouse_count = Warehouse::count();
        $user_count = User::count();
        $product_count = Product::count();
        $purchase_count = Purchase::count();
        $requisition_count = Requisition::count();
        

        // $product = Product::all();

        // $reusableProducts = Product::where('category_status', 2)->get();
        // $usableProducts = Product::where('category_status', 1)->get();
        // $requisition = Requisition::where('product_id', $product->id)

        // $reusableRequisitions = Requisition::where('product_id', $product->id)->get();
        // $usableRequisitions = Requisition::where('product_id', $usableProducts->id)->get();

        $requisitions = Requisition::all();
        $requisition_by_id= Requisition::where( 'user_id', Auth::user()->id)->get();
        $assign = Assign::where('assign_status', 2)->get();


        // return $reusableRequisitions;

        return view('home', compact('company_count', 'supplier_count', 'warehouse_count', 'user_count', 'product_count', 'TestChart', 'requisitions', 'requisition_by_id', 'assign', 'purchase_count', 'requisition_count'));
    }

    public function approve($requisition_id){

        // echo $requisition_id;

        $requisition = Requisition::find($requisition_id);
        $stocks = Stock::where('product_id', $requisition->product_id)->get();
        $requisition_quantity = $requisition->quantity;
        
        // LOOP TO ITERATE STOCK QUANTITY
        foreach($stocks as $stock){
            
            if($stock->quantity >= $requisition_quantity){
                $stock->decrement('quantity', $requisition_quantity);
                $stock->save();
                $requisition_quantity -= $requisition_quantity;
            }
            else{
                $requisition_quantity -= $stock->quantity;
                $stock->decrement('quantity', $stock->quantity);
                $stock->save();
            }
            // echo $requisition_quantity;
        }
            
        $requisition->update([
            'status' => 1
        ]);
        return back()->withStatus('You have approved the request');
    }

    public function reject($requisition){

        $stock = Requisition::find($requisition);

        $stock->update([
            'status' => 2
        ]);
        return back()->withStatus('You have rejected the request');
       
    }

    public function forward($requisition){
       
        $stock = Requisition::find($requisition);

        $stock->update([
            'status' => 3
        ]);
        return back()->withStatus('You have forwarded the request to super admin');
    }
}
