<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use App\Category;

class ProductController extends Controller
{
    //
    function getListProduct(){
        $products=Product::orderBy('id','DESC')->get();
        return view('admin.product.list_product',compact('products'));
    }
    function getAddProduct(){
        return view('admin.product.add_new_item');
    }
    function getEditProduct($id){
        $product=Product::find($id);
        $parent_categories=Category::query()->where('parent','=',null)->get();
        $subcategories=Category::query()->where('parent','!=',null)->get();
        return view('admin.product.edit_item',compact('product','parent_categories','subcategories'));
    }
    function getDeleteProduct($id,Request $request){
        $product=Product::find($id);
        $product->delete();
        return redirect(route('list-danh-muc'));
    }
    function postAddProduct(Request $request){
        $post=$request->all();
        $request->validate([
            'product_name' => 'required|unique:products|max:255',
            'category_id' => 'required',
            'price' => 'required',
            'ordering' => 'required',
            //TODO lat nua phai lam upload product
            //'product_image_intro' => 'required',
            'description' => 'required',
            'full_description' => 'required'
        ]);
//        $productModel=new Product();
//        $productModel->product_name=$post['product_name'];
//        $productModel->category_id=$post['category_id'];
//        $productModel->publish=$post['publish'];
//        $productModel->price=$post['price'];
//        $productModel->sale_price=$post['sale_price'];
//        $productModel->ordering=$post['ordering'];
//        $productModel->description=$post['description'];
//        $productModel->full_description=$post['full_description'];
//        $productModel->created_at=date('Y-m-d H:i:s');
//        $productModel->updated_at=date('Y-m-d H:i:s');
//        $productModel->save();
//        return redirect(route('danh-sach-san-pham'));


        Product::create($request->all());

        return redirect(route('danh-sach-san-pham'));
    }
    function postEditProduct($id,Request $request){
        $post=$request->all();
        $request->validate([
            'product_name' => 'required|unique:products,id|max:255',
            'category_id' => 'required',
            'price' => 'required',
            'ordering' => 'required',
            //TODO lat nua phai lam upload product
            //'product_image_intro' => 'required',
            'description' => 'required',
            'full_description' => 'required'
        ]);
        $productModel=Product::find($id);
        $productModel->product_name=$post['product_name'];
        $productModel->category_id=$post['category_id'];
        $productModel->publish=$post['publish'];
        $productModel->price=$post['price'];
        $productModel->sale_price=$post['sale_price'];
        $productModel->ordering=$post['ordering'];
        $productModel->description=$post['description'];
        $productModel->full_description=$post['full_description'];
        $productModel->created_at=date('Y-m-d H:i:s');
        $productModel->updated_at=date('Y-m-d H:i:s');
        if($productModel->save()){
            if ($request->hasFile('product_image_intro')) {
                $file = $request->product_image_intro;
                // nếu cần validate file upload lên thì sử dụng mấy biến này
                $file_name=$file->getClientOriginalName();
                $extension_file=$file->getClientOriginalExtension();
                $temp_file=$file->getRealPath();
                $file_size=$file->getSize();
                $file_type=$file->getMimeType();
                $random=random_int(10000,50000);
                $file->move('upload/products', $random.$file->getClientOriginalName());
                $productModel->product_image_intro="upload/products/".$random.$file->getClientOriginalName();
                $productModel->save();
            }
        }
        return redirect(route('danh-sach-san-pham'));
    }
}
