@extends('layouts.app')
@section('content')
    <div class="container">
        @if (Session::has('message'))
            <div class="alert alert-info">{{ Session::get('message') }}</div>
        @endif
        <div class="ao-clb">
            <div class="wrapper-title-aoclb">
                <h3 class="title-aoclb-product">Tìm kiếm</h3>
                <div class="count-product">
                    <p class="pull-left">Tìm thấy {{count($search)}} sản phẩm</p>
                    <div class="clearfix">
            </div>
            <div class="row">
                @foreach($search as $product)
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
    @endsection
