<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();

class AdminController extends Controller
{
    public function kiemtralogin(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('admin')->send();
        }
    }

    public function index(){
        return view('admin_login');
    }

    public function show_dashboard(){
        $this->kiemtralogin();
        return view('admin.dashboard');
    }

    public function dashboard(Request $request){
        $admin_email = $request->admin_email;
        $admin_password = md5($request->admin_password);

        $result = DB::table('tbl_admin')->where('admin_email',$admin_email)->where('admin_password',$admin_password)->first(); //lấy và so sánh với database
        // return view('admin.dashboard');
        if($result){  //đúng trả về dashboard
            Session::put('admin_name',$result->admin_name);
            Session::put('admin_id',$result->admin_id);
            return Redirect::to('/dashboard');
        }else{  //sai in ra thông báo
            Session::put('message','Tài khoản hoặc mật khẩu không chính xác. Vui lòng nhập lại !!!');
            return Redirect::to('/admin');
        }
        
    }

    public function logout(){
        $this->kiemtralogin();
        Session::put('admin_name',null);
        Session::put('admin_id',null);
        return Redirect('/admin');
    }

}
