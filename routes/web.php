<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use Illuminate\Support\Facades\Route;



Auth::routes();
//++++++++++++++++ FRONTEND ++++++++++++++++++++
Route::get('/', 'HomeController@index')->name('home');
//nút chi tiết sản phẩm
Route::get("product-detail/{id}",['as'=>'product-detail','uses'=>"ProductController@getDetailProduct"]);
//thêm hàng
Route::post("add-to-cart/{id}",['as'=>'add-to-cart','uses'=>"CartController@postAddToCart"]);
//page mua hàng
Route::get("gio-hang",['as'=>'gio-hang','uses'=>"CartController@index"]);
//thanh toán
Route::get("thanh-toan",['as'=>'thanh-toan','uses'=>"CartController@payNow"]);
Route::post("thanh-toan",['as'=>'thanh-toan','uses'=>"CartController@postPayNow"]);
Route::post("remove-item-cart/{id}",['as'=>'remove-item-cart','uses'=>"CartController@removeItemCart"]);
//đăng nhập đăng ký tìm kiếm
Route::post("dang-nhap",['as'=>'dang-nhap','uses'=>"CartController@removeItemCart"]);
Route::post("dang-ky",['as'=>'dang-ky','uses'=>"CartController@removeItemCart"]);
Route::post("tim-kiem",['as'=>'tim-kiem','uses'=>"CartController@removeItemCart"]);
//TODO làm sau giới thiệu liên hệ
Route::post("gioi-thieu",['as'=>'gioi-thieu','uses'=>"CartController@removeItemCart"]);
Route::post("lien-he",['as'=>'lien-he','uses'=>"CartController@removeItemCart"]);
//TODO làm sau

Route::get("danh-muc/{id}",['as'=>'danh-muc','uses'=>"ProductController@getProductsById"]);


//++++++++++++++++ BACKEND +++++++++++++++++++++
Route::group(['prefix'=>'admin','namespace'=>"Admin","middleware"=>"auth"],function(){
    Route::group(['prefix' => 'san-pham'], function (){
        //root/admin/san-pham/danh-sach
        Route::get("danh-sach",['as'=>'danh-sach-san-pham','uses'=>"ProductController@getListProduct"]);
        //root/admin/san-pham/them
        Route::get("them", ['as' => 'them-san-pham', 'uses' => 'ProductController@getAddProduct']);
        //root/admin/san-pham/them
        Route::post("them", ['as' => 'post-add-product', 'uses' => 'ProductController@postAddProduct']);
        //root/admin/san-pham/sua-san-pham
        Route::get("sua-san-pham/{id}", ['as' => 'sua-san-pham', 'uses' => 'ProductController@getEditProduct']);
        //root/admin/san-pham/sua-san-pham
        Route::post("sua-san-pham/{id}", ['as' => 'post-sua-san-pham', 'uses' => 'ProductController@postEditProduct']);
        //root/admin/san-pham/xoa-san-pham
        Route::get("xoa-san-pham/{id}", ['as' => 'xoa-san-pham', 'uses' => 'ProductController@getDeleteProduct']);
    });



    Route::group(['prefix' => 'danh-muc'], function (){
        //root/admin/danh-muc/list-danh-muc
        Route::get("list-danh-muc", ['as'=>'list-danh-muc','uses'=>"CategoryController@getListCategory"]);
        //root/admin/danh-muc/them-danh-muc
        Route::get("them-danh-muc", ['as'=>'them-danh-muc','uses'=>"CategoryController@getAddCategory"]);
        //root/admin/danh-muc/them-danh-muc
        Route::post("them-danh-muc", ['as'=>'post-add-category','uses'=>"CategoryController@postAddCategory"]);
        //root/admin/danh-muc/sua-danh-muc
        Route::get("sua-danh-muc/{id}", ['as'=>'sua-danh-muc','uses'=>"CategoryController@getEditCategory"]);
        //root/admin/danh-muc/sua-danh-muc
        Route::post("post-sua-danh-muc/{id}", ['as'=>'post-sua-danh-muc','uses'=>"CategoryController@postEditCategory"]);
        //root/admin/danh-muc/xoa-danh-muc
        Route::get("xoa-danh-muc/{id}", ['as' => 'xoa-danh-muc', 'uses' => 'CategoryController@getDeleteCategory']);
    });

    Route::group(['prefix' => 'don-hang'], function (){
        //root/admin/danh-muc/list-don-hang
        Route::get("list-don-hang", ['as'=>'list-don-hang','uses'=>"OrderController@getAllOrder"]);
        //root/admin/danh-muc/chi-tiet-don-hang
        Route::get("chi-tiet-don-hang/{id}", ['as'=>'chi-tiet-don-hang','uses'=>"OrderController@getOrderDetail"]);
        //root/admin/danh-muc/chi-tiet-don-hang
        Route::post("update-order/{id}", ['as' => 'post-edit-order', 'uses' => 'OrderController@updateOrder']);
    });
});
