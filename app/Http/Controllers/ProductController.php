<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Request as Request_Ajax;
use Redirect;
use App\taikhoan;
use App\SanPham;
use App\HinhAnh;
use App\DanhMucCon;
use App\DanhMucSanPham;
use App\NhaSanXuat;
use App\KhachHang;
use App\NhanVien;
use App\DiaChi;
use App\PhieuDatHang;
use App\YeuThich;
use App\DanhGia;
use App\Watched;
use App\ChiTietPhieuDatHang;
use App\GiaTriThuocTinh;
use App\HinhAnh3D;
use Illuminate\Support\Facades\Auth;
use File,Input;
class ProductController extends Controller
{
    public function index(){


    }
    public function DetailProduct($id_product, Request $Request){
       if (Auth::check()) {
            $wishlist_num = YeuThich::where('idKhachHang',Auth::user()->khachhang->idKhachHang)->count();
          
            
        }else{
            $wishlist_num=0;
            

        }
        $review_all = DanhGia::where('idSanPham',$id_product)->get(); 
        if (count($review_all)>0) {
            $num = 0;
             $tong_sao = 0;
        foreach ($review_all as $key => $sao) {
           $num++;
           $tong_sao+=$sao->SoSao;
        }

        $review_avg=round($tong_sao/$num,1);

        }else{
            $review_avg=0;
        }

      

        $detail_danhgia = DanhGia::where('idSanPham',$id_product)->orderby('idDanhGia','DESC')->get();
        $category = DanhMucSanPham::orderby('idDanhMuc', 'asc')->get();
        $category_limit = DanhMucSanPham::limit(6)->get();
    	$detail_product = SanPham::where('idSanPham',$id_product)->get();
         $sanpham = SanPham::where('idSanPham',$id_product)->first();
        if ($sanpham !=null) {
        $oldCart = Session('Watched') ? Session('Watched') : null;
        $newCart = new Watched($oldCart);
        $newCart->AddWatched($sanpham,$id_product);

        $Request->Session()->put('Watched',$newCart);
        $sanpham->LuotXem+=1;
        $sanpham->save();
        }

    	$img_product = HinhAnh::where('idSanPham',$id_product)->get();
        $img3d_product = HinhAnh3D::where('idSanPham',$id_product)->get();
        $category_related_products = SanPham::where('idSanPham',$id_product)->first();
        $check_acc_review = ChiTietPhieuDatHang::where('idSanPham',$id_product)->get();
        $count_review = DanhGia::where('idSanPham',$id_product)->count();
        $related_products = SanPham::where('idDanhMuc',$category_related_products->idDanhMuc)->where('TrangThai',1)->get(); 
    	return view('pages.detailproduct',compact('detail_product','img_product','related_products','category','wishlist_num','category_limit','review_avg','detail_danhgia','img3d_product','check_acc_review','count_review'));
    }
    public function review(Request $Request)
    {
        $review = new DanhGia();
        $review->idSanPham = $Request->idSanPham;
        $review->idKhachHang = Auth::user()->khachhang->idKhachHang;
        $review->SoSao= $Request->rating;
        $review->MucDanhGia = $Request->message;
        $review->save();
        $notification = array(
                'message' => 'Đánh giá sản phẩm thành công',
                'alert-type' => 'success'
            );
         return Redirect()->back()->with($notification);
    }
    public function review_del($id1,$id2)
    {
       $review = DanhGia::where('idDanhGia',$id1)->first();
       $review->delete();
       $review_all = DanhGia::where('idSanPham',$id2)->get(); 
        if (count($review_all)>0) {
            $num = 0;
             $tong_sao = 0;
        foreach ($review_all as $key => $sao) {
           $num++;
           $tong_sao+=$sao->SoSao;
        }

        $review_avg=round($tong_sao/$num,1);

        }else{
            $review_avg=0;
        }
        $count_review = DanhGia::where('idSanPham',$id2)->count();
        $check_acc_review = ChiTietPhieuDatHang::where('idSanPham',$id2)->get();
        $detail = SanPham::where('idSanPham',$id2)->first();
         $detail_danhgia = DanhGia::where('idSanPham',$id2)->orderby('idDanhGia','DESC')->get();
       return view('pages.ajax.del-comment',compact('review_avg','detail','detail_danhgia','check_acc_review','count_review'));

    }
    public function getall_product(){
    	$name = taikhoan::where('id',Auth::user()->id)->get();
        $products = SanPham::all();
        $name_nsx = NhaSanXuat::all();
        $name_category = DanhMucSanPham::all();
    	return view('admin.pages.allProduct',compact('products','name','name_nsx','name_category'));
    }
    public function getadd_product()
    {	
		$name_category = DanhMucSanPham::get();
		$name_nsx = NhaSanXuat::get();
    	$name = taikhoan::where('id',Auth::user()->id)->get();
    	return view('admin.pages.addProduct',compact('name','name_category','name_nsx'));
    }
    
