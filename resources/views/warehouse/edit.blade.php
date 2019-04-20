@extends('layouts.dashboardapp')

@section('title', $warehouse->name. ' Edit' )
@section('active-warehouse', 'opened')

@section('content')
<div class="row">
    <div class="col-md-4 offset-4">
        <div class="card">
            <div class="card-header">
                Edit {{$warehouse->name}} Info
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
                <form action="{{url('warehouse')}}/{{$warehouse->id}}" method="post">
                @csrf
                @method('patch')
                    <div class="form-group">
                        <label>Warehouse Name</label>
                        <input type="text" class="form-control" name="name" value="{{$warehouse->name}}">
                    </div>
                    <div class="form-group">
                        <label>Warehouse Location</label>
                        <textarea class="form-control" name="location">{{$warehouse->location}}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Edit Warehouse</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
