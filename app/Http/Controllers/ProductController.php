<?php

namespace App\Http\Controllers;

use App\Product;
use DB;
use App\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function getDetailProduct($id,Request $request){
        $product=Product::find($id);
        return view('product_detail',compact('product'));
    }
    public function getProductsById($id,Request $request){
        $products=DB::table('products')->where('category_id','=',$id)->orderBy('sale_price')->get();
        $category=Category::find($id);
        $list_sub_category=Category::query()->where('parent','=',$category->parent)->get();
        return view('list_product',compact('category','products','list_sub_category'));
    }
    public  function getSearch(Request $request){
//        dd($request->input('key'));
        $search =Product::where('product_name','like','%'.$request->input('key').'%')->get();

        return view('search.search', compact('search'));
    }
}
//<div class="col-md-6">
//                    <div class="area-search" style="margin-top: 30px;position: relative">
//                        <form  method="post" action="/search">
//                            <div class="form-inline">
//                                <input type="text" style="padding-right: 100px;" class="form-control" name="key">
//                                <button class="btn btn-primary">Tìm kiếm</button>
//                            </div>
//{{--                            <a--}}
//{{--                                style="position: absolute;right: 10px; top: 7px;font-size: 20px;"--}}
//{{--                                class="fas fa-search"></a>--}}
//                            <p><b>Từ khóa</b>: Đồ thể thao</p>
//                            {{csrf_field()}}
//                        </form>
//                    </div>
//                </div>
