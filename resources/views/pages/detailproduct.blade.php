@extends('welcome')
@section('detail_product')

        <!-- Breadcrumbs -->
        <div class="breadcrumbs">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="bread-inner">
                            <ul class="bread-list">
                                <li><a href="{{route('trangchu')}}">Trang chủ<i class="ti-arrow-right"></i></a></li>
                                <li class="active"><a href="">Chi tiết sản phẩm</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Breadcrumbs -->
                
        <!-- Shop Single -->
        <section class="shop single section">

                    <div class="container">
                        @foreach($detail_product as $key => $detail)
                        <div class="row"> 

                            <div class="col-12">
                                <div class="row">
                                    <div class="col-lg-6 col-12">
                                        <!-- Product Slider -->
                                        <div class="product-gallery">
                                            <!-- Images slider -->
                                            {{-- <div class="flexslider-thumbnails">
                                                <ul class="slides">
                                                     @foreach($img_product as $img_pro)
                                                    <li  data-thumb="{{asset('public/frontend/images/product/'.$img_pro->src)}}" rel="adjustX:10, adjustY:">
                                                        <img class="exzoom hidden" id="exzoom" src="{{asset('public/frontend/images/product/'.$img_pro->src)}}" alt="#">
                                                    </li>
                                                    <div class="exzoom_nav"></div>
   
                                                    @endforeach
                                                </ul>
                                            </div> --}}
                                            
                                            <div class="exzoom hidden" id="exzoom">
    <div class="exzoom_img_box ">
        <ul class='exzoom_img_ul '>
            @foreach($img_product as $img_pro)
            <li><img src="{{asset('public/frontend/images/product-details/'.$img_pro->src)}}"/></li>
            @endforeach
            
        </ul>
    </div>
    <div class="exzoom_nav"></div>
    <p class="exzoom_btn">
        <a href="javascript:void(0);" class="exzoom_prev_btn"> < </a>
        <a href="javascript:void(0);" class="exzoom_next_btn"> > </a>
    </p>
</div>

