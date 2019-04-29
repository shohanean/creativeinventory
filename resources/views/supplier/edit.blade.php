@extends('layouts.dashboardapp')

@section('title',  $supplier->name. ' edit' )
 
@section('content')
<div class="row">
    {{-- BREADCRUMB --}}
        <div class="col-md-12">
            <nav class="breadcrumb bg-white">
                <a class="breadcrumb-item" href="{{ route('home') }}">Dashboard</a>
                <a class="breadcrumb-item" href="{{ route('supplier.index') }}">Supplier</a>
                <span class="breadcrumb-item active">{{ $supplier->name }}</span>
            </nav>
        </div>
    </div>
<div class="row">
    <div class="col-md-12">
        <div class="card"> 
            <div class="card-header bg-dark text-white">
                Edit <em>{{$supplier->name}}</em>  info
            </div>
            <div class="card-body">
 {{---------- ERROR MESSAGES  ------------}}

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
 {{------------- FORM START  -------------}}
                <form action="{{route('supplier.update', $supplier->id)}}" method="post">
                @csrf
                @method('patch')
                    <div class="form-group">
                        <label>Supplier Name</label>
                        <input type="text" class="form-control" name="name" value="{{$supplier->name}}">
                    </div>
                    <div class="form-group">
                        <label>Supplier Location</label>
                        <textarea class="form-control" name="location">{{$supplier->location}}</textarea>
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" name="note" placeholder="Add note(optional)">{{$supplier->note}}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Edit Supplier</button>
                </form>
 {{-------------- FORM END ---------------}}
            </div>
        </div>
    </div>
</div>
@endsection