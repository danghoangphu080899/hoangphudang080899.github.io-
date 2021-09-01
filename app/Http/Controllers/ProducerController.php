<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\NhaSanXuat;
use App\ThanhPho;
use App\QuanHuyen;
use App\Xa;
use Illuminate\Support\Facades\Redirect;
class ProducerController extends Controller
{
    public function allProducer()
    {
         $tp = ThanhPho::all();
        $nsx = NhaSanXuat::orderby('idNhaSanXuat','DESC')->get();
        return view('admin.pages.allProducer',compact('nsx','tp'));
    }
    public function postadd_producer(Request $Request){
              $diachi = '';
                $tp = ThanhPho::where('TP_id',$Request->thanhpho)->first();
                $qh = QuanHuyen::where('QH_id',$Request->quanhuyen)->first();
                $x = Xa::where('X_id',$Request->xa)->first();
                $diachi .= $Request->diachi.', '.$x->X_Ten.', '.$qh->QH_Ten.', '.$tp->TP_Ten;
        $nsx = new NhaSanXuat();
        $nsx->TenNhaSanXuat = $Request->name;
        $nsx->SoDienThoai = $Request->phone;
        $nsx->DiaChi = $diachi;
        $nsx->save();
        $notification = array(
                'message' => 'Thêm nhà sản xuất thành công',
                'alert-type' => 'success'
            );
         return Redirect::to('/admin/allProducer')->with($notification);   
    }
    public function postedit_producer (Request $Request)
    {
        
        if($Request->check_nsx == 1){
            $diachi = '';
                $tp = ThanhPho::where('TP_id',$Request->thanhpho)->first();
                $qh = QuanHuyen::where('QH_id',$Request->quanhuyen)->first();
                $x = Xa::where('X_id',$Request->xa)->first();
                $diachi .= $Request->diachi.', '.$x->X_Ten.', '.$qh->QH_Ten.', '.$tp->TP_Ten;
        }
        
         $nsx = NhaSanXuat::where('idNhaSanXuat',$Request->idNhaSanXuat)->first();
        $nsx->TenNhaSanXuat = $Request->name;
        $nsx->SoDienThoai = $Request->phone;
        if ($Request->check_nsx == 1) {
             $nsx->DiaChi = $diachi;
        }
        $nsx->save();
        $notification = array(
                'message' => 'Cập nhật thông tin thành công',
                'alert-type' => 'success'
            );
         return Redirect::to('/admin/allProducer')->with($notification); 
    }
}
