<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\GiamGia;
use Redirect;
use App\taikhoan;
class CouponController extends Controller
{
    public function allCoupon()
    {
        $all_coupon = GiamGia::orderby('idGiamGia','DESC')->get();
        return view('admin.pages.allCoupon',compact('all_coupon'));
    }
    public function postadd_coupon(Request $Request)
    {
         $pos = strpos($Request->Ngay, ' - ');
        
        $fromdate = substr($Request->Ngay,0,$pos);
        $todate = substr($Request->Ngay,$pos+2);
       
        $giamgia = new GiamGia();
        $giamgia->TenGiamGia = $Request->TenGiamGia;
        $giamgia->MaGiamGia = $Request->MaGiamGia;
        $giamgia->SoLuongMa = $Request->SoLuongMa;
        $giamgia->LoaiGiamGia = $Request->LoaiGiamGia;
        $giamgia->GiaTriGiamGia = $Request->GiaTri;
        $giamgia->NgayBatDau = $fromdate;
        $giamgia->NgayKetThuc = $todate;
        $giamgia->save();
        $notification = array(
                'message' => 'Đã thêm mã giảm giá mới',
                'alert-type' => 'success'
            );
        return Redirect::to('/admin/allCoupon')->with($notification);
    }
    public function postedit_coupon(Request $Request)
    {
         $pos = strpos($Request->Ngay, ' - ');
        
        $fromdate = substr($Request->Ngay,0,$pos);
        $todate = substr($Request->Ngay,$pos+2);

        $giamgia = GiamGia::where('idGiamGia',$Request->id)->first();
        $giamgia->TenGiamGia = $Request->TenGiamGia;
        $giamgia->MaGiamGia = $Request->MaGiamGia;
        $giamgia->SoLuongMa = $Request->SoLuongMa;
        $giamgia->LoaiGiamGia = $Request->LoaiGiamGia;
        $giamgia->GiaTriGiamGia = $Request->GiaTri;
        $giamgia->NgayBatDau = $fromdate;
        $giamgia->NgayKetThuc = $todate;

        $giamgia->save();
        $notification = array(
                'message' => 'Đã thay đổi thông tin giảm giá',
                'alert-type' => 'success'
            );
        return Redirect::to('/admin/allCoupon')->with($notification);
    }
    public function load_send_coupon(Request $Request)
    {
        $coupon = GiamGia::where('idGiamGia',$Request->id)->first();
        if ($coupon->LoaiGiamGia == 1) {
            $LoaiGiamGia = 'Giảm giá bằng tiền';
            $GiaTri = number_format($coupon->GiaTriGiamGia,0,",",".") . 'đ';
        }else{
             $LoaiGiamGia = 'Giảm giá bằng phần trăm';
             $GiaTri = $coupon->GiaTriGiamGia . '%';
        }

         $output ='';
         $output .='<div style="background-color: #fcb258;font-size: 20px; font-weight: 700;" class="col-md-12 text-center">Xem lại thông tin mã giảm giá</div> <div class="form-row col-md-6 ml-1"> <label class="label-normal">ID mã giảm giá:</label> <div class="label-bold ml-1">'.$coupon->idGiamGia.'</div> </div> <div class="form-row col-md-6 ml-1"> <label class="label-normal">Tên mã giảm giá:</label> <div class="label-bold ml-1">'.$coupon->TenGiamGia.'</div> </div> <div class="form-row col-md-6  ml-1"> <label class="label-normal ">Mã giảm giá:</label> <div class="label-bold ml-1">'.$coupon->MaGiamGia.'</div> </div> <div class="form-row col-md-6  ml-1"> <label class="label-normal">Số lượng mã:</label> <div class="label-bold ml-1">'.$coupon->SoLuongMa.'</div> </div> <div class="form-row col-md-6  ml-1"> <label class="label-normal">Loại giảm giá:</label> <div class="label-bold ml-1">'.$LoaiGiamGia.'</div> </div> <div class="form-row col-md-6  ml-1"> <label class="label-normal">Giá trị được giảm:</label> <div class="label-bold ml-1">'.$GiaTri.'</div> </div> <div class="form-row col-md-6  ml-1"> <label class="label-normal">Ngày bắt đầu:</label> <div class="label-bold ml-1">'.$coupon->NgayBatDau.'</div> </div> <div class="form-row col-md-6  ml-1"> <label class="label-normal">Ngày kết thúc:</label> <div class="label-bold ml-1">'.$coupon->NgayKetThuc.'</div> </div>';
        return $output;
    }
    public function delete_coupon($id)
    {
       $coupon = GiamGia::where('idGiamGia',$id)->first();
       $coupon->delete();
       $notification = array(
                'message' => 'Xóa mã giảm giá thành công',
                'alert-type' => 'success'
            );
        return Redirect::to('/admin/allCoupon')->with($notification);


    }
    public function check_send_coupon()
    {

         $user1 = taikhoan::where('ChucVu',1)->where('Vip',1)->first();
         $user2 = taikhoan::where('ChucVu',1)->where('Vip',0)->first();
         $user3 = taikhoan::where('ChucVu',1)->first();
         if ($user3) {
             $out1='tk_';
         }
         if($user2){
            $out1.='thuong_';
         }
         if($user1){
            $out1.='vip';
         }
         return $out1;
    }


}
