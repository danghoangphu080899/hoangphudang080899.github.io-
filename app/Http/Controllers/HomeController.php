<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Request as Request_Ajax;
use Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use App\DanhMucSanPham;
use App\DanhMucCon;
use App\HinhAnh;
use App\SanPham;
use App\KhachHang;
use App\taikhoan;
use App\DiaChi;
use App\PhieuDatHang;
use App\ChiTietPhieuDatHang;
use App\YeuThich;
use App\DanhGia;
use App\ThanhPho;
use App\QuanHuyen;
use App\Xa;
use App\BaiViet;
use File;
use App\ThongKe;
use Illuminate\Support\Facades\Hash;
class HomeController extends Controller
{
    public function error()
    {
        return view('pages.error');
    }
    public function index(){

        $category_chil = DanhMucCon::all();
        $post = BaiViet::where('TrangThai',1)->orderby('LuotXem','DESC')->limit(3)->get();
        $products_limit = SanPham::where('TrangThai',1)->limit(8)->get();
        $products_limit2 = SanPham::where('TrangThai',1)->limit(3)->get();
        $products_limit_view = SanPham::where('TrangThai',1)->orderby('LuotXem','DESC')->limit(3)->get();
        $products_limit_sold = SanPham::where('TrangThai',1)->orderby('SoLuongBan','DESC')->limit(3)->get();
        $products = SanPham::where('TrangThai',1)->get();
        $products_hot = SanPham::orderby('LuotXem','DESC')->limit(10)->get();
        $phone_limit =SanPham::where('idDanhMuc',1)->where('TrangThai',1)->limit(8)->get();
    	return view('pages.home',compact('category_chil','products_limit','products_limit2','products_limit_view','products','phone_limit','post','products_hot','products_limit_sold'));
    }

