<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Cart;
session_start();

class CartController extends Controller
{


     public function save_cart(Request $request){
        $productId = $request->productid_hidden;
        $quantity = $request->qty;
        $product_info = DB::table('tbl_product')->where('product_id',$productId)->first(); 

        
        // Cart::add('293ad', 'Product 1', 1, 9.99, 550);
        // Cart::destroy();
        $data['id'] = $product_info->product_id;
        $data['qty'] = $quantity;
        $data['name'] = $product_info->product_name;
        $data['price'] = $product_info->product_gia;
        $data['weight'] = $product_info->product_gia;
        $data['options']['image'] = $product_info->product_image;
        Cart::add($data);
        // Cart::destroy();
        return Redirect::to('/show-cart');
       
    }
    public function show_cart(){
        return view('page.cart.show_cart');
    }
    public function delete_to_cart($rowId){
        Cart::update($rowId,0);
        return Redirect::to('/show-cart');
    }
    public function update_cart_quantity(Request $request){
        $rowId = $request->rowId_cart;
        $qty = $request->cart_quantity;
        Cart::update($rowId,$qty);
        return Redirect::to('/show-cart');
    }
    

//    public function gio_hang(Request $request){
//       $meta_desc = "giỏ hàng của bạn";
//       $meta_keywords = "giỏ hàng";
//       $meta_title = "giỏ hàng";
//       $url_canonical = $request->url();
//       return view('page.cart.show_cart')->with('meta_desc',$meta_desc)->with('meta_keywords',$meta_keywords)
//       ->with('meta_title',$meta_title)->with('url_canonical',$url_canonical);
//    }

//    public function add_cart_ajax(Request $request){
//       $data = $request->all();
//       $session_id = substr(md5(microtime()),rand(0,26),5);
//       $cart = Session::get('cart');
//       if($cart==true){
//           $is_avaiable = 0;
//           foreach($cart as $key => $val){
//               if($val['product_id']==$data['cart_product_id']){
//                   $is_avaiable++;
//               }
//           }
//           if($is_avaiable == 0){
//               $cart[] = array(
//               'session_id' => $session_id,
//               'product_name' => $data['cart_product_name'],
//               'product_id' => $data['cart_product_id'],
//               'product_image' => $data['cart_product_image'],
//               'product_soluong' => $data['cart_product_soluong'],
//               'product_gia' => $data['cart_product_gia'],
//               );
//               Session::put('cart',$cart);
//           }
//       }else{
//           $cart[] = array(
//               'session_id' => $session_id,
//               'product_name' => $data['cart_product_name'],
//               'product_id' => $data['cart_product_id'],
//               'product_image' => $data['cart_product_image'],
//               'product_soluong' => $data['cart_product_soluong'],
//               'product_gia' => $data['cart_product_gia'],

//           );
//           Session::put('cart',$cart);
//       }
     
//       Session::save();

//   }  

//   public function xoa_san_pham($session_id){
//     $cart = Session::get('cart');
//     if($cart==true){
//          foreach($cart as $key => $val){
//              if($val['session_id']==$session_id){
//                 unset($cart[$key]);
//              }
//          }
//          Session::put('cart',$cart);
//          return redirect()->back()->with('message', 'Xoá thành công');
//     }else{
//      return redirect()->back()->with('message', 'Xoá thất bại');
//     }
// }


//    public function save_cart(Request $request){
//       $productid = $request->productid_hidden;
//       $soluong = $request->qty;
//       $product_info = DB::table('tbl_product')->where('product_id',$productid)->first();

//       $data['id'] = $product_info->product_id;
//       $data['qty'] = $soluong;
//       $data['name'] = $product_info->product_name;
//       $data['price'] = $product_info->product_gia;
//       $data['weight'] = $product_info->product_gia;
//       $data['option']['image'] = $product_info->product_image;
//       Cart::add($data);
//       return Redirect::to('/show-cart');
//       // Cart::destroy();  
//    }

//    public function update_cart(Request $request){
//         $data = $request->all();
//         $cart = Session::get('cart');
//         if($cart==true){
//             foreach($data['cart_qty'] as $key => $qty){
//                 foreach($cart as $session => $val){
//                     if($val['session_id']==$key){
//                         $cart[$session]['product_soluong'] = $qty;
//                     }
//                 }
//             }
//             Session::put('cart',$cart);
//             return redirect()->back()->with('message', 'Cập nhật số lượng thành công');
//         }else{
//             return redirect()->back()->with('message', 'Cập nhật số lượng thất bại');
//            }
//    }

//    public function xoa_tat_ca(){
//     $cart = Session::get('cart');
//         if($cart==true){
//             // Session::destroy();
//             Session::forget('cart');
//             Session::forget('mgg');
//             return redirect()->back()->with('message','Đã xóa tất cả sản phẩm');
//         }
//    }

   

   

   

  
   
}
