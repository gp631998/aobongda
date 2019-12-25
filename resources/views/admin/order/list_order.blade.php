@extends('admin.layouts.app')
@section('content')
    <div class="view-list-order">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Id</th>
                <th>Order Number</th>
                <th>Customer name</th>
                <th>Status</th>
                <th>Total</th>
                <th>Xem</th>
                <th>Add new</th>
            </tr>
            </thead>
            <tbody>
            @foreach($orders as $order)
                <tr>
                    <td>{{$order->id}}</td>
                    <td>{{$order->order_name}}</td>
                    <td>Customer name</td>
                    <td>{{$order->status}}</td>
                    <td>{{$order->total}}</td>
                    <td><a href="{{route('chi-tiet-don-hang',$order->id)}}" class="btn btn-primary">Xem</a></td>
                    <td>
                        <a href="" class="btn btn-primary">Edit</a>
                        <a href="" class="btn btn-primary">Delete</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
