@extends('layouts.dashboardapp')

@section('title', 'Edit '.$product->name)

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
                <span><h4>Edit {{$product->name}} details</h4></span>
            </div>
            <div class="card-body">
                <form action="{{ route('product.update',$product->id) }}" method="post">
                    @method('patch')
                    <div class="form-group">
                        <label>Product Name</label>
                        <input type="text" class="form-control" name="name" placeholder="Enter Product Name" value="{{$product->name}}">
                        <div class="error">
                            {{$errors->first('name')}}
                        </div>
                    </div>
                    <div class="form-group">     
                        <select name="warehouse_id" class="form-control" id="warehouse_name">
                            <label>Warehouse Name</label>
                            {{-- <option value="">Select warehouse name</option> --}}
                            @foreach ($warehouses as $warehouse)
                            <option value="{{$warehouse->id}}" name="warehouse_id" {{ ($warehouse->id == $product->warehouse_id) ? "selected":"" }}>{{$warehouse->name}}</option>
                            @endforeach
                        </select>  
                    </div>
                    <div class="form-group">     
                        <select name="category_id" class="form-control" id="category_name">
                            <label>Category Name</label>
                            {{-- <option value="">Select category name</option> --}}
                            @foreach ($categories as $category)
                            <option value="{{$category->id}}" name="category_id" {{ ($category->id == $product->category_id) ? "selected":"" }}>{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    @csrf
                    <button type="submit" class="btn btn-success">Edit product</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('footer_scripts')
    <script>
    $(function(){
        $("#warehouse_name, #category_name").select2();
    });
    </script>
@endsection