<?php
 
namespace App\Http\Controllers;
use App\BaiViet;
use App\BinhLuan;
use App\DanhMucBaiViet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use File,Input;
use App\WatchedPost;
class PostController extends Controller
{
    public function allPost(){
        $post = BaiViet::orderby('idBaiViet','DESC')->get();
     $cate = DanhMucBaiViet::all();
        return view('admin.pages.allPost',compact('post','cate'));
    }
    public function addPost(){

        $cate = DanhMucBaiViet::all();
        return view('admin.pages.addPost',compact('cate'));
    }
    public function postadd_post(Request $Request){
      
        $now = Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d');
        $post = new BaiViet();
        $post->TieuDeBaiViet = $Request->title;
        $post->NoiDungNgan = $Request->shortcontent;
        $post->NoiDungChiTiet = $Request->content;
        $post->TrangThai = $Request->status;
        $post->idDanhMucBaiViet = $Request->cate;
        $post->idNhanVien = Auth::user()->nhanvien->idNhanVien;
        $post->NgayTaoBaiViet = $now;
        $post->HinhAnh =  $Request->file('avatar')->getClientOriginalName();

        $post->save();
        $Request->file('avatar')->move( 'public/avatar-post/',$Request->file('avatar')->getClientOriginalName());
        $notification = array(
                'message' => 'Thêm bài viết thành công',
                'alert-type' => 'success'
            );
         return Redirect::to('/admin/allPost')->with($notification);  
     }
     public function detailPost($id_post, Request $Request){
            $post_detail = BaiViet::where('idBaiViet',$id_post)->first();
            $post_detail->LuotXem+=1;
            $post_detail->save();
            if ($post_detail !=null) {
        $oldCart = Session('WatchedPost') ? Session('WatchedPost') : null;
        $newCart = new WatchedPost($oldCart);
        $newCart->AddWatchedPost($post_detail,$id_post);
        $Request->Session()->put('WatchedPost',$newCart);
        }
        $count_comment = BinhLuan::where('idBaiViet',$id_post)->count();
            return view('pages.detailpost',compact('post_detail','count_comment'));        
     }
     public function PostGrip(){
        $cate = DanhMucBaiViet::all();
        $cate_limit5 = DanhMucBaiViet::limit(5)->get();
        
        $cate1 = BaiViet::where('TrangThai',1)->where('idDanhMucBaiViet',1)->paginate(6);
        $cate2 = BaiViet::where('TrangThai',1)->where('idDanhMucBaiViet',2)->paginate(6);
        $cate3 = BaiViet::where('TrangThai',1)->where('idDanhMucBaiViet',3)->paginate(6);
        $cate4 = BaiViet::where('TrangThai',1)->where('idDanhMucBaiViet',4)->paginate(6);
        $cate5 = BaiViet::where('TrangThai',1)->where('idDanhMucBaiViet',5)->paginate(6);
        $post = BaiViet::where('TrangThai',1)->orderby('NgayTaoBaiViet','DESC')->paginate(6);
        return view('pages.post-grid',['post' => $post,'cate1' => $cate1,'cate2' => $cate2,'cate3' => $cate3,'cate4' => $cate4,'cate5' => $cate5],compact('post','cate','cate_limit5','cate1','cate2','cate3','cate4','cate5'));
     }
      public function PostGripCate($id){
        $cate = DanhMucBaiViet::all();
        $id2 = DanhMucBaiViet::where('idDanhMucBaiViet',$id)->first();
        $post = BaiViet::where('TrangThai',1)->where('idDanhMucBaiViet',$id)->orderby('NgayTaoBaiViet','DESC')->paginate(6);
        
        return view('pages.post-grid-cate',['post' => $post],compact('post','cate','id2'));
     }
     public function postedit_post(Request $Request){
       

        $post = BaiViet::where('idBaiViet',$Request->id)->first();
        $post->TieuDeBaiViet = $Request->title;
        $post->NoiDungNgan = $Request->shortcontent;
        $post->NoiDungChiTiet = $Request->content;
        $post->TrangThai = $Request->status;
        $post->idDanhMucBaiViet = $Request->cate;
        if($Request->avatar){
            $post->HinhAnh =  $Request->file('avatar')->getClientOriginalName();  
            $Request->file('avatar')->move( 'public/avatar-post/',$Request->file('avatar')->getClientOriginalName());
            if (File::exists('public/avatar-post/'.$Request->avatar_current)) {
                File::delete('public/avatar-post/'.$Request->avatar_current);
            }
        }
        $post->save();
        
        $notification = array(
                'message' => 'Thay đổi thông tin thành công',
                'alert-type' => 'success'
            );
         return Redirect::to('/admin/allPost')->with($notification);  

     }
     public function comment(Request $Request)
     {
       
         $comment = new BinhLuan();
         $comment->NoiDung = $Request->message;
         $comment->idBaiViet = $Request->id;
         $comment->idKhachHang = Auth::user()->khachhang->idKhachHang;
         $comment->save();
         $notification = array(
                'message' => 'Bình luận thành công',
                'alert-type' => 'success'
            );
         return Redirect()->back()->with($notification);
     }
     public function com_del($id)
     {
         
         $com = BinhLuan::where('idBinhLuan',$id)->first();

         $id_post = $com->idBaiViet;

         $com->delete();
        $post_detail = BaiViet::where('idBaiViet',$id_post)->first();
         $count_comment = BinhLuan::where('idBaiViet',$id_post)->count();
  
          return view('pages.ajax.del-reply',compact('post_detail','count_comment'));

     }
}
