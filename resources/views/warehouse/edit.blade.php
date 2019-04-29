@extends('layouts.dashboardapp')

@section('title', $warehouse->name. ' Edit' )

@section('content')
<div class="row">
    {{-- BREADCRUMB --}}
    <div class="col-md-12">
        <nav class="breadcrumb bg-white">
            <a class="breadcrumb-item" href="{{ route('home') }}">Dashboard</a>
            <a class="breadcrumb-item" href="{{ route('warehouse.index') }}">Warehouse</a>
            <span class="breadcrumb-item active">{{ $warehouse->name }}</span>
        </nav>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header bg-dark text-white">
                Edit <em>{{ $warehouse->name }}</em> Info
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
                <form action="{{ route('warehouse.update', $warehouse->id) }}" method="POST">
                @method('patch')
                @csrf
                    <div class="row">
                        <div class="form-group col-md-5">
                            <label>Warehouse Name</label>
                            <input type="text" class="form-control" name="name" value="{{ $warehouse->name }}">
                        </div>
                        <div class="form-group col-md-5">
                            <label>Warehouse Location</label>
                            <textarea type="text" class="form-control" name="location" value="{{ $warehouse->location }}">{{ $warehouse->location }}</textarea>
                        </div>
                        <div class="form-group col-md-2">
                            <label>&nbsp;</label>
                            <button type="submit" class="btn btn-primary">Edit Warehouse</button>
                        </div>
                    </div>
                </form>
 {{-------------- FORM END ---------------}}
            </div>
        </div>
    </div>
</div>
@endsection
