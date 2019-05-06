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
        <table class="table table-bordered">
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
                <td>{{ $purchase->product->name }}</td>
                <td>{{ $purchase->company->company_name }}</td>
                {{-- <td>{{ $purchase->product->stock->quantity }}</td> --}}
                <td>
                <div class="btn-group btn-group-sm">
                    {{-- <a href="{{ route('product.edit', $product->id) }}" class="btn btn-primary-outline"><span><i class="fas fa-pencil-ruler"></i></span></a> --}}

                    <form class="d-none" id="purchase-destroy-form" action="{{ route('purchase.destroy', $purchase->id) }}" method="POST">
                        @method('DELETE')
                        @csrf
                    </form>
                    <a href="{{ route('purchase.destroy', $purchase->id) }}"      class="btn btn-danger-outline"
                        onclick="event.preventDefault();
                        document.getElementById('purchase-destroy-form').submit();">
                        <span><i class="fas fa-trash-alt"></i></span>
                    </a>
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
{{---------- END SUPPLIER LIST TABLE -------------}}
</div>
@endsection