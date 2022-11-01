<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Redirect;
use DB;
session_start();

class ProductController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        //
    }
 
    public function update_product(Request $request,$id_product){

        $data = array();
        $data['name_product'] = $request ->name_product;
        $data['price_product'] = $request ->price_product;
        $data['desc_product'] = $request ->desc_product;
        $data['content_product'] = $request ->content_product;
        $data['cate_product'] = $request ->cate_product;
        $data['brand_product'] = $request ->brand_product;
        $data['quantity_product'] = $request ->quantity_product;
        $get_image= $request->file('image_product');
        if($get_image){
            $get_name_image =$get_image->getClientOriginalName();
            $name_image= current(explode('.', $get_name_image));
            $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('upload',$new_image);
            $data['image_product'] = $new_image;
        
            $get_image_second =$request -> file('product_image_second');
            if($get_image_second){
                $get_name_image_second =$get_image_second->getClientOriginalName();
                $name_image_second= current(explode('.', $get_name_image_second));
                $new_image_second = $name_image_second.rand(0,99).'.'.$get_image_second->getClientOriginalExtension();
                $get_image_second->move('upload',$new_image_second);
                $data['image_second_product'] = $new_image_second;
                DB::table('tbl_product')->where('id_product',$product_id)->update($data);
                Session::put('message','Cập nhật sản phẩm thành công');
                return Redirect::to('/');
            }else{
            Session::put('message','Chưa chọn ảnh cập nhật sản phẩm thất bại');
            return Redirect::to('/');
            }
        }else{
        DB::table('Product')->where('id_product',$id_product)->update($data);
        Session::put('message','Cập nhật sản phẩm thành công (^-^)');
        return Redirect::to('/');
        }   

    }
    public function save_product(Request $request){
        $data = array();
        $data['name_product'] = $request ->name_product;
        $data['price_product'] = $request ->price_product;
        $data['desc_product'] = $request ->desc_product;
        $data['content_product'] = $request ->content_product;
        $data['cate_product'] = $request ->cate_product;
        $data['brand_product'] = $request ->brand_product;
        $data['quantity_product'] = $request ->quantity_product;
        $get_image =$request -> file('image_product');
        if($get_image){
            $get_name_image =$get_image->getClientOriginalName();
            $name_image= current(explode('.', $get_name_image));
            echo $name_image;
            // $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            // $get_image->move('/public/public/upload',$new_image);
            // $data['image_product'] = $new_image;
            // $get_image_second =$request -> file('image_second_product');
            // if($get_image_second){
            //     $get_name_image_second =$get_image_second->getClientOriginalName();
            //     $name_image_second= current(explode('.', $get_name_image_second));
            //     $new_image_second = $name_image_second.rand(0,99).'.'.$get_image_second->getClientOriginalExtension();
            //     $get_image_second->move('/public/public/upload',$new_image_second);
            //     $data['image_second_product'] = $new_image_second;
            //     DB::table('Product')->insert($data);
            //     Session::put('message','Thêm sản phẩm thành công');
            //     return Redirect::to('/');
            // }else{
            // Session::put('message','Chưa chọn ảnh thêm sản phẩm thất bại');
            // return Redirect::to('/');
            //}
        }else{
        Session::put('message','Chưa chọn ảnh thêm sản phẩm thất bại');
        return Redirect::to('/');
        }

    }
    public function edit_product($id_product){
        $edit_product= DB::table('Product')->where('id_product',$id_product)->get();
        return view('editProduct')->with('edit_product', $edit_product);
    }
    public function delete_product($id_product){
        DB::table('Product')->where('id_product',$id_product)->delete();
        Session::put('message','Xóa sản phẩm thành công');
        return Redirect::to('/');

    }
}
