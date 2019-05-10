@extends('layouts.dashboardapp')

@section('title', 'Warehouse')
@section('active-warehouse', 'opened')

@section('content')
<div class="row">
    <div class="col-md-12">
        <nav class="breadcrumb bg-white">
            <a class="breadcrumb-item" href="{{ route('home') }}">Dashboard</a>
            <span class="breadcrumb-item active">Warehouse</span>
        </nav>
    </div>
</div>
<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header bg-dark text-white">
                <strong>List of Warehouses</strong>
            </div>
            <div class="card-body">
{{---------- SUCCESS MESSAGES FOR WAREHOUSES LIST--------------}}
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
{{------------- START WAREHOUSE LIST TABLE ----------------}}
                <table class="table table-bordered" id="war_list">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Warehouse Name</th>
                      <th>Warehouse Location</th>
                      <th>Created</th>
                      <th>Created By</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  @forelse($warehouses as $warehouse)
                    <tr>
                      <td>{{ $loop->index+1 }}</td>
                      <td>{{ $warehouse->name }}</td>
                      <td>{{ $warehouse->location }}</td>
                      <td>{{ $warehouse->created_at->diffForHumans() }}</td>
                      <td>{{ $warehouse->user->name }}</td>
                      <td>
                        <div class="btn-group btn-group-sm">
                            {{-- BUTTON TO EDIT  --}}
                            <a href="{{ route('warehouse.edit', $warehouse->id) }}" class="btn btn-primary-outline"><span><i class="fas fa-pencil-ruler"></i></span></a>
                            {{-- BUTTON TO DELETE  --}}
                            <form class="d-none" id="warehouse-destroy-form" action="{{ route('warehouse.destroy', $warehouse->id) }}" method="POST">
                              @method('DELETE')
                              @csrf
                            </form>
                            <a href="{{ route('warehouse.destroy', $warehouse->id) }}" class="btn btn-danger-outline"
                              onclick="event.preventDefault();
                              document.getElementById('warehouse-destroy-form').submit();">
                              <span><i class="fas fa-trash-alt"></i></span>
                            </a>
                        </div>
                      </td>
                    </tr>
                  @empty
                    <tr class="text-center text-danger">
                      <td colspan="6">No Warehouse Found</td>
                    </tr>
                  @endforelse
                  </tbody>
                </table>
            </div>
        </div>
{{---------- END SUPPLIER LIST TABLE -------------}}
        <div class="card">
            <div class="card-header bg-dark text-white">
                <strong>Deleted Warehouse List</strong>
            </div>
{{----------DELETED SUPPLIER SUCCESS MESSAGES -------------}}
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
{{----------START DELETED SUPPLIER LIST TABLE -------------}}
                <table class="table table-bordered" id="del_war_list">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Warehouse Name</th>
                      <th>Warehouse Location</th>
                      <th>Deleted</th>
                      <th>Created By</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  @forelse($trashed as $trash)
                    <tr>
                      <td>{{ $loop->index+1 }}</td>
                      <td>{{ $trash->name }}</td>
                      <td>{{ $trash->location }}</td>
                      <td>{{ $trash->deleted_at->diffForHumans() }}</td>
                      <td>{{ $trash->user->name }}</td>
                      <td>
                        <div class="btn-group btn-group-sm">
                          <a href="{{ route('warehouse.restore', $trash->id) }}" class="btn btn-success-outline"><span><i class="fas fa-trash-restore"></i></span></a>
                          <a id="{{ route('warehouse.forceDelete', $trash->id) }}" href="#" class="btn btn-danger-outline force-delete-btn"><span><i class="fas fa-eraser"></i></span></a>
                        </div>
                      </td>
                    </tr>
                  @empty
                    <tr class="text-center text-danger">
                      <td colspan="6">No Deleted Warehouse Found</td>
                    </tr>
                  @endforelse
                  </tbody>
                </table>
 {{----------END DELETED SUPPLIER LIST TABLE -------------}}
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-header bg-dark text-white">
                <strong>Add Warehouse</strong>
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
                <form action="{{ route('warehouse.store') }}" method="post">
                @csrf
                    <div class="form-group">
                      <label>Warehouse Name</label>
                      <input type="text" class="form-control" name="name" placeholder="Enter Warehouse Name" value="{{ old('name') }}">
                    </div>
                    <div class="form-group">
                      <label>Warehouse Location</label>
                      <textarea class="form-control" name="location" placeholder="Enter Warehouse Location" value="{{ old('location') }}"></textarea>
                    </div>
                    <button type="submit" class="btn btn-success">Add Warehouse</button>
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
        $('#war_list, #del_war_list').DataTable()
    });
</script>
@endsection



