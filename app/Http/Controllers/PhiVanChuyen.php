<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TinhThanh;
use App\QuanHuyen;
use App\XaPhuong;
use App\PhiShip;

class PhiVanChuyen extends Controller
{
    public function vanchuyen(Request $request){
        $tinhthanh = TinhThanh::orderby('matp','ASC')->get(); //asc sắp xếp tăng dần
        return view('admin.phivanchuyen.add_phivanchuyen')->with(compact('tinhthanh'));
    }

    public function select_phivanchuyen(Request $request){
        $data = $request->all();
        if($data['action']){
            $output ='';
            if($data['action']=="tinhthanh"){
                $chon_quanhuyen = QuanHuyen::where('matp',$data['ma_id'])->orderby('maqh','ASC')->get();
                $output.='<option>-----Chọn Quận Huyện-----</option>';
                foreach($chon_quanhuyen as $key =>$quanhuyen){
                $output.='<option value="'.$quanhuyen->maqh.'">'.$quanhuyen->name_quanhuyen.'</option>';
                }
            } else{
                $chon_xaphuong = XaPhuong::where('maqh',$data['ma_id'])->orderby('xaid','ASC')->get();
                $output.='<option>-----Chọn Xã Phường-----</option>';
                foreach($chon_xaphuong as $key =>$xaphuong){
                $output.='<option value="'.$xaphuong->xaid.'">'.$xaphuong->name_xaphuong.'</option>';
                }
            }
        }
        echo $output;
    }

    public function add_phivanchuyen(Request $request){
        $data = $request->all();
        $phivanchuyen = new PhiShip();
        $phivanchuyen->matinhthanh = $data['tinhthanh'];
        $phivanchuyen->maquanhuyen = $data['quanhuyen'];
        $phivanchuyen->maxaphuong = $data['xaphuong'];
        $phivanchuyen->tienphi = $data['phiship'];
        $phivanchuyen->save();
    }

    public function chon_phivanchuyen(){
        $phivanchuyen = PhiShip::orderby('id_phiship','desc')->get();
        $output = '';
        $output.='<div class="table-responsive">
            <table class="table table-bordered">
                <thread>
                    <tr>
                        <th>Tên thành phố</th>
                        <th>Tên quận huyện</th>
                        <th>Tên xã phường</th>
                        <th>Phí vận chuyển</th>
                    </tr>
                </thread>
                <tbody>
                ';

                foreach($phivanchuyen as $key => $pvc){
                $output.='
                    <tr>
                        <td>'.$pvc->tinhthanh->name_tinhthanh.'</td>
                        <td>'.$pvc->quanhuyen->name_quanhuyen.'</td>
                        <td>'.$pvc->xaphuong->name_xaphuong.'</td>
                        <td contenteditable data-phiship_id="'.$pvc->id_phiship.'" class="phiship_edit">'.number_format(floatval ($pvc->tienphi)).'</td>
                    </tr>
                    ';
                }
        $output.='
                </tbody>
                </table>
                </div>
                ';

                echo $output;
        
    }

    public function update_phivanchuyen(Request $request){
        $data = $request->all();
        $phivanchuyen = PhiShip::find($data['id_phiship']);
        $tienship = rtrim($data['tienship'],',');
        $phivanchuyen->tienphi = $tienship;
        $phivanchuyen->save();

    }
}
