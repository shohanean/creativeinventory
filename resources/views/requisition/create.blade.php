@extends('layouts.dashboardapp')

@section('title', 'Requisition Form')
@section('active-requisition', 'opened')

@section('content')
{{---------------- BREADCRUMB  ---------------}}
<div class="row">
    <div class="col-md-12">
        <nav class="breadcrumb bg-white">
            <a class="breadcrumb-item" href="{{ route('home') }}">{{strtoupper('Dashboard')}}</a>
            <span class="breadcrumb-item active">{{strtoupper('Requisition Form')}}</span>
        </nav>
    </div>
</div>
<div class="row">
    <div class="col-md-10 offset-1">
        <div class="card">
            <div class="card-head text-center bg-dark text-white">
                <h4>{{strtoupper('Enter Requisition Details for Usable')}}</h4>
            </div>
{{----------------- ERROR MESSAGE ------------------}}
            <div class="card-body">
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
{{-------------- SUCCESS MESSAGES -------------}}
                @if(session('success'))
                    <div class="alert alert-success alert-fill alert-border-left alert-close alert-dismissible fade show" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        {{ session('success') }}
                    </div>
                @endif
                {{-- FORM START FOR USABLE--}}
                <form action="{{ route('requisition.store') }}" method="post">
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
                    <div class="category_select_container">
                        <div class="row mb-3">
                            <div class="col-md-6 py-4">
                                <select name="product_id[]" class="form-control product_name" id="product_name" required>
                                    <option value="">Select product name</option>
                                    @foreach ($usable_products as $product)
                                            <option value="{{$product->id}}">{{$product->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-2 py-4">
                                <input class="form-control" type="number" name="quantity[]" placeholder="Quantity" value="{{old('quantity')}}" autocomplete="off" required>
                            </div>
                            <div class="col-md-2">
                                <textarea name="note[]" id="note" class="form-control" placeholder="Add note (optional)" cols="2"></textarea>
                            </div>
                            <div class="col-md-1">
                                <button class="btn form-control" id="add_more"><i class="fas fa-plus"></i></button>
                            </div>
                        </div>
                        {{-- wrapper to put the 'add more' div --}}
                            <div class="wrapper_div col-md-12">
                                
                            </div>
                        {{-- wrapper end --}}
                    </div>
                    @csrf
                    <button type="submit" class="btn btn-success">Request</button>
                </form>
                {{-- FORM END --}}
            </div>
        </div>
    </div>
</div>

{{-- FOR RE-USABLE --}}
<div class="row">
    <div class="col-md-10 offset-1">
        <div class="card">
            <div class="card-head text-center bg-dark text-white">
                <h4>{{strtoupper('Enter Requisition Details For Re-Usable')}}</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('store.requisition.reusable') }}" method="post">
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
                    <div class="category_select_container">
                        <div class="row mb-3">
                            <div class="col-md-7 py-4">
                                <select name="product_id[]" class="form-control product_name" id="product_name1" required>
                                    <option value="">Select product name</option>
                                    @foreach ($reusable_products as $product)
                                        @if ($product->purchase_status == 2 && $product->active_status == 1 && $product->assign_status == 1)
                                            <option value="{{$product->id}}">{{strtoupper($product->company->company_abbr)}}/{{strtoupper($product->name)}}-{{$product->unique_id}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-3">
                                <textarea name="note[]" id="note" class="form-control" placeholder="Add note (optional)" cols="2"></textarea>
                            </div>
                            <div class="col-md-1">
                                <button class="btn form-control" id="add_more1"><i class="fas fa-plus"></i></button>
                            </div>
                        </div>
                        {{-- wrapper to put the 'add more' div --}}
                        <div class="wrapper_div1 col-md-12">

                        </div>
                        {{-- wrapper end --}}
                    </div>
                    @csrf
                    <button type="submit" class="btn btn-success">Request</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('footer_scripts')
    <script>
        $(function(){
            // add more using jQuery for usable
            var template = 
                    '<div class="category_select">'+
                        '<div class="row mb-4">'+
                                '<div class="col-md-6 py-4">'+
                                    '<select name="product_id[]"'+ 'class="form-control" id="product_name" required>'+
                                        '<option value="">Select product name</option>'+
                                        '@foreach ($usable_products as $product)'+
                                            '<option value="{{$product->id}}">{{$product->name}}</option>'+
                                        '@endforeach'+
                                    '</select>'+
                                '</div>'+
                            '<div class="col-md-2 py-4">'+
                                '<input class="form-control" type="number" name="quantity[]" placeholder="Quantity" value="{{old('quantity')}}" autocomplete="off" required>'+
                            '</div>'+
'                            <div class="col-md-2">'+
                                '<textarea name="note[]" id="note" class="form-control" placeholder="Add note (optional)" cols="2"></textarea>'+
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

// jQuery for Re-usable
            var template1 = 
                    '<div class="category_select">'+
                        '<div class="row mb-4">'+
                                '<div class="col-md-7 py-4">'+
                                    '<select name="product_id[]"'+ 'class="form-control" id="product_name" required>'+
                                        '<option value="">Select product name</option>'+
                                        '@foreach ($reusable_products as $product)'+
                                            '@if ($product->purchase_status == 2 && $product->active_status == 1)'+
                                                '<option value="{{$product->id}}">{{strtoupper($product->company->company_abbr)}}/{{strtoupper($product->name)}}-{{$product->unique_id}}</option>'+
                                            '@endif'+
                                        '@endforeach'+
                                    '</select>'+
                                '</div>'+
'                            <div class="col-md-3">'+
                                '<textarea name="note[]" id="note" class="form-control" placeholder="Add note (optional)" cols="2"></textarea>'+
                            '</div>'+
                            '<div class="col-md-1">'+
                                '<button class="btn btn-danger form-control" id="remove_btn1"><i class="fas fa-minus"></i></button>'+
                            '</div>'+
                        '</div>'+
                    '</div>'

            $("#add_more1").on('click', function(e) {
                e.preventDefault();
                $(".wrapper_div1").before(template1);
            });

            $(document).on('click', '#remove_btn1', function(e){
                e.preventDefault();
                $(this).parents('.category_select').remove();
            });
            //select2
            $("#product_name, #product_name1").select2();
        });
    </script>
@endsection