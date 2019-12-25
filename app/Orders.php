<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use \DB;
use http\Env\Request;
class Orders extends Model
{
    public  static function getAllProductByOrderId($id){
        $list_product = DB::table('order_product')->select("*")->where('order_id','=', $id)->get();
        return $list_product;
    }
}
