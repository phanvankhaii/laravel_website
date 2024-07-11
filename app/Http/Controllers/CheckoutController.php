<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Cart;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use App\TinhThanh;
use App\QuanHuyen;
use App\XaPhuong;
use App\PhiShip;
use App\Order;
use App\OrderDetail;
session_start();

class CheckoutController extends Controller
{
    public function kiemtralogin(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('admin')->send();
        }
    }

    public function manage_order(){
        $this->kiemtralogin();
        $all_order = DB::table('tbl_order')
        ->join('tbl_customer','tbl_order.customer_id','=','tbl_customer.customer_id')
        ->select('tbl_order.*','tbl_customer.customer_name')
        ->orderby('tbl_order.order_id','desc')->get();
        $manager_order = view('admin.donhang.manage_order')->with('all_order',$all_order);
        return view('admin_layout')->with('admin.donhang.manage_order',$manager_order);
        
    }

    public function view_order($order_id){
        $this->kiemtralogin();
        $order_by_id = DB::table('tbl_order')
        ->join('tbl_customer','tbl_order.customer_id','=','tbl_customer.customer_id')
        ->join('tbl_donhang','tbl_order.donhang_id','=','tbl_donhang.donhang_id')
        ->join('tbl_order_detail','tbl_order.order_id','=','tbl_order_detail.order_id')
        ->select('tbl_order.*','tbl_customer.*','tbl_donhang.*','tbl_order_detail.*')->first();
        $manager_order_by_id = view('admin.donhang.view_order')->with('order_by_id',$order_by_id);
        return view('admin_layout')->with('admin.donhang.view_order',$manager_order_by_id);
        
    }



    public function login_checkout(){
        return view('page.checkout.login_checkout');
    }

    public function add_customer(Request $request){
        $data = array();
        $data['customer_name'] = $request->customer_name;
        $data['customer_email'] = $request->customer_email;
        $data['customer_pass'] = $request->customer_pass;
        $data['customer_phone'] = $request->customer_phone;

        $customer_id = DB::table('tbl_customer')->insertGetId($data);

        Session::put('customer_id',$customer_id);
        Session::put('customer_name',$request->customer_name);
        $all_product = DB::table('tbl_product')->where('product_status','1')->orderby('product_id','desc')->get();
        return view('page.home')->with('all_product',$all_product);;

    }

    public function dangki(){
        return view('page.checkout.dangki');
    }

    public function checkout(){
        // $tinhthanh = TinhThanh::orderby('matp','ASC')->get();
        return view('page.checkout.thanhtoan');
        // ->with('tinhthanh',$tinhthanh);
    }

    public function save_checkout_customer(Request $request){
        $data = array();
        $data['donhang_name'] = $request->donhang_name;
        $data['donhang_email'] = $request->donhang_email;
        $data['donhang_diachi'] = $request->donhang_diachi;
        $data['donhang_phone'] = $request->donhang_phone;

        $donhang_id = DB::table('tbl_donhang')->insertGetId($data);

        Session::put('donhang_id',$donhang_id);
        
        return Redirect::to('/payment');

    }

    public function payment(){
       return view('page.checkout.payment');
    }

    public function order_place(Request $request){
        //insert payment_method
     
        $data = array();
        $data['hinhthucthanhtoan'] = $request->payment_option;
        $data['tinhtrang'] = 'Đang chờ xử lý';
        $payment_id = DB::table('tbl_payment')->insertGetId($data);

        //insert order
        $order_data = array();
        $order_data['customer_id'] = Session::get('customer_id');
        $order_data['donhang_id'] = Session::get('donhang_id');
        $order_data['payment_id'] = $payment_id;
        $order_data['tongtien'] = Cart::total();
        $order_data['trangthai'] = 'Đang chờ xử lý';
        $order_id = DB::table('tbl_order')->insertGetId($order_data);

        //insert order_detail
        $content = Cart::content();
        foreach($content as $v_content){
            $order_detail_data['order_id'] = $order_id;
            $order_detail_data['product_id'] = $v_content->id;
            $order_detail_data['product_name'] = $v_content->name;
            $order_detail_data['product_gia'] = $v_content->price;
            $order_detail_data['product_soluong_sale'] = $v_content->qty;
            DB::table('tbl_order_detail')->insert($order_detail_data);
        }
        if($data['hinhthucthanhtoan']==1){

            echo 'Thanh toán thẻ ATM';

        }else{
            Cart::destroy();
            return view('page.checkout.sauthanhtoan');

        }
        
        //return Redirect::to('/payment');
    }

    public function logout_checkout(){
        Session::flush();
        return Redirect('/login-checkout');
    }

    public function login_customer(Request $request){
        $email = $request->email_account;
        $pass = $request->password_account;
        $result = DB::table('tbl_customer')->where('customer_email',$email)->where('customer_pass',$pass)->first();

        if($result){
             Session::put('customer_id',$result->customer_id);
             $all_product = DB::table('tbl_product')->where('product_status','1')->orderby('product_id','desc')->get();
         return view('page.home')->with('all_product',$all_product);
        }else{
             return Redirect::to('/login-checkout');
        }
       
       
    }





    // public function xac_nhan_don_hang(Request $request){
    //     $data = $request->all();
    //     $donhang = new DonHang();
    //     $donhang->donhang_name = $data['donhang_name'];
    //     $donhang->donhang_email = $data['donhang_email'];
    //     $donhang->donhang_diachi = $data['donhang_diachi'];
    //     $donhang->donhang_phone = $data['donhang_phone'];
    //     $donhang->phuongthucthanhtoan = $data['phuongthucthanhtoan'];
    //     $donhang->save();
    //     $donhang_id = $donhang->donhang_id;

    //     $ma_hoadon = substr(md5(microtime()),rand(0,26),5);
    //     $order = new Order;
    //     $order->customer_id = Session::get('customer_id');
    //     $order->donhang_id = $donhang_id;
    //     $order->order_status = 1;
    //     $order->order_code = $ma_hoadon;
    //     $order->save();

        
    //     if(Session::get('cart')==true){
    //         foreach(Session::get('cart') as $key =>$cart){
    //             $order_detail = new OrderDetail;
    //             $order_detail->order_code = $ma_hoadon;
    //             $order_detail->product_id = $cart['product_id'];
    //             $order_detail->product_name = $cart['product_name'];
    //             $order_detail->product_gia = $cart['product_gia'];
    //             $order_detail->product_sale_quantily = $cart['product_soluong'];
    //             $order_detail->magiamgia = $data['order_mgg'];
    //             $order_detail->phivanchuyen = $data['order_phi'];
    //             $order_detail->save();

    //         }
    //     }



    // }


    // public function select_phivanchuyen_home(Request $request){
    //     $data = $request->all();
    //     if($data['action']){
    //         $output ='';
    //         if($data['action']=="tinhthanh"){
    //             $chon_quanhuyen = QuanHuyen::where('matp',$data['ma_id'])->orderby('maqh','ASC')->get();
    //             $output.='<option>-----Chọn Quận Huyện-----</option>';
    //             foreach($chon_quanhuyen as $key =>$quanhuyen){
    //             $output.='<option value="'.$quanhuyen->maqh.'">'.$quanhuyen->name_quanhuyen.'</option>';
    //             }
    //         } else{
    //             $chon_xaphuong = XaPhuong::where('maqh',$data['ma_id'])->orderby('xaid','ASC')->get();
    //             $output.='<option>-----Chọn Xã Phường-----</option>';
    //             foreach($chon_xaphuong as $key =>$xaphuong){
    //             $output.='<option value="'.$xaphuong->xaid.'">'.$xaphuong->name_xaphuong.'</option>';
    //             }
    //         }
    //         echo $output;
    //     }
        
    // }

    // public function xoa_phi_ship(){
    //     Session::forget('phi');
    //     return redirect()->back();
    // }

    
    // public function tinh_phi_van_chuyen(Request $request){
    //     $data = $request->all();
    //     if($data['matp']){
    //         $phiship = PhiShip::where('matinhthanh',$data['matp'])->where('maquanhuyen',$data['maqh'])->where('maxaphuong',$data['xaid'])->get();
    //         if($phiship){
    //             $count_phiship = $phiship->count();
    //             if($count_phiship>0){
    //                foreach($phiship as $key => $phi){
    //                     Session::put('phi',$phi->tienphi);
    //                     Session::save(); 
    //                 }
    //             }else{
    //                 Session::put('phi',20000);
    //                     Session::save();
    //             }
            
    //         }
    //     }
    // }


    




    
}
