@extends('layouts.dashboardapp')

@section('title', 'Employee')
@section('active-employee', 'opened')

@section('content')
<div class="row">
    <div class="col-md-12">
        <nav class="breadcrumb bg-white">
            <a class="breadcrumb-item" href="{{ route('home') }}">Dashboard</a>
            <span class="breadcrumb-item active">employee</span>
        </nav>
    </div>
</div>
@noerror
<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header bg-dark text-white">
                <strong>List Employees</strong>
            </div>
            {{---------- SUCCESS MESSAGES FOR LIST employee --------------}}
            <div class="card-body">
                @if(session('status'))
                  <div class="alert alert-success alert-fill alert-border-left alert-close alert-dismissible fade show" role="alert">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">×</span>
                      </button>
                      {{ session('status') }}
                  </div>
                @endif
                @if(session('delete'))
                  <div class="alert alert-warning alert-fill alert-border-left alert-close alert-dismissible fade show" role="alert">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">×</span>
                      </button>
                      {{ session('delete') }}
                  </div>
                @endif
{{------------- START EMPLOYEE LIST TABLE ----------------}}
                <table class="table table-bordered" id="employee_list">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Employee Name</th>
                      <th>Employee Department</th>
                      <th>Employee number</th>
                      <th>Employee Email</th>
                      {{-- <th>Created</th> --}}
                      <th>Created By</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  @forelse($employees as $employee)
                    <tr>
                      <td>{{ $loop->index+1 }}</td>
                      <td>{{ $employee->user->name }}</td>
                      <td>{{ $employee->department->department_name }}</td>
                      <td>{{ $employee->employee_no }}</td>
                      <td>{{ $employee->user->email }}</td>
                      {{-- <td>{{ $employee->created_at->diffForHumans() }}</td> --}}
                      <td>{{ $employee->added_by }}</td>
                      <td>
                        <div class="btn-group btn-group-sm">
                            {{-- BUTTON TO EDIT  --}}
                            <a href="{{ route('employee.edit', $employee->id) }}" class="btn btn-primary-outline"><span><i class="fas fa-pencil-ruler"></i></span></a>
                            {{-- BUTTON TO DELETE  --}}
                            <form class="d-none" id="employee-destroy-form" action="{{ route('employee.destroy', $employee->id) }}" method="POST">
                              @method('DELETE')
                              @csrf
                            </form>
                            <a href="{{ route('employee.destroy', $employee->id) }}" class="btn btn-danger-outline"
                              onclick="event.preventDefault();
                              document.getElementById('employee-destroy-form').submit();">
                              <span><i class="fas fa-trash-alt"></i></span>
                            </a>
                        </div>
                      </td>
                    </tr>
                  @empty
                    <tr class="text-center text-danger">
                      <td colspan="7">No Employee Found</td>
                    </tr>
                  @endforelse
                  </tbody>
                </table>
            </div>
        </div>
{{---------- END employee LIST TABLE -------------}}
        <div class="card">
            <div class="card-header bg-dark text-white">
                <strong>Deleted Employee List</strong>
            </div>
{{----------DELETED employee SUCCESS MESSAGES -------------}}
            <div class="card-body">
                    @if(session('restore'))
                      <div class="alert alert-success alert-fill alert-border-left alert-close alert-dismissible fade show" role="alert">
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">×</span>
                          </button>
                          {{ session('restore') }}
                      </div>
                    @endif
                    @if(session('forced'))
                      <div class="alert alert-danger alert-fill alert-border-left alert-close alert-dismissible fade show" role="alert">
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">×</span>
                          </button>
                          {{ session('forced') }}
                      </div>
                    @endif
{{----------START DELETED EMPLOYEE LIST TABLE -------------}}
                <table class="table table-bordered" id="del_employee_list">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Employee Name</th>
                      <th>Employee Department</th>
                      <th>Employee number</th>
                      <th>Employee Email</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  @forelse($trashed as $trash)
                    <tr>
                      <td>{{ $loop->index+1 }}</td>
                      <td>{{ $trash->department->name }}</td>
                      <td>{{ $trash->employee_no }}</td>
                      <td>{{ $trash->user->email }}</td>
                      <td>{{ $trash->user->name }}</td>
                      <td>
                        <div class="btn-group btn-group-sm">
                          <a href="{{route('employee.restore', $trash->id)}}" class="btn btn-success-outline"><span><i class="fas fa-trash-restore"></i></span></a>
                          <a id="{{route('employee.forceDelete', $trash->id)}}" href="#" class="btn btn-danger-outline force-delete-btn"><span><i class="fas fa-eraser"></i></span></a>
                        </div>
                      </td>
                    </tr>
                  @empty
                    <tr class="text-center text-danger">
                      <td colspan="7">No Deleted employee Found</td>
                    </tr>
                  @endforelse
                  </tbody>
                </table>
 {{----------END DELETED employee LIST TABLE -------------}}
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-header bg-dark text-white">
                <strong>Add Employee</strong>
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
                <form action="{{ route('employee.store') }}" method="post">
                @csrf
                    <div class="form-group">
                      <label>Department Name</label>
                      <select name="department_id" class="form-control" id="dept_select">
                          <option value="">-Select One-</option>
                          @foreach ($departments as $department)
                            <option value="{{ $department->id }}">{{ $department->department_name }}</option>
                          @endforeach
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Employee Name</label>
                      <input type="text" class="form-control" name="employee_name" placeholder="Enter Employee Name" value="{{ old('employee_name') }}">
                    </div>
                    <div class="form-group">
                      <label>Employee No</label>
                      <input type="text" class="form-control" name="employee_no" placeholder="Enter Employee No" value="{{ old('employee_no') }}">
                    </div>
                    <div class="form-group">
                      <label>Email Address</label>
                      <input type="text" class="form-control" name="email_address" placeholder="Enter Email Address" value="{{ old('email_address') }}">
                    </div>
                    <button type="submit" class="btn btn-primary">Add Employee</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('footer_scripts')
{{-- SWEET ALERT CODE --}}
<script>
    $(document).ready(function () {
        $('.force-delete-btn').click(function () {
            var linktogo = $(this).attr('id');
        swal({
            title: "Are you sure?",
            text: "You will not be able to recover this data!",
            type: "warning",
            showCancelButton: true,
            confirmButtonClass: "btn-danger",
            confirmButtonText: "Yes, delete it!",
            cancelButtonText: "No, cancel!",
            closeOnConfirm: false,
            closeOnCancel: false
        },
        function(isConfirm) {
            if (isConfirm) {
                window.location.href = linktogo;
            } else {
                swal({
                    title: "Cancelled",
                    text: "Your data is safe :)",
                    type: "error",
                    confirmButtonClass: "btn-danger"
                });
            }
        });
        });
        $('#dept_select').select2();
    });
</script>
@endsection
