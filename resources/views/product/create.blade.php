@extends('layouts.dashboardapp')

@section('title', 'Add Product')

@section('content')
<div class="row">
    <div class="col-md-12">
        <nav class="breadcrumb bg-white">
            <a class="breadcrumb-item" href="{{ route('home') }}">Dashboard</a>
            <span class="breadcrumb-item active">Add product</span>
        </nav>
    </div>
</div>
@if(session('success'))
    <div class="alert alert-success alert-fill alert-border-left alert-close alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
        {{ session('success') }}
    </div>
@endif

{{---------------- ADD PRODUCT FOR USABLE --------------}}
<div class="col-md-10 offset-1">
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
    <div class="card">
        <div class="card-head text-center bg-dark text-white">
            <span><h4>Enter Product Details For Usable</h4></span>
        </div>
        <div class="card-body">
            <form action="{{ route('product.store') }}" method="post">
                <div class="row">
                    <div class="form-group col-md-10">
                        <label>Product Name</label>
                        <input type="text" class="form-control" name="name" placeholder="Enter Product Name" value="{{old('name')}}">
                    </div>
                    @csrf
                    <div class="form-group col-md-2">
                        {{-- <label for=""></label> --}}
                        <button type="submit" class="btn btn-success mt-4">Add product</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

{{---------------- ADD PRODUCT FOR REUSABLE ----------}}
<div class="col-md-10 offset-1">
    <div class="card">
        <div class="card-head text-center bg-dark text-white">
            <h4>Enter Product Details For Re-Usable</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('product.reusableStore') }}" method="post">
                <div class="row">
                    <div class="form-group col-md-2 mt-3">
                        <select name="company_id[]" class="form-control category_abbr" >
                            <option value="">Select company</option>
                            @foreach ($companies as $company)
                                <option value="{{$company->id}}">{{$company->company_abbr}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-1 mt-3 text-center">
                        <h1>/</h1>
                    </div>
                    <div class="form-group col-md-5">
                        <label>Product Name</label>
                        <input type="text" class="form-control" name="name[]" placeholder="Enter Product Name" value="">
                    </div>
                    <div class="col-md-1 mt-3 text-center">
                        <h1>-</h1>
                    </div>
                    <div class="form-group col-md-2">
                        <label>Unique ID:</label>
                        <input type="number" class="form-control" name="unique_id[]" value="" autocomplete="off">
                    </div>
                    <div class="form-group mt-4 col-md-1">
                        <button class="btn form-control" id="add_more"><i class="fas fa-plus"></i></button>
                    </div>
                    @csrf
                </div>
                {{-- wrapper to put the 'add more' div --}}
                <div class="wrapper_div col-md-12">
                    
                </div>
                {{-- wrapper end --}}
                <div class="form-group col-md-2">
                    <button type="submit" class="btn btn-success mt-2">Add product</button>
                </div>
            </form>
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
                        '<div class="row mb-2">'+
                                '<div class="form-group col-md-2 mt-3">'+
                                    '<select name="company_id[]" class="form-control" id="category_abbr">'+
                                        '<option value="">Select company</option>'+
                                        '@foreach ($companies as $company)'+
                                            '<option value="{{$company->id}}">{{$company->company_abbr}}</option>'+
                                        '@endforeach'+
                                    '</select>'+
                                '</div>'+
                           ' <div class="col-md-1 mt-3 text-center">'+
                                '<h1>/</h1>'+
                            '</div>'+
                            '<div class="form-group col-md-5">'+
                                '<label>Product Name</label>'+
                                '<input type="text" class="form-control"'+ 'name="name[]" placeholder="Enter Product Name" value="">'+
                            '</div>'+
                            '<div class="col-md-1 mt-4 text-center">'+
                                '<h1>-</h1>'+
                            '</div>'+
                            '<div class="form-group col-md-2">'+
                                '<label>Unique ID:</label>'+
                                '<input type="number" class="form-control" name="unique_id[]" value="">'+
                            '</div>'+
                            '<div class="col-md-1 mt-4">'+
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
        $("#warehouse_name, #category_name, .category_abbr").select2();
    });
    </script>
@endsection
