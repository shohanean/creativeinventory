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
            <div class="card-header bg-dark text-white">
                <strong>List Company</strong>
            </div>
            <div class="card-body">

{{---------- SUCCESS MESSAGES FOR LIST COMPANY --------------}}

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
{{------------- START COMPANY LIST TABLE ----------------}}
                <table class="table table-bordered" id="com_list">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Company Abbreviation</th>
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
                      <td>{{ $company->company_abbr }}</td>
                      <td>{{ $company->company_name }}</td>
                      <td>{{ $company->company_location }}</td>
                      <td>{{ $company->created_at->diffForHumans() }}</td>
                      <td>{{ $company->user->name }}</td>
                      <td>
                        <div class="btn-group btn-group-sm">
                            {{-- BUTTON TO EDIT  --}}
                            <a href="{{ route('company.edit', $company->id) }}" class="btn btn-primary-outline"><span><i class="fas fa-pencil-ruler"></i></span></a>
                            {{-- BUTTON TO DELETE  --}}
                            <form class="d-none" id="company-destroy-form" action="{{ route('company.destroy', $company->id) }}" method="POST">
                              @method('DELETE')
                              @csrf
                            </form>
                            <a href="{{ route('company.destroy', $company->id) }}" class="btn btn-danger-outline"
                              onclick="event.preventDefault();
                              document.getElementById('company-destroy-form').submit();">
                              <span><i class="fas fa-trash-alt"></i></span>
                            </a>
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
{{---------- END COMPANY LIST TABLE -------------}}
        <div class="card">
            <div class="card-header bg-dark text-white">
                <strong>Deleted Company List</strong>
            </div>
{{----------DELETED COMPANY SUCCESS MESSAGES -------------}}
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
{{----------START DELETED COMPANY LIST TABLE -------------}}
                <table class="table table-bordered" id="del_com_list">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Company Abbreviation</th>
                      <th>Company Name</th>
                      <th>Company Location</th>
                      <th>Deleted</th>
                      <th>Created By</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  @forelse($trashed as $trash)
                    <tr>
                      <td>{{ $loop->index+1 }}</td>
                      <td>{{ $trash->company_abbr }}</td>
                      <td>{{ $trash->company_name }}</td>
                      <td>{{ $trash->company_location }}</td>
                      <td>{{ $trash->deleted_at->diffForHumans() }}</td>
                      <td>{{ $trash->user->name }}</td>
                      <td>
                        <div class="btn-group btn-group-sm">
                          <a href="{{route('company.restore', $trash->id)}}" class="btn btn-success-outline"><span><i class="fas fa-trash-restore"></i></span></a>
                          <a id="{{route('company.forceDelete', $trash->id)}}" href="#" class="btn btn-danger-outline force-delete-btn"><span><i class="fas fa-eraser"></i></span></a>
                        </div>
                      </td>
                    </tr>
                  @empty
                    <tr class="text-center text-danger">
                      <td colspan="6">No Deleted Company Found</td>
                    </tr>
                  @endforelse
                  </tbody>
                </table>
 {{----------END DELETED COMPANY LIST TABLE -------------}}
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-header bg-dark text-white">
                <strong>Add Company</strong>
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
                <form action="{{ route('company.store') }}" method="post">
                @csrf
                    <div class="form-group">
                      <label>Company Name</label>
                      <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                      <input type="text" class="form-control" name="company_name" placeholder="Enter Company Name" value="{{old('company_name')}}">
                    </div>
                    <div class="form-group">
                      <label>Company Abbreviation</label>
                      <input type="text" class="form-control" name="company_abbr" placeholder="e.g. Creative IT (Abbreviation: CIT)" value="">
                    </div>
                    <div class="form-group">
                      <label>Company Location</label>
                      <textarea name="company_location" class="form-control" placeholder="Enter company Location" value="{{old('company_location')}}"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Add Company</button>
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
        $('#com_list, #del_com_list').DataTable();
    });
</script>
@endsection