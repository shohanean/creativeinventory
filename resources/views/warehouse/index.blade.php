@extends('layouts.dashboardapp')

@section('title', 'Warehouse')
@section('active-warehouse', 'opened')

@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header bg-success text-white">
                <strong>List Warehouse</strong>
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
                            <form action="{{ route('warehouse.edit', $warehouse->id) }}" method="GET">
                                <button type="submit" class="btn btn-primary-outline"><span class="glyphicon glyphicon-pencil"></span></button>
                            </form>
                            <form action="{{ route('warehouse.destroy', $warehouse->id) }}" method="POST">
                              @method('DELETE')
                              @csrf
                                <button type="submit" class="btn btn-danger-outline"><span class="glyphicon glyphicon-trash"></span></button>
                            </form>
                        </div>
                      </td>
                    </tr>
                  @empty
                    <tr class="text-center">
                      <td colspan="6">No Warehouse Found</td>
                    </tr>
                  @endforelse
                  </tbody>
                </table>
            </div>
        </div>
        <div class="card">
            <div class="card-header bg-danger text-white">
                <strong>Deleted Warehouse List</strong>
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
                          <a href="{{url('warehouse/restore')}}/{{$trash->id}}" class="btn btn-success-outline"><span><i class="fas fa-trash-restore"></i></span></a>
                          <a href="{{url('warehouse/force/delete')}}/{{$trash->id}}" class="btn btn-danger-outline"><span><i class="fas fa-eraser"></i></span></a>
                        </div>
                      </td>
                    </tr>
                  @empty
                    <tr class="text-center">
                      <td colspan="6">No Warehouse Found</td>
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
                <strong>Add Warehouse</strong>
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
                <form action="{{ route('warehouse.store') }}" method="post">
                @csrf
                    <div class="form-group">
                      <label>Warehouse Name</label>
                      <input type="text" class="form-control" name="name" placeholder="Enter Warehouse Name" value={{old('name')}}>
                    </div>
                    <div class="form-group">
                      <label>Warehouse Location</label>
                      <textarea name="location" class="form-control" placeholder="Enter Warehouse Location" value={{old('location')}}></textarea>
                    </div>
                    <button type="submit" class="btn btn-success">Add Warehouse</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection



