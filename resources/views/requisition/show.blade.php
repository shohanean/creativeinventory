@extends('layouts.dashboardapp')

@section('title', 'Requisition Details')

@section('content')
{{---------------- BREADCRUMB  ---------------}}
<div class="row">
    <div class="col-md-12">
        <nav class="breadcrumb bg-white">
            <a class="breadcrumb-item" href="{{ route('home') }}">Dashboard</a>
            <span class="breadcrumb-item active">Requisition Details</span>
        </nav>
    </div>
</div>
<div class="card col-md-12">
    <div class="card-head p-2 bg-dark text-white text-center">
        <h3>{{strtoupper($requisition->product->name)}}</h3>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="card-body mt-3">
                <h2 class="text-center"> <strong>Requisition Details</strong> </h2>
                <table class="table">
                    <thead>
                        <tr>
                            <th>
                                <strong>Requested by</strong>
                            </th>
                            <th>
                                <strong>Quantity</strong>
                            </th>
                            <th>
                                <strong>Note</strong>
                            </th>
                            <th>
                                <strong>Product Status</strong>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{$requisition->user->name}}</td>
                            <td>{{$requisition->quantity}}</td>
                            <td>{{$requisition->note}}</td>
                            <td>
                                @foreach ($requisition->product->StatusName() as $StatusNamekey => $statusNameValue)
                                    {{$statusNameValue}}
                                @endforeach
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card-body mt-3">
                <h2 class="text-center"> <strong>Product Details</strong> </h2>
                <table class="table">
                    <thead>
                        {{-- <tr>
                            <th>
                                <strong>Requested by</strong>
                            </th>
                            <th>
                                <strong>Quantity</strong>
                            </th>
                            <th>
                                <strong>Note</strong>
                            </th>
                            <th>
                                <strong>Product Status</strong>
                            </th>
                        </tr> --}}
                    </thead>
                    <tbody>
                        @if ($requisition->product->assign_status == 1)
                        <div class="card">
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
                                                    <option value="{{$requisition->user->id}}">{{$requisition->user->name}}</option>
                                            </select>              
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="product_id">Product Name</label>     
                                            <select name="product_id" class="form-control" id="product_name" >
                                                <option value="{{$requisition->product->id}}">{{$requisition->product->name}}</option>
                                            </select>              
                                        </div>
                                        @csrf
                                        <button type="submit" class="btn btn-success">Assign to Employee</button>
                                    </div>
                                </form>
                                </div>
                            </div>
                        @else
                            
                        @endif
                        <tr>
                            <td>{{$requisition->user->name}}</td>
                            <td>{{$requisition->quantity}}</td>
                            <td>{{$requisition->note}}</td>
                            <td>
                                @foreach ($requisition->product->StatusName() as $StatusNamekey => $statusNameValue)
                                    {{$statusNameValue}}
                                @endforeach
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection