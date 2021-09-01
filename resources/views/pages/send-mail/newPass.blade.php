
@extends('welcome')
@section('newPass')

        <!--/ End Header -->
    
        <!-- Breadcrumbs -->
        <div class="breadcrumbs">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="bread-inner">
                            <ul class="bread-list">
                                <li><a href="index1.html">Trang chủ<i class="ti-arrow-right"></i></a></li>
                                <li class="active"><a href="blog-single.html">Đặt lại mật khẩu</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Breadcrumbs -->
                
        <!-- Shop Login -->
        <section class="shop login section">
            <div class="container">
                <div class="row"> 
                    <div class="col-lg-8 offset-lg-2 col-12">
                        <div class="login-form">
                            <h2>Mật khẩu mới</h2>
                            <p>Vui lòng nhập mật khẩu mới cho tài khoản</p>
                            <!-- Form -->

                                @php
                                    $email = $_GET['email'];
                                    $token = $_GET['token_'];
                                @endphp
                            <form action="{{route('process_pass')}}" class="form form-newpass" method="post">
                                    {{ csrf_field() }}
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label>Nhập mật khẩu mới: <span>*</span></label>
                                            <input type="password" id="password" name="password" placeholder="" required="required">
                                            <span class="error1" style="display: none;">
                                                          <i class="error-log fa fa-exclamation-triangle"></i>
                                                      </span>
                                        </div>
                                        <div class="form-group">
                                            <label>Nhập lại mật khẩu mới: <span>*</span></label>
                                            <input type="password" id="password2" name="password2" placeholder="" required="required">
                                            <span class="error1" style="display: none;">
                                                          <i class="error-log fa fa-exclamation-triangle"></i>
                                                      </span>
                                        </div>
                                    </div>
                                    <div class="list-login col-12 ">
                                        <div class="form-group login-btn">
                                            <button class="btn button-newpass" type="submit">Xác nhận</button>
                                        </div> 
                                    </div>
                                </div>
                                <input type="hidden" name="email" value="{{$email}}"/>
                                <input type="hidden" name="token" value="{{$token}}"/>
                            </form>
                            <!--/ End Form -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--/ End Login -->
        
        
@endsection