    public function contact(){

    	return view('pages.contact');
    }
    public function profile()
    {   

        if (Auth::check()) {
            $wishlist_num = YeuThich::where('idKhachHang',Auth::user()->khachhang->idKhachHang)->count() ;
            
        }else{
            $notification = array(
                'message' => 'Vui lòng đăng nhập',
                'alert-type' => 'error'
            );
             return Redirect::to('/login')->with('mess','Vui lòng đăng nhập!!')->with($notification);
        }

        $user = taikhoan::where('id',Auth::user()->id)->get();
        $tp = ThanhPho::orderby('TP_id','ASC')->get();

        
        return view('pages.profile',compact('user','tp'));
    }
    public function select_delivery(Request $Request )
    {
       if ($Request->action) {
        $output ='';
           if ($Request->action == 'thanhpho') {
               $select_qh = QuanHuyen::where('TP_id',$Request->matp)->orderby('QH_id')->get();
               $output .='<option value="0">----Chọn quận huyện----</option>';
               foreach ($select_qh as $key => $value) {
                    $output.='<option value ="'.$value->QH_id.'">'.$value->QH_Ten.'</option>';
               }
              
           }else{
                $select_x = Xa::where('QH_id',$Request->matp)->orderby('X_id')->get();
                $output .='<option value="0">----Chọn Xã, phường, thị trấn----</option>';
               foreach ($select_x as $key => $value) {
                   $output.='<option value ="'.$value->X_id.'">'.$value->X_Ten.'</option>' ;
               }
               
           }
        echo $output;
       }
    }
    public function select_delivery_admin(Request $Request )
    {
       if ($Request->action) {
        $output ='';
           if ($Request->action == 'thanhpho') {
               $select_qh = QuanHuyen::where('TP_id',$Request->matp)->orderby('QH_id')->get();
               $output .='<option value="">----Chọn quận huyện----</option>';
               foreach ($select_qh as $key => $value) {
                    $output.='<option value ="'.$value->QH_id.'">'.$value->QH_Ten.'</option>';
               }
              
           }else{
                $select_x = Xa::where('QH_id',$Request->matp)->orderby('X_id')->get();
                $output .='<option value="">----Chọn Xã, phường, thị trấn----</option>';
               foreach ($select_x as $key => $value) {
                   $output.='<option value ="'.$value->X_id.'">'.$value->X_Ten.'</option>' ;
               }
               
           }
        echo $output;
       }
    }
     public function select_delivery_admin_edit(Request $Request)
    {
       if ($Request->action) {
        $output ='';
           if ($Request->action == 'thanhpho'.$Request->id) {
               $select_qh = QuanHuyen::where('TP_id',$Request->matp)->orderby('QH_id')->get();
               $output .='<option value="0">----Chọn quận huyện----</option>';
               foreach ($select_qh as $key => $value) {
                    $output.='<option value ="'.$value->QH_id.'">'.$value->QH_Ten.'</option>';
               }
              
           }else{
                $select_x = Xa::where('QH_id',$Request->matp)->orderby('X_id')->get();
                $output .='<option value="0">----Chọn Xã, phường, thị trấn----</option>';
               foreach ($select_x as $key => $value) {
                   $output.='<option value ="'.$value->X_id.'">'.$value->X_Ten.'</option>' ;
               }
               
           }
        echo $output;
       }
    }
    // public function add_address()
    // {   $output = '<div class="form-group col-md-4 "> <label class="label-bold">Thành phố: <span>*</span></label> <div class="input-group"> <select name="thanhpho" id="thanhpho" class="form-control thanhpho choose" name="idDanhMuc" > <option >----Chọn thành phố----</option>';
    //     $select_tp = ThanhPho::orderby('TP_id')->get();

               
    //            foreach ($select_tp as $key => $value) {
    //                 $output.='<option value="'.$value->TP_id.'">'.$value->TP_Ten.'</option> ';
    //            }
    //            $output .='</select> </div> <span style="display: none;" class="error1" > <i class=" fa fa-exclamation-triangle"></i> </span> </div> <div class="form-group col-md-4 "> <label class="label-bold">Quận, huyện: <span>*</span></label> <div class="input-group"> <select name="quanhuyen" id="quanhuyen" class="form-control quanhuyen choose" name="idDanhMuc" > <option >----Chọn quận huyện----</option> </select> </div> <span style="display: none;" class="error1" > <i class=" fa fa-exclamation-triangle"></i> </span> </div> <div class="form-group col-md-4 "> <label class="label-bold">Xã, phường, thị trấn: <span>*</span></label> <div class="input-group"> <select  name="xa" id="xa"  class="custom-select " name="idDanhMuc" > <option >----Chọn Xã, phường, thị trấn----</option> </select> </div> <span style="display: none;" class="error1" > <i class=" fa fa-exclamation-triangle"></i> </span> </div>';
    //            echo $output;
    // }
    public function del_address($id_address)
    {   
        if(Request_Ajax::ajax()){
             $idDiaChi = (int)Request_Ajax::get('idDiaChi');
             $DiaChi = DiaChi::find($idDiaChi);
             
             if ($DiaChi != null) {
                   $DiaChi->delete();  
            }else{
                return 'xxx';
             
        }
            return "ok";
        }
    }
    public function edit_profile(Request $Request)
    {   
     

        
        if ($Request->thanhpho != 0) {
                $diachi = '';
                $tp = ThanhPho::where('TP_id',$Request->thanhpho)->first();
                $qh = QuanHuyen::where('QH_id',$Request->quanhuyen)->first();
                $x = Xa::where('X_id',$Request->xa)->first();
                $diachi .= $Request->diachi.', '.$x->X_Ten.', '.$qh->QH_Ten.', '.$tp->TP_Ten;
               
                $diachis = new DiaChi();
                $diachis->DiaChi = $diachi;
                $diachis->idKhachHang= Auth::user()->khachhang->idKhachHang;
                $diachis->save();
        }     

        // if (!empty($Request->input('DiaChi'))) {

        //     foreach ($Request->input('DiaChi') as $key => $dc) {

        //         $diachi = DiaChi::where('idDiaChi',$Request->idDiaChi[$key])->first();
        //         $diachi->DiaChi = $dc;
        //         $diachi->idKhachHang =  $id_user;
        //         $diachi->save();
             
        //     }
        // }
        // if (!empty($Request->input('DiaChis'))) {
        //     foreach ($Request->input('DiaChis') as $dcs) {
        //         if(isset($dcs)){
        //         $diachis = new DiaChi();
        //         $diachis->DiaChi = $dcs;
        //         $diachis->idKhachHang= $id_user;
        //         $diachis->save();
        //       }
        //     }
        // }
        $khachhang = KhachHang::where('idKhachHang',Auth::user()->khachhang->idKhachHang)->first();
        $khachhang->HoTen = $Request->HoTen;
        $khachhang->SoDienThoai = $Request->SoDienThoai;
        $khachhang->save();

        if ($Request->avatar) {
            
            $avatar_current = 'public/avatar/'.$Request->avatar_current;
            
            $taikhoan = TaiKhoan::where('id',Auth::user()->id)->first();
          
            $taikhoan->avatar = $Request->file('avatar')->getClientOriginalName() ;
            $taikhoan->save();

            if ($Request->hasFile('avatar')) {
            $avatar = $Request->file('avatar')->getClientOriginalName();
            
            $Request->file('avatar')->move('public/avatar/',$avatar);
            if (File::exists($avatar_current)) {
                File::delete($avatar_current);
            }

        }
        }
        
        $notification = array(
                'message' => 'Đã cập nhật thông tin cá nhân',
                'alert-type' => 'success'
            );
             return Redirect::to('/profile')->with($notification);
    
        
    }
    public function change_pass(Request $Request)
    {

           $taikhoan = taikhoan::where('id',Auth::user()->id)->first();
        if(Hash::check($Request->PasswordCurrent,$taikhoan->password)) {
            $taikhoan->password = bcrypt($Request->PasswordNew);
            $taikhoan->save();
            $notification = array(
                'message' => 'Mật khẩu đã được thay đổi',
                'alert-type' => 'success'
            );
             return Redirect::to('/profile')->with($notification);
        } else {
            $notification = array(
                'message' => 'Mật khẩu cũ không đúng',
                'alert-type' => 'error'
            );
             return Redirect::to('/profile')->with($notification);
        }   
            
        

    }
    public function products_category_list($id)
        
    {   
        $idCategory = $id;
        
       
      
        
        if (isset($_GET['sort_by'])) {
             $sort_by = $_GET['sort_by'];

             if ($sort_by == 'name_az') {
                $products = SanPham::where('idDanhMuc',$id)->where('TrangThai',1)->orderby('TenSanPham','ASC')->paginate(4)->appends(Request()->query());
                 
             }elseif ($sort_by == 'name_za') {
                $products = SanPham::where('idDanhMuc',$id)->where('TrangThai',1)->orderby('TenSanPham','DESC')->paginate(4)->appends(Request()->query());
             }elseif($sort_by == 'gia_tangdan'){
                $products = SanPham::where('idDanhMuc',$id)->where('TrangThai',1)->orderby('Gia','ASC')->paginate(4)->appends(Request()->query());
             }elseif($sort_by == 'gia_giamdan'){
                 $products = SanPham::where('idDanhMuc',$id)->where('TrangThai',1)->orderby('Gia','DESC')->paginate(4)->appends(Request()->query());
             }else{
                 $products = SanPham::where('idDanhMuc',$id)->where('TrangThai',1)->paginate(4);
             }


        }elseif (isset($_GET['minPrice']) && $_GET['maxPrice']) {
                $minPrice = $_GET['minPrice'];
                $maxPrice = $_GET['maxPrice'];
                 $products = SanPham::where('idDanhMuc',$id)->where('TrangThai',1)->wherebetween('Gia',[$minPrice,$maxPrice])->orderby('idSanPham','ASC')->paginate(4)->appends(Request()->query());
             
        }else{
                 $products = SanPham::where('idDanhMuc',$id)->where('TrangThai',1)->paginate(4);
             }
         return view('pages.product-list',['products' => $products],compact('products','idCategory'));
    }
    public function products_category_grid($id)
   
    {   
         $idCategory = $id;

        $review = DanhGia::all();
        
        
        if (isset($_GET['sort_by'])) {
             $sort_by = $_GET['sort_by'];

             if ($sort_by == 'name_az') {
                $products = SanPham::where('idDanhMuc',$id)->where('TrangThai',1)->orderby('TenSanPham','ASC')->paginate(9)->appends(Request()->query());
                 
             }elseif ($sort_by == 'name_za') {
                $products = SanPham::where('idDanhMuc',$id)->where('TrangThai',1)->orderby('TenSanPham','DESC')->paginate(9)->appends(Request()->query());
             }elseif($sort_by == 'gia_tangdan'){
                $products = SanPham::where('idDanhMuc',$id)->where('TrangThai',1)->orderby('Gia','ASC')->paginate(9)->appends(Request()->query());
             }elseif($sort_by == 'gia_giamdan'){
                 $products = SanPham::where('idDanhMuc',$id)->where('TrangThai',1)->orderby('Gia','DESC')->paginate(9)->appends(Request()->query());
             }else{
                 $products = SanPham::where('idDanhMuc',$id)->where('TrangThai',1)->paginate(9);
             }


        }elseif (isset($_GET['minPrice']) && $_GET['maxPrice']) {
                $minPrice = $_GET['minPrice'];
                $maxPrice = $_GET['maxPrice'];
                 $products = SanPham::where('idDanhMuc',$id)->where('TrangThai',1)->wherebetween('Gia',[$minPrice,$maxPrice])->orderby('idSanPham','ASC')->paginate(9)->appends(Request()->query());
             
        }else{
                 $products = SanPham::where('idDanhMuc',$id)->where('TrangThai',1)->paginate(9);
             }
         return view('pages.product-grid',['products' => $products],compact('products','idCategory','review'));
    }

    public function search(Request $Request)
    {
        
        $keyword = $Request->search;
        $cate = $Request->danhmuc;
        if ($cate == 0 ) {
            $search_products = SanPham::where('TenSanPham','like', '%'.$keyword.'%')->where('TrangThai',1)->limit(12)->get();
        }else{
            $search_products = SanPham::where('idDanhMuc',$cate)->where('TenSanPham','like', '%'.$keyword.'%')->where('TrangThai',1)->limit(12)->get();
        }
        
        return view('pages.search',['search_products' => $search_products],compact('search_products','keyword'));
       
    }
    public function order_history()
    {
        
        if (Auth::check()) {
             $orders = PhieuDatHang::where('idKhachHang',Auth::user()->khachhang->idKhachHang)->where('idTrangThai','<>',6)->orderby('idPhieuDatHang','DESC')->get();
         }else{
            $notification = array(
                'message' => 'Vui lòng đăng nhập',
                'alert-type' => 'error'
            );
             return Redirect::to('/login')->with('mess','Vui lòng đăng nhập!!')->with($notification);
        }
        
        
        

        return view('pages.history-order',compact('orders'));
    }
    public function cancel_order($id)
    {

        $order = PhieuDatHang::find($id);
         $count_product = 0;
        foreach ($order->chitietphieudathang as $key => $value) {
            $count_product = ChiTietPhieuDatHang::where('idPhieuDatHang',$order->idPhieuDatHang)->count();
            $chitietdonhang = ChiTietPhieuDatHang::where('idPhieuDatHang',$order->idPhieuDatHang)->delete();
            
            
        }
        
        $check_thongke = ThongKe::where('Ngay',$order->NgayDat)->first();
        $check_thongke->TongTien -= $order->TongTien;
        $check_thongke->TongDonHang -= 1;
        $check_thongke->SoLuong -= $count_product;
        $check_thongke->save();
        $order->delete();
        $notification = array(
                'message' => 'Hủy đơn thành công',
                'alert-type' => 'success'
            );
             return Redirect::to('/order-history')->with($notification);
    }
    public function del_order($id){

       $order = PhieuDatHang::find($id);
       $order->idTrangThai = 6;
       $order->save();
       $notification = array(
                'message' => 'Xóa đơn hàng thành công',
                'alert-type' => 'success'
            );
             return Redirect::to('/order-history')->with($notification);
    }
    
    
    
}
