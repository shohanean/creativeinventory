@extends('layouts.dashboardapp')

@section('title', 'Company')
@section('active-company', 'opened')

@section('content')
<div class="row">
    <div class="col-md-12">
        <nav class="breadcrumb bg-white">
            <a class="breadcrumb-item" href="{{ route('home') }}">Dashboard</a>
            <span class="breadcrumb-item active">Company</span>
        </nav>
    </div>
</div>
<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                List Company
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Company Name</th>
                      <th>Company Location</th>
                      <th>Created</th>
                      <th>Created By</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  @forelse($companies as $company)
                    <tr>
                      <td>{{ $loop->index+1 }}</td>
                      <td>{{ $company->company_name }}</td>
                      <td>{{ $company->company_location }}</td>
                      <td>{{ $company->created_at->diffForHumans() }}</td>
                      <td>{{ $company->user->name }}</td>
                      <td>
                        <div class="btn-group btn-group-sm">
                            <form>
                                <a href="{{ route('company.edit', $company->id) }}" class="btn btn-info-outline"><span class="glyphicon glyphicon-pencil"></span></a>
                            </form>
                            <form action="{{ route('company.destroy', $company->id) }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-danger-outline"><span class="glyphicon glyphicon-trash"></span></button>
                            </form>
                        </div>
                      </td>
                    </tr>
                  @empty
                    <tr class="text-center text-danger">
                      <td colspan="6">No Company Found</td>
                    </tr>
                  @endforelse
                  </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-md-4">
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
                <form action="{{ route('company.store') }}" method="post">
                @csrf
                    <div class="form-group">
                      <label>Company Name</label>
                      <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                      <input type="text" class="form-control" name="company_name" placeholder="Enter Company Name">
                    </div>
                    <div class="form-group">
                      <label>Company Location</label>
                      <input type="text" class="form-control" name="company_location" placeholder="Enter Company Location">
                    </div>
                    <button type="submit" class="btn btn-primary">Add Company</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
