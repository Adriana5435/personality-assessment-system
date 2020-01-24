<!doctype html>
<html>
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.12.0/css/all.css">
    <!-- Bootstrap CSS -->
    @if(config('app.locale') === 'fa')
        <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">
    @else
        <link rel="stylesheet" href="{{ asset('assets/css/app-ltr.css') }}">
    @endif
    <title>{{ __('Personality Assessment System') }}</title>
</head>
<body class="welcome-body">
<header>
    <div class="container">
        <nav class="navbar navbar-expand navbar-light">
            <a class="navbar-brand" href="{{ config('app.url') }}">
                <img src="{{ asset('assets/images/logo.png') }}" alt="">
            </a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav mr-auto">
                    @auth
                        <li class="nav-item"><a class="nav-link" href="{{ route('front.user.dashboard') }}">{{ __('User Dashboard') }}</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('logout') }}">{{ __('Logout') }}</a></li>
                    @endauth
                    @guest
                        <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                    @endguest
                </ul>
            </div>
        </nav>
    </div>
    <div class="welcome-header">
        <div class="container">
            @yield('header')
        </div>
    </div>
</header>
@if (session('status'))
    <section class="welcome-info">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="alert alert-success alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <i class="icon fa fa-check"></i>
                        {{ session('status') }}
                    </div>
                </div>
            </div>
        </div>
    </section>

@endif
@if (session('error'))
    <section class="welcome-info">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="alert alert-error alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <i class="icon fa fa-ban"></i>
                        {{ session('error') }}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endif

@yield('content')

<!-- Optional JavaScript -->
<script src="{{ asset('assets/js/app.js') }}"></script>
</body>
</html>
