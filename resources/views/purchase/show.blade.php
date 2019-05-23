@extends('layouts.dashboardapp')

@section('title', 'View '.strtoupper($purchase->product->name))

@section('content')
{{------- BREADCRUMB -------}}
<div class="row">
    <div class="col-md-12">
        <nav class="breadcrumb bg-white">
            <a class="breadcrumb-item" href="{{ route('home') }}">Dashboard</a>
            <span class="breadcrumb-item active">{{strtoupper($purchase->product->name)}}</span>
        </nav>
    </div>
</div>
<div class="col-md-10 offset-1">
    <div class="card">
        <div class="card-head">
            <div class="col-md-12 bg-dark text-white text-center p-2">
                <h3>Details of {{strtoupper($purchase->product->name)}}</h3>
                <small>Created at: {{$purchase->created_at}}</small>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <strong>Supplier Name: </strong>
                        <span>{{$purchase->supplier->name}}</span>
                    <br>
                    <br>
                    <strong>Company Name: </strong>
                        <span>{{$purchase->company->company_name}}</span>
                    <br>
                    <br>
                    <strong>Invoice Details: </strong>
                        <span>{{$purchase->invoice_details}}</span>
                    <br>
                    <br>
                    <strong>Note: </strong>
                        <p>{{$purchase->note}}</p>
                </div>
                
                <div class="col-md-6">
                    @if ($purchase->product->category_status == 1)
                        <strong>Product Quantity: </strong>
                            <span>{{$usableStockSumQty}}</span>
                        <br>
                        <br>
                        <strong>Per Unit Price: </strong>
                            <span>৳ {{$usableStockSumUprc}}</span>
                        <br>
                        <br>
                        <strong>Total Price: </strong>
                            <span>৳ {{$usableStockSumTprc}}</span>
                    @else
                        
                        @foreach ($stocks as $stock)                        
                            <strong>Product Quaddntiy: </strong>
                            <span>{{$stock->quantity}}</span>
                            <br>
                            <br>
                            <strong>Per Unit Price: </strong>
                            <span>৳ {{$stock->unit_price}}</span>
                            <br>
                            <br>
                            <strong>Total Price: </strong>
                            <span>৳ {{$stock->total_price}}</span>
                            <br>
                            <br>
                            <strong>Exp. Date: </strong>
                            <span>{{$stock->exp_date}}</span>
                            <br>
                            <br>
                        @endforeach
                    @endif
                    {{-- {{$stocks->quantity}} --}}
                </div>

            </div>

        </div>
    </div>
</div>

@endsection