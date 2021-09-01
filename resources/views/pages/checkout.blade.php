@extends('welcome')
@section('checkout')

        <!-- Breadcrumbs -->
        <div class="breadcrumbs">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="bread-inner">
                            <ul class="bread-list">
                                <li><a href="index1.html">Trang chủ<i class="ti-arrow-right"></i></a></li>
                                <li class="active"><a href="blog-single.html">thanh toán</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Breadcrumbs -->
                
        <!-- Start Checkout -->
        <section class="shop checkout section">
            <div class="container">
                <form action="{{route('payment')}}" id="formpayment" class="form form_checkout" name="frmpayment" method="post">
                        {{ csrf_field() }}
                <div class="row">
                    <div class="col-lg-8 col-12">
                        <div class="checkout-form">
                            <h2>Thanh toán của bạn ở đây</h2>
                            <p>Vui lòng đăng nhập để thanh toán nhanh hơn</p>
                            <!-- Form -->

                                @foreach($info as $tt)
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <div class="form-group">
                                            <label>Họ và Tên: <span>*</span></label>
                                            <input type="text" value="{{$tt->khachhang->HoTen}}" name="name" placeholder="Vui lòng nhập họ và tên..." required="required">
                                            <span style="display: none;" class="error1" >
                                                            <i class=" fa fa-exclamation-triangle"></i>
                                                        </span>
                                        </div>
                                    </div>
                                    
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <div class="form-group">
                                            <label>Email: <span>*</span></label>
                                            <input type="email"  value="{{$tt->email}}" name="email" placeholder="" required="required" disabled="disabled">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <div class="form-group">
                                            <label>Số điện thoại: <span>*</span></label>
                                            <input type="number"  value="{{$tt->khachhang->SoDienThoai}}" name="number" placeholder="Vui lòng nhập số điện thoại..." required="required">
                                            <span style="display: none;" class="error1" >
                                                            <i class=" fa fa-exclamation-triangle"></i>
                                                        </span>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <div class="form-group">
                                            <label>Ghi chú: </label>
                                             <textarea style="height: 45px;background: #F6F7FB;" class="form-control" placeholder="Nhập ghi chú thêm cho đơn hàng (nếu có)..." name="ghichu"></textarea>
                                            <span style="display: none;" class="error1" >
                                                            <i class=" fa fa-exclamation-triangle"></i>
                                                        </span>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-12">
                                        
                                       
                                        <div id="giahangcu" class="form-group">
                                            <label>Địa chỉ giao hàng: <span>*</span></label>
                                            <select class="select" name="diachigiaohang" id="diachigiaohang">
                                                 <option value="0">----Vui lòng chọn địa chỉ giao hàng----</option>
                                                @foreach($tt->khachhang->diachi as $key => $dc)
                                                <option >{{$dc->DiaChi}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                     
                                        <button type="button" class="btn-sm btn-primary" id="addADs_checkout">Thêm địa chỉ</button>  
                                        <div id="insert_checkout"  style="display:none" class="form-row form-control">
                                            <div style="background-color: #fcb258;
                                            font-size: 20px;
                                            font-weight: 700;
                                            padding: 5px;
                                            margin-bottom: 10px;" class="col-md-12 text-center">Địa chỉ giao hàng mới<a href="javascript:void()" onclick="remove_form_insert()"><i style="position: absolute;
                                            right: 10px;
                                            top: 5px;" class="ti ti-close"></i></a></div>
                                                    <div class="form-group col-md-4 ">
                                                        <label style="font-size: large;" class="label-bold">Thành phố: <span class="span-red">*</span></label>
                                                            <select name="thanhpho" id="thanhpho" class="form-control thanhpho choose"  >
                                                                <option value="0">----Chọn thành phố----</option>
                                                                @foreach($tp as $value)
                                                                <option value="{{$value->TP_id}}">{{$value->TP_Ten}}</option>
                                                                @endforeach
                                                            </select>
                                                    </div>
                                                    <div class="form-group col-md-4 ">
                                                        <label style="font-size: large;" class="label-bold">Quận, huyện: <span class="span-red">*</span></label>
                                                        
                                                            <select name="quanhuyen" id="quanhuyen" class="form-control quanhuyen choose" >
                                                                <option value="0">----Chọn quận huyện----</option>
                                                            </select>
                                                    </div>
                                                    <div class="form-group col-md-4 ">
                                                        <label style="font-size: large;" class="label-bold">Xã, phường, thị trấn: <span class="span-red">*</span></label>
                                                        
                                                            <select  name="xa" id="xa"  class=" form-control"  >
                                                                <option value="0">----Chọn Xã, phường, thị trấn----</option>
                                                            </select>
                                                    </div>
                                                    <div class="form-group col-md-12 ">
                                                        <label style="font-size: large;" class="label-bold">Địa chỉ cụ thể: <span class="span-red">*</span></label>
                                                        
                                                            <textarea placeholder="Nhập địa chỉ cụ thể..." id="diachi" class="form-control" name="diachi"></textarea>
  
                                                    </div>
                                                    <input type="hidden" id="check_insert_checkout" name="check_insert" value="0">

                                                </div>
                                                <p style="font-style: italic;font-size: 14px;">*Mọi thông tin sẻ được cập nhật cho tài khoản của bạn đang đăng nhập.</p>
                                        
                                    </div>
                                    
                                   
                                </div>
                                @endforeach
                                
                            <!--/ End Form -->
                        </div>
                    </div>
                    <div class="col-lg-4 col-12">
                        <div class="order-details">
                            <!-- Order Widget -->
                            <div class="single-widget">
                                <h2>Tổng tiền</h2>
                                <div class="content">
                                    <ul>
                                        <li>Tiền hàng<span>{{number_format(Session('Cart')->totalPrice,0,",",".")}}đ</span></li>
                                        <li> Phí vận chuyển<span>10.000đ</span></li>
                                        
                                        <li>
                                        @if(Session::get('coupon'))
                                                @foreach(Session::get('coupon') as $key => $cou)
                                                @if($cou['LoaiGiamGia']==2)
                                                 Mã giảm: <span>{{$cou['GiaTri']}}%</span>
                                                <p>
                                                     @php
                                                    $total_coupon = (Session('Cart')->totalPrice*$cou['GiaTri'])/100;
                                                   echo '<li>Tổng tiền được giảm:<span>'.number_format(min($total_coupon,Session('Cart')->totalPrice),0,",",".")  .'đ</span></li>';
                                                   echo '<li style="color:red;    font-weight: 600;"  class="last">Tiền thanh toán: <span>'.number_format(max(Session('Cart')->totalPrice+10000-$total_coupon,0),0,",",".") .' VNĐ</span></li>';
                                                    @endphp
                                                     <input type="hidden" name="tongtien" value="{{Session('Cart')->totalPrice+10000-$total_coupon}}">
                                                     <input type="hidden" name="idgiamgia" value="{{$cou['idGiamGia']}}">
                                                </p>
                                                
                                                 @elseif($cou['LoaiGiamGia']==1)
                                             Mã giảm: <span>{{number_format($cou['GiaTri'],0,",",".")}}đ</span>
                                                <p>
                                                    @php
                                                    $total_coupon =  $cou['GiaTri'];
                                                   echo '<li>Tổng tiền được giảm:<span>'.number_format(min($total_coupon,Session('Cart')->totalPrice),0,",",".")  .'đ</span></li>';
                                                   echo '<li style="color:red;    font-weight: 600;"  class="last">Tiền thanh toán: <span>'.number_format(max(Session('Cart')->totalPrice+10000-$total_coupon,0),0,",",".") .' VNĐ</span></li>';
                                                    @endphp
                                                     <input type="hidden" name="tongtien" value="{{Session('Cart')->totalPrice+10000-$total_coupon}}">
                                                      <input type="hidden" name="idgiamgia" value="{{$cou['idGiamGia']}}">
                                                </p>
                                                
                                                @endif
                                                 @endforeach
                                        @else
                                        <li class="last" style="color:red;    font-weight: 600;">Tiền thanh toán: <span>{{number_format(Session('Cart')->totalPrice+10000,0,",",".") }}VNĐ</span></li>
                                         <input type="hidden" name="tongtien" value="{{Session('Cart')->totalPrice+10000}}">
                                        @endif


                                        </li>
                                        @php
                                        $vnd_to_usd = (Session('Cart')->totalPrice+10000)/23042;
                                        @endphp
                                        <input type="hidden" id="vnd_to_usd" value="{{round($vnd_to_usd,2)}}">
                                    </ul>
                                </div>
                            </div>
                            <!--/ End Order Widget -->
                            <!-- Order Widget -->
                            <hr>
                            <div class="single-widget">
                                <h2>Phương thức thanh toán</h2>
                                <div class="content">
                                    <div  class="radio">
                                        <label ><input checked="checked" id="payment" name="pptt" value="01"  type="radio"> Thanh toán khi giao hàng</label>
                                        <label ><input id="payment2" name="pptt" value="02" type="radio"> PayPal</label>

                                    </div>
                                    
                                </div>
                            </div>
                            <!--/ End Order Widget -->
                            <!-- Payment Method Widget -->
                            <div class="single-widget payement">
                                <div class="content">
                                    <img src="public/frontend/images/payment-method.png" alt="#">
                                </div>
                            </div>
                            <!--/ End Payment Method Widget -->
                            <!-- Button Widget -->
                            <div  class="single-widget get-button">
                                <div class="content">
                                    <div class="button">
                                        <button id="btn_process" type="submit" class="btn btn-info button-form_checkout">Xử lí đơn hàng</button>
                                        <div id="paypal-button" style="display: none;"></div>
                                        
                                    </div>
                                </div>
                            </div>
                            <!--/ End Button Widget -->
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </section>
        <!--/ End Checkout -->
        
   <!-- Start Shop Services Area -->
    <section class="shop-services section home">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-12">
                    <!-- Start Single Service -->
                    <div class="single-service">
                        <i class="ti-rocket"></i>
                        <h4>Miễn phí vận chuyển</h4>
                        <p>Đơn hàng trên 100.000d</p>
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
                            <form action="mail/mail.php" method="get" target="_blank" class="newsletter-inner">
                                <input name="EMAIL" placeholder="Nhập email của bạn" required="" type="email">
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
        
@endsection