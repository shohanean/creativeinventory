@extends('layouts.dashboardapp')

@section('title', 'Add Purchase record')

@section('content')
{{---------------- BREADCRUMB  ---------------}}
<div class="row">
    <div class="col-md-12">
        <nav class="breadcrumb bg-white">
            <a class="breadcrumb-item" href="{{ route('home') }}">Dashboard</a>
            <span class="breadcrumb-item active">Add Purchase</span>
        </nav>
    </div>
</div>
<div class="row">
    <div class="col-md-10 offset-1">
        <div class="card">
            <div class="card-head text-center bg-dark text-white">
                <span><h4>Enter product details</h4></span>
            </div>
            <div class="card-body">
                @if(session('success'))
                    <div class="alert alert-success alert-fill alert-border-left alert-close alert-dismissible fade show" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        {{ session('success') }}
                    </div>
                @endif
                <form action="{{ route('purchase.store') }}" method="post">
                    <div class="form-group">
                        <label for="company_id">Company Name</label>     
                        <select name="company_id" class="form-control" id="company_name">
                            <option value="">Select company name</option>
                            @foreach ($companies as $company)
                            <option value="{{$company->id}}" name="company_id">{{$company->company_name}}</option>
                            @endforeach
                        </select>              
                    </div>
                    <div class="form-group">
                        <label for="supplier_id">Supplier Name</label>     
                        <select name="supplier_id" class="form-control" id="supplier_name">
                            <option value="">Select supplier name</option>
                            @foreach ($suppliers as $supplier)
                            <option value="{{$supplier->id}}" name="supplier_id">{{$supplier->name}}</option>
                            @endforeach
                        </select>              
                    </div>
                    <div class="form-group">
                        <label for="product_id">Product Name</label>     
                        <select name="product_id" class="form-control" id="product_name">
                            <option value="">Select product name</option>
                            @foreach ($products as $product)
                            <option value="{{$product->id}}" name="product_id">{{$product->name}}</option>
                            @endforeach
                        </select>              
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-3">
                            <label class="text-center" for="">Quantity</label>
                            <input class="form-control" type="number" name="quantity" placeholder="Quantity" value="{{old('quantity')}}">
                            <div class="error">
                                {{$errors->first('quantity')}}
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label class="text-center" for="">Unit Price</label>
                            <input class="form-control" type="number" name="unit_price" placeholder="unit_price">
                            <div class="error">
                                {{$errors->first('unit_price')}}
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label class="text-center" for="">Total Price</label>
                            <input class="form-control" type="number" placeholder="Enter the total Price" name="total_price" value="{{old('total_price')}}">
                            <div class="error">
                                {{$errors->first('total_price')}}
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="exp_date">Exp. date</label>
                            <i class="far fa-calendar-alt"></i>
                            <input type="text" name="exp_date" id="exp_date">
                            <div class="error">
                                {{$errors->first('exp_date')}}
                            </div>
                        </div>
                    </div>
                    @csrf
                    <button type="submit" class="btn btn-success">Add purchase details</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('footer_scripts')
    <script>
        $(function(){
            $("#exp_date").datepicker();
            $("#company_name, #supplier_name, #product_name").select2();
        });
    </script>
@endsection