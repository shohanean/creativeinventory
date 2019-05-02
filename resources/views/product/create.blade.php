@extends('layouts.dashboardapp')

@section('title', 'Add Product')

@section('content')
<div class="row">
    <div class="col-md-12">
        <nav class="breadcrumb bg-white">
            <a class="breadcrumb-item" href="{{ route('home') }}">Dashboard</a>
            <span class="breadcrumb-item active">Add product</span>
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
                <form action="{{ route('product.store') }}" method="post">
                    <div class="form-group">
                        <label>Product Name</label>
                        <input type="text" class="form-control" name="name" placeholder="Enter Product Name" value="{{old('name')}}">
                        <div class="error">
                            {{$errors->first('name')}}
                        </div>
                    </div>
                    <div class="form-group">
                            <label>Warehouse Name</label>     
                        <select name="warehouse_id" class="form-control">
                            @foreach ($warehouses as $warehouse)
                            <option value="{{$warehouse->id}}" name="warehouse_id">{{$warehouse->name}}</option>
                            @endforeach
                        </select>              
                    </div>
                    <div class="form-group">
                        <label>Category Name</label>     
                        <select name="category_id" class="form-control">
                            @foreach ($categories as $category)
                            <option value="{{$category->id}}" name="category_id">{{$category->name}}</option>
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