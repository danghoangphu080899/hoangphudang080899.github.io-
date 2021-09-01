<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\DanhMucSanPham;
use App\taikhoan;
use App\KhachHang;
use App\GiamGia;
use App\YeuThich;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Carbon\Carbon;
class MailController extends Controller

{
    public function demo()
    {
        return view('pages.send-mail.send_coupon');
    }
    public function send_mail(Request $Request)
    {
    	 //send mail
                $to_name = $Request->name;
                $to_email = "hoangphu020899@gmail.com";//send to this email
        
                $data = array("name"=>$Request->name,"subject"=>$Request->subject,"email"=>$Request->email,"phone_number"=>$Request->phone_number,"messages"=>$Request->messages); //body of mail.blade.php
            
                Mail::send('pages.send-mail.send-mail',$data,function($message) use ($to_name,$to_email){
                    $message->to($to_email)->subject('Mail liên hệ từ khách hàng ');//send this mail with subject
                    $message->from($to_email,$to_name);//send from this mail
                });
                //--send mail
                return view('pages.send-mail.mail-success');

    }
    public function forget_pass()
    {
    	if (Auth::check()) {
            $wishlist_num = YeuThich::where('idKhachHang',Auth::user()->khachhang->idKhachHang)->count();
        }else{
            $wishlist_num=0;
        }
        $category_limit = DanhMucSanPham::limit(6)->get();
        $category = DanhMucSanPham::orderby('idDanhMuc', 'asc')->get();
    	return view('pages.forget-pass',compact('category','wishlist_num','category_limit'));
    	
    }
    public function recover_pass(Request $Request)
    {
    	
    	$to_name = "Hoàng Phú Store";
    	$title_email = 'Lấy lại mật khẩu cho email '. $Request->email;
    	$taikhoan = taikhoan::where('email',$Request->email)->first();
    	// $khachhang = $taikhoan->khachhang->get();
    	
		
			if ($taikhoan==null) {
				return Redirect()->back()->with('mess','Email này chưa tồn tại trên hệ thống');
			}else{
				$token_random = Str::random();
				
				$taikhoan->remember_token=$token_random;
				
				$taikhoan->save();
				$to_email = $Request->email;
				$token_=$taikhoan->remember_token;
				$link_reset = url('/updateNewPass?email='.$to_email.'&token_='.$token_);
				 $data = array("name"=>$title_email,"body"=>$link_reset,"email" => $Request->email); //body of mail.blade.php
				Mail::send('pages.send-mail.forgetPass',['data' =>$data] ,function($message) use ($to_name,$title_email,$data){
                    $message->to($data['email'])->subject($title_email);//send this mail with subject
                    $message->from($data['email'],$to_name);//send from this mail
                });
                $notification = array(
                'message' => 'Gửi mail thành công, vui lòng kiểm tra hộp thư của bạn',
                'alert-type' => 'success'
            		);
             	return Redirect()->back()->with($notification);

			}
    	
    }
    public function update_pass()
    {
    	if (Auth::check()) {
            $wishlist_num = YeuThich::where('idKhachHang',Auth::user()->khachhang->idKhachHang)->count();
        }else{
            $wishlist_num=0;
        }
        $category_limit = DanhMucSanPham::limit(6)->get();
        $category = DanhMucSanPham::orderby('idDanhMuc', 'asc')->get();
    	return view('pages.send-mail.newPass',compact('category','wishlist_num','category_limit'));
   
    }
    public function process_pass(Request $Request)
    {

    	$data = $Request->all();
    	$token_random = Str::random();

    	$taikhoan = taikhoan::where('email',$data['email'])->where('remember_token',$data['token'])->first();

    	if ($taikhoan) {
    		
    		$taikhoan->password = bcrypt($data['password']);
    		$taikhoan->remember_token = $token_random;
    		$taikhoan->save();
    		$notification = array(
                'message' => 'Mật khẩu đã cập nhật mới',
                'alert-type' => 'success'
            		);
             	return redirect('login')->with($notification);
    	}else{
    		$notification = array(
                'message' => 'Đường link đã hết hạn',
                'alert-type' => 'error'
            		);
             	return redirect('login')->with($notification);
    	}
    }
    public function send_mail_sub(Request $Request)
    {
         //send mail
                $to_name = "Khách hàng";
                $to_email = "hoangphu020899@gmail.com";//send to this email
        
                $data = array("email"=>$Request->email); //body of mail.blade.php
            
                Mail::send('pages.send-mail.send_mail_sub',$data,function($message) use ($to_name,$to_email){
                    $message->to($to_email)->subject('Khách hàng đăng kí nhận khi có sản phẩm mới ');//send this mail with subject
                    $message->from($to_email,$to_name);//send from this mail
                });
                //--send mail
                $notification = array(
                'message' => 'Gửi mail thành công',
                'alert-type' => 'success'
            );

            return Redirect()->back()->with($notification);

    }
    public function send_mail_sub_post(Request $Request)
    {
         //send mail
                $to_name = "Khách hàng";
                $to_email = "hoangphu020899@gmail.com";//send to this email
        
                $data = array("email"=>$Request->email); //body of mail.blade.php
            
                Mail::send('pages.send-mail.send_mail_sub',$data,function($message) use ($to_name,$to_email){
                    $message->to($to_email)->subject('Khách hàng đăng kí nhận khi có tin tức mới ');//send this mail with subject
                    $message->from($to_email,$to_name);//send from this mail
                });
                //--send mail
                $notification = array(
                'message' => 'Gửi mail thành công',
                'alert-type' => 'success'
            );

            return Redirect()->back()->with($notification);

    }
    public function send_coupon(Request $Request)
    {
        $to_name = "Hoàng Phú Store";
        $coupon = GiamGia::where('idGiamGia',$Request->id)->first();
        $name = $coupon->TenGiamGia;
        $code = $coupon->MaGiamGia;
        $fromdate = $coupon->NgayBatDau;
        $todate = $coupon->NgayKetThuc;
        if ($coupon->LoaiGiamGia == 1) {
            $number = number_format($coupon->GiaTriGiamGia,0,",",".") . 'đ';
        }else{
            $number = $coupon->GiaTriGiamGia.'%';
        }
        if ($Request->type == 0) {
            $user = taikhoan::where('ChucVu',1)->where('Vip',0)->get();
        } elseif($Request->type == 1) {
            $user = taikhoan::where('ChucVu',1)->where('Vip',1)->get();
        }else{
            $user = taikhoan::where('ChucVu',1)->get();
        }
        
       
       $now = Carbon::now('Asia/Ho_Chi_Minh')->format('d-m-Y H:i:s');
       $title_email = "Mã khuyến mãi mới cho khách hàng";

       $info = array(
        
        'name'=> $name,
        'code'=> $code,
        'fromdate'=> $fromdate,
        'todate'=> $todate,
        'number'=> $number
    );
       $data = [];
        
    
       foreach ($user as $key => $u) {
           $data['email'][] = $u->email;
       }
            Mail::send('pages.send-mail.send_coupon',['info'=>$info] ,function($message) use ($to_name,$title_email,$data){
                    $message->to($data['email'],$to_name)->subject($title_email);//send this mail with subject
                    $message->from($data['email'],$to_name);//send from this mail
                });
       $notification = array(
                'message' => 'Gửi mail thành công',
                'alert-type' => 'success'
            );

            return Redirect()->back()->with($notification);
    }
}
