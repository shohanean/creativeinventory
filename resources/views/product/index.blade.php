@extends('layouts.dashboardapp')

@section('title', 'Product List')

@section('content')
{{------- BREADCRUMB -------}}
<div class="row">
    <div class="col-md-12">
        <nav class="breadcrumb bg-white">
            <a class="breadcrumb-item" href="{{ route('home') }}">{{strtoupper('Dashboard')}}</a>
            <span class="breadcrumb-item active">{{strtoupper('Product List')}}</span>
        </nav>
    </div>
</div>

<div class="row">
    {{------------- START PRODUCT LIST TABLE FOR REUSABLE---------------}}
        <div class="col-md-12">
            <table class="table table-bordered" id="prod_list">
                    <div class="bg-dark text-center text-white">
                        <h4>PRODUCT LIST TABLE FOR RE-USABLE</h4>
                    </div>
                <thead>
                <tr>
                    <th>#</th>
                    <th>Created at</th>
                    <th>Company Name</th>
                    <th>Product Name</th>
                    <th>Unique ID</th>
                    <th>Purchase Status</th>
                    <th>Active Status</th>
                    <th>Assign Status</th>
                    <th>Unique Name</th>
                </tr>
                </thead>
                <tbody>
                @forelse($reusableProducts as $product)
                <tr>
                    <td>{{ $loop->index+1 }}</td>
                    <td>{{$product->created_at}}</td>
                    <td>{{$product->company->company_abbr}}</td>
                    <td>{{$product->name}}</td>
                    <td>{{$product->unique_id}}</td>
                    <td>
                        @if ($product->purchase_status == 1)
                            {{-- <a href=""></a> --}}
                            <a href="{{route('purchase.create')}}" class="btn bg-light form-control">AVAILABLE</a>
                        @else
                            <button class="btn bg-light form-control text-white" disabled>PURCHASED</button>                        
                        @endif
                    </td>
                    <td>
                        @if ($product->active_status == 1)
                            <a href="{{route('product.show', $product->id)}}" class="btn btn-success form-control">OKAY</a>
                        @elseif ($product->active_status == 2)
                            <a href="{{route('product.show', $product->id)}}" class="btn btn-danger form-control">NOT IN-SERVICE</a>
                        @elseif ($product->active_status == 3)
                        <a href="{{route('product.show', $product->id)}}" class="btn btn-warning form-control">LOST</a>
                        @elseif ($product->active_status == 4)
                        <a href="{{route('product.show', $product->id)}}" class="btn btn-info form-control">REPAIRING</a>
                        @endif
                    </td>
                    <td>
                        @if ($product->assign_status == 1)
                            <a href="{{route('product.show', $product->id)}}" class="btn btn-success form-control">AVAILABLE</a>
                        @elseif ($product->assign_status == 2)
                            <a href="{{route('product.show', $product->id)}}" class="btn btn-danger form-control">OCCUPIED</a>
                        @endif
                    </td>
                    <td>{{strtoupper($product->company->company_abbr)}}/{{strtoupper($product->name)}}-{{$product->unique_id}}</td>
                </tr>
                @empty
                <tr class="text-center text-danger">
                    <td colspan="7">No Product Found</td>
                </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    {{---------- END SUPPLIER LIST TABLE FOR REUSABLE-------------}}
</div>
<div class="row">
    {{------------- START PRODUCT LIST TABLE FOR USABLE---------------}}
    <div class="col-md-12 mt-5">
        <div class="bg-dark text-center text-white">
            <h4>PRODUCT LIST TABLE FOR USABLE</h4>
        </div>
        <table class="table table-bordered" id="prod_list1">
            <thead>
            <tr>
                <th>#</th>
                <th>Created at</th>
                {{-- <th>Company Name</th> --}}
                <th>Product Name</th>
                <th>Purchase Status</th>
            </tr>
            </thead>
            <tbody>
            @forelse($usableProducts as $product)
            <tr>
                <td>{{ $loop->index+1 }}</td>
                <td>{{$product->created_at}}</td>
                {{-- <td>{{$product->company->company_abbr}}</td> --}}
                <td>{{$product->name}}</td>
                <td>
                    @if ($product->purchase_status == 1)
                        {{-- <a href=""></a> --}}
                        <a href="{{route('purchase.create')}}" class="btn bg-light form-control">AVAILABLE</a>
                    @else
                        <button class="btn bg-light form-control text-white" disabled>PURCHASED</button>                        
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
{{---------- END SUPPLIER LIST TABLE FOR USABLE-------------}}
</div>
@endsection
@section('footer_scripts')
    <script>
        $(document).ready(function(){
            $('#prod_list,#prod_list1').DataTable();
        });
    </script>
@endsection

