<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\taikhoan;
use App\KhachHang;
use App\NhanVien;
use App\DiaChi;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use File;
use App\ThanhPho;
use App\QuanHuyen;
use App\Xa;
class UserController extends Controller
{
    public function getall_user()
    {	        $name = taikhoan::where('id',Auth::user()->id)->get();
    	$all_user = KhachHang::join('taikhoan', 'taikhoan.id' ,'=','khachhang.id')->distinct()->get();
    	


    	return view('admin.pages.allUser',compact('all_user','name') );
    }
    public function getall_admin()
    {    $name = taikhoan::where('id',Auth::user()->id)->get();
        $all_admin = NhanVien::join('taikhoan', 'taikhoan.id' ,'=','nhanvien.id')->distinct()->get();
        


        return view('admin.pages.allAdmin',compact('all_admin','name') );
    }
    public function getadd_user()
    {
         $tp = ThanhPho::orderby('TP_id','ASC')->get();
        $name = taikhoan::where('id',Auth::user()->id)->get();
        return view('admin.pages.addUser',compact('name','tp'));
    }
    public function getadd_admin()
    {
         $tp = ThanhPho::orderby('TP_id','ASC')->get();
        $name = taikhoan::where('id',Auth::user()->id)->get();
        return view('admin.pages.addAdmin',compact('name','tp'));
    }
    
    public function postadd_user(Request $Request)
    {
    	
            $taikhoan= new TaiKhoan();
               $taikhoan->email = $Request->email;
               $taikhoan->password = bcrypt($Request->repassword);
               $taikhoan->TrangThai = $Request->position;
               $taikhoan->ChucVu = 1;
                $avatar = $Request->file('avatar')->getClientOriginalName();
                 $taikhoan->avatar = $avatar;
                 $taikhoan->save();

                    $Request->file('avatar')->move('public/avatar/',$avatar);

                 

        $khachhang = new KhachHang();
            $khachhang->HoTen = $Request->name;
            $khachhang->SoDienThoai = $Request->phone;
            $khachhang->id = $taikhoan->id;
            $khachhang->save();
         $diachi2 = '';
                $tp = ThanhPho::where('TP_id',$Request->thanhpho)->first();
                $qh = QuanHuyen::where('QH_id',$Request->quanhuyen)->first();
                $x = Xa::where('X_id',$Request->xa)->first();
                $diachi2 .= $Request->diachi.', '.$x->X_Ten.', '.$qh->QH_Ten.', '.$tp->TP_Ten;
              
                $diachis = new DiaChi();
                $diachis->DiaChi = $diachi2;
                $diachis->idKhachHang= $khachhang->idKhachHang;
                $diachis->save();

        
          $notification = array(
                'message' => 'Thêm khách hàng thành công',
                'alert-type' => 'success'
            );
         return Redirect::to('/admin/allUser')->with($notification);       
       

    }
    public function postadd_admin(Request $Request)
    {
        
            $taikhoan= new TaiKhoan();
               $taikhoan->email = $Request->email;
               $taikhoan->password = bcrypt($Request->repassword);
               $taikhoan->TrangThai = $Request->position;
               $taikhoan->ChucVu = 2;
                $avatar = $Request->file('avatar')->getClientOriginalName();
                 $taikhoan->avatar = $avatar;
                 $taikhoan->save();

                    $Request->file('avatar')->move('public/avatar/',$avatar);

                 

        $nhanvien = new NhanVien();
            $nhanvien->HoTen = $Request->name;
            $nhanvien->SoDienThoai = $Request->phone;
            $nhanvien->id = $taikhoan->id;

         $diachi2 = '';
                $tp = ThanhPho::where('TP_id',$Request->thanhpho)->first();
                $qh = QuanHuyen::where('QH_id',$Request->quanhuyen)->first();
                $x = Xa::where('X_id',$Request->xa)->first();
                $diachi2 .= $Request->diachi.', '.$x->X_Ten.', '.$qh->QH_Ten.', '.$tp->TP_Ten;
              
               
            $nhanvien->DiaChi = $diachi2;
            $nhanvien->save();
        
          $notification = array(
                'message' => 'Thêm nhân viên mới thành công',
                'alert-type' => 'success'
            );
         return Redirect::to('/admin/allAdmin')->with($notification);       
       

    }
    
    public function show_user($id)
    {      
        $taikhoan = TaiKhoan::where('id',$id)->first();
        $taikhoan->TrangThai = 1;
        $taikhoan->save();
        
    
        $notification = array(
                'message' => 'Đã mở khóa tài khoản khách hàng',
                'alert-type' => 'success'
            );
         return Redirect::to('/admin/allUser')->with($notification);
    }
    public function hidden_user($id)
    {

        $taikhoan = TaiKhoan::where('id',$id)->first();
        $taikhoan->TrangThai = 0;
        $taikhoan->save();
        
    
        $notification = array(
                'message' => 'Đã khóa tài khoản khách hàng',
                'alert-type' => 'success'
            );
         return Redirect::to('/admin/allUser')->with($notification);
 

    	
    }
    public function show_admin($id)
    {      
        $taikhoan = TaiKhoan::where('id',$id)->first();
        $taikhoan->TrangThai = 1;
        $taikhoan->save();
        
    
        $notification = array(
                'message' => 'Đã mở khóa tài khoản nhân viên',
                'alert-type' => 'success'
            );
         return Redirect::to('/admin/allUser')->with($notification);
    }
    public function hidden_admin($id)
    {

        $taikhoan = TaiKhoan::where('id',$id)->first();
        $taikhoan->TrangThai = 0;
        $taikhoan->save();
        
    
        $notification = array(
                'message' => 'Đã khóa tài khoản nhân viên',
                'alert-type' => 'success'
            );
         return Redirect::to('/admin/allUser')->with($notification);
 

        
    }
    public function getdel_user($id_user)
    {
        $taikhoan = TaiKhoan::find($id_user);
        $avatar ='public/avatar/'.$taikhoan->avatar;
        
         if (File::exists($avatar)) {
                File::delete($avatar);
        }       
         $taikhoan->delete();

        return Redirect::to('/admin/allUser')->with('mess','Xoa khách hàng thành công');
    }
}
