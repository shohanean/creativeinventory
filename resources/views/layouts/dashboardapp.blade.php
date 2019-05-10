<!DOCTYPE html>
<html>

<head lang="en">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>
        @yield('title', 'Creative Inventory')
    </title>

    <link href="img/favicon.144x144.png" rel="apple-touch-icon" type="image/png" sizes="144x144">
    <link href="img/favicon.114x114.png" rel="apple-touch-icon" type="image/png" sizes="114x114">
    <link href="img/favicon.72x72.png" rel="apple-touch-icon" type="image/png" sizes="72x72">
    <link href="img/favicon.57x57.png" rel="apple-touch-icon" type="image/png">
    <link href="img/favicon.png" rel="icon" type="image/png">
    <link href="img/favicon.ico" rel="shortcut icon">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-pink.min.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/jquery-ui.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">



    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
    <link rel="stylesheet" href="{{ asset('dashboard_assets/css/lib/font-awesome/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dashboard_assets/css/lib/bootstrap/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dashboard_assets/css/lib/bootstrap-sweetalert/sweetalert.css') }}">
    <link rel="stylesheet" href="{{ asset('dashboard_assets/css/separate/vendor/sweet-alert-animations.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dashboard_assets/css/main.css') }}">
    @stack('stylesheets')
</head>

