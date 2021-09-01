<?php

namespace App\Http\Controllers;
use Request as Request_Ajax;
use Illuminate\Http\Request;
use App\PhieuDatHang;
use App\ChiTietPhieuDatHang;
use App\taikhoan;
use App\SanPham;
use App\Cart;
use App\YeuThich;
use App\DiaChi;
use App\KhachHang;
use Carbon\Carbon;
use App\DanhMucSanPham;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Session;
use App\ThanhPho;
use App\QuanHuyen;
use App\Xa;
use App\GiamGia;
use App\ThongKe;
class CartController extends Controller
{    
    public function index()
    {
      

      return view('pages.cart');

    }
    public function AddCart($id, Request $Request)
    { 

      $sanpham = SanPham::where('idSanPham',$id)->first();
      if ($sanpham !=null) {
        $oldCart = Session('Cart') ? Session('Cart') : null;
        $newCart = new Cart($oldCart);
        $newCart->AddCart($sanpham,$id);

        $Request->Session()->put('Cart',$newCart);

        

      }
      return view('pages.cart-ajax');
    }
    public function AddsCart( Request $Request)
    { 

      
      $sanpham = SanPham::where('idSanPham',$Request->idSanPham)->first();
      if ($sanpham !=null) {
        $oldCart = Session('Cart') ? Session('Cart') : null;
        $newCart = new Cart($oldCart);
        $newCart->AddsCart($sanpham,$Request->idSanPham,$Request->SoLuong);

        $Request->Session()->put('Cart',$newCart);
        

      }
      $notification = array(
                'message' => 'Thêm vào giỏ hàng thành công',
                'alert-type' => 'success'
            );
         return Redirect()->back()->with($notification);
   
      
    }

    public function DeleteCart($id, Request $Request)
    {

        $oldCart = Session('Cart') ? Session('Cart') : null;
        $newCart = new Cart($oldCart);
        $newCart->DeleteItem($id);
        if (count($newCart->products) >0 ) {
          $Request->Session()->put('Cart',$newCart);
        }else{
          $Request->Session()->forget('Cart');
        }
        return view('pages.cart-ajax');

        
        
    }
        public function DeleteListCart($id, Request $Request)
    {

        $oldCart = Session('Cart') ? Session('Cart') : null;
        $newCart = new Cart($oldCart);
        $newCart->DeleteItem($id);
        if (count($newCart->products) >0 ) {
          $Request->Session()->put('Cart',$newCart);
        }else{
          $Request->Session()->forget('Cart');
        }
        return view('pages.listcart-ajax');
  

    }

