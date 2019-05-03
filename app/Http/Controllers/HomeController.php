<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company, App\Supplier, App\Warehouse, App\User, App\Product;
use App\Charts\TestChart;

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
        return view('home', compact('company_count', 'supplier_count', 'warehouse_count', 'user_count', 'product_count', 'TestChart'));
    }
}