    public function postadd_product(Request $Request)
    {	
        

        $temp ='';
//         $files = $Request->file('HinhAnh360');
//         if($Request->hasFile('HinhAnh360'))
// {
//     foreach ($files as $file) {
//         $temp = $temp . $file->getClientOriginalName();
        
//     }
// }

        // dd($Request->file('HinhAnhChiTiet')->getClientOriginalName());
    	$HinhAnh = $Request->file('HinhAnh')->getClientOriginalName();
    	$SanPham = new SanPham();
    		$SanPham->TenSanPham = $Request->TenSanPham;
    		$SanPham->idDanhMuc = $Request->idDanhMuc;
    		$SanPham->Gia = $Request->Gia;
            $SanPham->HinhAnh = $HinhAnh;
    		$SanPham->SoLuongHang = $Request->SoLuong;
    		$SanPham->idNhaSanXuat = $Request->idNhaSanXuat;
    		$SanPham->MoTaNgan = $Request->MoTaNgan;
    		$SanPham->MoTaChiTiet = $Request->MoTaChiTiet;
            $SanPham->TrangThai = 1;
    		$SanPham->save();
            $Request->file('HinhAnh')->move( 'public/frontend/images/product/',$HinhAnh);

    	   
            if ($Request->idDanhMuc == 1) {
                $mangthuoctinh = [1,2,3,4,5,6,7,8,9];
                $manggiatrithuoctinh = [$Request->manhinh,$Request->hdh,$Request->camsau,$Request->camtruoc,$Request->chip,$Request->ram,$Request->bnt,$Request->sim,$Request->pin];  
                foreach ($mangthuoctinh as $key => $value) {
                   $ThuocTinh = new GiaTriThuocTinh();
                    $ThuocTinh->idThuocTinh = $value;
                    $ThuocTinh->idSanPham = $SanPham->idSanPham;
                    $ThuocTinh->GiaTri = $manggiatrithuoctinh[$key];
                    $ThuocTinh->save();
                }
               
            }
            if ($Request->idDanhMuc == 2) {
                $mangthuoctinh = [10,11,12,13,14,15,16,17,18];
                $manggiatrithuoctinh = [$Request->cpu,$Request->ram,$Request->ocung,$Request->manhinh,$Request->card,$Request->cong,$Request->dacbiet,$Request->hdh,$Request->kichthuoc];  
                foreach ($mangthuoctinh as $key => $value) {
                   $ThuocTinh = new GiaTriThuocTinh();
                    $ThuocTinh->idThuocTinh = $value;
                    $ThuocTinh->idSanPham = $SanPham->idSanPham;
                    $ThuocTinh->GiaTri = $manggiatrithuoctinh[$key];
                    $ThuocTinh->save();
                }
               
            }
            if ($Request->idDanhMuc == 3) {
                $mangthuoctinh = [19,20,21,22,23,24,25,26,27];
                $manggiatrithuoctinh = [$Request->manhinh,$Request->hdh,$Request->chip,$Request->ram,$Request->bnt,$Request->ketnoi,$Request->camsau,$Request->camtruoc,$Request->pin];  
                foreach ($mangthuoctinh as $key => $value) {
                   $ThuocTinh = new GiaTriThuocTinh();
                    $ThuocTinh->idThuocTinh = $value;
                    $ThuocTinh->idSanPham = $SanPham->idSanPham;
                    $ThuocTinh->GiaTri = $manggiatrithuoctinh[$key];
                    $ThuocTinh->save();
                }
               
            }
            if ($Request->idDanhMuc == 4) {
                $mangthuoctinh = [28,29,30,31,32,33];
                $manggiatrithuoctinh = [$Request->manhinh,$Request->pin,$Request->ketnoi,$Request->mat,$Request->dacbiet,$Request->hang];  
                foreach ($mangthuoctinh as $key => $value) {
                   $ThuocTinh = new GiaTriThuocTinh();
                    $ThuocTinh->idThuocTinh = $value;
                    $ThuocTinh->idSanPham = $SanPham->idSanPham;
                    $ThuocTinh->GiaTri = $manggiatrithuoctinh[$key];
                    $ThuocTinh->save();
                }
               
            }
            if ($Request->idDanhMuc == 5) {
                $mangthuoctinh = [34,35,36,37,38,39];
                $manggiatrithuoctinh = [$Request->dtsd,$Request->dkm,$Request->clmk,$Request->cld,$Request->bomay,$Request->thuonghieu,$Request->camsau,$Request->camtruoc,$Request->pin];  
                foreach ($mangthuoctinh as $key => $value) {
                   $ThuocTinh = new GiaTriThuocTinh();
                    $ThuocTinh->idThuocTinh = $value;
                    $ThuocTinh->idSanPham = $SanPham->idSanPham;
                    $ThuocTinh->GiaTri = $manggiatrithuoctinh[$key];
                    $ThuocTinh->save();
                }
               
            }

        
            
    		
    		//dd($name);
    	//$Request->file('HinhAnh')->move('public/frontend/images/product/',file('HinhAnh')->getClientOriginalName());
    	if	($Request->hasFile('HinhAnhChiTiet')){
    		foreach ($Request->file('HinhAnhChiTiet') as $file) {
    			if(isset($file)){
    				HinhAnh::create([
   					'src' =>  $file->getClientOriginalName(),
   					'idSanPham' => $SanPham->idSanPham,
   					$file->move('public/frontend/images/product-details/',$file->getClientOriginalName())
    		]);
    			}
    		}
    	}
        if  ($Request->hasFile('HinhAnh360')){
            foreach ($Request->file('HinhAnh360') as $file360) {
                if(isset($file360)){
                    HinhAnh3D::create([
                    'src' =>  $file360->getClientOriginalName(),
                    'idSanPham' => $SanPham->idSanPham,
                    $file360->move('public/frontend/images/product-360/',$file360->getClientOriginalName())
                    ]);
                }
            }
        }
    	
    	$notification = array(
                'message' => 'Thêm mới sản phẩm thành công',
                'alert-type' => 'success'
            );
    	return Redirect::to('/admin/allProduct')->with($notification);
    }
    public function getedit_product($id_product)
    {	
    	$name_category = DanhMucSanPham::get();
		$name_nsx = NhaSanXuat::get();
    	$name = taikhoan::where('id',Auth::user()->id)->get();
    	$edit_product = SanPham::where('SanPham.idSanPham',$id_product)->get();	
    	$imgdetail_product = HinhAnh::where('idSanPham',$id_product)->get();

    	return view('admin.pages.updateProduct',compact('edit_product','name','imgdetail_product','name_nsx','name_category'));
    }
    public function postedit_product($id_product,Request $Request)
    {



    
    	$img_product = SanPham::where('idSanPham',$id_product)->first();
    	$img_current = 'public/frontend/images/product/'.$Request->img_current;
       
    	$sanpham = SanPham::where('idSanPham', $id_product)->first();
    	$sanpham->TenSanPham = $Request->TenSanPham;
    	$sanpham->Gia = $Request->Gia;
    	$sanpham->SoLuongHang = $Request->SoLuong;
    	$sanpham->idNhaSanXuat = $Request->idNhaSanXuat;
    	$sanpham->MoTaNgan = $Request->MoTaNgan;
    	$sanpham->MoTaChiTiet = $Request->MoTaChiTiet;
    	$sanpham->save();

    	if ($Request->hasFile('HinhAnh')) {
    		$HinhAnh = $Request->file('HinhAnh')->getClientOriginalName();
    		$img_product->HinhAnh = $HinhAnh;
    		$img_product->save();
    		$Request->file('HinhAnh')->move('public/frontend/images/product/',$HinhAnh);
    		if (File::exists($img_current)) {
    			File::delete($img_current);
    		}

    	}
        if (!empty($Request->file('HinhAnhChiTiet'))) {
            
            foreach ($sanpham->hinhanh as $key => $value) {
               $tempt ='public/frontend/images/product-details/'.$value->src;
               if (File::exists($tempt)) {
                File::delete($tempt);

            }
            $value->delete();

            }

            foreach ($Request->file('HinhAnhChiTiet') as $file) {
                $img_deltail = new HinhAnh();
                $img_deltail->src = $file->getClientOriginalName();
                $img_deltail->idSanPham = $id_product;
                $file->move('public/frontend/images/product-details/',$file->getClientOriginalName());
                $img_deltail->save();
            }
        }
        if (!empty($Request->file('HinhAnh360'))) {
            
            foreach ($sanpham->hinhanh3d as $key => $value) {
               $tempt ='public/frontend/images/product-360/'.$value->src;
               if (File::exists($tempt)) {
                File::delete($tempt);
            }
            $value->delete();

            }

            foreach ($Request->file('HinhAnh360') as $file) {
                $img_deltail = new HinhAnh3D();
                $img_deltail->src = $file->getClientOriginalName();
                $img_deltail->idSanPham = $id_product;
                $file->move('public/frontend/images/product-360/',$file->getClientOriginalName());
                $img_deltail->save();
            }
        }
        if ($Request->idDanhMuc == 1) {
                $mangthuoctinh = [1,2,3,4,5,6,7,8,9];
                $manggiatrithuoctinh = [$Request->thuoctinh1,$Request->thuoctinh2,$Request->thuoctinh3,$Request->thuoctinh4,$Request->thuoctinh5,$Request->thuoctinh6,$Request->thuoctinh7,$Request->thuoctinh8,$Request->thuoctinh9];  
                foreach ($mangthuoctinh as $key => $value) {
                   $ThuocTinh = GiaTriThuocTinh::where('idSanPham',$sanpham->idSanPham)->where('idThuocTinh',$value)->first();
                  
                    
                    $ThuocTinh->GiaTri = $manggiatrithuoctinh[$key];
                    $ThuocTinh->save();
                }
               
            }
            if ($Request->idDanhMuc == 2) {
                $mangthuoctinh = [10,11,12,13,14,15,16,17,18];
                $manggiatrithuoctinh = [$Request->thuoctinh1,$Request->thuoctinh2,$Request->thuoctinh3,$Request->thuoctinh4,$Request->thuoctinh5,$Request->thuoctinh6,$Request->thuoctinh7,$Request->thuoctinh8,$Request->thuoctinh9];  
                foreach ($mangthuoctinh as $key => $value) {
                  $ThuocTinh = GiaTriThuocTinh::where('idSanPham',$sanpham->idSanPham)->where('idThuocTinh',$value)->first();
                   
                   
                    $ThuocTinh->GiaTri = $manggiatrithuoctinh[$key];
                    $ThuocTinh->save();
                }
               
            }
            if ($Request->idDanhMuc == 3) {
                $mangthuoctinh = [19,20,21,22,23,24,25,26,27];
                $manggiatrithuoctinh = [$Request->thuoctinh1,$Request->thuoctinh2,$Request->thuoctinh3,$Request->thuoctinh4,$Request->thuoctinh5,$Request->thuoctinh6,$Request->thuoctinh7,$Request->thuoctinh8,$Request->thuoctinh9];  
                foreach ($mangthuoctinh as $key => $value) {
                  $ThuocTinh = GiaTriThuocTinh::where('idSanPham',$sanpham->idSanPham)->where('idThuocTinh',$value)->first();
                 
                
                    $ThuocTinh->GiaTri = $manggiatrithuoctinh[$key];
                    $ThuocTinh->save();
                }
               
            }
            if ($Request->idDanhMuc == 4) {
                $mangthuoctinh = [28,29,30,31,32,33];
                $manggiatrithuoctinh = [$Request->thuoctinh1,$Request->thuoctinh2,$Request->thuoctinh3,$Request->thuoctinh4,$Request->thuoctinh5,$Request->thuoctinh6];  
                foreach ($mangthuoctinh as $key => $value) {
                 $ThuocTinh = GiaTriThuocTinh::where('idSanPham',$sanpham->idSanPham)->where('idThuocTinh',$value)->first();
                   
                
                    $ThuocTinh->GiaTri = $manggiatrithuoctinh[$key];
                    $ThuocTinh->save();
                }
               
            }
            if ($Request->idDanhMuc == 5) {
                $mangthuoctinh = [34,35,36,37,38,39];
                $manggiatrithuoctinh = [$Request->thuoctinh1,$Request->thuoctinh2,$Request->thuoctinh3,$Request->thuoctinh4,$Request->thuoctinh5,$Request->thuoctinh6];   
                foreach ($mangthuoctinh as $key => $value) {
                $ThuocTinh = GiaTriThuocTinh::where('idSanPham',$sanpham->idSanPham)->where('idThuocTinh',$value)->first();
                   
                  
                    $ThuocTinh->GiaTri = $manggiatrithuoctinh[$key];
                    $ThuocTinh->save();
                }
               
            }





   $notification = array(
                'message' => 'Thay đổi thông tin sản phẩm thành công',
                'alert-type' => 'success'
            );
        return Redirect::to('/admin/allProduct')->with($notification);
    }
    // public function getdel_product($id_product)
    // {   