       public function UpdateListCart($id, Request $Request, $quanty)
    {

        $oldCart = Session('Cart') ? Session('Cart') : null;
        $newCart = new Cart($oldCart);
        $newCart->UpdateItem($id,$quanty);
        $Request->Session()->put('Cart',$newCart);
        return view('pages.listcart-ajax');
  

    }
    public function payment(Request $Request)
    {
     
      $count_num = 0;
      $count_total = 0;
      $orderDate = Carbon::now('Asia/Ho_Chi_Minh')->format('y-m-d');
      if (Session('Cart')) {
        foreach(Session('Cart')->products as $item) { 
          $check_num = SanPham::where('idSanPham',$item['productInfo']->idSanPham)->first();
          if ($check_num->SoLuongHang < $item['quanty']) {
              $notification = array(
                'message' => 'Sản phẩm '.$item['productInfo']->TenSanPham.' không còn đủ',
                'alert-type' => 'error'
                );
             return Redirect()->back()->with($notification);
          }
        }
     
      $idKhachHang = Auth::user()->khachhang->idKhachHang;
      
       if ($Request->thanhpho != 0) {
                $diachi2 = '';
                $tp = ThanhPho::where('TP_id',$Request->thanhpho)->first();
                $qh = QuanHuyen::where('QH_id',$Request->quanhuyen)->first();
                $x = Xa::where('X_id',$Request->xa)->first();
                $diachi2 .= $Request->diachi.', '.$x->X_Ten.', '.$qh->QH_Ten.', '.$tp->TP_Ten;
              
                $diachis = new DiaChi();
                $diachis->DiaChi = $diachi2;
                $diachis->idKhachHang= Auth::user()->khachhang->idKhachHang;
                $diachis->save();
                $diachigiaohang = $diachi2;
        }  else{
        $diachigiaohang = $Request->diachigiaohang;
      }
      
      $phuongthucthanhtoan = $Request->pptt;
      $idtrangthai = 01;
      $tongtien = $Request->tongtien;
      $count_total+=$Request->tongtien;
      $phieudathang = new PhieuDatHang();
      $phieudathang->idKhachHang = $idKhachHang;
      $phieudathang->diachigiaohang = $diachigiaohang;
      $phieudathang->NgayDat = $orderDate;
      $phieudathang->idPhuongThucThanhToan = $phuongthucthanhtoan;
      $phieudathang->idTrangThai= $idtrangthai;
      $phieudathang->TongTien= $tongtien;
      $phieudathang->idGiamGia= $Request->idgiamgia;
      if ($Request->ghichu) {
         $phieudathang->GhiChu= $Request->ghichu;
      }

      $phieudathang -> save();
      
        foreach(Session('Cart')->products as $item) {
          $chitietphieudathang = new ChiTietPhieuDatHang();
          $chitietphieudathang->idPhieuDatHang = $phieudathang->idPhieuDatHang;
          $chitietphieudathang->idSanPham = $item['productInfo']->idSanPham;
          $chitietphieudathang->SoLuong = $item['quanty'];
          $chitietphieudathang->GiaDatHang = $item['price'];
          $chitietphieudathang->save();
          $count_num+=$item['quanty'];
          
          
        }
        $Request->Session()->forget('Cart');

      $khachhang = KhachHang::where('idKhachHang',$idKhachHang)->first();
      $khachhang->SoDienThoai = $Request->number;
      $khachhang->HoTen = $Request->name;
  
      $khachhang->save();

    
      $coupon = Session::get('coupon');
        if ($coupon) {
          Session::forget('coupon');
        }

        $thongke = ThongKe::where('Ngay',$orderDate)->first();
        if ($thongke) {
          $thongke->SoLuong += $count_num;
          $thongke->TongTien += $count_total;
          $thongke->TongDonHang +=1;
          $thongke->save();
        }else{
          $thongkenew = new ThongKe();
          $thongkenew->Ngay = $orderDate;
          $thongkenew->TongTien = $count_total;
          $thongkenew->SoLuong = $count_num;
          $thongkenew->TongDonHang = 1;
          $thongkenew->save();
        }




        $notification = array(
                'message' => 'Đặt hàng thành công',
                'alert-type' => 'success'
            );
        return Redirect::to('/trangchu')->with($notification);

      }else{
        $notification = array(
                'message' => 'Giỏ hàng của bạn đang rỗng',
                'alert-type' => 'error'
            );
         return Redirect()->back()->with($notification);

      }
  
    }
    


      public function edit_cart(Request $Request)
      {
        //dd($Request);
        foreach ($Request->idSanPham as $key => $value) {
          $oldCart = Session('Cart') ? Session('Cart') : null;
          $newCart = new Cart($oldCart);
          $newCart->UpdateItem($Request->idSanPham[$key],$Request->SoLuong[$value]);
          $Request->Session()->put('Cart',$newCart);
        
        }

        $notification = array(
                'message' => 'Cập nhật giỏ hàng thành công',
                'alert-type' => 'success'
            );
        return Redirect()->back()->with($notification);

      }



