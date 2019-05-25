@extends('layouts.dashboardapp')

@section('title', 'Edit Employee')

@section('content')
<div class="row">
    {{-- BREADCRUMB --}}
    <div class="col-md-12">
        <nav class="breadcrumb bg-white">
            <a class="breadcrumb-item" href="{{ route('home') }}">Dashboard</a>
            <a class="breadcrumb-item" href="{{ route('employee.index') }}">Employee</a>
            <span class="breadcrumb-item active">{{$employee->user->name}}</span>
        </nav>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header bg-dark text-white">
                Edit <em>{{$employee->employee_name}}</em>
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

                <form action="{{ route('employee.update', $employee->id) }}" method="POST">
                @method('PATCH')
                @csrf
                {{-- <div class="form-group">
                    <label>Department Name</label>
                    <select name="department_id" class="form-control" id="dept_select">
                        <option value="">-Select One-</option>
                        @foreach ($departments as $department)
                          <option value="{{ $department->id }}">{{ $department->department_name }}</option>
                        @endforeach
                    </select>
                  </div> --}}
                    <div class="form-group">
                      <label>Employee Name</label>
                      {{-- <input type="hidden" name="user_id" value="{{ Auth::id() }}"> --}}
                      <input type="text" class="form-control" name="name" value="{{ $employee->user->name }}">
                    </div>
                    <div class="form-group">
                        <label>Employee No</label>
                        <input type="text" class="form-control" name="employee_no" placeholder="Enter Employee No" value="{{ $employee->employee_no }}">
                    </div>
                    <div class="form-group">
                        <label>Email Address</label>
                        <input type="text" class="form-control" name="email" placeholder="Enter Email Address" value="{{ $employee->user->email }}">
                    </div>
                    {{-- <div class="form-group">
                      <label>Company Location</label>
                      <textarea class="form-control" name="company_location" value="{{ $company->company_location }}">{{ $company->company_location }}</textarea>
                    </div> --}}
                    <button type="submit" class="btn btn-primary">Edit Employee</button>
                </form>
 {{-------------- FORM END ---------------}}
            </div>
        </div>
    </div>
</div>
@endsection