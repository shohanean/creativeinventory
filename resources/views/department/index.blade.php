@extends('layouts.dashboardapp')

@section('title', 'Department')
@section('active-department', 'opened')

@section('content')
<div class="row">
    <div class="col-md-12">
        <nav class="breadcrumb bg-white">
            <a class="breadcrumb-item" href="{{ route('home') }}">DASHBOARD</a>
            <span class="breadcrumb-item active">DEPARTMENT</span>
        </nav>
    </div>
</div>
<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header bg-dark text-white">
                <strong>LIST OF DEPARTMENTS</strong>
            </div>
            <div class="card-body">
{{---------- SUCCESS MESSAGES FOR DEPARTMENT LIST--------------}}
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
{{------------- START DEPARTMENT LIST TABLE ----------------}}
                <table class="table table-bordered" id="cat_list">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Department Name</th>
                      <th>Created At</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  @forelse($departments as $department)
                    <tr>
                      <td>{{ $loop->index+1 }}</td>
                      <td>{{ $department->department_name }}</td>
                      <td>{{ $department->created_at->diffForHumans() }}</td>
                      <td>
                        <div class="btn-group btn-group-sm">
                            {{-- BUTTON TO EDIT  --}}
                            <a href="{{ route('department.edit', $department->id) }}" class="btn btn-primary-outline"><span><i class="fas fa-pencil-ruler"></i></span></a>
                            {{-- BUTTON TO DELETE  --}}
                            <form class="d-none" id="department-destroy-form" action="{{ route('department.destroy', $department->id) }}" method="POST">
                              @method('DELETE')
                              @csrf
                            </form>
                            <a href="{{ route('department.destroy', $department->id) }}" class="btn btn-danger-outline"
                              onclick="event.preventDefault();
                              document.getElementById('department-destroy-form').submit();">
                              <span><i class="fas fa-trash-alt"></i></span>
                            </a>
                        </div>
                      </td>
                    </tr>
                  @empty
                    <tr class="text-center text-danger">
                      <td colspan="4">No Departments Found</td>
                    </tr>
                  @endforelse
                  </tbody>
                </table>
            </div>
        </div>
{{---------- END department LIST TABLE -------------}}
        <div class="card">
            <div class="card-header bg-dark text-white">
                <strong>DELETED DEPARTMENT LIST</strong>
            </div>
{{----------DELETED department SUCCESS MESSAGES -------------}}
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
{{----------START DELETED department LIST TABLE -------------}}
                <table class="table table-bordered" id="del_cat_list">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>department Name</th>
                      <th>Deleted at</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  @forelse($trashed as $trash)
                    <tr>
                      <td>{{ $loop->index+1 }}</td>
                      <td>{{ $trash->department_name }}</td>
                      <td>{{ $trash->deleted_at->diffForHumans() }}</td>
                      <td>
                        <div class="btn-group btn-group-sm">
                          <a href="{{ route('department.restore', $trash->id) }}" class="btn btn-success-outline"><span><i class="fas fa-trash-restore"></i></span></a>
                          <a id="{{ route('department.forceDelete', $trash->id) }}" href="#" class="btn btn-danger-outline force-delete-btn"><span><i class="fas fa-eraser"></i></span></a>
                        </div>
                      </td>
                    </tr>
                  @empty
                    <tr class="text-center text-danger">
                      <td colspan="4">No Deleted Department Found</td>
                    </tr>
                  @endforelse
                  </tbody>
                </table>
 {{----------END DELETED department LIST TABLE -------------}}
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-header bg-dark text-white">
                <strong>ADD DEPARTMENT</strong>
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
                <form action="{{ route('department.store') }}" method="post">
                @csrf
                    <div class="form-group">
                      <label>Department Name</label>
                      <input type="text" class="form-control" name="department_name" placeholder="Enter department Name" value="{{ old('name') }}">
                    </div>
                    <button type="submit" class="btn btn-success">Add department</button>
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
        $('#cat_list, #del_cat_list').DataTable();
    });
</script>
@endsection