      public function checkout() 
      {
        if (Auth::check()) {
          $category_limit = DanhMucSanPham::limit(6)->get();
          $wishlist_num = YeuThich::where('idKhachHang',Auth::user()->khachhang->idKhachHang)->count();
          $category = DanhMucSanPham::orderby('idDanhMuc', 'asc')->get();
             $info = taikhoan::where('id',Auth::user()->id)->get();
               $tp = ThanhPho::orderby('TP_id','ASC')->get();

            return view('pages.checkout',compact('info','wishlist_num','category','category_limit','tp'));
        }else{     
        $notification = array(
                'message' => 'Vui lòng đăng nhập',
                'alert-type' => 'error'
            );
        return Redirect::to('/login')->with('mess','Vui lòng đăng nhập!!')->with($notification);
        }
        
      }
      public function wishlist()
      {
        if (Auth::check()) {
          $wish = YeuThich::where('idKhachHang',Auth::user()->khachhang->idKhachHang)->get();
        }else{     
        $notification = array(
                'message' => 'Vui lòng đăng nhập',
                'alert-type' => 'error'
            );
        return Redirect::to('/login')->with('mess','Vui lòng đăng nhập!!')->with($notification);
        }
        
        return view('pages.wishlist',compact('wish'));
      }
      public function add_wishlist($id)
      { 
        
        if (!Auth::check()) {
          return 'login';
        }elseif (YeuThich::where('idKhachHang',Auth::user()->khachhang->idKhachHang)->where('idSanPham',$id)->first()) {
          return 'exist';
        }else {
        $wish = new YeuThich();
        $wish->idKhachHang = Auth::user()->khachhang->idKhachHang;
        $wish->idSanPham = $id;
        $wish->save();
         return 'ok';
        }
        
      }
         public function DeleteWishlist($id)
    {
        
        $del_wish = YeuThich::where('idKhachHang',Auth::user()->khachhang->idKhachHang)->where('idSanPham',$id)->first();
        //dd($del_wish);
        $del_wish->delete();
        $wish = YeuThich::where('idKhachHang',Auth::user()->khachhang->idKhachHang)->get();
        return view('pages.wishlist-ajax',compact('wish'));
  

    }
    public function check_coupon(Request $Request)
    {
      
      $giamgia = GiamGia::where('MaGiamGia',$Request->Coupon)->first();
      $giamgia2 = GiamGia::where('MaGiamGia',$Request->Coupon)->where('SoLuongMa','>',0)->first();
      if ($giamgia) {
        if ($giamgia2) {
          
        
        $count = $giamgia->count();
        if ($count > 0) {
          $coupon_session = Session::get('coupon');
          if ($coupon_session == true) {
            $is_avaiable = 0;
            if ($is_avaiable == 0 ) {
              $cou[] = array(
                'idGiamGia' => $giamgia->idGiamGia,
                  'MaGiamGia' => $giamgia->MaGiamGia,
                  'LoaiGiamGia' => $giamgia->LoaiGiamGia,
                  'GiaTri' => $giamgia->GiaTriGiamGia,

              );
              Session::put('coupon',$cou);
            }
          }else{
         
              $cou[] = array(
                'idGiamGia' => $giamgia->idGiamGia,
                  'MaGiamGia' => $giamgia->MaGiamGia,
                  'LoaiGiamGia' => $giamgia->LoaiGiamGia,
                  'GiaTri' => $giamgia->GiaTriGiamGia,

              );
              Session::put('coupon',$cou);

        }
        Session::save();
         $notification = array(
                'message' => 'Áp dụng mã thành công',
                'alert-type' => 'success'
            );
         return Redirect::to('/mycart')->with($notification);       
      }
    }else{
      $notification = array(
                'message' => 'Mã giảm giá đã hết',
                'alert-type' => 'warning'
            );
         return Redirect::to('/mycart')->with($notification);
    }
    }else{
      $notification = array(
                'message' => 'Mã giảm giá không tồn tại',
                'alert-type' => 'error'
            );
         return Redirect::to('/mycart')->with($notification);
    }

}
      public function unset_coupon()
      {
        $coupon = Session::get('coupon');
        if ($coupon) {
          Session::forget('coupon');
          return view('pages.listcart-ajax');
                  }
      }
}
