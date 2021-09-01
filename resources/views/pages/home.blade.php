@extends('welcome')
@section('content')
 <section class="hero-area4">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="home-slider-4">
                        <div class="big-content" style="background-image: url('public/frontend/images/banner/imac-banner-1.jpg');">
                            <div class="inner">
                                <h4 class="title">iMac 2021 <br> là sản phẩm quan trọng nhất<br> của Apple <br> </h4>
                                <p class="des">iMac 2021 đại diện cho tinh thần đổi mới của Apple<br> với những nâng cấp mạnh vẽ về chip M1,<br> thiết kế thời trang, đa màu sắc. Now let come hare and grab it now !</p>
                                <div class="button">
                                    <a href="#" class="btn">Mua ngay</a>
                                </div>
                            </div>
                        </div>
                        <div class="big-content" style="background-image: url('public/frontend/images/banner/MasterCateT2.png');">
                            <div class="inner">
                               {{--  <h4 class="title">make your <br> site stunning with <br> large title</h4>
                                <p class="des">Hipster style is a fashion trending for Gentleman and Lady<br>with tattoos. You’ll become so cool and attractive with your’s girl.<br> Now let come hare and grab it now !</p> --}}
                                <div class="button">
                                    <a href="#" class="btn">Mua ngay</a>
                                </div>
                            </div>
                        </div>
                        <div class="big-content" style="background-image: url('public/frontend/images/banner/bannerip.jpg');">
                            <div class="inner">
                                {{-- <h4 class="title">make your <br> site stunning with <br> large title</h4>
                                <p class="des">Hipster style is a fashion trending for Gentleman and Lady<br>with tattoos. You’ll become so cool and attractive with your’s girl.<br> Now let come hare and grab it now !</p> --}}
                                <div class="button">
                                    <a href="#" class="btn">Mua ngay</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/ End Hero Area 2 -->
    
    <!-- Start Small Banner  -->
    <section class="small-banner section">
        <div class="container">
            <div class="row">
                <!-- Single Banner  -->
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="single-banner">
                        <img src="public/frontend/images/banner/banner-watch_2.jpg" alt="#">
                        <div class="content" >
                            <p>Bộ sưu tập smartwatch</p>
                            <h3>Hiện đại <br> thời trang</h3>
                            <a href="{{route('products_category_grid',[4])}}">Xem ngay</a>
                        </div>
                    </div>
                </div>
                <!-- /End Single Banner  -->
                <!-- Single Banner  -->
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="single-banner">
                        <img src="public/frontend/images/banner/banner-iphone11_2_.png" alt="#">
                        <div class="content">
                            <p>Bộ sưu tập smartphone</p>
                            <h3>Thời trang <br> 2020</h3>
                            <a href="{{route('products_category_grid',[1])}}">Xem ngay</a>
                        </div>
                    </div>
                </div>
                <!-- /End Single Banner  -->
                <!-- Single Banner  -->
                <div class="col-lg-4 col-12">
                    <div class="single-banner tab-height">
                        <img src="public/frontend/images/banner/banner-mac1-laptops.jpg" alt="#">
                        <div class="content">
                            <p>Siêu sale</p>
                            <h3>Giảm giá  <br> lên đến <span>40%</span></h3>
                            <a href="{{route('products_category_grid',[2])}}">Khám phá ngay</a>
                        </div>
                    </div>
                </div>
                <!-- /End Single Banner  -->
            </div>
        </div>
    </section>
    <!-- End Small Banner -->
    
    <!-- Start Product Area -->
    <div class="product-area section">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="section-title">
                            <h2>Sản phẩm nổi bật</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="product-info">
                            <div class="nav-main">
                                <!-- Tab Nav -->
                                <ul class="nav nav-tabs" id="myTab" role="tablist">

                                    <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#1" role="tab">Điện thoại</a></li>
                                    @foreach($category_limit as $cate)
                                    @if($cate->idDanhMuc!=1)
                                    <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#{{$cate->idDanhMuc}}" role="tab">{{$cate->TenDanhMuc}}</a></li>
                                    @endif
                                    @endforeach
                                    
                                </ul>
                                <!--/ End Tab Nav -->
                            </div>
                            <div class="tab-content" id="myTabContent">
                                <!-- Start Single Tab -->
                                <div class="tab-pane fade show active" id="" role="tabpanel">
                                    <div class="tab-single">
                                        <div class="row">
                                            
                                                    @foreach($phone_limit as $sp)
                                            <div class=" col-lg-3 col-md-4 col-sm-4 col-6">
                                                <div class="single-product">
                                                    
                                                    <div class="product-img ">

                                                        <a href="{{('detail_product/'.$sp->idSanPham)}}">
                                                            <img class="default-img" src="public/frontend/images/product/{{$sp->HinhAnh}}" alt="#">
                                                            <img class="hover-img" src="public/frontend/images/product/{{$sp->HinhAnh}}" alt="#">
                                                        </a>
                                                        <div class="button-head">
                                                            <div class="product-action">
                                                                <a data-toggle="modal" data-target="#home{{$sp->idSanPham}}" title="Quick View" href="#"><i class=" ti-eye"></i><span>Xem nhanh</span></a>
                                                                <a title="Wishlist" onclick="AddWishlist({{$sp->idSanPham}})" href="javascript:void(0)"><i class=" ti-heart "></i><span>Thêm yêu thích</span></a>
                                                                
                                                            </div>
                                                            <div class="product-action-2">
                                                                @if($sp->SoLuongHang>0)
                                                                <a title="Add to cart" onclick="AddCart({{$sp->idSanPham}})" href="javascript:void(0)">Thêm giỏ hàng</a>
                                                                @else
                                                                <a title="error">Tạm hết hàng</a>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="product-content">
                                                        <h3><a href="{{('detail_product/'.$sp->idSanPham)}}">{{$sp->TenSanPham}}</a></h3>
                                                        <div class="product-price">
                                                            <span>{{number_format($sp->Gia,0,",",".")}} VNĐ</span>
                                                        </div>
                                                    </div>
                                                   
                                                </div>
                                            </div>
                                            @endforeach
                                             
                                        </div>
                                    </div>
                                </div>
                                <!--/ End Single Tab -->
                                @foreach($category_limit as $cate)
                                <!-- Start Single Tab -->
                                <div class="tab-pane fade" id="{{$cate->idDanhMuc}}" role="tabpanel">
                                    <div class="tab-single">
                                        <div class="row">
                                            <?php $count = 0;?>
                                            @foreach($products as $sp)
                                                @if($sp->idDanhMuc == $cate->idDanhMuc)
                                                <?php $count ++; ?>
                                            <div class=" col-lg-3 col-md-4 col-sm-4  col-6">
                                                <div class="single-product">
                                                    
                                                    <div class="product-img">
                                                        <a href="{{('detail_product/'.$sp->idSanPham)}}">
                                                            <img class="default-img" src="public/frontend/images/product/{{$sp->HinhAnh}}" alt="#">
                                                            <img class="hover-img" src="public/frontend/images/product/{{$sp->HinhAnh}}" alt="#">
                                                        </a>
                                                        <div class="button-head">
                                                            <div class="product-action">
                                                                <a data-toggle="modal" data-target="#home{{$sp->idSanPham}}" title="Quick View" href="#"><i class=" ti-eye"></i><span>Xem nhanh</span></a>
                                                                <a title="Wishlist" onclick="AddWishlist({{$sp->idSanPham}})" href="javascript:void(0)"><i class=" ti-heart "></i><span>Thêm yêu thích</span></a>
                                                                
                                                            </div>
                                                            <div class="product-action-2">
                                                                <a title="Add to cart" onclick="AddCart({{$sp->idSanPham}})" href="javascript:void(0)">Thêm giỏ hàng</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="product-content">
                                                        <h3><a href="{{('detail_product/'.$sp->idSanPham)}}">{{$sp->TenSanPham}}</a></h3>
                                                        <div class="product-price">
                                                            <span>{{number_format($sp->Gia,0,",",".")}} VNĐ</span>
                                                        </div>
                                                    </div>
                                                   
                                                </div>
                                            </div>
                                            @endif
                                            
                                            @if($count >= 12 ) @break
                                            @endif
                                                @endforeach
                                            
                                  
                                        </div>
                                    </div>
                                        
                                </div>
                                <!--/ End Single Tab -->
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    <!-- End Product Area -->
    
    <!-- Start Midium Banner  -->
    <section class="midium-banner">
        <div class="container">
            <div class="row">
                <!-- Single Banner  -->
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="single-banner">
                        <img src="public/frontend/images/banner/Category-Banners.jpg" alt="#">
                        <div class="content">
                            <p>Bộ sưu tập </p>
                            <h3>Giảm giá<br>lên đến<span> 50%</span></h3>
                            <a href="#">Mua ngay</a>
                        </div>
                    </div>
                </div>
                <!-- /End Single Banner  -->
                <!-- Single Banner  -->
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="single-banner">
                        <img src="public/frontend/images/banner/Category-Banners.jpg" alt="#">
                        <div class="content">
                            <p>Bộ sưu tập</p>
                            <h3>Giảm giá <br> lên đến <span>70%</span></h3>
                            <a href="#" class="btn">Shop Now</a>
                        </div>
                    </div>
                </div>
                <!-- /End Single Banner  -->
            </div>
        </div>
    </section>
    <!-- End Midium Banner -->
    
    <!-- Start Most Popular -->
    <div class="product-area most-popular section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2>Các mặt hàng đang hot</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="owl-carousel popular-slider">
                        <!-- Start Single Product -->
                    
                        @foreach($products_hot as $sp)
                        <div class="single-product">
                            <div class="product-img">
                                <a href="{{('detail_product/'.$sp->idSanPham)}}">
                                    <img class="default-img" src="public/frontend/images/product/{{$sp->HinhAnh}}" alt="#">
                                    <img class="hover-img" src="public/frontend/images/product/{{$sp->HinhAnh}}"  alt="#">
                                    <span class="out-of-stock">Hot</span>
                                </a>
                                <div class="button-head">
                                    <div class="product-action">
                                        <a data-toggle="modal" data-target="#{{$sp->idSanPham}}" title="Quick View" href="#"><i class=" ti-eye"></i><span>Xem nhanh</span></a>
                                        <a title="Wishlist" onclick="AddWishlist({{$sp->idSanPham}})" href="javascript:void(0)"><i class=" ti-heart "></i><span>Thêm yêu thích</span></a>
                                        
                                    </div>
                                    <div class="product-action-2">
                                        <a title="Add to cart" onclick="AddCart({{$sp->idSanPham}})" href="javascript:void(0)">Thêm giỏ hàng</a>
                                    </div>
                                </div>
                            </div>
                            <div class="product-content">
                                <h3><a href="{{('detail_product/'.$sp->idSanPham)}}">{{$sp->TenSanPham}}</a></h3>
                                <div class="product-price">
                                    {{-- <span class="old">$60.00</span> --}}
                                    <span style="color: red">{{number_format($sp->Gia,0,",",".")}} VNĐ</span>
                                </div>
                            </div>
                        </div>
                    
                        @endforeach
                           <!-- End Single Product --> 
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Most Popular Area -->
    
    <!-- Start Shop Home List  -->
    <section class="shop-home-list section">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-6 d-none d-xl-block d-xxl-none">
                    <div class="row">
                        <div class="col-12">
                            <div class="shop-section-title">
                                <h1>Giảm giá</h1>
                            </div>
                        </div>
                    </div>
                    <!-- Start Single List  -->
                    @foreach($products_limit_sold as $sp)
                    <div class="single-list">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-12 ">
                                <div class="list-image overlay">
                                    <img src="public/frontend/images/product/{{$sp->HinhAnh}}" alt="#">
                                    <a onclick="AddCart({{$sp->idSanPham}})" href="javascript:void(0)" class="buy"><i class="fa fa-shopping-bag"></i></a>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-12 no-padding">
                                <div class="content">
                                    <h4 class="title"><a href="{{('detail_product/'.$sp->idSanPham)}}">{{$sp->TenSanPham}}</a></h4>
                                    <p class="price with-discount">{{number_format($sp->Gia,0,",",".")}}Đ</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Single List  -->
                    @endforeach
                </div>
                <div class="col-lg-4 col-md-6 col-6">
                    <div class="row">
                        <div class="col-12">
                            <div class="shop-section-title">
                                <h1>Bán nhiều</h1>
                            </div>
                        </div>
                    </div>
                    <!-- Start Single List  -->
                    @foreach($products_limit2 as $sp)
                    <div class="single-list">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="list-image overlay">
                                    <img src="public/frontend/images/product/{{$sp->HinhAnh}}" alt="#">
                                    <a onclick="AddCart({{$sp->idSanPham}})" href="javascript:void(0)" class="buy"><i class="fa fa-shopping-bag"></i></a>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-12 no-padding">
                                <div class="content">
                                    <h5 class="title"><a href="{{('detail_product/'.$sp->idSanPham)}}">{{$sp->TenSanPham}}</a></h5>
                                    <p class="price with-discount">{{number_format($sp->Gia,0,",",".")}}Đ</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Single List  -->
                    @endforeach
                </div>
                <div class="col-lg-4 col-md-6 col-6">
                    <div class="row">
                        <div class="col-12">
                            <div class="shop-section-title">
                                <h1>Xem nhiều</h1>
                            </div>
                        </div>
                    </div>
                    @foreach($products_limit_view as $sp)
                    <!-- Start Single List  -->
                    <div class="single-list">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="list-image overlay">
                                    <img src="public/frontend/images/product/{{$sp->HinhAnh}}" alt="#">
                                    <a onclick="AddCart({{$sp->idSanPham}})" href="javascript:void(0)" class="buy"><i class="fa fa-shopping-bag"></i></a>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-12 no-padding">
                                <div class="content">
                                    <h5 class="title"><a href="{{('detail_product/'.$sp->idSanPham)}}">{{$sp->TenSanPham}}</a></h5>
                                    <p class="price with-discount">{{number_format($sp->Gia,0,",",".")}}Đ</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Single List  -->
                    @endforeach
                    
                </div>
            </div>
        </div>
    </section>
    <!-- End Shop Home List  -->
    
    <!-- Start Cowndown Area -->
    <section class="cown-down">
        <div class="section-inner ">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6 col-12 padding-right">
                        <div class="image">
                            <img src="public/frontend/images/banner/m1-imac-2021.jpg" alt="#">
                        </div>  
                    </div>  
                    <div class="col-lg-6 col-12 padding-left">
                        <div class="content">
                            <div class="heading-block">
                                <p class="small-title">Giảm giá trong ngày</p>
                                <h3 class="title">iMac 24 2021 M1 7GPU 8GB 256GB</h3>
                                <p class="text">IMac hoàn toàn mới có thiết kế tuyệt đẹp với nhiều màu sắc rực rỡ, chip M1 đột phá và màn hình Retina 4,5K rực rỡ. </p>
                                <h1 class="price">{{number_format(44990000,0,",",".")}}đ  <s>{{number_format(52000000,0,",",".")}}đ </s></h1>
                                <div class="coming-time">
                                    <div class="clearfix" data-countdown="2021/09/10"></div>
                                </div>
                            </div>
                        </div>  
                    </div>  
                </div>
            </div>
        </div>
    </section>
    <!-- /End Cowndown Area -->
    
    <!-- Start Shop Blog  -->
    <section class="shop-blog section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2>Tin tức nổi bật</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($post as $p)
                <div class="col-lg-4 col-md-6 col-12">
                    <!-- Start Single Blog  -->
                    <div class="">
                        
                   
                        <div class="shop-single-blog">
                              <?php
                    $s3 = $p->NgayTaoBaiViet;
                    $dt3 = new DateTime($s3);
                    $day3 = $dt3->format('d');
                    $month3 = $dt3->format('m');
                    $year3 = $dt3->format('Y');
                         ?>
                           <a href="{{route('detail_post',[$p->idBaiViet])}}"><img src="{{'public/avatar-post'}}/{{$p->HinhAnh}}" alt="#" ></a>
                            <div class="content" >
                                <p class="date">Ngày {{$day3}} tháng {{$month3}} năm {{$year3}}</p>
                                <a href="{{route('detail_post',[$p->idBaiViet])}}" class="title">{{$p->TieuDeBaiViet}}</a>
                                <a style="position: absolute;bottom: 35px; left: 42%" href="{{route('detail_post',[$p->idBaiViet])}}" class="more-btn">Xem chi tiết</a>
                            </div>
                        </div>
                        <!-- End Single Blog  -->
                    </div>
                 </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- End Shop Blog  -->
    
    <!-- Start Shop Services Area -->
    <section class="shop-services section home">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-12">
                    <!-- Start Single Service -->
                    <div class="single-service">
                        <i class="ti-rocket"></i>
                        <h4>Vận chuyển nhanh chóng</h4>
                        <p>Phí vận chuyển 10.000đ</p>
                    </div>
                    <!-- End Single Service -->
                </div>
                <div class="col-lg-3 col-md-6 col-12">
                    <!-- Start Single Service -->
                    <div class="single-service">
                        <i class="ti-reload"></i>
                        <h4>Trả hàng miễn phí</h4>
                        <p>Trong vòng 30 ngày trở lại</p>
                    </div>
                    <!-- End Single Service -->
                </div>
                <div class="col-lg-3 col-md-6 col-12">
                    <!-- Start Single Service -->
                    <div class="single-service">
                        <i class="ti-lock"></i>
                        <h4>Bảo mật thanh toán</h4>
                        <p>100% an toàn thanh toán</p>
                    </div>
                    <!-- End Single Service -->
                </div>
                <div class="col-lg-3 col-md-6 col-12">
                    <!-- Start Single Service -->
                    <div class="single-service">
                        <i class="ti-tag"></i>
                        <h4>Giá tốt</h4>
                        <p>Đảm bảo giá cạnh tranh</p>
                    </div>
                    <!-- End Single Service -->
                </div>
            </div>
        </div>
    </section>
    <!-- End Shop Services Area -->
    
    <!-- Start Shop Newsletter  -->
    <section class="shop-newsletter section">
        <div class="container">
            <div class="inner-top">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2 col-12">
                        <!-- Start Newsletter Inner -->
                        <div class="inner">
                            <h4>Bản tin </h4>
                            <p>Đăng ký nhận thông tin sản phẩm mới để nhận <span>10%</span> giảm giá cho đơn hàng kế tiếp</p>
                            <form action="{{route('send_mail_sub')}}" method="get" class="newsletter-inner">
                                <input name="email" placeholder="Nhập email của bạn" required="" type="email">
                                <button class="btn">Đăng ký</button>
                            </form>
                        </div>
                        <!-- End Newsletter Inner -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Shop Newsletter -->
    
    <!-- Modal -->
    @foreach($products as $sp)
    <div class="modal fade" id="home{{$sp->idSanPham}}" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button  type="button" class="close" data-dismiss="modal" aria-label="Close"><span class="ti-close" aria-hidden="true"></span></button>
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
                                    {{-- <div class="add-to-cart">
                                        <a  class="btn">Thêm vào giỏ hàng</a>
                                        <a onclick="AddWishlist({{$sp->idSanPham}})" href="javascript:void(0)" class="btn min"><i class="ti-heart"></i></a>
                                        
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
                                        <h4 class="share-now">Chia sẻ:</h4>
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
    @endforeach
    <!-- Modal end -->

    
@endsection('content')