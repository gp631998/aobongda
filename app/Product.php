<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Product extends Model
{
    public function getDataFoodByKeyWord($keyword){
//        $data = DB::table('products')
//            ->select('f.id', 'f.product_name', 'f.slug', 'f.avatar', 'f.price', 'ft.tag_id', 'f.inventory')
//            ->join('food_tag as ft', 'ft.food_id', '=', 'f.id')
//            ->where('f.name', 'like', '%' . $keyword . '%')
//            ->where('f.status', 1)
//            ->orderBy('f.added_date', 'DESC')
//            ->paginate(4);
        $data=DB::table('products')->where('product_name','=',$keyword)->get();

        return $data;
    }
}
