<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use App\DanhMucSanPham;
use App\taikhoan;
use App\KhachHang;
use App\YeuThich;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('*',function($view)
        {
        if (Auth::check() && !Auth::user()->nhanvien) {
            $wishlist_num = YeuThich::where('idKhachHang',Auth::user()->khachhang->idKhachHang)->count();
            $name = null;
        }elseif(Auth::check() && Auth::user()->nhanvien){
            $name = taikhoan::where('id',Auth::user()->id)->get();
            $wishlist_num=0;
        }else{
            $wishlist_num=0;
            $name = null;
        }
        $category_limit = DanhMucSanPham::limit(6)->get();
        $category = DanhMucSanPham::orderby('idDanhMuc', 'asc')->get();
        

        $view->with('category',$category)->with('category_limit',$category_limit)->
        with('wishlist_num',$wishlist_num)->with('name',$name);
        });
    }
}
