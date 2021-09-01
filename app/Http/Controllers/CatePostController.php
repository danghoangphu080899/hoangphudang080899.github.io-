<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DanhMucBaiViet;
use Illuminate\Support\Facades\Redirect;
class CatePostController extends Controller
{
    public function allCatePost()
    {
        $cate = DanhMucBaiViet::orderby('idDanhMucBaiViet','DESC')->get();
        return view('admin.pages.allCatePost',compact('cate'));
    }
    public function postedit_catepost(Request $Request){
       
        $cate = DanhMucBaiViet::where('idDanhMucBaiViet',$Request->id)->first();
        $cate->TenDanhMucBaiViet = $Request->name;
        $cate->MoTaDanhMucBaiViet = $Request->mota;
        $cate->save();
        $notification = array(
                'message' => 'Cập nhật thông tin thành công',
                'alert-type' => 'success'
            );
         return Redirect::to('/admin/allCatePost')->with($notification); 
    }
    public function postadd_catepost(Request $Request)
    {
        $cate = new DanhMucBaiViet();
        $cate->TenDanhMucBaiViet = $Request->name;
        $cate->MoTaDanhMucBaiViet = $Request->mota;
        $cate->save();
        $notification = array(
                'message' => 'Cập nhật thông tin thành công',
                'alert-type' => 'success'
            );
        return Redirect::to('/admin/allCatePost')->with($notification); 

    }

}