<body class="with-side-menu">

    <header class="site-header">
        <div class="container-fluid">
            <a href="#" class="site-logo">
                <img class="hidden-md-down" src="img/logo-2.png" alt="">
                <img class="hidden-lg-down" src="img/logo-2-mob.png" alt="">
            </a>

            <button id="show-hide-sidebar-toggle" class="show-hide-sidebar">
                <span>toggle menu</span>
            </button>

            <button class="hamburger hamburger--htla">
                <span>toggle menu</span>
            </button>
            <div class="site-header-content">
                <div class="site-header-content-in">
                    <div class="site-header-shown">
                        <div class="dropdown dropdown-notification notif">
                            <a href="#" class="header-alarm dropdown-toggle active" id="dd-notification"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="font-icon-alarm"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-notif"
                                aria-labelledby="dd-notification">
                                <div class="dropdown-menu-notif-header">
                                    Notifications
                                    <span class="label label-pill label-danger">4</span>
                                </div>
                                <div class="dropdown-menu-notif-list">
                                    <div class="dropdown-menu-notif-item">
                                        <div class="photo">
                                            <img src="img/photo-64-1.jpg" alt="">
                                        </div>
                                        <div class="dot"></div>
                                        <a href="#">Morgan</a> was bothering about something
                                        <div class="color-blue-grey-lighter">7 hours ago</div>
                                    </div>
                                    <div class="dropdown-menu-notif-item">
                                        <div class="photo">
                                            <img src="img/photo-64-2.jpg" alt="">
                                        </div>
                                        <div class="dot"></div>
                                        <a href="#">Lioneli</a> had commented on this <a href="#">Super Important
                                            Thing</a>
                                        <div class="color-blue-grey-lighter">7 hours ago</div>
                                    </div>
                                    <div class="dropdown-menu-notif-item">
                                        <div class="photo">
                                            <img src="img/photo-64-3.jpg" alt="">
                                        </div>
                                        <div class="dot"></div>
                                        <a href="#">Xavier</a> had commented on the <a href="#">Movie title</a>
                                        <div class="color-blue-grey-lighter">7 hours ago</div>
                                    </div>
                                    <div class="dropdown-menu-notif-item">
                                        <div class="photo">
                                            <img src="img/photo-64-4.jpg" alt="">
                                        </div>
                                        <a href="#">Lionely</a> wants to go to <a href="#">Cinema</a> with you to see <a
                                            href="#">This Movie</a>
                                        <div class="color-blue-grey-lighter">7 hours ago</div>
                                    </div>
                                </div>
                                <div class="dropdown-menu-notif-more">
                                    <a href="#">See more</a>
                                </div>
                            </div>
                        </div>

                        <div class="dropdown dropdown-notification messages">
                            <a href="#" class="header-alarm dropdown-toggle active" id="dd-messages"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="font-icon-mail"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-messages"
                                aria-labelledby="dd-messages">
                                <div class="dropdown-menu-messages-header">
                                    <ul class="nav" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" data-toggle="tab" href="#tab-incoming"
                                                role="tab">
                                                Inbox
                                                <span class="label label-pill label-danger">8</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#tab-outgoing"
                                                role="tab">Outbox</a>
                                        </li>
                                    </ul>
                                    <!--<button type="button" class="create">
	                                    <i class="font-icon font-icon-pen-square"></i>
	                                </button>-->
                                </div>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tab-incoming" role="tabpanel">
                                        <div class="dropdown-menu-messages-list">
                                            <a href="#" class="mess-item">
                                                <span class="avatar-preview avatar-preview-32"><img
                                                        src="img/photo-64-2.jpg" alt=""></span>
                                                <span class="mess-item-name">Tim Collins</span>
                                                <span class="mess-item-txt">Morgan was bothering about something!</span>
                                            </a>
                                            <a href="#" class="mess-item">
                                                <span class="avatar-preview avatar-preview-32"><img
                                                        src="img/avatar-2-64.png" alt=""></span>
                                                <span class="mess-item-name">Christian Burton</span>
                                                <span class="mess-item-txt">Morgan was bothering about something! Morgan
                                                    was bothering about something.</span>
                                            </a>
                                            <a href="#" class="mess-item">
                                                <span class="avatar-preview avatar-preview-32"><img
                                                        src="img/photo-64-2.jpg" alt=""></span>
                                                <span class="mess-item-name">Tim Collins</span>
                                                <span class="mess-item-txt">Morgan was bothering about something!</span>
                                            </a>
                                            <a href="#" class="mess-item">
                                                <span class="avatar-preview avatar-preview-32"><img
                                                        src="img/avatar-2-64.png" alt=""></span>
                                                <span class="mess-item-name">Christian Burton</span>
                                                <span class="mess-item-txt">Morgan was bothering about
                                                    something...</span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="tab-outgoing" role="tabpanel">
                                        <div class="dropdown-menu-messages-list">
                                            <a href="#" class="mess-item">
                                                <span class="avatar-preview avatar-preview-32"><img
                                                        src="img/avatar-2-64.png" alt=""></span>
                                                <span class="mess-item-name">Christian Burton</span>
                                                <span class="mess-item-txt">Morgan was bothering about something! Morgan
                                                    was bothering about something...</span>
                                            </a>
                                            <a href="#" class="mess-item">
                                                <span class="avatar-preview avatar-preview-32"><img
                                                        src="img/photo-64-2.jpg" alt=""></span>
                                                <span class="mess-item-name">Tim Collins</span>
                                                <span class="mess-item-txt">Morgan was bothering about something! Morgan
                                                    was bothering about something.</span>
                                            </a>
                                            <a href="#" class="mess-item">
                                                <span class="avatar-preview avatar-preview-32"><img
                                                        src="img/avatar-2-64.png" alt=""></span>
                                                <span class="mess-item-name">Christian Burtons</span>
                                                <span class="mess-item-txt">Morgan was bothering about something!</span>
                                            </a>
                                            <a href="#" class="mess-item">
                                                <span class="avatar-preview avatar-preview-32"><img
                                                        src="img/photo-64-2.jpg" alt=""></span>
                                                <span class="mess-item-name">Tim Collins</span>
                                                <span class="mess-item-txt">Morgan was bothering about something!</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="dropdown-menu-notif-more">
                                    <a href="#">See more</a>
                                </div>
                            </div>
                        </div>

                        <div class="dropdown user-menu">
                            <button class="dropdown-toggle" id="dd-user-menu" type="button" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <img src="img/avatar-2-64.png" alt="">
                            </button>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dd-user-menu">
                                <a class="dropdown-item" href="#"><span
                                        class="font-icon glyphicon glyphicon-user"></span>Profile</a>
                                <a class="dropdown-item" href="#"><span
                                        class="font-icon glyphicon glyphicon-cog"></span>Settings</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><span
                                        class="font-icon glyphicon glyphicon-log-out"></span>Logout</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </div>

                        <button type="button" class="burger-right">
                            <i class="font-icon-menu-addl"></i>
                        </button>
                    </div>
                    <!--.site-header-shown-->


        <!--.container-fluid-->
    </header>
    <!--.site-header-->

    {{------------------ NAVBAR LIST -----------}}
    <div class="mobile-menu-left-overlay"></div>
    <nav class="side-menu">
        <ul class="side-menu-list">
            <li class="blue @yield('active-dashboard')">
                <a href="{{ route('home') }}">
                    <i class="font-icon font-icon-dashboard"></i>
                    <span class="lbl">Dashboard</span>
                </a>
            </li>
