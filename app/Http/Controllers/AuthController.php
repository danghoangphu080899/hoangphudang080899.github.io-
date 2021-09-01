<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Socialite;
use Session;
use Illuminate\Support\Facades\Redirect;
use App\User;
use App\KhachHang;
use App\DanhMucSanPham;
use App\YeuThich;
use Mail;
use App\taikhoan;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
class AuthController extends Controller
{
    public function getlogin(){

    	return view('pages.login');
    }
    public function getregister(){
   
        return view('pages.register');
    }
    
      public function postRegister(Request $Request){
        
    	
        $user= User::create([

             
            'email'=> $Request->email,
            'password'=>bcrypt($Request->password),
             'email_verified_code' => $confirmation_code,
        
        ]);
        $khachhang = KhachHang::create([
            'id' => $user->id,
            'HoTen' => $Request->name
        ]);
        $confirmation_code = time().uniqid(true);
        $to_name = "Hoàng Phú Store";
        $to_email = $Request->email;//send to this email
        $info = array(
                'confirmation_code'=> $confirmation_code,
    );
        Mail::send('pages.send-mail.email_verified', ['info'=>$info],function($message) use ($to_name,$to_email){
                    $message->to($to_email)->subject('Xác nhận địa chỉ email của bạn');//send this mail with subject
                    $message->from($to_email,$to_name);//send from this mail
                });
        $notification = array(
                'message' => 'Đăng ký tài khoản thành công',
                'alert-type' => 'success'
            );
         
        return Redirect::to('/login')->with($notification);
    }

    public function postLogin(Request $Request){


    	$username = $Request->email;
    	$password = $Request->password;
        $remember = $Request->has('remember') ? true : false;
  
    	$arr =[
    		'email' => $username, 
    		'password' => $password
    	];
        if (Auth::attempt($arr,$remember)) {
            if (Auth::user()->TrangThai == '0') {
                Auth::logout();
                $notification = array(
                'message' => 'Tài khoản của bạn bị khóa',
                'alert-type' => 'error'
            );
            
            return Redirect()->back()->with($notification);
            }else{
                if(Auth::user()->ChucVu == '1')
                    {
                    $notification = array(
                        'message' => 'Đăng nhập tài khoản thành công',
                        'alert-type' => 'success'
                    );
                    return Redirect::to('/trangchu')->with($notification);
                }
                    else{
                        $notification = array(
                        'message' => 'Đăng nhập tài khoản admin thành công',
                        'alert-type' => 'success'
                    );
                    return Redirect::to('/admin')->with($notification);
                }

            }
          	
          	

        }else
            {
                $notification = array(
                'message' => 'Sai thông tin đăng nhập',
                'alert-type' => 'error'
            );
			
    		return Redirect()->back()->with($notification);
	       }	
            
        }
     public function logout(){
    	Auth::logout();
        $coupon = Session::get('coupon');
        if ($coupon) {
          Session::forget('coupon');
        }
        $coupon = Session::get('Watched');
        if ($coupon) {
          Session::forget('Watched');
        }
        $coupon = Session::get('WatchedPost');
        if ($coupon) {
          Session::forget('WatchedPost');
        }
        $notification = array(
                'message' => 'Đăng xuất tài khoản thành công',
                'alert-type' => 'success'
            );
    	return Redirect::to('/trangchu')->with($notification);
    	}
    public function redirect($provider)
            {
     return Socialite::driver($provider)->redirect();
    }
        public function callback($provider)
        {
        $getInfo = Socialite::driver($provider)->user(); 
         $user = $this->createUser($getInfo,$provider); 
        Auth()->login($user); 
        $notification = array(
                        'message' => 'Đăng nhập tài khoản thành công',
                        'alert-type' => 'success'
                    );
                    return Redirect::to('/trangchu')->with($notification);
 }
        function createUser($getInfo,$provider){
        $user = User::where('provider_id', $getInfo->id)->first();
        

        if (!$user) {
         $confirmation_code = time().uniqid(true);
        $user = User::create([
         'email'    => $getInfo->email,
         'provider' => $provider,
         'provider_id' => $getInfo->id,
         'email_verified_code' => $confirmation_code,
     ]);
        $khachhang = KhachHang::create([
            'id' => $user->id
        ]);
        
        $to_name = "Hoàng Phú Store";
        $to_email = $getInfo->email;//send to this email
        $info = array(
                'confirmation_code'=> $confirmation_code,
    );
        Mail::send('pages.send-mail.email_verified', ['info'=>$info],function($message) use ($to_name,$to_email){
                    $message->to($to_email)->subject('Xác nhận địa chỉ email của bạn');//send this mail with subject
                    $message->from($to_email,$to_name);//send from this mail
                });
   }
   return $user;
 }
 public function validate_email(Request $request)
 {
     if ($request->input('email') !== '') {
            if ($request->input('email')) {
                $rule = array('email' => 'Required|email|unique:taikhoan');
                $validator = Validator::make($request->all(), $rule);
            }
            if (!$validator->fails()) {
                die('true');
            }
        }
        die('false');
 }
 public function validate_email_forget(Request $request)
 {
      if ($request->input('email') !== '') {
            if ($request->input('email')) {
                $rule = array('email' => 'Required|email|unique:taikhoan');
                $validator = Validator::make($request->all(), $rule);
            }
            if (!$validator->fails()) {
                die('false');
            }
        }
        die('true');
 }
 public function verify($code)
    {
        $user = taikhoan::where('email_verified_code', $code);
         $now = Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d H:i:s');
        if ($user->count() > 0) {
            $user->update([
                'email_verified_at' => $now,
                'email_verified_code' => null
            ]);
            
            $notification = array(
                        'message' => 'Bạn đã xác nhận thành công',
                        'alert-type' => 'success'
                    );
        } else {
            $notification = array(
                        'message' => 'Mã xác nhận không chính xác',
                        'alert-type' => 'error'
                    );
         
        }

        return redirect(route('trangchu'))->with($notification);
    }




}
