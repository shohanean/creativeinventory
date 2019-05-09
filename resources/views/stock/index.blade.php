@extends('layouts.dashboardapp')

@section('title', 'Inventory list')
@section('active-stock', 'opened')

@section('content')
<div class="col-md-12 text-center bg-secondary p-2 text-white"> <strong>Stock List</strong></div>
<div class="row">
    <div class="col-md-12">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Product Name</th>
                    <th>Quantity</th>
                    <th>Unit Price</th>
                    <th>Total Price</th>
                    <th>Exp. Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($stocks as $stock)
                    <tr>
                        <td>{{$loop->index+1}}</td>
                        <td>{{$stock->product->name}}</td>
                        <td>{{$stock->quantity}}</td>
                        <td>৳ {{$stock->unit_price}}</td>
                        <td>৳ {{$stock->total_price}}</td>
                        <td>{{$stock->exp_date}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection