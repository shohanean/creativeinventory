@extends('layouts.dashboardapp')

@section('title', 'Assign to inventory')

@section('content')
{{---------------- BREADCRUMB  ---------------}}
<div class="row">
    <div class="col-md-12">
        <nav class="breadcrumb bg-white">
            <a class="breadcrumb-item" href="{{ route('home') }}">Dashboard</a>
            <span class="breadcrumb-item active">Allocate inventory</span>
        </nav>
    </div>
</div>
<div class="row">
    <div class="col-md-10 offset-1">
        <div class="card">
            <div class="card-head text-center bg-dark text-white">
                <h4>Allocate Inventory</h4>
            </div>
            <div class="card-body">
            {{-------------- SUCCESS MESSAGES -------------}}
                @if(session('success'))
                    <div class="alert alert-success alert-fill alert-border-left alert-close alert-dismissible fade show" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        {{ session('success') }}
                    </div>
                @endif
            {{-------------------- ERROR MESSAGE -----------------------}}
            <form action="{{ route('inventory.store') }}" method="post">
                @if($errors->all())
                    <div class="alert alert-danger alert-fill alert-border-left alert-close alert-dismissible fade show" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </div>
                @endif
                <div class="form-group">
                    <label for="product_id">Product Name</label>
                    <select name="stock_id" class="form-control" id="product_name" required>
                        <option value="">Select product name</option>
                        @foreach ($stocks as $stock)
                            @if ($stock->product->category_status == 1)
                                <option value="{{$stock->id}}"> {{$stock->product->name}} Qty: {{$stock->quantity}}</option>
                                {{-- <option value="{{$stock->product_id}}" hidden></option> --}}
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="warehouse_id">Warehouse Name</label>     
                    <select name="warehouse_id" class="form-control" id="warehouse_name" required>
                        <option value="" >Select warehouse</option>
                        @foreach ($warehouses as $warehouse)
                            <option value="{{$warehouse->id}}">{{$warehouse->name}}</option>
                        @endforeach
                    </select>              
                </div>
                <div class="mb-3">
                    <label for="unique_id">Unique ID</label>
                    <input type="text" name="unique_id" placeholder="I.e. CITI/MONITOR-30" class="form-control">
                </div>
                @csrf
                <button type="submit" class="btn btn-success">Allocate inventory</button>
            </form>
            </div>
        </div>
    </div>
</div>
@endsection