    //     $SanPham = SanPham::find($id_product);
    //     $HinhAnh = HinhAnh::where('idSanPham',$id_product)->get();
       
    //     foreach ($HinhAnh as $imgs) {
    //          $img = 'public/frontend/images/product/'.$imgs->src;
    //         if (File::exists($img)) {
    //           File::delete($img);
    //     }
    //     }
    //     $SanPham->delete();

    //     return Redirect::to('/admin/allProduct')->with('mess','Xoa thông tin thành công');

    // }
    public function hidden_product($id)
    {
         $SanPham = SanPham::find($id);
         $SanPham->TrangThai = 0;
         $SanPham->save();
         $notification = array(
                'message' => 'Đã ẩn sản phẩm thành công',
                'alert-type' => 'success'
            );
         return Redirect::to('/admin/allProduct')->with($notification);
    }
    public function show_product($id)
    {
         $SanPham = SanPham::find($id);
         $SanPham->TrangThai = 1;
         $SanPham->save();
         $notification = array(
                'message' => 'Đã hiển thị lại sản phẩm',
                'alert-type' => 'success'
            );
         return Redirect::to('/admin/allProduct')->with($notification);
    }
    public function getdel_Img($id_img)
    {	
    	if(Request_Ajax::ajax()){
    		 $idHinh = (int)Request_Ajax::get('idHinh');
    		 $img_deltail = HinhAnh::find($idHinh);
    		 if(!empty($img_deltail)){
    		 	$img = 'public/frontend/images/product/'.$img_deltail->src;
    		
    		 if(File::exists($img)){
    		 	File::delete($img);
    		 }
    		 if ($img_deltail != null) {
    		 	   $img_deltail->delete(); 	
    		}else{
    			return 'xxx';
    		 
    	}
    		return "ok";
    	}
    		}
    	
    }
    public function test($id1,$id2)
    {
         $review = new DanhGia();
        $review->idSanPham = 77;
        $review->idKhachHang = Auth::user()->khachhang->idKhachHang;
        $review->SoSao= $id2;
        $review->MucDanhGia = $id1;
        $review->save();

    }
    

}
