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
    {{------------- START PRODUCT LIST TABLE ----------------}}
    <div class="col-md-12">
        <table class="table table-bordered" id="prod_list">
            <thead>
            <tr>
                <th>#</th>
                <th>Created at</th>
                <th>Company Name</th>
                <th>Product Name</th>
                <th>Unique ID</th>
                <th>Category Name</th>
                <th>Unique Name</th>
                <th>Active Status</th>
            </tr>
            </thead>
            <tbody>
            @forelse($products as $product)
            <tr>
                <td>{{ $loop->index+1 }}</td>
                <td>{{$product->created_at}}</td>
                <td>{{$product->company->company_abbr}}</td>
                <td>{{$product->name}}</td>
                <td>{{$product->unique_id}}</td>
                <td> 
                    @if ($product->category_status == 1)
                        <div class="bg-primary form-control text-center text-white">
                            <strong>USABLE</strong>
                        </div>
                    @elseif ($product->category_status == 2)
                        <div class="bg-secondary form-control text-center text-white">
                            <strong>RE-USABLE</strong>
                        </div>
                    @endif
                </td>
                <td>{{strtoupper($product->company->company_abbr)}}/{{strtoupper($product->name)}}-{{$product->unique_id}}</td>
                <td>
                    @if ($product->active_status == 1)
                    <button class="btn btn-primary form-control">FREE</button>
                    @else
                        
                    @endif
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
@section('footer_scripts')
    <script>
        $(document).ready(function(){
            $('#prod_list').DataTable();
        });
    </script>
@endsection