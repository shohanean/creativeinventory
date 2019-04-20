@extends('layouts.dashboardapp')

@section('title', 'Supplier')
@section('active-supplier', 'opened')

@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header bg-success text-white">
                <strong>List of Suppliers</strong>
            </div>
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
                <table class="table table-bordered">
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
                    {{-- ->diffForHumans() --}}
                  </thead>
                  <tbody>
                  @forelse($suppliers as $supplier)
                    <tr>
                      <td>{{ $loop->index+1 }}</td>
                      <td>{{ $supplier->created_at->format('d-M-Y') }}</td>
                      <td>{{ $supplier->name }}</td>
                      <td>{{ $supplier->location }}</td>
                      <td>{{ $supplier->note }}</td>
                      <td>{{ $supplier->user->name }}</td>
                      <td>
                        <div class="btn-group btn-group-sm">
                            <form action="{{route('supplier.edit', $supplier->id)}}" method="GET">
                                <button type="submit" class="btn btn-primary-outline"><span class="glyphicon glyphicon-pencil"></span></button>
                            </form>
                            <form action="{{route('supplier.destroy', $supplier->id)}}" method="POST">
                              @csrf
                              @method('DELETE')
                                <button type="submit" class="btn btn-danger-outline"><span class="glyphicon glyphicon-trash"></span></button>
                            </form>
                        </div>
                      </td>
                    </tr>
                  @empty
                    <tr class="text-center">
                      <td colspan="7">No Supplier Found</td>
                    </tr>
                  @endforelse
                  </tbody>
                </table>
            </div>
        </div>
        <div class="card">
            <div class="card-header bg-danger text-white">
                <strong>Deleted Suppliers List</strong>
            </div>
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

                <table class="table table-bordered">
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
                      <td>{{ $trash->deleted_at->format('d-M-Y') }}</td>
                      <td>{{ $trash->name }}</td>
                      <td>{{ $trash->location }}</td>
                      <td>{{ $trash->note }}</td>
                      <td>{{ $trash->user->name }}</td>
                      <td>
                        <div class="btn-group btn-group-sm">
                          <a href="{{url('supplier/restore')}}/{{$trash->id}}" class="btn btn-success-outline"><span><i class="fas fa-trash-restore"></i></span></a>
                          <a href="{{url('supplier/force/delete')}}/{{$trash->id}}" class="btn btn-danger-outline"><span><i class="fas fa-eraser"></i></span></a>
                        </div>
                      </td>
                    </tr>
                  @empty
                    <tr class="text-center">
                      <td colspan="7">No Warehouse Found</td>
                    </tr>
                  @endforelse
                  </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-header bg-info text-white">
                <strong>Add Supplier</strong>
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
                <form action="{{ route('supplier.store') }}" method="post">
                @csrf
                    <div class="form-group">
                      <label>Supplier Name</label>
                      <input type="text" class="form-control" name="name" placeholder="Enter Supplier Name" value="{{old('name')}}">
                    </div>
                    <div class="form-group">
                      <label>Supplier Location</label>
                      <textarea name="location" class="form-control" placeholder="Enter supplier Location" value="{{old('location')}}"></textarea>
                    </div>
                    <div class="form-group">
                      <label></label>
                      <textarea name="note" class="form-control" placeholder="Add note (optional)" value=></textarea>
                    </div>
                    <button type="submit" class="btn btn-success">Add Supplier</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection