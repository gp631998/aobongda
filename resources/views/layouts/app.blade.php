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
    <link href="{{ asset('assets/frontend/bootstrap-3.3.7-dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/frontend/fonts/fontawesome-free-5.11.2-web/css/all.css') }}" rel="stylesheet">
    <link href="{{ asset('css/frontend.css') }}" rel="stylesheet">
</head>
<body>
<div id="app">
    <div class="container">
        <header class="header header1" style="background: #d7d7d7">
            <div class="row">
                <div class="col-md-6">
                    <div class="pull-left">
                        <p>Chính sách bảo hành sản phẩm và quan điểm phục vụ</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="pull-right">
                        <ul class="list-controllers">
                            <li style="display: inline"><a href="{{route('gio-hang')}}"><i
                                        class="fas fa-shopping-cart"></i> Giỏ hàng</a></li>
                            <li style="display: inline"><a href="{{route('dang-nhap')}}"><i
                                        class="fas fa-sign-in-alt"></i> Đăng nhập</a></li>
                            <li style="display: inline"><a href="{{route('dang-ky')}}"><i class="fas fa-user"></i> Đăng
                                    ký</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </header>
        <header class="header header2">
            <div class="row">
                <div class="col-md-3">
                    <a href="{{route('home')}}"><img style="width: 150px;height: 100px" class="logo"
                                                     src="{{ asset('assets/frontend/images/logo.png') }}"></a>
                </div>
                <div class="col-md-6">
                    <div class="area-search" style="margin-top: 30px;position: relative">
                        <form action="{{route('tim-kiem')}}" method="post">
                            <input type="text" style="padding-right: 40px;" class="form-control keyword" name="keyword"><i
                                style="position: absolute;right: 10px; top: 7px;font-size: 20px;"
                                class="fas fa-search"></i>
                            <p><b>Từ khóa</b>: Đồ thể thao</p>
                            {{csrf_field()}}
                        </form>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="area-hotline">
                        <i class="fas fa-phone"
                           style="display: inline-block;line-height: 24px;vertical-align: middle;background: #ff7e16;font-size: 20px;padding: 5px 25px;border-radius: 5px;margin: 27px">
                            <span>  0988580741</span>
                        </i>
                        {{csrf_field()}}
                    </div>
                </div>
            </div>
        </header>
    </div>
    <nav class="nav">
        <div class="container">
            <ul class="list-main-menu">
                <li><a href="{{route('home')}}">Trang chủ</a></li>
                <li><a href="{{route('gioi-thieu')}}">Giới thiệu</a></li>
                <li><a href="{{route('lien-he')}}">Liên Hệ</a></li>
                <li>
                    <a href="{{route('danh-muc')}}">Danh mục</a>
                </li>
            </ul>
        </div>
    </nav>
    <nav style="display: none" class="navbar navbar-expand-md navbar-light navbar-laravel">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
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
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <main class="py-4">
        <div class="container">
            <div class="menu">
                make menu here
            </div>
        </div>
        @yield('content')
    </main>
</div>
</body>
</html>
