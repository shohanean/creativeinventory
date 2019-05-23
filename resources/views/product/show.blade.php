@extends('layouts.dashboardapp')

@section('title', 'Product State Details')

@section('content')
    {{---------------- BREADCRUMB  ---------------}}
    <div class="row">
        <div class="col-md-12">
            <nav class="breadcrumb bg-white">
                <a class="breadcrumb-item" href="{{ route('home') }}">Dashboard</a>
                <span class="breadcrumb-item active">{{$product->name}} State Details</span>
            </nav>
        </div>
    </div>
<div class="col-md-10">
    <div class="card">
            {{-- @if($errors->all())
            <div class="alert alert-danger alert-fill alert-border-left alert-close alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </div>
            @endif --}}
        <div class="row">
            <div class="col-md-5">
                <div class="card-body">
                    <strong>Product Name: </strong>
                    <span>{{$product->name}}</span>
                    <br><br>
                    <strong>Unique Name: </strong>
                    <span>{{strtoupper($product->company->company_abbr)}}/{{strtoupper($product->name)}}-{{$product->unique_id}}</span>
                    <br><br>
                    <strong>Product Current Status: </strong>
                    <span>
                        @if ($product->active_status == 1)
                            <div><button class="btn btn-success">OKAY</button> </div>
                        @elseif ($product->active_status == 2)
                            <div><button class="btn btn-danger">NOT IN-SERVICE</button> </div>
                        @elseif ($product->active_status == 3)
                            <div><button class="btn btn-warning">LOST</button> </div>
                        @elseif ($product->active_status == 4)
                            <div><button class="btn btn-info">REPAIRING</button> </div>
                        @endif
                    </span>
                    <br><br>
                    @if($product->category_status == 2)
                        <div class="col-md-12">
                            <form action="{{route('product.changeState', $product->id)}}" method="post">
                                @method('patch')
                                    <select name="active_status" id="" class="form-control" required>
                                        <option value="1">OKAY</option>
                                        <option value="2">NOT IN-SERVICE</option>
                                        <option value="3">LOST</option>
                                        <option value="4">REPAIRING</option>
                                    </select>
                                @csrf
                                <button class="btn btn-secondary mt-3" type="submit">Change Product Status</button>
                            </form>
                        </div>
                    @endif
                </div>
            </div>
            <div class="col-md-5">
                <div class="card-body">
                    <strong>Product Name: </strong>
                    <span>{{$product->name}}</span>
                    <br><br>
                    <strong>Unique Name: </strong>
                    <span>{{strtoupper($product->company->company_abbr)}}/{{strtoupper($product->name)}}-{{$product->unique_id}}</span>
                    <br><br>
                    <strong>Product Current Status: </strong>
                    <span>
                        @if ($product->assign_status == 1)
                            <div >
                                <button class="btn btn-success">AVAILABLE</button>
                            </div>
                        @elseif ($product->assign_status == 2)
                            <div >
                                <button class="btn btn-danger">OCCUPIED</button>
                            </div>
                        @endif
                    </span>
                    <br><br>
                    @if($product->category_status == 2)
                        <div class="col-md-12">
                            {{$errors->first('assign_status')}}
                            <form action="{{route('product.changeAssignState', $product->id)}}" method="post">
                                @method('patch')
                                    <select name="assign_status" id="" class="form-control" required>
                                        <option value="1">ACAILABLE</option>
                                        <option value="2">OCCUPIED</option>
                                    </select>
                                @csrf
                                <button class="btn btn-secondary mt-3" type="submit">Change State</button>
                            </form>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

</div>
@endsection