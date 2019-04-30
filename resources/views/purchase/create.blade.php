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
                    {{-- <div class="form-group">
                        <label>Product Name</label>
                        <input type="text" class="form-control" name="name" placeholder="Enter Product Name" value="{{old('name')}}">
                        <div class="error">
                            {{$errors->first('name')}}
                        </div>
                    </div> --}}
                    <div class="form-group">     
                        <select name="purchase_id" class="form-control">
                            @foreach ($products as $product)
                            <option value="{{$product->id}}" name="product_id">{{$product->name}}</option>
                            @endforeach
                        </select>              
                    </div>
                    @csrf
                    <button type="submit" class="btn btn-success">Add product</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection