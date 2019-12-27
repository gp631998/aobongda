@extends('layouts.app')

@section('content')
    <div class="view-home">
        <div class="container">
            @if (Session::has('message'))
                <div class="alert alert-info">{{ Session::get('message') }}</div>
            @endif
            <div class="ao-clb">
                <div class="wrapper-title-aoclb">
                    <h3 class="title-aoclb-product">Áo câu lạc bộ</h3>
                </div>
                <div class="row">
                    @foreach($aoclb_products as $product)
                        <div class="col-md-3">
                            <div class="clb-item">
                                <div clb-item-content>
                                    <div class="wrapper-image">
                                        <img class="clb-image-intro" src="{{url('/')}}/{{$product->product_image_intro}}">
                                    </div>
                                    <h4 class="clb-name">{{$product->product_name}}</h4>
                                    <div class="prices">
                                        <span class="prices">{{$product->price}}</span>
                                        <span class="currency"> đ</span>
                                    </div>
                                    <a href="{{route('product-detail',$product->id)}}" class="btn btn-primary btn-block"><i class="fas fa-search-plus"></i> Mua hàng</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

            <div class="ao-doi-tuyen" style="margin-top: 60px">
                <div class="wrapper-title-aodoituyen">
                    <h3 class="title-aodoituyen-product">Áo đội tuyển</h3>
                </div>
                <div class="row">
                    @foreach($aodoituyen_products as $product)
                        <div class="col-md-3">
                            <div class="doituyen-item">
                                <div doituyen-item-content>
                                    <div class="wrapper-image">
                                        <img class="doituyen-image-intro" src="{{url('/')}}/{{$product->product_image_intro}}">
                                    </div>
                                    <h4 class="doituyen-name">{{$product->product_name}}</h4>
                                    <div class="prices">
                                        <span class="prices">{{$product->price}}</span>
                                        <span class="currency"> đ</span>
                                    </div>
                                    <a href="{{route('product-detail',$product->id)}}" class="btn btn-primary btn-block"><i class="fas fa-search-plus"></i> Mua hàng</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="ao-logo" style="margin-top: 60px">
                <div class="wrapper-ao-logo">
                    <h3 class="title-aologo-product">Áo không logo</h3>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        áo logo
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