<a style="margin-top: 15px;cursor: pointer;" data-toggle="modal" data-target="#360do"><p style="    color: black;
    margin-top: 10px;
    font-size: initial;
    font-weight: 700;">Xem ảnh 360 độ</p></a>
                                            <!-- End Images slider -->
                                            
                                        </div>
                                        <!-- End Product slider -->
                                    </div>
                                    <div class="col-lg-6 col-12">
                                        <div class="product-des">
                                            <form id='myform' method='POST' action='{{route('AddsCart')}}'>
                                        {{ csrf_field() }}
                                            <!-- Description -->
                                            <div class="short">
                                                <h3>{{$detail->TenSanPham}}</h3>
                                                <div class="rating-main">
                                                    <ul class="rating">
                                                        @for( $i=0; $i<(int)$review_avg;$i++)
                                                        <li><i class="fa fa-star"></i></li>
                                                        @endfor
                                                        @if($review_avg-(int)$review_avg!=0)
                                                            <li ><i class="fa fa-star-half-o"></i></li>
                                                            @for( $i=0; $i<5-(int)$review_avg -1;$i++)
                                                            <li class="dark"><i class="fa fa-star-o"></i></li> 
                                                            @endfor
                                                        @else
                                                           @for( $i=0; $i<5-(int)$review_avg;$i++)
                                                            <li ><i class="fa fa-star-o"></i></li> 
                                                            @endfor 
                                                        @endif
                                                        {{-- <li><i class="fa fa-star"></i></li>
                                                        <li><i class="fa fa-star"></i></li>
                                                        
                                                        <li class="dark"><i class="fa fa-star-o"></i></li> --}}
                                                    </ul>
                                                    <a href="#" class="total-review">({{count($detail->danhgia)}}) Đánh giá</a>
                                                </div>
                                                <p class="price"><span class="discount">{{number_format($detail->Gia,0,",",".")}} VNĐ</span><s>1.000 VNĐ</s> </p>
                                                <p class="description">{{$detail->MoTaNgan}}</p>
                                            </div>
                                            <!--/ End Description -->
                                            <!-- Color -->
                                            @if(count($detail->mausac)>0)
                                            <div class="color"> 
                                                <h4>Các phiên bản <span>Màu</span></h4>
                                                <ul>
                                                    @foreach($detail->mausac as $mausac)
                                                    <li><a href="#" style="background: {{$mausac->TenMau}}"><i class="ti-check"></i></a></li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                            @endif
                                            <!--/ End Color -->
                                            <!-- Size -->
                                            {{-- @if($detail->danhmucsanpham->TenDanhMuc =='Điện thoại')
                                              <div class="size">
                                                @foreach($detail->danhmucsanpham->thuoctinh as $tt)
                                                     <h4>{{$tt->TenThuocTinh}}: </h4>
                                                        <ul class=""> 
                                                         @foreach($tt->giatrithuoctinh as $gttt)
                                                            <li class="one" ><a>{{$gttt->GiaTri}}{{$gttt->donvitinh->VietTat}}</a></li>
                                                        @endforeach
                                                        
                                                        </ul>
                                                @endforeach
                                                </div>
                                             @endif --}}

                                            {{-- <div class="size">
                                                <h4>Size</h4>
                                                <ul>
                                                    <li><a href="#" class="one">S</a></li>
                                                    <li><a href="#" class="two">M</a></li>
                                                    <li><a href="#" class="three">L</a></li>
                                                    <li><a href="#" class="four">XL</a></li>
                                                    <li><a href="#" class="four">XXL</a></li>
                                                </ul>
                                            </div> --}}
                                            <!--/ End Size -->
                                            <!-- Product Buy -->
                                            <div class="product-buy">
                                                <div class="quantity">
                                                    <h6>Số lượng :</h6>
                                                    <!-- Input Order -->
                                                    <div class="input-group">
                                                        <div class="button minus">
                                                            <button type="button" class="btn btn-primary btn-number" disabled="disabled" data-type="minus" data-field="SoLuong">
                                                                <i class="ti-minus"></i>
                                                            </button>
                                                        </div>
                                                        <input type="text" name="SoLuong" class="input-number"  data-min="1" data-max="{{$detail->SoLuongHang}}" value="1">
                                                        <div class="button plus">
                                                            <button type="button" class="btn btn-primary btn-number" data-type="plus" data-field="SoLuong">
                                                                <i class="ti-plus"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                    <!--/ End Input Order -->
                                                </div>
                                                 <input type="hidden" name="idSanPham" value="{{$detail->idSanPham}}">
                                                 <br>
                                                <div class="add-to-cart">
                                                    @if($detail->SoLuongHang>0 )
                                                    <a href="javascript:{}" onclick="submitform()" class="btn">Thêm vào giỏ hàng</a>
                                                    @else
                                                    <a href="javascript:void()" class="btn">Tạm hết hàng</a>
                                                    @endif
                                                    <a title="Wishlist" onclick="AddWishlist({{$detail->idSanPham}})" href="javascript:void(0)" class="btn min"><i class="ti-heart"></i></a>
                                                    
                                                </div>
                                                <p class="cat">Danh mục :<a href="">{{$detail->danhmucsanpham->TenDanhMuc}}</a></p>
                                                <p class="availability">Số lượng hàng  : {{$detail->SoLuongHang}} sản phẩm trong kho</p>
                                            </div>
                                            <!--/ End Product Buy -->
                                        </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="product-info">
                                            <div class="nav-main">
                                                <!-- Tab Nav -->
                                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                                    <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#description" role="tab">Mô tả sản phẩm</a></li>
                                                    <li class="nav-item"><a onclick="check_height()" class="nav-link" data-toggle="tab" href="#reviews" role="tab">Đánh giá & bình luận</a></li>
                                                </ul>
                                                <!--/ End Tab Nav -->
                                            </div>
                                            <div class="tab-content" id="myTabContent">
                                                <!-- Description Tab -->
                                                <div class="tab-pane fade show active" id="description" role="tabpanel">
                                                    <div class="tab-single">
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div class="single-des">
                                                                    {{-- <p style="    margin: 20px 0px 15px;
    padding: 0px;
    font-weight: bold;
    font-size: 20px;
    line-height: 28px;
    font-family: Arial, Helvetica, sans-serif;
    color: rgb(51, 51, 51);
    outline: none;
   ">{{$detail->MoTaNgan}}</p> --}}
                                                                </div>
                                                                <div style="position: relative;">
                                                                <div class="single-des content hideContent">
                                                                    <textarea id="summernote"> </textarea>
                                                                    <script type="text/javascript">
                                                                       $('#summernote').summernote({

                                                                        height: '200',
                                                                        airMode: true,




                                                                    }).summernote('code', `{!!$detail->MoTaChiTiet!!}`);
                                                                       $('#summernote').summernote('disable');

                                                                   </script>
                                                               </div>
                                                                   <div class="show-more">
                                                                        <a href="javascript::void(0)"><span>Xem thêm</span></a>
                                                                    </div>
                                                                    </div>
                                                                <div class="single-des">
                                                                    <h4>Cấu hình chi tiết:</h4>
                                                                    <ul>
                                                                        @foreach($detail->danhmucsanpham->thuoctinh as $tt)
                                                                        <li>{{$tt->TenThuocTinh}}: 
                                                                            @foreach($detail->giatrithuoctinh as $giatri)
                                                                                @if($giatri->idThuocTinh == $tt->idThuocTinh )
                                                                            {{$giatri->GiaTri}} {{$giatri->donvitinh->VietTat}}.
                                                                                @endif
                                                                            @endforeach
                                                                        </li>
                                                                        @endforeach
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--/ End Description Tab -->
                                                <!-- Reviews Tab -->
                                                
                                                <div class="tab-pane fade " id="reviews" role="tabpanel">
                                                    <div class="tab-single review-panel del-comment-ajax ">
                                                        <div class="row">
                                                            <div class="col-12 ">
                                                                <div class="ratting-main content-comment " id="rating-ajax">
                                                                    <div class="avg-ratting">
                                                                        <h4>Đánh giá {{$detail->TenSanPham}}  </h4>
                                                                        
                                                                        <div class="rating-main-comment">
                                                                            <?php if ($review_avg-(int)$review_avg==0) {
                                                                                $review_avg = $review_avg . '.0';
                                                                            } ?>
                                                                            <h5 >{{$review_avg}}  </h5>
                                                    <ul class="rating-comment">
                                                        @for( $i=0; $i<(int)$review_avg;$i++)
                                                        <li><i class="fa fa-star"></i></li>
                                                        @endfor
                                                        @if($review_avg-(int)$review_avg!=0)
                                                            <li ><i class="fa fa-star-half-o"></i></li>
                                                            @for( $i=0; $i<5-(int)$review_avg -1;$i++)
                                                            <li class="dark"><i class="fa fa-star-o"></i></li> 
                                                            @endfor
                                                        @else
                                                           @for( $i=0; $i<5-(int)$review_avg;$i++)
                                                            <li ><i class="fa fa-star-o"></i></li> 
                                                            @endfor 
                                                        @endif
                                                        {{-- <li><i class="fa fa-star"></i></li>
                                                        <li><i class="fa fa-star"></i></li>
                                                        
                                                        <li class="dark"><i class="fa fa-star-o"></i></li> --}}
                                                    </ul>
                                                   <span id="span">( {{count($detail->danhgia)}} đánh giá )</span>
                                                </div>
                                                                        
                                                                    </div>
                                                                    <!-- Single Rating -->

                                                                    @foreach($detail_danhgia as $dg)
                                                                    <div style="margin: 0;" class="single-rating">
                                                                        <div class="rating-author">
                                                                            @if($dg->khachhang->taikhoan->avatar==null)
                                                                            <img src="{{asset('public/avatar')}}/avatar_default_man.jpg" alt="avatar">
                                                                            @else
                                                                            <img src="{{asset('public/avatar')}}/{{$dg->khachhang->taikhoan->avatar}}" alt="avatar">
                                                                            @endif
                                                                        </div>
                                                                        <div class="rating-des">
                                                                            <h6>{{$dg->khachhang->HoTen}}</h6>
                                                                            <div class="ratings">
                                                                                <ul class="rating">
                                                                                    @for( $i=0; $i<$dg->SoSao;$i++)
                                                                                    <li><i class="fa fa-star"></i></li>
                                                                                    @endfor
                                                                                    @for( $i=0; $i<5-$dg->SoSao;$i++)
                                                                                    <li><i class="fa fa-star-o"></i></li>
                                                                                    @endfor
                                                                                    {{-- <li><i class="fa fa-star"></i></li>
                                                                                    <li><i class="fa fa-star"></i></li>
                                                                                    <li><i class="fa fa-star-o"></i></li>
                                                                                    <li><i class="fa fa-star-o"></i></li> --}}
                                                                                </ul>
                                                                                <div class="rate-count">(<span>{{$dg->SoSao}} sao</span>)</div>
                                                                            </div>
                                                                            <p>{{$dg->MucDanhGia}}</p>
                                                                        </div>
                                                                        @if( Auth::check() && $dg->khachhang->idKhachHang == Auth::user()->khachhang->idKhachHang)
                                                                        <div class="rating-del">
                                                                            <a onclick="review_del({{$dg->idDanhGia}},{{$detail->idSanPham}})" href="javascript:void(0)"><i class="ti ti-close"></i></a>
                                                                        </div>
                                                                        @endif
                                                                    </div>
                                                                    @endforeach
                                                                    <!--/ End Single Rating -->
                                                                    
                                                                </div> 
                                                                <div class="show-more-comment">
                                                                        <a href="javascript::void(0)"><span>Xem thêm</span></a>
                                                                    </div>
                                                                    <input type="hidden" id="count_review" value="{{$count_review}}">
                                                                <!-- Review -->
                                                                <div class="comment-review">
                                                                    <div class="add-review">
                                                                        <h5>Đánh giá mới</h5>
                                                                        <p>Chỉ những ai đã mua sản phẩm mới có thể đánh giá sản phẩm</p>
                                                                    </div>
                                                                </div>
                                                                @if(Auth::check() )
                                                                @if($check_acc_review)
                                                                <?php
                                                                $check = false;
                                                                foreach ($check_acc_review as $key => $value) {
                                                                    if ($value->phieudathang->khachhang->idKhachHang == Auth::user()->khachhang->idKhachHang && $value->phieudathang->idTrangThai == 4) {
                                                                       $check = true;
                                                                    }
                                                                }

                                                                 ?>
                                                                 @if($check)
                                                                 <div class="col-lg-12 col-12">
                                                                    <div class="form-group button5">    
                                                                        <button data-toggle="modal" data-target="#comment" class="btn">Tạo bài đánh giá</button>
                                                                    </div>
                                                                </div>
                                                                 @endif
                                                                

                                                                @endif
                                                                 @else

                                                                 <a  href="{{route('login')}}"><button class="btn-info btn-lg">Login</button></a>

                                                                @endif
                                                            </div>
                                                            
                                                        </div>
                                                    </div>
                                                
                                                
                                            </div>
                                                <!--/ End Reviews Tab -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
<div class="modal fade" id="comment" tabindex="-1" role="dialog">
            <div style="max-width: 400px;" class="modal-dialog modal-dialog2" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span class="ti-close" aria-hidden="true"></span></button>
                    </div>
                    <div class="modal-body2 shop single">
                        <form class="form form-comment" method="post" action="{{route('review')}}">
                            <input type="hidden" name="idSanPham" value="{{$detail->idSanPham}}">
                            <div class="comment-review">
                                <div class="add-review">
                                    <h3>Đánh giá sản phẩm</h3>
                                    <p>Chỉ những ai đã mua sản phẩm mới có thể đánh giá sản phẩm</p>
                                </div>
                                <h4>Đánh giá của bạn<span style="color: red"> *</span></h4>
                                <div class="review-inner">
                                    <div class="ratings">
                                       <div id="rating">
                                        <input type="radio"  id="star5" name="rating" value="5" />
                                        <label class = "full" for="star5" title="Quá tốt - 5 sao"></label>

                                        <input type="radio" id="star4" name="rating" value="4" />
                                        <label class = "full" for="star4" title="Tốt - 4 sao"></label>

                                        <input type="radio" id="star3" name="rating" value="3" />
                                        <label class = "full" for="star3" title="Bình thường - 3 sao"></label>

                                        <input type="radio" id="star2" name="rating" value="2" />
                                        <label class = "full" for="star2" title="Tệ - 2 sao"></label>

                                        <input type="radio" id="star1" name="rating" value="1" />
                                        <label class = "full" for="star1" title="Quá tệ - 1 sao"></label>
                                        <span class="error1" style="display: none;">
                                                          <i class=" fa fa-exclamation-triangle"></i>
                                                      </span>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!--/ End Review -->
                        <!-- Form -->

                        @csrf
                        <div class="row">

                            <div class="col-lg-12 col-12">
                                <div class="form-group">
                                    <label>Bạn thấy sản phẩm như thế nào? <span>*</span></label>
                                    <textarea  id="summernote_comment" name="message" rows="6" placeholder="Bạn thấy sản phẩm này thế nào..." ></textarea>
                                    <span class="error1" style="display: none;">
                                                          <i class=" fa fa-exclamation-triangle"></i>
                                                      </span>
                                </div>
                            </div>
                            <div class="col-lg-12 col-12 text-center">
                                <div class="form-group button5">    
                                    <button  type="submit"  class="btn button-comment">Đánh giá sản phẩm</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
    </div>
    
    </div> 

<div  class="modal fade" id="360do" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-dialog3" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span class="ti-close" aria-hidden="true"></span></button>
                    </div>
                    <div class="modal-body">
                        <div class="row no-gutters">
                            <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                                <div class="threesixty product1">
    <div class="spinner">
        <span>0%</span>
    </div>
    <ol class="threesixty_images"></ol>
</div>

                                
                          </div>
                          <div class=" content col-lg-4 col-md-12 col-sm-12 col-xs-12">
                              <div class="quickview-content">
                                    <h2>{{$detail->TenSanPham}}</h2>
                                    <div class="quickview-ratting-review">
                                        <div class="quickview-ratting-wrap">
                                            <div class="quickview-ratting">
                                                <i class="yellow fa fa-star"></i>
                                                <i class="yellow fa fa-star"></i>
                                                <i class="yellow fa fa-star"></i>
                                                <i class="yellow fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                            <a href="#"> (1 đánh giá)</a>
                                        </div>
                                        <div class="quickview-stock">
                                            <span><i class="fa fa-check-circle-o"></i> trong kho</span>
                                        </div>
                                    </div>
                                    <h3 style="color: red">{{number_format($detail->Gia,0,",",".")}} VNĐ</h3>
                                    <div>
                                        <h5>Cấu hình chi tiết: </h5>
                                        <ul>
                                            @foreach($detail->danhmucsanpham->thuoctinh as $tt)
                                            <li>- <b>{{$tt->TenThuocTinh}}:</b> 
                                                @foreach($detail->giatrithuoctinh as $giatri)
                                                    @if($giatri->idThuocTinh == $tt->idThuocTinh )
                                                {{$giatri->GiaTri}}{{$giatri->donvitinh->VietTat}}.
                                                    @endif
                                                @endforeach
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <div class="default-social">
                                        <h4 class="share-now">Chia sẽ:</h4>
                                        <ul>
                                            <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
                                            <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
                                            <li><a class="youtube" href="#"><i class="fa fa-pinterest-p"></i></a></li>
                                            <li><a class="dribbble" href="#"><i class="fa fa-google-plus"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                          </div>
                    </div>
                </div>
            </div>
    </div>
    
    </div>
     <?php $d = ''; ?>
   @foreach ($detail->hinhanh3d as $key => $value) 
        <?php   
                 $src = $value->src;
                $d = $d.'"https://hoangphu.com/myproject2/public/frontend/images/product-360/'.$src.'",';
                
        ?>
    @endforeach




    <script type="text/javascript">


       product1 = $('.product1').ThreeSixty({
        totalFrames: 36, // Total no. of image you have for 360 slider
        endFrame: 36, // end frame for the auto spin animation
        currentFrame: 1, // This the start frame for auto spin
        imgList: '.threesixty_images', // selector for image list
        progress: '.spinner', // selector to show the loading progress
        imagePath:'', // path of the image assets
        filePrefix: '', // file prefix if any
         imgArray: [<?php print $d ?>],
        ext: '', // extention for the assets
        height: 600,
        width: 800,
        navigation: true,
        disableSpin: true,

        responsive: true, // Default false
   
    });
    


    





</script>








                        @endforeach
                    </div>
        </section>
        <!--/ End Shop Single -->
        
        <!-- Start Most Popular -->
    <div class="product-area most-popular related-product section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2>Những sản phẩm tương tự</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="owl-carousel popular-slider">
                        <!-- Start Single Product -->
                        @foreach($related_products as $sp_relate)
                        <div class="single-product">
                            <div class="product-img">
                                <a href="{{('../detail_product/'.$sp_relate->idSanPham)}}">
                                    <img class="default-img" src="{{asset('public/frontend/images/product')}}/{{$sp_relate->HinhAnh}}" alt="#">
                                    <img class="hover-img" src="{{asset('public/frontend/images/product')}}/{{$sp_relate->HinhAnh}}" alt="#">
                                    <span class="out-of-stock">Hot</span>
                                </a>
                                <div class="button-head">
                                    <div class="product-action">
                                        <a data-toggle="modal" data-target="#{{$sp_relate->idSanPham}}" title="Quick View" href="#"><i class=" ti-eye"></i><span>Xem nhanh</span></a>
                                        <a title="Wishlist" onclick="AddWishlist({{$sp_relate->idSanPham}})" href="javascript:void(0)"><i class=" ti-heart "></i><span>Thêm yêu thích</span></a>
                                        
                                    </div>
                                    <div class="product-action-2">
                                                                @if($sp_relate->SoLuongHang>0)
                                                                <a title="Add to cart" onclick="AddCart({{$sp_relate->idSanPham}})" href="javascript:void(0)">Thêm giỏ hàng</a>
                                                                @else
                                                                <a title="error">Tạm hết hàng</a>
                                                                @endif
                                                            </div>
                                </div>
                            </div>
                            <div class="product-content">
                                <h3><a href="{{('detail_product/'.$sp_relate->idSanPham)}}">{{$sp_relate->TenSanPham}}</a></h3>
                                <div class="product-price">
                                    <span class="old">60.000d</span>
                                    <span style="color: red">{{number_format($sp_relate->Gia,0,",",".")}} VNĐ</span>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Product -->
        


                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Most Popular Area -->
        @foreach($related_products as $sp)
    <div class="modal fade" id="{{$sp->idSanPham}}" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span class="ti-close" aria-hidden="true"></span></button>
                    </div>
                    <div class="modal-body">
                        <div class="row no-gutters">
                            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                <!-- Product Slider -->
                                    <div class="product-gallery">
                                        <div class="quickview-slider-active">
                                            @foreach($sp->hinhanh as $img)
                                            <div class="single-slider">
                                                <img src="{{asset('public/frontend/images/product-details')}}/{{$img->src}}" alt="#">
                                            </div>
                                            @endforeach
                                            
                                        </div>
                                    </div>
                                <!-- End Product slider -->
                            </div>
                            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                <div class="quickview-content">
                                    <form id='myform_quickview' method='POST' action='{{route('AddsCart')}}'>
                                        {{ csrf_field() }}
                                    <h2>{{$sp->TenSanPham}}</h2>
                                    <div class="quickview-ratting-review">
                                        {{-- <div class="quickview-ratting-wrap">
                                            
                                            <div class="quickview-ratting">
                                                <i class="yellow fa fa-star"></i>
                                                <i class="yellow fa fa-star"></i>
                                                <i class="yellow fa fa-star"></i>
                                                <i class="yellow fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                            <a href="#"> (1 đánh giá)</a>
                                        </div> --}}
                                        <div class="quickview-stock">
                                            <span><i class="fa fa-check-circle-o"></i> trong kho</span>
                                        </div>
                                    </div>
                                    <h3>{{number_format($sp->Gia,0,",",".")}} VNĐ</h3>
                                    <div class="quickview-peragraph">
                                        <p>{{$sp->MoTaNgan}}</p>
                                    </div>
                                    {{-- <div class="size">
                                        <div class="row">
                                            <div class="col-lg-6 col-12">
                                                <h5 class="title">Size</h5>
                                                <select>
                                                    <option selected="selected">s</option>
                                                    <option>m</option>
                                                    <option>l</option>
                                                    <option>xl</option>
                                                </select>
                                            </div>
                                            <div class="col-lg-6 col-12">
                                                <h5 class="title">Color</h5>
                                                <select>
                                                    <option selected="selected">orange</option>
                                                    <option>purple</option>
                                                    <option>black</option>
                                                    <option>pink</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div> --}}
                                    {{-- <div class="quantity">
                                        <!-- Input Order -->
                                        <div class="input-group">
                                            <div class="button minus">
                                                <button type="button" class="btn btn-primary btn-number" disabled="disabled" data-type="minus" data-field="SoLuong">
                                                    <i class="ti-minus"></i>
                                                </button>
                                            </div>
                                            <input type="text" name="SoLuong" class="input-number"  data-min="1" data-max="{{$sp->SoLuongHang}}" value="1">
                                            <div class="button plus">
                                                <button type="button" class="btn btn-primary btn-number" data-type="plus" data-field="SoLuong">
                                                    <i class="ti-plus"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <!--/ End Input Order -->
                                    </div> --}}
                                    <div class="add-to-cart">
                                                    @if($sp->SoLuongHang>0 )
                                                    <a onclick="AddCart({{$sp->idSanPham}})" href="javascript:void(0)" class="btn">Thêm vào giỏ hàng</a>
                                                    @else
                                                    <a href="javascript:void()" class="btn">Tạm hết hàng</a>
                                                    @endif
                                                    <a title="Wishlist" onclick="AddWishlist({{$sp->idSanPham}})" href="javascript:void(0)" class="btn min"><i class="ti-heart"></i></a>
                                                    
                                                </div>
                                    <div> <br>

                                        <p class="cat">Danh mục :<a href="">{{$sp->danhmucsanpham->TenDanhMuc}}</a></p>
                                        <p class="availability">Số lượng hàng  : {{$sp->SoLuongHang}} sản phẩm trong kho</p>
                                    </div>

                                    
                                    <div class="default-social">
                                        <h4 class="share-now">Chia sẽ:</h4>
                                        <ul>
                                            <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
                                            <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
                                            <li><a class="youtube" href="#"><i class="fa fa-pinterest-p"></i></a></li>
                                            <li><a class="dribbble" href="#"><i class="fa fa-google-plus"></i></a></li>
                                        </ul>
                                    </div>
                                    <input type="hidden" name="idSanPham" value="{{$detail->idSanPham}}">
                                </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>




    @endforeach
 

@endsection