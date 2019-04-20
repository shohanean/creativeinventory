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

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
    <link rel="stylesheet" href="{{ asset('dashboard_assets/css/lib/font-awesome/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dashboard_assets/css/lib/bootstrap/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dashboard_assets/css/main.css') }}">
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

                    <div class="mobile-menu-right-overlay"></div>
                    <div class="site-header-collapsed">
                        <div class="site-header-collapsed-in">
                            <div class="dropdown dropdown-typical">
                                <div class="dropdown-menu" aria-labelledby="dd-header-sales">
                                    <a class="dropdown-item" href="#"><span
                                            class="font-icon font-icon-home"></span>Quant and Verbal</a>
                                    <a class="dropdown-item" href="#"><span class="font-icon font-icon-cart"></span>Real
                                        Gmat Test</a>
                                    <a class="dropdown-item" href="#"><span
                                            class="font-icon font-icon-speed"></span>Prep Official App</a>
                                    <a class="dropdown-item" href="#"><span
                                            class="font-icon font-icon-users"></span>CATprer Test</a>
                                    <a class="dropdown-item" href="#"><span
                                            class="font-icon font-icon-comments"></span>Third Party Test</a>
                                </div>
                            </div>
                            <div class="dropdown dropdown-typical">
                                <a class="dropdown-toggle" id="dd-header-marketing" data-target="#"
                                    href="http://example.com" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                    <span class="font-icon font-icon-cogwheel"></span>
                                    <span class="lbl">Marketing automation</span>
                                </a>

                                <div class="dropdown-menu" aria-labelledby="dd-header-marketing">
                                    <a class="dropdown-item" href="#">Current Search</a>
                                    <a class="dropdown-item" href="#">Search for Issues</a>
                                    <div class="dropdown-divider"></div>
                                    <div class="dropdown-header">Recent issues</div>
                                    <a class="dropdown-item" href="#"><span
                                            class="font-icon font-icon-home"></span>Quant and Verbal</a>
                                    <a class="dropdown-item" href="#"><span class="font-icon font-icon-cart"></span>Real
                                        Gmat Test</a>
                                    <a class="dropdown-item" href="#"><span
                                            class="font-icon font-icon-speed"></span>Prep Official App</a>
                                    <a class="dropdown-item" href="#"><span
                                            class="font-icon font-icon-users"></span>CATprer Test</a>
                                    <a class="dropdown-item" href="#"><span
                                            class="font-icon font-icon-comments"></span>Third Party Test</a>
                                    <div class="dropdown-more">
                                        <div class="dropdown-more-caption padding">more...</div>
                                        <div class="dropdown-more-sub">
                                            <div class="dropdown-more-sub-in">
                                                <a class="dropdown-item" href="#"><span
                                                        class="font-icon font-icon-home"></span>Quant and Verbal</a>
                                                <a class="dropdown-item" href="#"><span
                                                        class="font-icon font-icon-cart"></span>Real Gmat Test</a>
                                                <a class="dropdown-item" href="#"><span
                                                        class="font-icon font-icon-speed"></span>Prep Official App</a>
                                                <a class="dropdown-item" href="#"><span
                                                        class="font-icon font-icon-users"></span>CATprer Test</a>
                                                <a class="dropdown-item" href="#"><span
                                                        class="font-icon font-icon-comments"></span>Third Party Test</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#">Import Issues from CSV</a>
                                    <div class="dropdown-divider"></div>
                                    <div class="dropdown-header">Filters</div>
                                    <a class="dropdown-item" href="#">My Open Issues</a>
                                    <a class="dropdown-item" href="#">Reported by Me</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#">Manage filters</a>
                                    <div class="dropdown-divider"></div>
                                    <div class="dropdown-header">Timesheet</div>
                                    <a class="dropdown-item" href="#">Subscribtions</a>
                                </div>
                            </div>
                            <div class="dropdown dropdown-typical">
                                <a class="dropdown-toggle" id="dd-header-social" data-target="#"
                                    href="http://example.com" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                    <span class="font-icon font-icon-share"></span>
                                    <span class="lbl">Social media</span>
                                </a>

                                <div class="dropdown-menu" aria-labelledby="dd-header-social">
                                    <a class="dropdown-item" href="#"><span
                                            class="font-icon font-icon-home"></span>Quant and Verbal</a>
                                    <a class="dropdown-item" href="#"><span class="font-icon font-icon-cart"></span>Real
                                        Gmat Test</a>
                                    <a class="dropdown-item" href="#"><span
                                            class="font-icon font-icon-speed"></span>Prep Official App</a>
                                    <a class="dropdown-item" href="#"><span
                                            class="font-icon font-icon-users"></span>CATprer Test</a>
                                    <a class="dropdown-item" href="#"><span
                                            class="font-icon font-icon-comments"></span>Third Party Test</a>
                                </div>
                            </div>
                            <div class="dropdown dropdown-typical">
                                <a href="#" class="dropdown-toggle no-arr">
                                    <span class="font-icon font-icon-page"></span>
                                    <span class="lbl">Projects</span>
                                    <span class="label label-pill label-danger">35</span>
                                </a>
                            </div>

                            <div class="dropdown dropdown-typical">
                                <a class="dropdown-toggle" id="dd-header-form-builder" data-target="#"
                                    href="http://example.com" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                    <span class="font-icon font-icon-pencil"></span>
                                    <span class="lbl">Form builder</span>
                                </a>

                                <div class="dropdown-menu" aria-labelledby="dd-header-form-builder">
                                    <a class="dropdown-item" href="#"><span
                                            class="font-icon font-icon-home"></span>Quant and Verbal</a>
                                    <a class="dropdown-item" href="#"><span class="font-icon font-icon-cart"></span>Real
                                        Gmat Test</a>
                                    <a class="dropdown-item" href="#"><span
                                            class="font-icon font-icon-speed"></span>Prep Official App</a>
                                    <a class="dropdown-item" href="#"><span
                                            class="font-icon font-icon-users"></span>CATprer Test</a>
                                    <a class="dropdown-item" href="#"><span
                                            class="font-icon font-icon-comments"></span>Third Party Test</a>
                                </div>
                            </div>
                            <div class="dropdown">
                                <button class="btn btn-rounded dropdown-toggle" id="dd-header-add" type="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Add
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dd-header-add">
                                    <a class="dropdown-item" href="#">Quant and Verbal</a>
                                    <a class="dropdown-item" href="#">Real Gmat Test</a>
                                    <a class="dropdown-item" href="#">Prep Official App</a>
                                    <a class="dropdown-item" href="#">CATprer Test</a>
                                    <a class="dropdown-item" href="#">Third Party Test</a>
                                </div>
                            </div>
                            <div class="help-dropdown">
                                <button type="button">
                                    <i class="font-icon font-icon-help"></i>
                                </button>
                                <div class="help-dropdown-popup">
                                    <div class="help-dropdown-popup-side">
                                        <ul>
                                            <li><a href="#">Getting Started</a></li>
                                            <li><a href="#" class="active">Creating a new project</a></li>
                                            <li><a href="#">Adding customers</a></li>
                                            <li><a href="#">Settings</a></li>
                                            <li><a href="#">Importing data</a></li>
                                            <li><a href="#">Exporting data</a></li>
                                        </ul>
                                    </div>
                                    <div class="help-dropdown-popup-cont">
                                        <div class="help-dropdown-popup-cont-in">
                                            <div class="jscroll">
                                                <a href="#" class="help-dropdown-popup-item">
                                                    Lorem Ipsum is simply
                                                    <span class="describe">Lorem Ipsum has been the industry's standard
                                                        dummy text </span>
                                                </a>
                                                <a href="#" class="help-dropdown-popup-item">
                                                    Contrary to popular belief
                                                    <span class="describe">Lorem Ipsum is not simply random text. It has
                                                        roots in a piece of classical Latin literature from 45 BC</span>
                                                </a>
                                                <a href="#" class="help-dropdown-popup-item">
                                                    The point of using Lorem Ipsum
                                                    <span class="describe">Many desktop publishing packages and web page
                                                        editors now use Lorem Ipsum as their default model text</span>
                                                </a>
                                                <a href="#" class="help-dropdown-popup-item">
                                                    Lorem Ipsum
                                                    <span class="describe">There are many variations of passages of
                                                        Lorem Ipsum available</span>
                                                </a>
                                                <a href="#" class="help-dropdown-popup-item">
                                                    Lorem Ipsum is simply
                                                    <span class="describe">Lorem Ipsum has been the industry's standard
                                                        dummy text </span>
                                                </a>
                                                <a href="#" class="help-dropdown-popup-item">
                                                    Contrary to popular belief
                                                    <span class="describe">Lorem Ipsum is not simply random text. It has
                                                        roots in a piece of classical Latin literature from 45 BC</span>
                                                </a>
                                                <a href="#" class="help-dropdown-popup-item">
                                                    The point of using Lorem Ipsum
                                                    <span class="describe">Many desktop publishing packages and web page
                                                        editors now use Lorem Ipsum as their default model text</span>
                                                </a>
                                                <a href="#" class="help-dropdown-popup-item">
                                                    Lorem Ipsum
                                                    <span class="describe">There are many variations of passages of
                                                        Lorem Ipsum available</span>
                                                </a>
                                                <a href="#" class="help-dropdown-popup-item">
                                                    Lorem Ipsum is simply
                                                    <span class="describe">Lorem Ipsum has been the industry's standard
                                                        dummy text </span>
                                                </a>
                                                <a href="#" class="help-dropdown-popup-item">
                                                    Contrary to popular belief
                                                    <span class="describe">Lorem Ipsum is not simply random text. It has
                                                        roots in a piece of classical Latin literature from 45 BC</span>
                                                </a>
                                                <a href="#" class="help-dropdown-popup-item">
                                                    The point of using Lorem Ipsum
                                                    <span class="describe">Many desktop publishing packages and web page
                                                        editors now use Lorem Ipsum as their default model text</span>
                                                </a>
                                                <a href="#" class="help-dropdown-popup-item">
                                                    Lorem Ipsum
                                                    <span class="describe">There are many variations of passages of
                                                        Lorem Ipsum available</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--.help-dropdown-->
                            <a class="btn btn-nav btn-rounded btn-inline btn-danger-outline"
                                href="http://themeforest.net/item/startui-premium-bootstrap-4-admin-dashboard-template/15228250?ref=themesanytime">
                                Buy Theme
                            </a>
                            <div class="site-header-search-container">
                                <form class="site-header-search closed">
                                    <input type="text" placeholder="Search" />
                                    <button type="submit">
                                        <span class="font-icon-search"></span>
                                    </button>
                                    <div class="overlay"></div>
                                </form>
                            </div>
                        </div>
                        <!--.site-header-collapsed-in-->
                    </div>
                    <!--.site-header-collapsed-->
                </div>
                <!--site-header-content-in-->
            </div>
            <!--.site-header-content-->
        </div>
        <!--.container-fluid-->
    </header>
    <!--.site-header-->

    <div class="mobile-menu-left-overlay"></div>
    <nav class="side-menu">
        <ul class="side-menu-list">
            <li class="blue @yield('active-dashboard')">
                <a href="{{ route('home') }}">
                    <i class="font-icon font-icon-dashboard"></i>
                    <span class="lbl">Dashboard</span>
                </a>
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
                    <span class="lbl">Warehouse</span>
                </a>
            </li>
            <li class="gold @yield('active-supplier')">
                <a href="{{route('supplier.index')}}">
                    <i class="font-icon fas fa-truck"></i>
                    <span class="lbl">Supplier</span>
                </a>
            </li>
            <li class="brown with-sub">
                <span>
                    <i class="font-icon glyphicon glyphicon-tint"></i>
                    <span class="lbl">Skins</span>
                </span>
                <ul>
                    <li><a href="theme-side-ebony-clay.html"><span class="lbl">Ebony Clay</span></a></li>
                    <li><a href="theme-side-madison-caribbean.html"><span class="lbl">Madison Caribbean</span></a></li>
                    <li><a href="theme-side-caesium-dark-caribbean.html"><span class="lbl">Caesium Dark
                                Caribbean</span></a></li>
                    <li><a href="theme-side-tin.html"><span class="lbl">Tin</span></a></li>
                    <li><a href="theme-side-litmus-blue.html"><span class="lbl">Litmus Blue</span></a></li>
                    <li><a href="theme-rebecca-purple.html"><span class="lbl">Rebecca Purple</span></a></li>
                    <li><a href="theme-picton-blue.html"><span class="lbl">Picton Blue</span></a></li>
                    <li><a href="theme-picton-blue-white-ebony.html"><span class="lbl">Picton Blue White
                                Ebony</span></a></li>
                </ul>
            </li>
            <li class="purple with-sub">
                <span>
                    <i class="font-icon font-icon-comments active"></i>
                    <span class="lbl">Messages</span>
                </span>
                <ul>
                    <li><a href="messenger.html"><span class="lbl">Messenger</span></a></li>
                    <li><a href="chat.html"><span class="lbl">Messages</span><span
                                class="label label-custom label-pill label-danger">8</span></a></li>
                    <li><a href="chat-write.html"><span class="lbl">Write Message</span></a></li>
                    <li><a href="chat-index.html"><span class="lbl">Select User</span></a></li>
                </ul>
            </li>
            <li class="gold with-sub">
                <span>
                    <i class="font-icon font-icon-edit"></i>
                    <span class="lbl">Forms</span>
                </span>
                <ul>
                    <li><a href="ui-form.html"><span class="lbl">Basic Inputs</span></a></li>
                    <li><a href="ui-buttons.html"><span class="lbl">Buttons</span></a></li>
                    <li><a href="ui-select.html"><span class="lbl">Select &amp; Tags</span></a></li>
                    <li><a href="ui-checkboxes.html"><span class="lbl">Checkboxes &amp; Radios</span></a></li>
                    <li><a href="ui-form-validation.html"><span class="lbl">Validation</span></a></li>
                    <li><a href="typeahead.html"><span class="lbl">Typeahead</span></a></li>
                    <li><a href="steps.html"><span class="lbl">Steps</span></a></li>
                    <li><a href="ui-form-input-mask.html"><span class="lbl">Input Mask</span></a></li>
                    <li><a href="form-flex-labels.html"><span class="lbl">Flex Labels</span></a></li>
                    <li><a href="ui-form-extras.html"><span class="lbl">Extras</span></a></li>
                </ul>
            </li>
            <li class="blue-dirty">
                <a href="tables.html">
                    <span class="glyphicon glyphicon-th"></span>
                    <span class="lbl">Tables</span>
                </a>
            </li>
            <li class="magenta with-sub">
                <span>
                    <span class="glyphicon glyphicon-list-alt"></span>
                    <span class="lbl">Datatables</span>
                </span>
                <ul>
                    <a href="datatables-net.html"><span class="lbl">Datatables.net</span></a>
            </li>
            <a href="bootstrap-datatables.html"><span class="lbl">Bootstrap Table</span></a></li>

            <!--<li><a href="datatables.html"><span class="lbl">Default</span></a></li>
	                <li><a href="datatables-fixed-columns.html"><span class="lbl">Fixed Columns</span></a></li>
	                <li><a href="datatables-reorder-rows.html"><span class="lbl">Reorder Rows</span></a></li>
	                <li><a href="datatables-reorder-columns.html"><span class="lbl">Reorder Columns</span></a></li>
	                <li><a href="datatables-resize-columns.html"><span class="lbl">Resize Columns</span></a></li>
	                <li><a href="datatables-mobile.html"><span class="lbl">Mobile</span></a></li>
	                <li><a href="datatables-filter-control.html"><span class="lbl">Filters</span></a></li>-->
        </ul>
        </li>
        <li class="green with-sub">
            <span>
                <i class="font-icon font-icon-widget"></i>
                <span class="lbl">Components</span>
            </span>
            <ul>
                <li><a href="widgets.html"><span class="lbl">Widgets</span></a></li>
                <li><a href="elements.html"><span class="lbl">Bootstrap UI</span></a></li>
                <li><a href="ui-datepicker.html"><span class="lbl">Date and Time Pickers</span></a></li>
                <li><a href="multipicker.html"><span class="lbl">Multi Picker</span></a></li>
                <li><a href="form-steps.html"><span class="lbl">Form Steps</span></a></li>
                <li><a href="components-upload.html"><span class="lbl">Upload</span></a></li>
                <li><a href="sweet-alerts.html"><span class="lbl">SweetAlert</span></a></li>
                <li><a href="color-picker.html"><span class="lbl">Color Picker</span></a></li>
                <li><a href="tabs.html"><span class="lbl">Tabs</span></a></li>
                <li><a href="panels.html"><span class="lbl">Panels</span></a></li>
                <li><a href="notifications.html"><span class="lbl">Notifications</span></a></li>
                <li><a href="range-slider.html"><span class="lbl">Sliders</span></a></li>
                <li><a href="editor-summernote.html"><span class="lbl">Editors</span></a></li>
                <li><a href="nestable.html"><span class="lbl">Nestable</span></a></li>
                <li><a href="blockui.html"><span class="lbl">BlockUI</span></a></li>
                <li><a href="alerts.html"><span class="lbl">Alerts</span></a></li>
                <li><a href="player.html"><span class="lbl">Players</span></a></li>
            </ul>
        </li>
        <li class="pink-red">
            <a href="activity.html">
                <i class="font-icon font-icon-zigzag"></i>
                <span class="lbl">Activity</span>
            </a>
        </li>
        <li class="blue with-sub">
            <span>
                <i class="font-icon font-icon-user"></i>
                <span class="lbl">Profile</span>
            </span>
            <ul>
                <li><a href="profile.html"><span class="lbl">Version 1</span></a></li>
                <li><a href="profile-2.html"><span class="lbl">Version 2</span></a></li>
            </ul>
        </li>
        <li class="orange-red with-sub">
            <span>
                <i class="font-icon font-icon-help"></i>
                <span class="lbl">Support</span>
            </span>
            <ul>
                <li><a href="documentation.html"><span class="lbl">Docs (example)</span></a></li>
                <li><a href="faq.html"><span class="lbl">FAQ Simple</span></a></li>
                <li><a href="faq-search.html"><span class="lbl">FAQ Search</span></a></li>
            </ul>
        </li>
        <li class="red">
            <a href="contacts.html" class="label-right">
                <i class="font-icon font-icon-contacts"></i>
                <span class="lbl">Contacts</span>
                <span class="label label-custom label-pill label-danger">35</span>
            </a>
        </li>
        <li class="magenta">
            <a href="scheduler.html">
                <i class="font-icon font-icon-calend"></i>
                <span class="lbl">Calendar</span>
            </a>
        </li>
        <li class="grey with-sub">
            <span>
                <span class="glyphicon glyphicon-duplicate"></span>
                <span class="lbl">Pages</span>
            </span>
            <ul>
                <li><a href="email_templates.html"><span class="lbl">Email Templates</span></a></li>
                <li><a href="blank.html"><span class="lbl">Blank</span></a></li>
                <li><a href="empty.html"><span class="lbl">Empty List</span></a></li>
                <li><a href="prices.html"><span class="lbl">Prices</span></a></li>
                <li><a href="typography.html"><span class="lbl">Typography</span></a></li>
                <li><a href="sign-in.html"><span class="lbl">Login</span></a></li>
                <li><a href="sign-up.html"><span class="lbl">Register</span></a></li>
                <li><a href="reset-password.html"><span class="lbl">Reset Password</span></a></li>
                <li><a href="new-password.html"><span class="lbl">New Password</span></a></li>
                <li><a href="error-404.html"><span class="lbl">Error 404</span></a></li>
                <li><a href="error-500.html"><span class="lbl">Error 500</span></a></li>
                <li><a href="cards.html"><span class="lbl">Cards</span></a></li>
                <li><a href="avatars.html"><span class="lbl">Avatars</span></a></li>
                <li><a href="ribbons.html"><span class="lbl">Ribbons</span></a></li>
                <li><a href="icons-startui.html"><span class="lbl">Icons</span></a></li>
                <li><a href="invoice.html"><span class="lbl">Invoice</span></a></li>
                <li><a href="helpers.html"><span class="lbl">Helpers</span></a></li>
            </ul>
        </li>
        <li class="blue-dirty">
            <a href="list-tasks.html">
                <i class="font-icon font-icon-notebook"></i>
                <span class="lbl">Tasks</span>
            </a>
        </li>
        <li class="aquamarine">
            <a href="contacts-page.html">
                <i class="font-icon font-icon-mail"></i>
                <span class="lbl">Contact form</span>
            </a>
        </li>
        <li class="blue">
            <a href="files.html">
                <i class="font-icon glyphicon glyphicon-paperclip"></i>
                <span class="lbl">File Manager</span>
            </a>
        </li>
        <li class="gold">
            <a href="gallery.html">
                <i class="font-icon font-icon-picture-2"></i>
                <span class="lbl">Gallery</span>
            </a>
        </li>
        <li class="red">
            <a href="project.html">
                <i class="font-icon font-icon-case-2"></i>
                <span class="lbl">Project</span>
            </a>
        </li>
        <li class="brown with-sub">
            <span>
                <span class="font-icon font-icon-chart"></span>
                <span class="lbl">Charts</span>
            </span>
            <ul>
                <li><a href="charts-c3js.html"><span class="lbl">C3.js</span></a></li>
                <li><a href="charts-peity.html"><span class="lbl">Peity</span></a></li>
                <li><a href="charts-plottable.html"><span class="lbl">Plottable.js</span></a></li>
            </ul>
        </li>
        <li class="grey with-sub">
            <span>
                <span class="font-icon font-icon-burger"></span>
                <span class="lbl">Nested Menu</span>
            </span>
            <ul>
                <li><a href="#"><span class="lbl">Level 1</span></a></li>
                <li><a href="#"><span class="lbl">Level 1</span></a></li>
                <li class="with-sub">
                    <span>
                        <span class="lbl">Level 2</span>
                    </span>
                    <ul>
                        <li><a href="#"><span class="lbl">Level 2</span></a></li>
                        <li><a href="#"><span class="lbl">Level 2</span></a></li>
                        <li class="with-sub">
                            <span>
                                <span class="lbl">Level 3</span>
                            </span>
                            <ul>
                                <li><a href="#"><span class="lbl">Level 3</span></a></li>
                                <li><a href="#"><span class="lbl">Level 3</span></a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
            </ul>
        </li>
        </ul>

        <section>
            <header class="side-menu-title">Tags</header>
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
    <script src="{{ asset('dashboard_assets/js/lib/popper/popper.min.js') }}"></script>
    <script src="{{ asset('dashboard_assets/js/lib/tether/tether.min.js') }}"></script>
    <script src="{{ asset('dashboard_assets/js/lib/bootstrap/bootstrap.min.js') }}"></script>
    <script src="{{ asset('dashboard_assets/js/plugins.js') }}"></script>
    <script src="{{ asset('dashboard_assets/js/app.js') }}"></script>
</body>

</html>
