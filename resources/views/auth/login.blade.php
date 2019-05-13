@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html>
<head lang="en">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>{{ config('app.name') }}</title>

	<link href="{{ asset('dashboard_assets/img/favicon.144x144.png') }}" rel="apple-touch-icon" type="image/png" sizes="144x144">
	<link href="{{ asset('dashboard_assets/img/favicon.114x114.png') }}" rel="apple-touch-icon" type="image/png" sizes="114x114">
	<link href="{{ asset('dashboard_assets/img/favicon.72x72.png') }}" rel="apple-touch-icon" type="image/png" sizes="72x72">
	<link href="{{ asset('dashboard_assets/img/favicon.57x57.png') }}" rel="apple-touch-icon" type="image/png">
	<link href="{{ asset('dashboard_assets/img/favicon.png') }}" rel="icon" type="image/png">
	<link href="{{ asset('dashboard_assets/img/favicon.ico') }}" rel="shortcut icon">

    <link rel="stylesheet" href="{{ asset('dashboard_assets/css/separate/pages/login.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dashboard_assets/css/lib/font-awesome/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dashboard_assets/css/lib/bootstrap/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dashboard_assets/css/main.css') }}">
</head>
<body>

    <div class="page-center">
        <div class="page-center-in">
            <div class="container-fluid">
                <form class="sign-box" method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="sign-avatar">
                        <img src="{{ asset('dashboard_assets/img/avatar-sign.png') }}" alt="">
                    </div>
                    <header class="sign-title">
                        Sign In
                    </header>
                    @if($errors->all())
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                <span class="sr-only">Close</span>
                            </button>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </div>
                    @endif
                    <div class="form-group">
                        <input type="email" class="form-control" placeholder="E-Mail" name="email" value="{{ old('email') }}"/>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" placeholder="Password" name="password"/>
                    </div>
                    <div class="form-group">
                        <div class="checkbox float-left">
                            <input type="checkbox" />
                            <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label for="remember">Keep me signed in</label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-rounded">Sign in</button>
                </form>
            </div>
        </div>
    </div><!--.page-center-->


<script src="{{ asset('dashboard_assets/js/lib/jquery/jquery-3.2.1.min.js') }}"></script>
<script src="{{ asset('dashboard_assets/js/lib/popper/popper.min.js') }}"></script>
<script src="{{ asset('dashboard_assets/js/lib/tether/tether.min.js') }}"></script>
<script src="{{ asset('dashboard_assets/js/lib/bootstrap/bootstrap.min.js') }}"></script>
<script src="{{ asset('dashboard_assets/js/plugins.js') }}"></script>
<script src="{{ asset('dashboard_assets/js/lib/match-height/jquery.matchHeight.min.js') }}"></script>
    <script>
        $(function() {
            $('.page-center').matchHeight({
                target: $('html')
            });

            $(window).resize(function(){
                setTimeout(function(){
                    $('.page-center').matchHeight({ remove: true });
                    $('.page-center').matchHeight({
                        target: $('html')
                    });
                },100);
            });
        });
    </script>
<script src="{{ asset('dashboard_assets/js/app.js') }}"></script>
</body>
</html>
@endsection
