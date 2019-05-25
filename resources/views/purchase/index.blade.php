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
{{------------- START PURCHASE LIST TABLE ----------------}}
<div class="row">
    <div class="col-md-12">
        <table class="table table-bordered table-striped" id="pur_table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Purchased at</th>
                    <th>Product Name</th>
                    <th>Supplier Name</th>
                    <th>Company Name</th>
                    {{-- <th>Action</th> --}}
                </tr>
            </thead>
            <tbody>
            @forelse($purchases as $purchase)
                <tr>
                    <td>{{ $loop->index+1 }}</td>
                    <td>{{ $purchase->created_at->format('d-M-y') }}</td>
                    <td>
                        @if ($purchase->product->category_status == 2)
                            <a href="{{route('purchase.show', $purchase->id)}}" class="" target="blank" style="text-decoration:none;" >{{strtoupper($purchase->product->company->company_abbr)}}/{{ strtoupper($purchase->product->name) }}-{{$purchase->product->unique_id}}</a>
                        @else
                            <a href="{{route('purchase.show', $purchase->id)}}" class="" target="blank" style="text-decoration:none;" >{{strtoupper($purchase->product->name)}}</a>
                        @endif

                    </td>
                    <td>{{ $purchase->supplier->name }}</td>
                    <td>{{ $purchase->company->company_name }}</td>
                    {{-- <td>
                    <div class="">
                        <form id="purchase-destroy-form" action="{{ route('purchase.destroy', $purchase->id) }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-button--accent">Delete</button>
                        </form>
                    </div>
                    </td> --}}
                </tr>
            @empty
            <tr class="text-center text-danger">
                <td colspan="7">No Product Found</td>
            </tr>
            @endforelse
            </tbody>
        </table>
    </div>
</div>
{{---------- END PURCHASE LIST TABLE -------------}}
@endsection
@section('footer_scripts')
    <script>
        $(document).ready(function(){
            $('#pur_table').DataTable();
        });
    </script>
@endsection