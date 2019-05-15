@extends('layouts.dashboardapp')

@section('title', 'Company')
@section('active-company', 'opened')

@section('content')
<div class="row">
    {{-- BREADCRUMB --}}
    <div class="col-md-12">
        <nav class="breadcrumb bg-white">
            <a class="breadcrumb-item" href="{{ route('home') }}">Dashboard</a>
            <a class="breadcrumb-item" href="{{ route('company.index') }}">Company</a>
            <span class="breadcrumb-item active">{{$company->company_name}}</span>
        </nav>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header bg-dark text-white">
                Edit <em>{{$company->company_name}}</em> Company
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

 {{-------- SUCCESS MESSAGES  -------------}}

                @if(session('success'))
                    <div class="alert alert-success alert-fill alert-border-left alert-close alert-dismissible fade show" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        {{ session('success') }}
                    </div>
                @endif

 {{------------- FORM START  -------------}}

                <form action="{{ route('company.update', $company->id) }}" method="POST">
                @method('PATCH')
                @csrf
                    <div class="form-group">
                      <label>Company Name</label>
                      <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                      <input type="text" class="form-control" name="company_name" value="{{ $company->company_name }}">
                    </div>
                    <div class="form-group">
                      <label>Company Abbreviation</label>
                      <input type="text" class="form-control" name="company_abbr" value="{{ $company->company_abbr }}">
                    </div>
                    <div class="form-group">
                      <label>Company Location</label>
                      <textarea class="form-control" name="company_location" value="{{ $company->company_location }}">{{ $company->company_location }}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Add Company</button>
                </form>
 {{-------------- FORM END ---------------}}
            </div>
        </div>
    </div>
</div>
@endsection
