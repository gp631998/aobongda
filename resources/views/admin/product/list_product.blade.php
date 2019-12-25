@extends('admin.layouts.app')
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
                <th>Size</th>
                <th>Description</th>
                <th><a href="{{route('them-san-pham')}}" class="btn btn-primary" >Add new</a></th>
            </tr>
            </thead>
            <tbody>
            @foreach($products as $product)
                <tr>
                    <td>{{$product->id}}</td>
                    <td>{{$product->product_name}}</td>
                    <td><img class="product-image-intro" src="{{url('/')}}/{{$product->product_image_intro}}"></td>
                    <td>{{$product->publish}}</td>
                    <td>{{$product->category_id}}</td>
                    <td>{{$product->ordering}}</td>
                    <td>{{$product->price}}</td>
                    <td>{{$product->sale_price}}</td>
                    <td>{{$product->size}}</td>
                    <td>{{$product->description}}</td>
                    <th><a href="{{route('sua-san-pham',$product->id)}}" class="btn btn-primary">Edit</a><a href="{{route('xoa-san-pham',$product->id)}}" class="btn btn-primary">Delete</a></th>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
