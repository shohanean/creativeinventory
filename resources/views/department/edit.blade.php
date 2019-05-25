@extends('layouts.dashboardapp')

@section('title', 'Department Edit')

@section('content')
    <div class="col-md-4">
        <div class="card">
            <div class="card-header bg-dark text-white">
                <strong>EDIT DEPARTMENT</strong>
            </div>
            <div class="card-body">
{{----------- VALIDATION MESSAGES -------------}}
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
{{-------------- SUCCESS MESSAGES -------------}}              
                @if(session('success'))
                    <div class="alert alert-success alert-fill alert-border-left alert-close alert-dismissible fade show" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        {{ session('success') }}
                    </div>
                @endif
{{---------- FORM TO ADD INPUT ------------}}
                <form action="{{ route('department.update', $department->id) }}" method="post">
                    @method('patch')
                    <div class="form-group">
                      <label>Department Name</label>
                      <input type="text" class="form-control" name="department_name" placeholder="Enter department Name" value="{{ $department->department_name}}">
                    </div>
                
                    @csrf
                    <button type="submit" class="btn btn-success">Edit Department</button>
                </form>
            </div>
        </div>
    </div>
@endsection