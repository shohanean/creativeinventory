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
        <h3>{{strtoupper($requisition->product->company->company_abbr) }}/{{strtoupper($requisition->product->name)}}-{{$requisition->product->unique_id}}</h3>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="card-body mt-3">
                <h2 class="text-center"> <strong>Requisition Details</strong> </h2>
                <strong>Requested by: </strong>
                <span>{{$requisition->user->name}}</span>
                {{-- <span>{{$requisition->user->company->company_name}}</span> --}}
                <br><br>
                <strong>Quantity: </strong>
                <span>{{$requisition->quantity}}</span>
                <br><br>
                <strong>Note: </strong>
                <p>{{$requisition->note}}</p>
                <br>
                @foreach ($assigns as $assign)
                    <div class="bg-danger text-center text-white p-1">
                        <h4><strong>{{strtoupper($requisition->product->company->company_abbr) }}/{{strtoupper($assign->product->name)}}-{{$requisition->product->unique_id}}</strong> is currently assigned to <strong>{{$assign->user->name}}</strong></h4>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="col-md-6">
            <div class="card-body mt-3">
                <h2 class="text-center"> <strong>Product Details</strong> </h2>
                <table class="table">
                    <thead>
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
                                        <div class="mx-auto">
                                            <button type="submit" class="btn btn-success">Assign</button>
                                        </div>
                                    </div>
                                </form>
                                </div>
                            </div>
                        @else
                            <div class="card">
                                @foreach ($assigns as $assign)
                                    
                                <div class="card-head">
                                </div>
                                <div class="card-body">
                                    <form action="{{ route('assign.update', $assign->id) }}" method="post">
                                        @method('patch')
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <label for="product_id">Product Name</label>     
                                                <select name="product_id" class="form-control" id="product_name" >
                                                    <option value="{{$requisition->product->id}}">{{strtoupper($requisition->product->company->company_abbr) }}/{{strtoupper($requisition->product->name)}}-{{$requisition->product->unique_id}}</option>
                                                </select>              
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="warehouse_id">Employee Name</label>     
                                                <select name="user_id" class="form-control" id="employee_name" >
                                                    <option value="{{$requisition->user->id}}">{{$requisition->user->name}}</option>
                                                </select>              
                                            </div>
                                            @csrf
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <button type="submit" class="btn btn-success">Re-Assign</button>
                                            </div>
                                            <div class="col-md-3">
                                                <a href="{{url('requisition/reject')}}/{{$requisition->id}}" class="btn btn-danger-outline">Reject</a>
                                            </div>
                                            @if (Auth::user()->role == 2)
                                                <div class="col-md-3">
                                                    <a href="{{url('requisition/forward')}}/{{$requisition->id}}" class="btn btn-info-outline">Forward</a>
                                                </div>
                                            @endif
                                        </div>
                                    </form>
                                </div>
                                @endforeach

                            </div>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection