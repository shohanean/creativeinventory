@extends('layouts.dashboardapp')

@section('title', 'Requisition Form')

@section('content')
{{---------------- BREADCRUMB  ---------------}}
<div class="row">
    <div class="col-md-12">
        <nav class="breadcrumb bg-white">
            <a class="breadcrumb-item" href="{{ route('home') }}">Dashboard</a>
            <span class="breadcrumb-item active">Requisition Form</span>
        </nav>
    </div>
</div>
<div class="row">
    <div class="col-md-10 offset-1">
        <div class="card">
            <div class="card-head text-center bg-dark text-white">
                <span><h4>Enter requisition details</h4></span>
            </div>
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
                            <div class="col-md-8">
                                <select name="product_id[]" class="form-control" id="product_name" required>
                                    <option value="">Select product name</option>
                                    @foreach ($products as $product)
                                    <option value="{{$product->id}}">{{$product->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-2">
                                <input class="form-control" type="number" name="quantity[]" placeholder="Quantity" value="{{old('quantity')}}" autocomplete="off" required>
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
                    <button type="submit" class="btn btn-success">Request Details</button>
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
                                '<div class="col-md-8">'+
                                    '<select name="product_id[]"'+ 'class="form-control" id="product_name" required>'+
                                        '<option value="">Select product name</option>'+
                                        '@foreach ($products as $product)'+
                                        '<option value="{{$product->id}}">{{$product->name}}</option>'+
                                        '@endforeach'+
                                    '</select>'+
                                '</div>'+
                            '<div class="col-md-2">'+
                                '<input class="form-control" type="number" name="quantity[]" placeholder="Quantity" value="{{old('quantity')}}" autocomplete="off" required>'+
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
            //select2
            $("#product_name").select2();
        });
    </script>
@endsection