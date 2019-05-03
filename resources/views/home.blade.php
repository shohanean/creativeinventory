@extends('layouts.dashboardapp')

@section('title', 'Dashboard')
@section('active-dashboard', 'opened')

@push('stylesheets')
    <link rel="stylesheet" href="{{ asset('dashboard_assets/css/separate/pages/widgets.min.css') }}">
@endpush

@section('content')
<div class="row">
    <div class="col-md-12">
        <nav class="breadcrumb bg-white">
            <span class="breadcrumb-item active">Dashboard</span>
        </nav>
    </div>
</div>
<div class="row">
    <div class="col-sm-3">
        <section class="widget widget-simple-sm">
            <div class="widget-simple-sm-icon">
                <i class="font-icon glyphicon glyphicon-home color-red"></i>
            </div>
            <div class="widget-simple-sm-bottom">
                <a href="{{ route('company.index') }}">{{ $company_count }} {{ ($company_count <= 1) ? 'Company' : str_plural('Company') }}</a>
            </div>
        </section><!--.widget-simple-sm-->
    </div>
    <div class="col-sm-3">
        <section class="widget widget-simple-sm">
            <div class="widget-simple-sm-icon">
                <i class="font-icon fas fa-warehouse color-green"></i>
            </div>
            <div class="widget-simple-sm-bottom">
                <a href="{{ route('warehouse.index') }}">{{ $warehouse_count }} {{ ($warehouse_count <= 1) ? 'Warehouse' : str_plural('Warehouse') }}</a>
            </div>
        </section><!--.widget-simple-sm-->
    </div>
    <div class="col-sm-3">
        <section class="widget widget-simple-sm">
            <div class="widget-simple-sm-icon">
                <i class="font-icon fas fa-truck color-orange"></i>
            </div>
            <div class="widget-simple-sm-bottom">
                <a href="{{ route('supplier.index') }}">{{ $supplier_count }} {{ ($supplier_count <= 1) ? 'Supplier' : str_plural('Supplier') }}</a>
            </div>
        </section><!--.widget-simple-sm-->
    </div>
    <div class="col-sm-3">
        <section class="widget widget-simple-sm">
            <div class="widget-simple-sm-icon">
                <i class="font-icon fas fa-user-tie color-blue"></i>
            </div>
            <div class="widget-simple-sm-bottom">
                <a href="{{ route('supplier.index') }}">{{ $user_count }} {{ ($user_count <= 1) ? 'User' : str_plural('User') }}</a>
            </div>
        </section><!--.widget-simple-sm-->
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                Charts
            </div>
            <div class="card-body">
                <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>

                {!! $TestChart->container() !!}
                {!! $TestChart->script() !!}
            </div>
        </div>
    </div>
</div>
@endsection
