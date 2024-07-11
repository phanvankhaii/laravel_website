<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\KhuyenMai;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();

class KMController extends Controller
{
    public function check_magiamgia(Request $request){
        $data = $request->all();
        $mgg = KhuyenMai::where('code_mgg',$data['magiamgia'])->first();
        if($mgg){
            $count_mgg = $mgg->count();
            if($count_mgg>0){
                $mgg_session = Session::get('magiamgia');
                if($mgg_session==true){
                    $is_avaiable = 0;
                    if($is_avaiable==0){
                        $cou[] = array(
                            'code_mgg' => $mgg->code_mgg,
                            'tinhnang_mgg' => $mgg->tinhnang_mgg,
                            'tiengiam_mgg' => $mgg->tiengiam_mgg,
                        );
                        Session::put('mgg',$cou);
                    }
                } else{
                    $cou[] = array(
                            'code_mgg' => $mgg->code_mgg,
                            'tinhnang_mgg' => $mgg->tinhnang_mgg,
                            'tiengiam_mgg' => $mgg->tiengiam_mgg,
                        );
                        Session::put('mgg',$cou);
                }
                Session::save();
                return redirect()->back()->with('message','áp dụng mã giảm giá thành công');
            }
        } else{
            return redirect()->back()->with('message','mã không hợp lệ');
        }
    }

    public function add_magiamgia(){
        return view('admin.magiamgia.add_magiamgia');
    }

    public function list_magiamgia(){
        $mgg = KhuyenMai::orderby('id_mgg','desc')->get();
        return view('admin.magiamgia.list_magiamgia')->with(compact('mgg'));
    }

    public function add_mgg(Request $request){
        $data = $request->all();
        $mgg = new KhuyenMai;

        $mgg->name_mgg = $data['name_mgg'];
        $mgg->code_mgg = $data['code_mgg'];
        $mgg->soluong_mgg = $data['soluong_mgg'];
        $mgg->tinhnang_mgg = $data['tinhnang_mgg'];
        $mgg->tiengiam_mgg = $data['tiengiam_mgg'];
        $mgg->time_mgg = $data['time_mgg'];
        $mgg->save();

        Session::put('message','thêm mã giảm giá thành công');
        return Redirect::to('add-magiamgia');
    }

    public function delete_magiamgia($id_mgg){
        $mgg = KhuyenMai::find($id_mgg);  // find lấy ra id để so sánh với id truyền vào
        $mgg->delete();
        Session::put('message','Xoá mã giảm giá thành công');
        return Redirect::to('list-magiamgia');
    }
}
