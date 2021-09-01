@extends('welcome')
@section('contact')

    <!-- Breadcrumbs -->
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="bread-inner">
                        <ul class="bread-list">
                            <li><a href="index1.html">Trang chủ<i class="ti-arrow-right"></i></a></li>
                            <li class="active"><a href="blog-single.html">Liên hệ</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumbs -->
  
    <!-- Start Contact -->
    <section id="contact-us" class="contact-us section">
        <div class="container">
                <div class="contact-head">
                    <div class="row">
                        <div class="col-lg-8 col-12">
                            <div class="form-main">
                                <div class="title">
                                    <h4>Liên lạc</h4>
                                    <h3>Lời nhắn gửi đến chúng tôi</h3>
                                </div>
                                <form class="form" method="post" action="{{route('send_mail')}}">
                                    @csrf
                                    <div class="row">
                                        <div class="col-lg-6 col-12">
                                            <div class="form-group">
                                                <label>Tên của bạn<span>*</span></label>
                                                <input name="name" type="text" placeholder="" required="required">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-12">
                                            <div class="form-group">
                                                <label>Nghề nghiệp<span>*</span></label>
                                                <input name="subject" type="text" placeholder="" required="required">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-12">
                                            <div class="form-group">
                                                <label>Địa chỉ email<span>*</span></label>
                                                <input name="email" type="email" placeholder="" required="required">
                                            </div>  
                                        </div>
                                        <div class="col-lg-6 col-12">
                                            <div class="form-group">
                                                <label>Số điện thoại<span>*</span></label>
                                                <input name="phone_number" type="text" placeholder="" required="required">
                                            </div>  
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group message">
                                                <label>Lời nhắn <span>*</span></label>
                                                <textarea name="messages" placeholder="" required="required"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group button">
                                                <button type="submit" class="btn ">Gửi</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-lg-4 col-12">
                            <div class="single-head">
                                <div class="single-info">
                                    <i class="fa fa-phone"></i>
                                    <h4 class="title">Gọi ngay:</h4>
                                    <ul>
                                        <li>+84 332 993 1740 </li>
                                        <li>+84 332 993 1741 </li>
                                    </ul>
                                </div>
                                <div class="single-info">
                                    <i class="fa fa-envelope-open"></i>
                                    <h4 class="title">Email:</h4>
                                    <ul>
                                        <li><a href="mailto:info@hoangphu.com">info@hoangphu.com</a></li>
                                        <li><a href="mailto:info@hoangphu.com">support@hoangphu.com</a></li>
                                    </ul>
                                </div>
                                <div class="single-info">
                                    <i class="fa fa-location-arrow"></i>
                                    <h4 class="title">Địa chỉ :</h4>
                                    <ul>
                                        <li>Số 177y, hẻm Lò Mổ, đường Nguyễn Văn Cừ, An Khánh, Ninh Kiều, Cần Thơ.</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
    <!--/ End Contact -->
    
    <!-- Map Section -->
    <div class="map-section">
        <div id="myMap"></div>
    </div>
    <!--/ End Map Section -->
    
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
    
@endsection('contact')