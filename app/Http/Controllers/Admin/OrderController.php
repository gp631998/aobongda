<?php

namespace App\Http\Controllers\Admin;

use App\Orders;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use \Session;

class OrderController extends Controller
{
    //
    public function getAllOrder(Request $request){
        $orders=Orders::all();
        return view('admin.order.list_order',compact('orders'));
    }
    public function getOrderDetail($id,Request $request){
        $order=Orders::find($id);
        $list_product=Orders::getAllProductByOrderId($id);
        return view('admin.order.detail',compact('order','list_product'));
    }
    public function updateOrder($id,Request $request){
        $post=$request->all();
        $status=$post['status'];
        $order=Orders::find($id);
        $order->status=$status;
        $order->save();
        Session::flash('message', 'Đã cập nhật đơn hàng thành công');
        $list_product=Orders::getAllProductByOrderId($id);
        return view('admin.order.detail',compact('order','list_product'));
    }
}
