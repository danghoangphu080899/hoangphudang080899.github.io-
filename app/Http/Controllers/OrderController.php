<?php

namespace App\Http\Controllers;
use Redirect;
use App\taikhoan;
use App\PhieuDatHang;
use App\PhuongThucThanhToan;
use App\TrangThaiDatHang;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function getall_order()
    {
    	$name = taikhoan::where('id',Auth::user()->id)->get();
        $orders = PhieuDatHang::all();
        $status = TrangThaiDatHang::all();

    	return view('admin.pages.allOrder',compact('orders','name','status'));
    	
    }
    public function getedit_order($id_order)
    {
    	$pttt = PhuongThucThanhToan::all();
    	$tt = TrangThaiDatHang::all();
    	$edit_order = PhieuDatHang::where('idPhieuDatHang',$id_order)->get();	
    	$name = taikhoan::where('id',Auth::user()->id)->get();
    	return view('admin.pages.editOrder',compact('name','edit_order','pttt','tt'));
    }
    public function postedit_order(Request $Request,$id_order)
    {
    	$order = PhieuDatHang::find($id_order);
        if ($order->idTrangThai == 1) {
            $order->idNhanVien = Auth::user()->nhanvien->idNhanVien;
        }
    	$order->idTrangThai = $Request->idTrangThai;

        
    	$order->save();
        $notification = array(
                'message' => 'Thay đổi trạng thái đơn hàng thành công',
                'alert-type' => 'success'
            );
    	return Redirect::to('/admin/allOrder')->with($notification);
    }
    public function getdel_order($id_order)
    {
    	$order = PhieuDatHang::find($id_order);

        $order->idTrangThai = 6;
        $order->save();
        $notification = array(
                'message' => 'Đã ẩn đơn hàng',
                'alert-type' => 'success'
            );
        return Redirect::to('/admin/allOrder')->with($notification);
    }

}