@if (Auth::user()->role == 1)
            {{--------------- REQUISTION FOR EMPLOYEE ------------}}
    <li class="red @yield('active-requisition')">
        <a href="{{ route('requisition.create') }}">
            <i class="font-icon fab fa-wpforms"></i>
            <span class="lbl">Requisition</span>
        </a>
    </li>
    @else
    {{------------------------ NAVBAR FOR ADMIN AND SUPER-ADMIN-------------------}}
    <li class="red with-sub">
        <span class="">
            <i class=" font-icon fab fa-wpforms @yield('active-requisition')"></i>
            &nbsp;<span class="lbl">Requisition</span>
        </span>
        <ul>
            {{-- <li>
                <a href="{{ route('requisition.create') }}">
                    &nbsp;&nbsp;&nbsp; &nbsp;<i class="lbl fas fa-cart-plus"></i>
                    <span class="lbl">&nbsp;<small>Add Product</small> </span>
                </a>
            </li> --}}
            <li>
                <a href="{{ route('requisition.index') }}">
                    &nbsp;&nbsp;&nbsp; &nbsp;<i class="lbl fas fa-list"></i>
                    <span class="lbl">&nbsp;<small>Requisition History</small> </span>
                </a>
            </li>
            {{-- <li>
                <a href="{{ route('requisition.trashView') }}">
                    &nbsp;&nbsp;&nbsp; &nbsp;<i class="lbl fas fa-trash"></i>
                    <span class="lbl">&nbsp;<small>Trash List</small> </span>
                </a>
            </li> --}}
        </ul>
    </li>
    <li class="purple with-sub">
        <span class="">
            <i class="font-icon font-icon-users @yield('active-product')"></i>
            &nbsp;<span class="lbl">Employee</span>
        </span>
        <ul>
            <li>
                <a href="{{ route('employee.create') }}">
                    &nbsp;&nbsp;&nbsp; &nbsp;<i class="lbl fas fa-plus-circle"></i>
                    <span class="lbl">&nbsp;<small>Add Employee</small> </span>
                </a>
            </li>
            <li>
                <a href="{{ route('employee.index') }}">
                    &nbsp;&nbsp;&nbsp; &nbsp;<i class="lbl fas fa-list"></i>
                    <span class="lbl">&nbsp;<small>Employee List</small> </span>
                </a>
            </li>
            <li>
                <a href="{{ route('employee.index') }}">
                    &nbsp;&nbsp;&nbsp; &nbsp;<i class="lbl fas fa-trash"></i>
                    <span class="lbl">&nbsp;<small>Trash List</small> </span>
                </a>
            </li>
        </ul>
    </li>
    <li class="red @yield('active-company')">
        <a href="{{ route('company.index') }}">
            <i class="font-icon glyphicon glyphicon-home"></i>
            <span class="lbl">Company</span>
        </a>
    </li>
    <li class="green @yield('active-warehouse')">
        <a href="{{ route('warehouse.index') }}">
            <i class="font-icon fas fa-warehouse"></i>
            &nbsp;<span class="lbl">Warehouse</span>
        </a>
    </li>
    <li class="gold @yield('active-supplier')">
        <a href="{{route('supplier.index')}}">
            <i class="font-icon fas fa-truck"></i>
            <span class="lbl">Supplier</span>
        </a>
    </li>
    <li class="brown @yield('active-category')">
        <a href="{{route('category.index')}}">
            <i class="font-icon fas fa-tags fa-lg"></i>
            <span class="lbl">Category</span>
        </a>
    </li>

    <li class="purple with-sub">
        <span class="">
            <i class=" font-icon fas fa-shopping-cart @yield('active-product')"></i>
            &nbsp;<span class="lbl">Product</span>
        </span>
        <ul>
            <li>
                <a href="{{ route('product.create') }}">
                    &nbsp;&nbsp;&nbsp; &nbsp;<i class="lbl fas fa-cart-plus"></i>
                    <span class="lbl">&nbsp;<small>Add Product</small> </span>
                </a>
            </li>
            <li>
                <a href="{{ route('product.index') }}">
                    &nbsp;&nbsp;&nbsp; &nbsp;<i class="lbl fas fa-list"></i>
                    <span class="lbl">&nbsp;<small>Product List</small> </span>
                </a>
            </li>
            <li>
                <a href="{{ route('product.trashView') }}">
                    &nbsp;&nbsp;&nbsp; &nbsp;<i class="lbl fas fa-trash"></i>
                    <span class="lbl">&nbsp;<small>Trash List</small> </span>
                </a>
            </li>
        </ul>
    </li>
    <li class="red with-sub">
        <span class="">
            <i class="font-icon fas fa-store-alt @yield('active-purchase')"></i>
            <span class="lbl">Purchase</span>
        </span>
        <ul>
            <li>
                <a href="{{ route('purchase.create') }}">
                    &nbsp;&nbsp;&nbsp; &nbsp;<i class="lbl fas fa-plus-circle"></i>
                    <span class="lbl">&nbsp;<small>Add Purchase</small> </span>
                </a>
            </li>
            <li>
                <a href="{{ route('purchase.index') }}">
                    &nbsp;&nbsp;&nbsp; &nbsp;<i class="lbl fas fa-list"></i>
                    <span class="lbl">&nbsp;<small>Purchase List</small> </span>
                </a>
            </li>
            <li>
                <a href="{{ route('purchase.trashView') }}">
                    &nbsp;&nbsp;&nbsp; &nbsp;<i class="lbl fas fa-trash"></i>
                    <span class="lbl">&nbsp;<small>Trash List</small> </span>
                </a>
            </li>
        </ul>
    </li>
    <li class="green @yield('active-stock')">
        <a href="{{route('stock.index')}}">
            <i class="font-icon fas fa-boxes fa-lg"></i>
            <span class="lbl">Inventory</span>
        </a>
    </li>
    <li class="blue @yield('active-role')">
        <a href="{{route('role.index')}}">
            <i class="font-icon fas fa-user-plus fa-lg"></i>
            <span class="lbl">Roles & permission</span>
        </a>
    </li>
