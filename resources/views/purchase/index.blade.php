@extends('layouts.dashboardapp')

@section('title', 'Purchase List')

@section('content')
{{------- BREADCRUMB -------}}
<div class="row">
    <div class="col-md-12">
        <nav class="breadcrumb bg-white">
            <a class="breadcrumb-item" href="{{ route('home') }}">Dashboard</a>
            <span class="breadcrumb-item active">Purchase List</span>
        </nav>
    </div>
</div>
<div class="row">
    {{------------- START PURCHASE LIST TABLE ----------------}}
    <div class="col-md-12">
        <table class="table table-bordered table-striped" id="pur_table">
            <thead>
            <tr>
                <th>#</th>
                <th>Purchased at</th>
                <th>Supplier Name</th>
                <th>Product Name</th>
                <th>Company Name</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @forelse($purchases as $purchase)
            <tr>
                <td>{{ $loop->index+1 }}</td>
                <td>{{ $purchase->created_at->format('d-M-y') }}</td>
                <td>{{ $purchase->supplier->name }}</td>
                <td>{{strtoupper($purchase->product->company->company_abbr)}}/{{ strtoupper($purchase->product->name) }}-{{$purchase->product->unique_id}}</td>
                <td>{{ $purchase->company->company_name }}</td>
                {{-- <td>{{ $purchase->product->stock->quantity }}</td> --}}
                <td>
                <div class="">
                    <form id="purchase-destroy-form" action="{{ route('purchase.destroy', $purchase->id) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-button--accent">Delete</button>
                    </form>
                </div>
                </td>
            </tr>
            @empty
            <tr class="text-center text-danger">
                <td colspan="7">No Product Found</td>
            </tr>
            @endforelse
            </tbody>
        </table>
    </div>
{{---------- END PURCHASE LIST TABLE -------------}}
</div>
@endsection
@section('footer_scripts')
    <script>
        $(document).ready(function(){
            $('#pur_table').DataTable();
        });
    </script>
@endsection