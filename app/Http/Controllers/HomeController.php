<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company, App\Supplier, App\Warehouse, App\User, App\Product;
use App\Charts\TestChart;
use App\Requisition;
use App\Stock;

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
        $this->middleware('checkRole');
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
        


        $requisitions = Requisition::all();
        $stock = Stock::all();

        // print_r($requisitions);
        
        return view('home', compact('company_count', 'supplier_count', 'warehouse_count', 'user_count', 'product_count', 'TestChart', 'requisitions'));
    }

    public function approve($requisition){

        $stock = Requisition::find($requisition);


        Stock::where('product_id', $stock->product_id)->decrement('quantity', $stock->quantity);

        $stock->update([
            'status' => 2
        ]);
    }

    public function reject($requisition){

        $stock = Requisition::find($requisition);

        $stock->update([
            'status' => 1
        ]);
       
    }

    public function forward($requisition){
       
        $stock = Requisition::find($requisition);

        $stock->update([
            'status' => 3
        ]);
    }
}
