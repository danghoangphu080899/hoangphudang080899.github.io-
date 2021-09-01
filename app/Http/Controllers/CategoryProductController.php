<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DanhMucSanPham;
use Illuminate\Support\Facades\Redirect;
class CategoryProductController extends Controller
{
    public function allCategory()
    {
        $all_cate = DanhMucSanPham::all();
        return view('admin.pages.allCategory',compact('all_cate'));
    }
    public function postedit_cate(Request $Request)
    {
     
        $danhmuc = DanhMucSanPham::where('idDanhMuc',$Request->id)->first();
        $danhmuc->TenDanhMuc = $Request->TenDanhMuc;
        $danhmuc->MoTa = $Request->MoTa;
        $danhmuc->save();
        $notification = array(
                'message' => 'Cập nhật thông tin thành công',
                'alert-type' => 'success'
            );
        return Redirect::to('/admin/allCategory')->with($notification);
    }
}
