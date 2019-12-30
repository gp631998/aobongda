<?php

namespace App\Http\Controllers;

use App\Customers;
use App\Orders;
use App\Product;
use Illuminate\Http\Request;
use \Cart;
use \DB;
use \Session;
class CartController extends Controller
{
    public function index(){
        return view("cart");
    }
    public function payNow(){
        return view("check_out");
    }
    public function postPayNow(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'phone_number' => 'required',
            //TODO lat nua phai lam upload product
            //'product_image_intro' => 'required',
            'address' => 'required',
        ]);

        $post=$request->all();
        $customers=new Customers();
        $customers->fill($post);
        $customers->save();

        $order=new Orders();
        $order->customer_id=$customers->id;
        $order->total=Cart::total();
        dd($order->total);
        $order->status="pending";
        $order->save();
        $order_id=$order->id;
        foreach (Cart::content() as $item){
            DB::table('order_product')->insert(
                array(
                    'product_id' => $item->id,
                    'order_id' => $order_id,
                    'product_name' => $item->name,
                    'product_price' => $item->price,
                    'product_qty' => $item->qty,
                )
            );
        }
        Cart::destroy();
        Session::flash('message', 'Bạn đã mua hàng thành công, cảm ơn bạn');
        return redirect(route('home'));
    }
    public function postAddToCart($id,Request $request){
        $product=Product::find($id);
        $post=$request->all();
        $price=$product->price;
        Cart::add($id,$product->product_name,$post['quality'],$price);
        return redirect(route('gio-hang'));
    }
    public function removeItemCart($id,Request $request){
        Cart::remove($id);
        return redirect(route('gio-hang'));
    }
}
