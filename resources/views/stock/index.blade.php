@extends('layouts.dashboardapp')

@section('title', 'Inventory list')
@section('active-stock', 'opened')

@section('content')
{{-- <div class="row">
    <div class="col-md-12 py-5">
        <table class="table table-bordered" id="stock_table_sum">
                <div class="col-md-12 text-center bg-secondary p-2 text-white"> <strong>Stock List</strong></div>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Created at</th>
                    <th>Product Name</th>
                    <th>Total Quantity</th>
                    <th>Avg.Unit Price</th>
                    <th>Total Average Price</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>{{$loop->index+1}}</td>
                        <td>{{$product->sum()}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div> --}}
{{-- STOCK LIST --}}
<div class="row">
    <div class="col-md-12">
        <table class="table table-bordered" id="stock_table">
                <div class="col-md-12 text-center bg-secondary p-2 text-white"> <strong>Inventory List</strong></div>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Created at</th>
                    <th>Product Name</th>
                    <th>Quantity</th>
                    <th>Unit Price</th>
                    <th>Total Price</th>
                    <th>Exp. Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($stocks as $stock)
                    @if ($stock->quantity !== 0)                    
                        <tr>
                            <td>{{$loop->index+1}}</td>
                            <td>{{$stock->created_at}}</td>
                            <td>{{$stock->product->name}}</td>
                            <td>{{$stock->quantity}}</td>
                            <td>৳ {{$stock->unit_price}}tk</td>
                            <td>৳ {{$stock->total_price}}tk</td>
                            <td>{{$stock->exp_date}}</td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

@section('footer_scripts')
<script>
    $(document).ready( function () {
        $('#stock_table, #stock_table_sum').DataTable();
    } );
</script>
@endsection