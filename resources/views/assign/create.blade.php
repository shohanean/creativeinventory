@extends('layouts.dashboardapp')

@section('title', 'Assign to employee')

@section('content')
{{---------------- BREADCRUMB  ---------------}}
<div class="row">
    <div class="col-md-12">
        <nav class="breadcrumb bg-white">
            <a class="breadcrumb-item" href="{{ route('home') }}">{{strtoupper('Dashboard')}}</a>
            <span class="breadcrumb-item active">{{strtoupper('Assign to employee')}}</span>
        </nav>
    </div>
</div>
<div class="col-md-10 offset-1">
        <div class="card">
            <div class="card-head text-center bg-dark text-white">
                <h4>Assign to Employee</h4>
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
            <form action="{{ route('assign.store') }}" method="post">
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
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="warehouse_id">Employee Name</label>     
                        <select name="user_id" class="form-control" id="employee_name" >
                            <option value="" >Select Employee</option>
                            @foreach ($users as $user)
                                <option value="{{$user->id}}">{{$user->name}}</option>
                            @endforeach
                        </select>              
                    </div>
                    <div class="form-group col-md-6">
                        <label for="product_id">Product Name</label>     
                        <select name="product_id" class="form-control" id="product_name" >
                            <option value="">Select product name</option>
                            @foreach ($products as $product)
                            <option value="{{$product->id}}">{{$product->name}}</option>
                            @endforeach
                        </select>              
                    </div>
                    @csrf
                    <button type="submit" class="btn btn-success">Assign to Employee</button>
                </div>
            </form>
            </div>
        </div>
    </div>
@endsection