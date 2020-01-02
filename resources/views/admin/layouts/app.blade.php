<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/menu.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/css/admin.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4" container>
            <div class="row">
                <div class="col-md-2">
                    <ul class="list-group">
                        <li data-toggle="collapse" data-target="#listproduct" class="collapsed">
                            <a href="{{route('danh-sach-san-pham')}}"><i class="fa fa-globe fa-lg"></i> List Product <span class="arrow"></span></a>
                        </li>
                        <li data-toggle="collapse" data-target="#listcategory" class="collapsed">
                            <a href="{{route('list-danh-muc')}}"><i class="fa fa-globe fa-lg"></i> List Category <span class="arrow"></span></a>
                        </li>
                        <li data-toggle="collapse" data-target="#listcategory" class="collapsed">
                            <a href="{{route('list-don-hang')}}"><i class="fa fa-globe fa-lg"></i> List Order <span class="arrow"></span></a>
                        </li>

                        <li class="list-group-item">###</li>
                        <li class="list-group-item">###</li>
                    </ul>
                </div>
                <div class="col-md-10">
                    @yield('content')
                </div>
            </div>
        </main>
{{--        <main class="py-4" container>--}}
{{--        <div class="nav-side-menu">--}}
{{--            <div class="brand">Brand Logo</div>--}}
{{--            <i class="fa fa-bars fa-2x toggle-btn" data-toggle="collapse" data-target="#menu-content"></i>--}}

{{--            <div class="menu-list">--}}

{{--                <ul id="menu-content" class="menu-content collapse out">--}}
{{--                    <li>--}}
{{--                        <a href="#">--}}
{{--                            <i class="fa fa-dashboard fa-lg"></i> Dashboard--}}
{{--                        </a>--}}
{{--                    </li>--}}

{{--                    <li  data-toggle="collapse" data-target="#products" class="collapsed active">--}}
{{--                        <a href="#"><i class="fa fa-gift fa-lg"></i> UI Elements <span class="arrow"></span></a>--}}
{{--                    </li>--}}
{{--                    <ul class="sub-menu collapse" id="products">--}}
{{--                        <li class="active"><a href="#">CSS3 Animation</a></li>--}}
{{--                        <li><a href="#">General</a></li>--}}
{{--                        <li><a href="#">Buttons</a></li>--}}
{{--                        <li><a href="#">Tabs & Accordions</a></li>--}}
{{--                        <li><a href="#">Typography</a></li>--}}
{{--                        <li><a href="#">FontAwesome</a></li>--}}
{{--                        <li><a href="#">Slider</a></li>--}}
{{--                        <li><a href="#">Panels</a></li>--}}
{{--                        <li><a href="#">Widgets</a></li>--}}
{{--                        <li><a href="#">Bootstrap Model</a></li>--}}
{{--                    </ul>--}}


{{--                    <li data-toggle="collapse" data-target="#service" class="collapsed">--}}
{{--                        <a href="#"><i class="fa fa-globe fa-lg"></i> Services <span class="arrow"></span></a>--}}
{{--                    </li>--}}
{{--                    <ul class="sub-menu collapse" id="service">--}}
{{--                        <li>New Service 1</li>--}}
{{--                        <li>New Service 2</li>--}}
{{--                        <li>New Service 3</li>--}}
{{--                    </ul>--}}


{{--                    <li data-toggle="collapse" data-target="#new" class="collapsed">--}}
{{--                        <a href="#"><i class="fa fa-car fa-lg"></i> New <span class="arrow"></span></a>--}}
{{--                    </li>--}}
{{--                    <ul class="sub-menu collapse" id="new">--}}
{{--                        <li>New New 1</li>--}}
{{--                        <li>New New 2</li>--}}
{{--                        <li>New New 3</li>--}}
{{--                    </ul>--}}


{{--                    <li>--}}
{{--                        <a href="#">--}}
{{--                            <i class="fa fa-user fa-lg"></i> Profile--}}
{{--                        </a>--}}
{{--                    </li>--}}

{{--                    <li>--}}
{{--                        <a href="#">--}}
{{--                            <i class="fa fa-users fa-lg"></i> Users--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                </ul>--}}

{{--            </div>--}}

{{--        </div>--}}
{{--            <div class="col-md-9">--}}
{{--                @yield('content')--}}
{{--            </div>--}}

    </div>
</body>
</html>