@endif



    <section>
        <ul class="side-menu-list">
            <li>
                <a href="#">
                    <i class="tag-color green"></i>
                    <span class="lbl">Website</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="tag-color grey-blue"></i>
                    <span class="lbl">Bugs/Errors</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="tag-color red"></i>
                    <span class="lbl">General Problem</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="tag-color pink"></i>
                    <span class="lbl">Questions</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="tag-color orange"></i>
                    <span class="lbl">Ideas</span>
                </a>
            </li>
        </ul>
    </section>
</nav>
    <!--.side-menu-->

    <div class="page-content">
        <div class="container-fluid">
            @yield('content')
        </div>
        <!--.container-fluid-->
    </div>
    <!--.page-content-->

    <script src="{{ asset('dashboard_assets/js/lib/jquery/jquery-3.2.1.min.js') }}"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
    <script src="{{ asset('dashboard_assets/js/lib/popper/popper.min.js') }}"></script>
    <script src="{{ asset('dashboard_assets/js/lib/tether/tether.min.js') }}"></script>
    <script src="{{ asset('dashboard_assets/js/lib/bootstrap/bootstrap.min.js') }}"></script>
    <script src="{{ asset('dashboard_assets/js/lib/bootstrap-sweetalert/sweetalert.min.js') }}"></script>
    <script src="{{ asset('dashboard_assets/js/plugins.js') }}"></script>
    <script src="{{ asset('dashboard_assets/js/app.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script> --}}

</body>

@yield('footer_scripts')
</html>
