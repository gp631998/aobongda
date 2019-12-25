<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function getDetailProduct($id,Request $request){
        $product=Product::find($id);
        return view('product_detail',compact('product'));
    }
}
