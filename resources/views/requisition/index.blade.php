@extends('layouts.dashboardapp')

@section('title', 'Requisition list')
@section('active-requisition', 'opened')

@section('content')
<div class="col-md-12 text-center bg-secondary p-2 text-white"> <strong>All Requisition History</strong></div>
<div class="row">
    <div class="col-md-12">
        <table class="table table-bordered" id="req_table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Created at</th>
                    <th>User Name</th>
                    <th>Product Name</th>
                    <th>Quantity</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($requisitions as $requisition)
                    <tr>
                        <td>{{$loop->index+1}}</td>
                        <td>{{$requisition->created_at}}</td>
                        <td>{{$requisition->user->name}}</td>
                        <td>{{$requisition->product->name}}</td>
                        <td>{{$requisition->quantity}}</td>
                        <td>
                            @if ($requisition->status == 0)
                                <button class="btn btn-warning form-control">Pending</button>
                            @elseif ($requisition->status == 1)
                                <button class="btn btn-success form-control">Approved</button>
                            @elseif ($requisition->status == 2)
                                <button class="btn btn-danger form-control">Rejected</button>
                            @elseif ($requisition->status == 3)
                                <button class="btn btn-info form-control">Forwarded</button>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
@section('footer_scripts')
    <script>
        $(document).ready(function(){
            $('#req_table').DataTable();
        });
    </script>
@endsection