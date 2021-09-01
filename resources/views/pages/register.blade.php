@extends('welcome')
@section('register')
		<!-- Breadcrumbs -->
		<div class="breadcrumbs">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<div class="bread-inner">
							<ul class="bread-list">
								<li><a href="index1.html">Trang chủ<i class="ti-arrow-right"></i></a></li>
								<li class="active"><a href="blog-single.html">Đăng ký</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- End Breadcrumbs -->
				
		<!-- Shop Login -->
		<section style="    padding: 0 0 40px;" class="shop login section">
			<div class="container">
				<div class="row"> 
					<div class="col-lg-8 offset-lg-2 col-12">
						<div class="login-form">
							<h2>Đăng ký</h2>
							<p>Vui lòng đăng ký để thanh toán nhanh hơn</p>
							<!-- Form -->
							<form action="{{URL::to('/dangky')}}" class="form form-register" method="post">
                                    {{ csrf_field() }}
                                    
								<div class="row">
									<div class="col-12">
										<div class="form-group">
											<label>Nhập tên của bạn:<span>*</span></label>
											<input type="text" name="name" placeholder="Nhập tên của bạn..." required="required">
											<span class="error1" style="display: none;">
                                                          <i class="error-log fa fa-exclamation-triangle"></i>
                                                      </span>
										</div>
									</div>
									<div class="col-12">
										<div class="form-group">
											<label>Nhập email của bạn: <span>*</span></label>
											<input type="email" name="email" placeholder="Nhập email của bạn..." required="required">
											<span class="error1" style="display: none;">
                                                          <i class="error-log fa fa-exclamation-triangle"></i>
                                                      </span>
										</div>
									</div>
									<div class="col-12">
										<div class="form-group">
											<label>Mật khẩu:<span>*</span></label>
											<input type="password" name="password" id="password" placeholder="Nhập mật khẩu..." required="required">
											<span class="error1" style="display: none;">
                                                          <i class="error-log fa fa-exclamation-triangle"></i>
                                                      </span>
										</div>
									</div>
									<div class="col-12">
										<div class="form-group">
											<label>Nhập lại mật khẩu:<span>*</span></label>
											<input type="password" name="password2" placeholder="Nhập lại mật khẩu..." required="required">
											<span class="error1" style="display: none;">
                                                          <i class="error-log fa fa-exclamation-triangle"></i>
                                                      </span>
										</div>
									</div>
									<div class="list-login col-12">
										<div class="form-group login-btn">
											<button class="btn button-register" type="submit">Đăng ký</button>
											<a href="{{route('login')}}" class="btn">Đặng nhập</a>
										</div>
										{{-- <div class="checkbox">
											<label class="checkbox-inline" for="2"><input name="remember_register" type="checkbox" value="remember">Đăng ký để nhận bản Tin</label>
										</div> --}}
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
@endsection