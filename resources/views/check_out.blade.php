@extends('layouts.app')

@section('content')
    <div class="view-check-out">
        <div class="container">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{route('thanh-toan')}}" method="post">
                <div class="row">
                    <div class="col-md-6">
                        <div class="align-content-center row-input">
                            <a class="btn btn-primary" href="{{route('login')}}">Đăng nhập</a>
                        </div>
                        <div class="row row-input">
                            <div class="col-md-12">
                                <label class="label">Thông tin khách hàng</label>
                                <input type="email" class="form-control" name="email" placeholder="email">
                            </div>
                        </div>
                        <div class="row row-input">
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="first_name" placeholder="họ">
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="last_name" placeholder="tên">
                            </div>
                        </div>
                        <div class="row row-input">
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="phone_number" placeholder="SĐT">
                            </div>
                        </div>
                        <div class="row row-input">
                            <div class="col-md-12">
                                <textarea name="address" class="form-control">Địa chỉ</textarea>
                            </div>
                        </div>
                        <div class="row row-input">
                            <button class="btn btn-primary -pull-right">Thanh toán</button>
                        </div>
                    </div>
                    <div class="col-md-6">

                    </div>
                    {{csrf_field()}}
                </div>
            </form>
        </div>
    </div>
@endsection
