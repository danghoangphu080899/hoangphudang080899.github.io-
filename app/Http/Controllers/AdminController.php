<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\taikhoan;
use App\SanPham; 
use App\HinhAnh;
use App\ThongKe;
use Carbon\Carbon;
use App\TruyCap;
use App\BaiViet;
use App\PhieuDatHang;
use Illuminate\Support\Facades\Auth;
class AdminController extends Controller
{
    public function index(Request $Request)
    {	
        $today = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
        $truycap = TruyCap::where('IP',$Request->ip())->first();
        if (!$truycap) {
            $truycap = new TruyCap();
            $truycap->IP = $Request->ip();
            $truycap->NgayTruyCap = $today;
            $truycap->save();
        }
        $start_last_month = Carbon::now('Asia/Ho_Chi_Minh')->subMonth()->startOfMonth()->toDateString();
        $end_last_month =  Carbon::now('Asia/Ho_Chi_Minh')->subMonth()->endOfMonth()->toDateString();

        $start_this_month =  Carbon::now('Asia/Ho_Chi_Minh')->startOfMonth()->toDateString();
        
        $oneyear =  Carbon::now('Asia/Ho_Chi_Minh')->subdays(365)->toDateString();

        $count_total = TruyCap::count();
        $count_last_month = TruyCap::whereBetween('NgayTruyCap',[$start_last_month,$end_last_month])->count();
        $count_this_month = TruyCap::whereBetween('NgayTruyCap',[$start_this_month,$today])->count();
        $count_year = TruyCap::whereBetween('NgayTruyCap',[$oneyear,$today])->count();

    	$name = taikhoan::where('id',Auth::user()->id)->get();
    	$count_user = taikhoan::where('ChucVu',1)->count();

        $doanhthu = ThongKe::whereBetween('Ngay',[$start_this_month,$today])->get();
        $total =0;
        if($doanhthu){
            foreach ($doanhthu as $key => $value) {
                $total += $value->TongTien;
            }
            
        }
        $count_order = PhieuDatHang::where('idTrangThai',1)->count();
        $count_product = SanPham::count();
        $count_post = BaiViet::count();

        $top_sold = SanPham::orderby('SoLuongBan','DESC')->limit(15)->get();
        $top_view = SanPham::orderby('LuotXem','DESC')->limit(15)->get();
    	return view('admin.pages.dashboard',compact('name','count_total','count_year','count_this_month','count_last_month','count_user','total','count_order','count_product','top_view','top_sold','count_post'));
    }
    public function filter_30day()
    {
    	$sub30day = Carbon::now('Asia/Ho_Chi_Minh')->subdays(30)->toDateString();
    	$today = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
    	$get = ThongKe::whereBetween('Ngay',[$sub30day,$today])->orderby('Ngay','ASC')->get();
    	if (count($get)>0) {
    		foreach ($get as $key => $value) {
    		$chart_data[] = array(
    			'period' => $value->Ngay, 
    			'order' => $value->TongDonHang, 
    			'sales' => $value->TongTien, 
    			'quantity' => $value->SoLuong
    		);

    	}

    	echo $data = json_encode($chart_data);
    	}
    	
    }
    public function dashboard_filter(Request $Request)
    {
    	$data = $Request->all();

    	$today = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();

    	$dau_thangtruoc = Carbon::now('Asia/Ho_Chi_Minh')->subMonth()->startOfMonth()->toDateString();
    	$cuoi_thangtruoc = Carbon::now('Asia/Ho_Chi_Minh')->subMonth()->endOfMonth()->toDateString();
    	$dau_thangnay = Carbon::now('Asia/Ho_Chi_Minh')->startOfMonth()->toDateString();

    	$sub7days = Carbon::now('Asia/Ho_Chi_Minh')->subdays(7)->toDateString();
    	$sub1year = Carbon::now('Asia/Ho_Chi_Minh')->subdays(365)->toDateString();

    	if ($data['value']=='7ngay') {
    		$get = ThongKe::whereBetween('Ngay',[$sub7days,$today])->orderby('Ngay','ASC')->get();
    	}elseif ($data['value']=='thangtruoc') {
    		$get = ThongKe::whereBetween('Ngay',[$dau_thangtruoc,$cuoi_thangtruoc])->orderby('Ngay','ASC')->get();
    	}elseif ($data['value']=='thangnay') {
    		$get = ThongKe::whereBetween('Ngay',[$dau_thangnay,$today])->orderby('Ngay','ASC')->get();
    	}else{
    		$get = ThongKe::whereBetween('Ngay',[$sub1year,$today])->orderby('Ngay','ASC')->get();
    	}
    	if (count($get)>0) {
    		foreach ($get as $key => $value) {
    		$chart_data[] = array(
    			'period' => $value->Ngay, 
                'order' => $value->TongDonHang, 
                'sales' => $value->TongTien, 
                'quantity' => $value->SoLuong
    		);

    	}
    	echo $data = json_encode($chart_data);
    	}

    }
    public function filter_bydate(Request $Request)
    {
    	$data = $Request->all();
    	$from_date = $data['from_date'];
    	$to_date = $data['to_date'];
    	$get = ThongKe::whereBetween('Ngay',[$from_date,$to_date])->orderby('Ngay','ASC')->get();
    	// echo $from_date;
    	// echo $to_date;
    	if (count($get)>0) {
    		foreach ($get as $key => $value) {
    		$chart_data[] = array(
    			'period' => $value->Ngay, 
                'order' => $value->TongDonHang, 
                'sales' => $value->TongTien, 
                'quantity' => $value->SoLuong
    		);

    	}
    	echo $data = json_encode($chart_data);
    	}
    	
    }
    

}
