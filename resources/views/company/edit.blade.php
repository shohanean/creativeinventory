@extends('layouts.dashboardapp')

@section('title', 'Company')
@section('active-company', 'opened')

@section('content')
<div class="row">
    <div class="col-md-4 offset-4">
        <nav class="breadcrumb bg-white">
            <a class="breadcrumb-item" href="{{ route('home') }}">Dashboard</a>
            <a class="breadcrumb-item" href="{{ route('company.index') }}">Company</a>
            <span class="breadcrumb-item active">RE</span>
        </nav>
    </div>
</div>
<div class="row">
    <div class="col-md-4 offset-4">
        <div class="card">
            <div class="card-header">
                Add Company
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
                @if(session('success'))
                    <div class="alert alert-success alert-fill alert-border-left alert-close alert-dismissible fade show" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        {{ session('success') }}
                    </div>
                @endif
                <form action="{{ route('company.update', $company->id) }}" method="post">
                @method('PATCH')
                @csrf
                    <div class="form-group">
                      <label>Company Name</label>
                      <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                      <input type="text" class="form-control" name="company_name" value="{{ $company->company_name }}">
                    </div>
                    <div class="form-group">
                      <label>Company Location</label>
                      <input type="text" class="form-control" name="company_location" value="{{ $company->company_location }}">
                    </div>
                    <button type="submit" class="btn btn-primary">Add Company</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
