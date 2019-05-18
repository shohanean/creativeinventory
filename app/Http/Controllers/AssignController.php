<?php

namespace App\Http\Controllers;

use App\Assign;
use Illuminate\Http\Request;
use App\Product;
use App\Requisition;
use App\User;

class AssignController extends Controller
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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::all();
        $users = User::all();
        
        return view('assign.create', compact('products', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $data = request()->validate([
            'product_id'=>'required',
            'user_id'=>'required'
        ]);
        
        Assign::create($data);

        Requisition::where('product_id', $request->product_id)->update([
            'status' => 1
        ]);

        Product::where('id', $request->product_id)->update([
            'assign_status'=> 2
        ]);

        return redirect('home');
    }

    public function reStore(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Assign  $assign
     * @return \Illuminate\Http\Response
     */
    public function show(Assign $assign)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Assign  $assign
     * @return \Illuminate\Http\Response
     */
    public function edit(Assign $assign)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Assign  $assign
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Assign $assign)
    {
        // $data = request()->validate();
        
        $assign->update([
            'product_id'=> $request->product_id,
            'user_id'=> $request->user_id
        ]);

        Requisition::where('product_id', $request->product_id)->update([
            'status' => 1
        ]);

        Product::where('id', $request->product_id)->update([
            'assign_status'=> 2
        ]);

        return redirect('home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Assign  $assign
     * @return \Illuminate\Http\Response
     */
    public function destroy(Assign $assign)
    {
        //
    }
}
