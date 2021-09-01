
@extends('welcome')
@section('login')

        <!--/ End Header -->
    
        <!-- Breadcrumbs -->
        <div class="breadcrumbs">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="bread-inner">
                            <ul class="bread-list">
                                <li><a href="">Trang chủ<i class="ti-arrow-right"></i></a></li>
                                <li class="active"><a href="blog-single.html">Đăng nhập</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Breadcrumbs -->
                
        <!-- Shop Login -->
        <section style="    padding: 0 0 40px;"  class="shop login section">
            <div class="container">
                <div class="row"> 
                    <div class="col-lg-8 offset-lg-2 col-12">
                        <div class="login-form">
                            <h2>Đăng nhập</h2>
                            <p>Vui lòng đăng nhập để quá trình thanh toán nhanh hơn</p>
                            <!-- Form -->
                            <form action="{{URL::to('/dangnhap')}}" class="form form-login" method="post">
                                    {{ csrf_field() }}
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label>Nhập email của bạn: <span>*</span></label>
                                            <input type="email" name="email" placeholder="Vui lòng nhập email..." required="required">
                                            <span class="error1" style="display: none;">
                                                          <i class="error-log fa fa-exclamation-triangle"></i>
                                                      </span>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label>Nhập mật khẩu: <span>*</span></label>
                                            <input type="password" name="password" placeholder="Vui lòng nhập mật khẩu..." required="required">
                                            <span class="error1" style="display: none;">
                                                          <i class="error-log fa fa-exclamation-triangle"></i>
                                                      </span>
                                        </div>
                                    </div>
                                    <div class="list-login col-12 ">
                                        <div class="form-group login-btn">
                                            <button class="btn buton-submit-login" type="submit">Đăng nhập</button>
                                            <a href="{{route('register')}}" class="btn">Đăng ký</a>
                                        </div>
                                        <br>
                                        <div class="checkbox">
                                            <label ><input name="remember" type="checkbox" value="remember1">Lưu đăng nhập</label>
                                        </div>
                                        <a data-toggle="modal" data-target="#forget_pass" class="lost-pass a-pointer">Quên mật khẩu?</a>
                                        <div class="connect">
                                        <a href="redirect/facebook" class="login-fplus btn btn-info" style="background: #4267b2;border: #4267b2;padding-top: 13px;">
                                                <span style="float: left;height: 30px;width: 40px;margin-left: -15px;border-right: 1px solid rgba(0, 0, 0, 0.2);">
                                                         <i class="fab fa-facebook-f" style="font-size: 25px"></i>
                                                </span>Đăng nhập bằng Facebook</a>
                                        <a href="{{route('login_gg.redirect',['google'])}}" class="login-gplus btn btn-danger" style="background: #e02f2f;border: #e02f2f;padding-top: 13px; margin-top: 10px;">
                                            <span style="float: left;height: 30px;border-right: 1px solid rgba(0, 0, 0, 0.2);width: 40px;margin-left: -15px;">
                                                <i class="fab fa-google-plus-g" style="font-size: 25px"></i>
                                            </span>Đăng nhập bằng Google</a>
                                       </div>
                                    </div>
                                </div>
                            </form>
                            <!--/ End Form -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--/ End Login -->


 <div class="modal fade" id='forget_pass' role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <div class="modal-header">

                            <button type="button" class="close" id="closemodal" data-dismiss="modal" aria-label="Close"><span class="ti-close" aria-hidden="true"></span></button>
                        </div>
                        <div style="min-height: auto;
    height: auto;" class="modal-body ">
                            <section class="shop login section">
            <div class="container">
                <div class="row"> 
                    <div class="col-12">
                        <div class="login-form">
                            <h2>Quên mật khẩu</h2>
                            <p>Vui lòng nhập địa chỉ email của bạn</p>
                            <!-- Form -->

                            <form action="{{route('recover_pass')}}" class="form form-forgetpass" method="post">
                                    {{ csrf_field() }}
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label>Nhập email của bạn: <span>*</span></label>
                                            <input type="email" name="email" placeholder="" required="required">
                                            <span class="error1" style="display: none;">
                                                          <i class="error-log fa fa-exclamation-triangle"></i>
                                                      </span>
                                        </div>
                                    </div>
                                    <div class="list-login col-12 ">
                                        <div class="form-group login-btn">
                                            <button class="btn button-forgetpass" type="submit">Gửi</button> 
                                        </div>
                                       
                                       
                                    </div>
                                    <div class="col-md-12 text-center"><i style="font-size: small;">(Hệ thống sẽ gửi đường link khôi phục mật khẩu đến email của bạn)</i></div>
                                </div>
                            </form>
                            <!--/ End Form -->
                        </div>
                    </div>
                </div>
            
        </section>

                            
</div>
</div>
</div>
</div>   
        
@endsection('login_register')