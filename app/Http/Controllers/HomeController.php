<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();

class HomeController extends Controller
{
    public function index(){
        $cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status','1')->orderby('brand_id','desc')->get();
        $all_product = DB::table('tbl_product')->where('product_status','1')->orderby('product_id','desc')->get();
        return view('page.sanpham')->with('category',$cate_product)->with('brand',$brand_product)->with('all_product',$all_product);
    }

    public function home(){
         $all_product = DB::table('tbl_product')->where('product_status','1')->orderby('product_id','desc')->get();
         return view('page.home')->with('all_product',$all_product);
    }

    public function timkiem(Request $request){
        $keywords = $request->seach_keywords;
        $timkiem_sanpham = DB::table('tbl_product')->where('product_name','like','%'.$keywords.'%')->get();
        if($timkiem_sanpham==NULL){
            Session::put('message','sbxujdb');
        }
        return view('page.product.timkiem')->with('timkiem_sanpham',$timkiem_sanpham);
    }
}
