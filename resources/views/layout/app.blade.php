<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="description" content="Customs Declarations">
    <meta name="keywords" content="Customs Declarations">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Customs Declarations</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700|Poppins:300,400,500,600" rel="stylesheet">
    <link rel="stylesheet" href="{{ URL::asset('css/vendor.bundle.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/app.bundle.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/theme-a.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/custom.css') }}">
    <script src="{{URL::asset('js/jquery.min.js') }}"></script>
</head>
<style>
    .with-background {
        display: table-cell;
        vertical-align: middle;
        height: 100%;
        background-image: url({{URL::asset('img/71b8a4c1665319e860b3219bdbe3833d.png')}});
        background-repeat: no-repeat;
        background-attachment:fixed;
        background-position: center;
        background-size: 100%;
    }
</style>
<body style="background: #fff;">
<div id="app_wrapper">
        <header id="app_topnavbar-wrapper">
            <nav role="navigation" class="navbar topnavbar" style="max-width: 50.4rem; margin: 0px auto; position: relative;">
                <div class="nav-wrapper">
                    <ul class="nav navbar-nav left-menu">
                        <li class="menu-icon">
                            <a href="javascript:void(0)" role="button" data-toggle-state="app_sidebar-menu-collapsed" data-key="leftSideBar" class="">
                                <i class="mdi mdi-backburger"></i>
                                <div class="ripple-container"></div></a>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav left-menu">
                        <li style="top: 18px !important;">Custom Declaration</li>
                    </ul>
                </div>
                <form role="search" action="" class="navbar-form" id="navbar_form">
                    <div class="form-group is-empty">
                        <input type="text" placeholder="Search and press enter..." class="form-control" id="navbar_search" autocomplete="off">
                        <i data-navsearch-close="" class="zmdi zmdi-close close-search"></i>
                    </div>
                    <button type="submit" class="hidden btn btn-default">Submit</button>
                </form>
            </nav>
        </header>
        <section class="content_outer_wrapper">
            <div id="content-wrapper" style="max-width: 50.4rem; margin: 0px auto; position: relative; margin-top: 75px !important;">
                @yield('content')
            </div>
        </section>
</div>
<script src="{{URL::asset('js/vendor.bundle.js') }}"></script>
<script src="{{URL::asset('js/app.bundle.js')}}"></script>
<script src="{{URL::asset('js/customs.js')}}"></script>
</body>
</html>