@extends('admin.layouts.a')
@section('content')
    <div class="view-list-product">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Id</th>
                <th>Product name</th>
                <th>Image</th>
                <th>Published</th>
                <th>Category</th>
                <th>Ordering</th>
                <th>Price</th>
                <th>Sale_price</th>
                <th>created_at</th>
                <th>Description</th>
                <th><a href="{{route('them-san-pham')}}" class="btn btn-primary" >Add new</a></th>
            </tr>
            </thead>
            <tbody>
            @foreach($products as $product)
                <tr>
                    <td>{{$product->id}}</td>
                    <td nowrap="">{{$product->product_name}}</td>
                    <td nowrap=""><img class="product-image-intro" src="{{url('/')}}/{{$product->product_image_intro}}"></td>
                    <td nowrap="">{{$product->publish}}</td>
                    <td nowrap="">{{$product->category_id}}</td>
                    <td nowrap="">{{$product->ordering}}</td>
                    <td nowrap="">{{$product->price}}</td>
                    <td nowrap="">{{$product->sale_price}}</td>
                    <td nowrap="">{{date('d-m-Y h:m',strtotime($product->created_at))}}</td>
                    <td nowrap="">{{$product->description}}</td>
                    <th nowrap=""><a href="{{route('sua-san-pham',$product->id)}}" class="btn btn-info">Edit</a><a href="{{route('xoa-san-pham',$product->id)}}" class="btn btn-danger">Delete</a></th>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
