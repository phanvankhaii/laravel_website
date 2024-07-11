<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();

class ProductController extends Controller
{
     public function kiemtralogin(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('admin')->send();
        }
    }

    public function add_product(){
        $this->kiemtralogin();
        $cate_product = DB::table('tbl_category_product')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->orderby('brand_id','desc')->get();
        return view('admin.product.add_product')->with('cate_product',$cate_product)->with('brand_product',$brand_product); 
    }

    public function all_product(){
        $this->kiemtralogin();
        $all_product = DB::table('tbl_product')
        ->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')
        ->join('tbl_brand','tbl_brand.brand_id','=','tbl_product.brand_id')
        ->orderby('tbl_product.product_id')->get();
        $manager_product = view('admin.product.all_product')->with('all_product',$all_product);
        return view('admin_layout')->with('admin.product.all_product',$manager_product);
    }

    public function save_product(Request $request){
        $this->kiemtralogin();
        $data = array();
        $data['product_name'] = $request->product_name;
        $data['product_gia'] = $request->product_gia;
        $data['product_soluong'] = $request->product_soluong;
        $data['product_hdh'] = $request->product_hdh;
        $data['product_CPU'] = $request->product_CPU;
        $data['product_GPU'] = $request->product_GPU; 
        $data['product_RAM'] = $request->product_RAM;
        $data['product_ROM'] = $request->product_ROM;
        $data['product_manhinh'] = $request->product_manhinh; 
        $data['product_camera'] = $request->product_camera;
        $data['product_conggiaotiep'] = $request->product_conggiaotiep;
        $data['product_congxuat'] = $request->product_congxuat; 
        $data['product_pin'] = $request->product_pin;
        $data['product_bluetooth'] = $request->product_bluetooth;
        $data['product_WIFI'] = $request->product_WIFI; 
        $data['product_LAN'] = $request->product_LAN;
        $data['product_baomat'] = $request->product_baomat;
        $data['product_amthanh'] = $request->product_amthanh; 
        $data['product_ledbanphim'] = $request->product_ledbanphim;
        $data['product_kichthuoc'] = $request->product_kichthuoc;
        $data['product_khoiluong'] = $request->product_khoiluong; 
        $data['product_baohanh'] = $request->product_baohanh;
        $data['product_hang'] = $request->product_hang;
        $data['product_mota'] = $request->product_mota; 
        $data['category_id'] = $request->product_cate;
        $data['brand_id'] = $request->product_brand;
        $data['product_status'] = $request->product_status; 
        //lấy trường csdl               //từ name của ô nhập
        $get_image = $request->file('product_image');
        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension(); //getClientOriginalExtension đuôi mở rộng ảnh
            $get_image->move('public/upload/product',$new_image);
            $data['product_image'] = $new_image;
            DB::table('tbl_product')->insert($data);
        Session::put('message','Thêm sản phẩm thành công');
        return Redirect::to('add-product');
        }
        $data['product_image'] = '';
        DB::table('tbl_product')->insert($data);
        Session::put('message','Thêm sản phẩm thành công');
        return Redirect::to('all-product');
    }

    public function unactive_product($product_id){
        $this->kiemtralogin();
        DB::table('tbl_product')->where('product_id',$product_id)->update(['product_status'=>1]);
        Session::put('message','Kích hoạt sản phẩm thành công');
        return Redirect::to('all-product');
    }

    public function active_product($product_id){
        $this->kiemtralogin();
        DB::table('tbl_product')->where('product_id',$product_id)->update(['product_status'=>0]);
        Session::put('message','Không kích hoạt sản phẩm thành công');
        return Redirect::to('all-product');
    }

    public function edit_product($product_id){
        $this->kiemtralogin();
        $cate_product = DB::table('tbl_category_product')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->orderby('brand_id','desc')->get();

        $edit_product = DB::table('tbl_product')->where('product_id',$product_id)->get();
        $manager_product = view('admin.product.edit_product')->with('edit_product',$edit_product)->with('cate_product',$cate_product)->with('brand_product',$brand_product);
        return view('admin_layout')->with('admin.product.edit_product',$manager_product); 
    }

    public function update_product(Request $request, $product_id){
        $this->kiemtralogin();
        $data = array();
        $data['product_name'] = $request->product_name;
        $data['product_gia'] = $request->product_gia;
        $data['product_soluong'] = $request->product_soluong;
        $data['product_hdh'] = $request->product_hdh;
        $data['product_CPU'] = $request->product_CPU;
        $data['product_GPU'] = $request->product_GPU; 
        $data['product_RAM'] = $request->product_RAM;
        $data['product_ROM'] = $request->product_ROM;
        $data['product_manhinh'] = $request->product_manhinh; 
        $data['product_camera'] = $request->product_camera;
        $data['product_conggiaotiep'] = $request->product_conggiaotiep;
        $data['product_congxuat'] = $request->product_congxuat; 
        $data['product_pin'] = $request->product_pin;
        $data['product_bluetooth'] = $request->product_bluetooth;
        $data['product_WIFI'] = $request->product_WIFI; 
        $data['product_LAN'] = $request->product_LAN;
        $data['product_baomat'] = $request->product_baomat;
        $data['product_amthanh'] = $request->product_amthanh; 
        $data['product_ledbanphim'] = $request->product_ledbanphim;
        $data['product_kichthuoc'] = $request->product_kichthuoc;
        $data['product_khoiluong'] = $request->product_khoiluong; 
        $data['product_baohanh'] = $request->product_baohanh;
        $data['product_hang'] = $request->product_hang;
        $data['product_mota'] = $request->product_mota; 
        $data['category_id'] = $request->product_cate;
        $data['brand_id'] = $request->product_brand;
        $data['product_status'] = $request->product_status;

        $get_image = $request->file('product_image');
        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension(); //getClientOriginalExtension đuôi mở rộng ảnh
            $get_image->move('public/upload/product',$new_image);
            $data['product_image'] = $new_image;
            DB::table('tbl_product')->where('product_id',$product_id)->update($data);
            Session::put('message','Cập nhật phẩm thành công');
            return Redirect::to('all-product');
        }
        DB::table('tbl_product')->where('product_id',$product_id)->update($data);
        Session::put('message','Cập nhật phẩm thành công');
        return Redirect::to('all-product');     
    }

    public function delete_product($product_id){
        $this->kiemtralogin();
        DB::table('tbl_product')->where('product_id',$product_id)->delete();
        Session::put('message','Xóa sản phẩm thành công');
        return Redirect::to('all-product');
    }
    // kết thúc trang admin

    public function detail_product($product_id){
        $cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status','1')->orderby('brand_id','desc')->get();
         $detail_product = DB::table('tbl_product')
        ->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')
        ->join('tbl_brand','tbl_brand.brand_id','=','tbl_product.brand_id')
        ->where('tbl_product.product_id',$product_id)->get();

        foreach($detail_product as $key => $value){
            $category_id = $value->category_id;
        }
        

        $relation_product = DB::table('tbl_product')
        ->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')
        ->join('tbl_brand','tbl_brand.brand_id','=','tbl_product.brand_id')
        ->where('tbl_category_product.category_id',$category_id)->whereNotIn('tbl_product.product_id',[$product_id])->limit(3)->get();
        // sản phẩm liên quan cùng danh mục hoặc thương hiệu

        return view('page.product.show_detail')->with('category',$cate_product)->with('brand',$brand_product)->with('product_detail',$detail_product)->with('relation', $relation_product);
    }
}

