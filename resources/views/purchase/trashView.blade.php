@extends('layouts.dashboardapp')

@section('title', 'Purchase Trash List')

@section('content')
{{------- BREADCRUMB -------}}
<div class="row">
    <div class="col-md-12">
        <nav class="breadcrumb bg-white">
            <a class="breadcrumb-item" href="{{ route('home') }}">Dashboard</a>
            <span class="breadcrumb-item active">Trash List</span>
        </nav>
    </div>
</div>
<div class="row">
    {{------------- START PURCHASE LIST TABLE ---------------}}
    <div class="col-md-12">
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
        <table class="table table-bordered" id="pur_trash">
            <thead>
            <tr>
                <th>#</th>
                <th>Supplier Name</th>
                <th>Product Name</th>
                <th>Company Name</th>
                <th>Deleted at</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @forelse($trashed as $trash)
            <tr>
                <td>{{ $loop->index+1 }}</td>
                <td>{{ $trash->supplier->name }}</td>
                <td>{{ $trash->product->name }}</td>
                <td>{{ $trash->company->company_name }}</td>
                <td>{{ $trash->deleted_at->format('d-M-y') }}</td>
                <td>
                    <div class="btn-group btn-group-sm">
                        <a href="{{route('purchase.restore', $trash->id)}}" class="btn btn-success-outline"><span><i class="fas fa-trash-restore"></i></span></a>
                        <a id="{{route('purchase.forceDelete', $trash->id)}}" href="#" class="btn btn-danger-outline force-delete-btn"><span><i class="fas fa-eraser"></i></span></a>
                    </div>
                </td>
            </tr>
            @empty
            <tr class="text-center text-danger">
                <td colspan="6">No Deleted Product Found</td>
            </tr>
            @endforelse
            </tbody>
        </table>
    </div>
{{---------- END SUPPLIER LIST TABLE -------------}}
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
        $('#pur_trash').DataTable();
    });
</script>
@endsection