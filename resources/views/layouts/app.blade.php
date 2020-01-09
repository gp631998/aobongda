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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <!-- Styles -->
    <link href="{{ asset('css\app.css') }}" rel="stylesheet">
    <link href="{{ asset('assets\frontend\fonts\fontawesome-free-5.11.2-web\css\all.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/frontend/bootstrap-3.3.7-dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css\frontend.css') }}" rel="stylesheet">
    <link href="{{ asset('css\frontend1.css') }}" rel="stylesheet">
</head>
<body>
<div id="app">
    <div class="container">
        <header class="header header1" style="background: #d7d7d7">
            <div class="row">
                <div class="col-md-6">
                    <div class="pull-left">
                        <p>Giờ mở cửa: 8:30 - 21:30 các ngày trong tuần</p>
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
                <div class="area-search" style="margin-top: 30px;position: relative">
                    <form action="search">
{{--                        <div class="form-inline">--}}
{{--                            <input type="text" style="padding-right: 100px;width: 560px" class="form-control"--}}
{{--                                   name="key">--}}
{{--                            <button class="btn btn-primary">Tìm kiếm</button>--}}
{{--                            <i class="fas fa-phone"--}}
{{--                               style="display: inline-block;line-height: 24px;vertical-align: middle;background: #ff7e16;font-size: 20px;padding: 5px 25px;border-radius: 5px;margin: 29px">--}}
{{--                                <span>  0988580741</span>--}}
{{--                            </i>--}}
{{--                        </div>--}}
                        <div class="container h-100">
                            <form action="search">
                            <div class="d-flex justify-content-center h-100">
                                <div class="searchbar">
                                    <input class="search_input" type="text" name="key" placeholder="Search...">
                                    <a href="#" class="search_icon"><i class="fas fa-search"></i></a>
                                </div>
                            </div>
                            </form>
                        </div>

                        <p><b>Từ khóa</b>: Áo Manchester United</p>
                    </form>
                </div>
            </div>
            {{--                <div class="col-md-3">--}}
            {{--                    <div class="area-hotline">--}}
            {{--                        <i class="fas fa-phone"--}}
            {{--                           style="display: inline-block;line-height: 24px;vertical-align: middle;background: #ff7e16;font-size: 20px;padding: 5px 25px;border-radius: 5px;margin: 29px">--}}
            {{--                            <span>  0988580741</span>--}}
            {{--                        </i>--}}
            {{--                        {{csrf_field()}}--}}
            {{--                    </div>--}}
            {{--                </div>--}}

        </header>
    </div>
    @php
        $list_root_category=DB::table('categories')->where('parent','=',null)->get();
        $list_sub_category=DB::table('categories')->where('parent','!=',null)->get();
    @endphp
    <nav class="nav">
        <div class="container">
            <ul class="list-main-menu" style="color: red">
                <li><a href="{{route('home')}}" class="active"> Trang chủ</a></li>
                @foreach($list_root_category as $root_category)
                    <li>
                        <a href="javascript:void(0)">{{$root_category->category_name}}</a>
                        <ul class="sub-category">
                            @foreach($list_sub_category as $sub_category)
                                @if($sub_category->parent==$root_category->id)
                                    <li style="display: inline">
                                        <a href="{{route('danh-muc',$sub_category->id)}}">{{$sub_category->category_name}}</a>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    </li>
                @endforeach
                <li><a href="{{route('gioi-thieu')}}"> Giới thiệu</a></li>
                <li><a href="{{route('lien-he')}}"> Liên Hệ</a></li>
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

    <main class="py-4" style="clear: both;">
        <div class="container-fluid">
            @yield('content')
        </div>
    </main>

    <div id="footer">
            <!-- Footer -->
        <footer class="page-footer font-small unique-color-dark">

            <div style="background-color: #6351ce;">
                <div class="container">

                    <!-- Grid row-->
                    <div class="row py-4 d-flex align-items-center">

                        <!-- Grid column -->
                        <div class="col-md-6 col-lg-5 text-center text-md-left mb-4 mb-md-0">
                            <h6 class="mb-0">Get connected with us on social networks!</h6>
                        </div>
                        <!-- Grid column -->

                        <!-- Grid column -->
                        <div class="col-md-6 col-lg-7 text-center text-md-right">

                            <!-- Facebook -->
                            <a class="fb-ic">
                                <i class="fab fa-facebook-f white-text mr-4"> </i>
                            </a>
                            <!-- Twitter -->
                            <a class="tw-ic">
                                <i class="fab fa-twitter white-text mr-4"> </i>
                            </a>
                            <!-- Google +-->
                            <a class="gplus-ic">
                                <i class="fab fa-google-plus-g white-text mr-4"> </i>
                            </a>
                            <!--Linkedin -->
                            <a class="li-ic">
                                <i class="fab fa-linkedin-in white-text mr-4"> </i>
                            </a>
                            <!--Instagram-->
                            <a class="ins-ic">
                                <i class="fab fa-instagram white-text"> </i>
                            </a>

                        </div>
                        <!-- Grid column -->

                    </div>
                    <!-- Grid row-->

                </div>
            </div>

            <!-- Footer Links -->
            <div class="container text-center text-md-left mt-5">

                <!-- Grid row -->
                <div class="row mt-3">

                    <!-- Grid column -->
                    <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">

                        <!-- Content -->
                        <h6 class="text-uppercase font-weight-bold">Company name</h6>
                        <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
                        <p>Here you can use rows and columns to organize your footer content. Lorem ipsum dolor sit amet,
                            consectetur
                            adipisicing elit.</p>

                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">

                        <!-- Links -->
                        <h6 class="text-uppercase font-weight-bold">Products</h6>
                        <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
                        <p>
                            <a href="#!">MDBootstrap</a>
                        </p>
                        <p>
                            <a href="#!">MDWordPress</a>
                        </p>
                        <p>
                            <a href="#!">BrandFlow</a>
                        </p>
                        <p>
                            <a href="#!">Bootstrap Angular</a>
                        </p>

                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">

                        <!-- Links -->
                        <h6 class="text-uppercase font-weight-bold">Useful links</h6>
                        <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
                        <p>
                            <a href="#!">Your Account</a>
                        </p>
                        <p>
                            <a href="#!">Become an Affiliate</a>
                        </p>
                        <p>
                            <a href="#!">Shipping Rates</a>
                        </p>
                        <p>
                            <a href="#!">Help</a>
                        </p>

                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">

                        <!-- Links -->
                        <h6 class="text-uppercase font-weight-bold">Contact</h6>
                        <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
                        <p>
                            <i class="fas fa-home mr-3"></i> New York, NY 10012, US</p>
                        <p>
                            <i class="fas fa-envelope mr-3"></i> info@example.com</p>
                        <p>
                            <i class="fas fa-phone mr-3"></i> + 01 234 567 88</p>
                        <p>
                            <i class="fas fa-print mr-3"></i> + 01 234 567 89</p>

                    </div>
                    <!-- Grid column -->

                </div>
                <!-- Grid row -->

            </div>
            <!-- Footer Links -->

            <!-- Copyright -->
            <div class="footer-copyright text-center py-3">© 2020 Copyright:
                <a href="https://mdbootstrap.com/education/bootstrap/"> MDBootstrap.com</a>
            </div>
            <!-- Copyright -->

        </footer>
            <!-- Footer -->
    </div>

</div>
</body>
</html>
