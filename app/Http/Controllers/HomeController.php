<?php

namespace App\Http\Controllers;

use App\Product;
use DB;
use App\Category;
use Illuminate\Http\Request;
use Cart;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $aoclb_products=DB::table('products')->where('category_id','=',8)->get();
//        $aodoituyen_products=DB::table('products')->orderBy('category_id','=',9)->get();
        $aodoituyen_products = DB::table('products')
            ->where('category_id', '=', 9)
            ->get();
        return view('home',compact('aoclb_products','aodoituyen_products'));
    }
}
