@extends('layouts.dashboardapp')

@section('title', 'Add Purchase record')

@section('content')
{{---------------- BREADCRUMB  ---------------}}
<div class="row">
    <div class="col-md-12">
        <nav class="breadcrumb bg-white">
            <a class="breadcrumb-item" href="{{ route('home') }}">Dashboard</a>
            <span class="breadcrumb-item active">Add Purchase</span>
        </nav>
    </div>
</div>
<div class="row">
    <div class="col-md-10 offset-1">
        <div class="card">
            <div class="card-head text-center bg-dark text-white">
                <span><h4>Enter purchase details</h4></span>
            </div>
            <div class="card-body">
                @if(session('success'))
                    <div class="alert alert-success alert-fill alert-border-left alert-close alert-dismissible fade show" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        {{ session('success') }}
                    </div>
                @endif
                <form action="{{ route('purchase.store') }}" method="post">
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
                    <div class="form-group">
                        <label for="company_id">Company Name</label>     
                        <select name="company_id" class="form-control" id="company_name">
                            <option value="">Select company name</option>
                            @foreach ($companies as $company)
                            <option value="{{$company->id}}">{{$company->company_name}}</option>
                            @endforeach
                        </select>              
                    </div>
                    <div class="form-group">
                        <label for="supplier_id">Supplier Name</label>     
                        <select name="supplier_id" class="form-control" id="supplier_name">
                            <option value="">Select supplier name</option>
                            @foreach ($suppliers as $supplier)
                            <option value="{{$supplier->id}}">{{$supplier->name}}</option>
                            @endforeach
                        </select>              
                    </div>
                    <hr>
                    <div class="category_select_container">
                        <div class="row mb-3">
                            <div class="col-md-3">
                                <select name="product_id[]" class="form-control" id="product_name">
                                    <option value="">Select product name</option>
                                    @foreach ($products as $product)
                                    <option value="{{$product->id}}">{{$product->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-2">
                                <input class="form-control" type="number" name="quantity[]" placeholder="Quantity" value="{{old('quantity')}}" autocomplete="off">
                            </div>
                            <div class="col-md-2">
                                <input class="form-control" type="number" name="unit_price[]" placeholder="Unit Price" value="{{old('unit_price')}}" autocomplete="off">
                            </div>
                            <div class="col-md-2">
                                <input class="form-control" type="number" name="total_price[]" placeholder="Total Price" value="{{old('total_price')}}" autocomplete="off">
                            </div>
                            <div class="col-md-2">
                                <input type="text" class="form-control exp_date" name="exp_date[]" id="" placeholder="Exp. date" autocomplete="off" value="{{old('exp_date')}}">
                            </div>
                            <div class="col-md-1">
                                <button class="btn form-control" id="add_more"><i class="fas fa-plus"></i></button>
                            </div>
                        </div>
                        {{-- wrapper to put the 'add more' div --}}
                        <div class="wrapper_div col-md-12">

                        </div>
                    </div>
                    @csrf
                    <button type="submit" class="btn btn-success">Add purchase details</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('footer_scripts')
    <script>
        $(function(){
            // add more using jQuery
            var template = 
                    '<div class="category_select">'+
                        '<div class="row mb-4">'+
                                '<div class="col-md-3">'+
                                    '<select name="product_id[]"'+ 'class="form-control" id="product_name">'+
                                        '<option value="">Select product name</option>'+
                                        '@foreach ($products as $product)'+
                                        '<option value="{{$product->id}}">{{$product->name}}</option>'+
                                        '@endforeach'+
                                    '</select>'+
                                '</div>'+
                            '<div class="col-md-2">'+
                                '<input class="form-control" type="number" name="quantity[]" placeholder="Quantity" value="{{old('quantity')}}" autocomplete="off">'+
                            '</div>'+
                            '<div class="col-md-2">'+
                                '<input class="form-control" type="number" name="unit_price[]" placeholder="Unit Price" value="{{old('unit_price')}}" autocomplete="off">'+
                            '</div>'+
                            '<div class="col-md-2">'+
                                '<input class="form-control" type="number" name="total_price[]" placeholder="Total Price" value="{{old('total_price')}}" autocomplete="off">'+
                            '</div>'+
                            '<div class="col-md-2">'+
                                '<input class="form-control exp_date" type="text" name="exp_date[]" placeholder="Exp. date" id=""  value="{{old('exp_date')}}" autocomplete="off">'+
                            '</div>'+
                            '<div class="col-md-1">'+
                                '<button class="btn btn-danger form-control" id="remove_btn"><i class="fas fa-minus"></i></button>'+
                            '</div>'+
                        '</div>'+
                    '</div>'

            $("#add_more").on('click', function(e) {
                e.preventDefault();
                $(".wrapper_div").after(template);
            });

            $(document).on('click', '#remove_btn', function(e){
                e.preventDefault();
                $(this).parents('.category_select').remove();
            });

            //datepicker
            $(".exp_date").datepicker();
            //select2
            $("#company_name, #supplier_name, #product_name").select2();
        });
    </script>
@endsection