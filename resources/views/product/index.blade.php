@extends('layouts.dashboardapp')

@section('title', 'Product List')

@section('content')
{{------- BREADCRUMB -------}}
<div class="row">
    <div class="col-md-12">
        <nav class="breadcrumb bg-white">
            <a class="breadcrumb-item" href="{{ route('home') }}">Dashboard</a>
            <span class="breadcrumb-item active">Product List</span>
        </nav>
    </div>
</div>
<div class="row">
    {{------------- START SUPPLIER LIST TABLE ----------------}}
    <div class="col-md-12">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>#</th>
                <th>Product Name</th>
                <th>Warehouse Name</th>
                <th>Created at</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @forelse($products as $product)
            <tr>
                <td>{{ $loop->index+1 }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->warehouse->name }}</td>
                <td>{{ $product->created_at->format('d-M-y') }}</td>
                <td>
                <div class="btn-group btn-group-sm">
                    <a href="{{ route('product.edit', $product->id) }}" class="btn btn-primary-outline"><span><i class="fas fa-pencil-ruler"></i></span></a>

                    <form class="d-none" id="product-destroy-form" action="{{ route('product.destroy', $product->id) }}" method="POST">
                        @method('DELETE')
                        @csrf
                    </form>
                    <a href="{{ route('product.destroy', $product->id) }}"      class="btn btn-danger-outline"
                        onclick="event.preventDefault();
                        document.getElementById('product-destroy-form').submit();">
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