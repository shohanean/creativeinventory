@extends('layouts.dashboardapp')

@section('title', $supplier->name. ' edit' )
 
@section('content')
<div class="row">
    <div class="col-md-4 offset-4">
        <div class="card">
            <div class="card-header bg-info text-white">
                Edit {{$supplier->name}} info
            </div>
            <div class="card-body">
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
            </div>
        </div>
    </div>
</div>
@endsection