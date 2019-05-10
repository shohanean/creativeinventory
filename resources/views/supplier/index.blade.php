@extends('layouts.dashboardapp')

@section('title', 'Supplier')
@section('active-supplier', 'opened')

@section('content')
{{------------ Breadcrumb --------------}}
<div class="row">
    <div class="col-md-12">
        <nav class="breadcrumb bg-white">
            <a class="breadcrumb-item" href="{{ route('home') }}">Dashboard</a>
            <span class="breadcrumb-item active">Suppliers</span>
        </nav>
    </div>
</div>
<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header bg-dark text-white">
                <strong>List of Suppliers</strong>
            </div>
            <div class="card-body">
{{---------- SUCCESS MESSAGES FOR SUPPLIERS LIST------------}}
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
{{------------- START SUPPLIER LIST TABLE ----------------}}
                <table class="table table-bordered" id="sup_table">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Created at</th>
                      <th>Supplier Name</th>
                      <th>Supplier Location</th>
                      <th>Note</th>
                      <th>Created By</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  @forelse($suppliers as $supplier)
                    <tr>
                      <td>{{ $loop->index+1 }}</td>
                      <td>{{ $supplier->created_at->format('d-M-y') }}</td>
                      <td>{{ $supplier->name }}</td>
                      <td>{{ $supplier->location }}</td>
                      <td>{{ $supplier->note }}</td>
                      <td>{{ $supplier->user->name }}</td>
                      <td>
                        <div class="btn-group btn-group-sm">
                            {{-- BUTTON TO EDIT  --}}
                            <a href="{{ route('supplier.edit', $supplier->id) }}" class="btn btn-primary-outline"><span><i class="fas fa-pencil-ruler"></i></span></a>
                            {{-- BUTTON TO DELETE  --}}
                            <form class="d-none" id="supplier-destroy-form" action="{{ route('supplier.destroy', $supplier->id) }}" method="POST">
                              @method('DELETE')
                              @csrf
                            </form>
                            <a href="{{ route('supplier.destroy', $supplier->id) }}" class="btn btn-danger-outline"
                              onclick="event.preventDefault();
                              document.getElementById('supplier-destroy-form').submit();">
                              <span><i class="fas fa-trash-alt"></i></span>
                            </a>
                        </div>
                      </td>
                    </tr>
                  @empty
                    <tr class="text-center text-danger">
                      <td colspan="7">No Supplier Found</td>
                    </tr>
                  @endforelse
                  </tbody>
                </table>
            </div>
        </div>
{{---------- END SUPPLIER LIST TABLE -------------}}
        <div class="card">
          <div class="card-header bg-dark text-white">
            <strong>Deleted Suppliers List</strong>
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
                <table class="table table-bordered" id="del_sup_list">
                  <thead>
                    <tr>
                        <th>#</th>
                        <th>Deleted at</th>
                        <th>Supplier Name</th>
                        <th>Supplier Location</th>
                        <th>Note</th>
                        <th>Created By</th>
                        <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  @forelse($trashed as $trash)
                    <tr>
                      <td>{{ $loop->index+1 }}</td>
                      <td>{{ $trash->deleted_at->format('d-M-y') }}</td>
                      <td>{{ $trash->name }}</td>
                      <td>{{ $trash->location }}</td>
                      <td>{{ $trash->note }}</td>
                      <td>{{ $trash->user->name }}</td>
                      <td>
                        <div class="btn-group btn-group-sm">
                          <a href="{{route('supplier.restore', $trash->id)}}" class="btn btn-success-outline"><span><i class="fas fa-trash-restore"></i></span></a>
                          <a id="{{route('supplier.forceDelete', $trash->id)}}" href="#" class="btn btn-danger-outline force-delete-btn"><span><i class="fas fa-eraser"></i></span></a>
                        </div>
                      </td>
                    </tr>
                  @empty
                    <tr class="text-center text-danger">
                      <td colspan="7">No Supplier Found</td>
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
                <strong>Add Supplier</strong>
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
                <form action="{{ route('supplier.store') }}" method="post">
                    <div class="form-group">
                      <label>Supplier Name</label>
                      <input type="text" class="form-control" name="name" placeholder="Enter Supplier Name" value="{{old('name')}}">
                    </div>
                    <div class="form-group">
                      <label>Supplier Location</label>
                      <textarea name="location" class="form-control" placeholder="Enter supplier Location" value="{{old('location')}}"></textarea>
                    </div>
                    {{-- <div class="form-group">
                      <label for="">Select Products</label>
                      <select name="product_id[]" id="" class="form-control" multiple="multiple">
                        @foreach ($products as $product)
                            <option value="{{$product->id}}" name="product_id">{{$product->name}}</option>
                        @endforeach
                      </select>
                    </div> --}}
                    <div class="form-group">
                      <label></label>
                      <textarea name="note" class="form-control" placeholder="Add note (optional)" value=></textarea>
                    </div>
                    @csrf
                    <button type="submit" class="btn btn-success">Add Supplier</button>
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
        $('#sup_table, #del_sup_list').DataTable();
    });
</script>
@endsection