
@extends('welcome')
@section('profile')

	<div class="container">
			<main class="content">
				<div class="container-fluid p-0">

					

					<div class="row">
						<div class="col-md-3 col-xl-2">

							<div class="card">
								<div class="card-header">
									<h5 class="card-title ">Chỉnh sửa</h5>
								</div>

								<div class="list-group list-group-flush" role="tablist">
									<a class="list-group-item list-group-item-action active" data-toggle="list" href="#account" role="tab">Tài khoản</a>
									<a class="list-group-item list-group-item-action" data-toggle="list" href="#password" role="tab">Mật khẩu </a>
									<a class="list-group-item list-group-item-action" data-toggle="list" href="#" role="tab">Email</a>
									<a class="list-group-item list-group-item-action" data-toggle="list" href="#" role="tab">Thông báo</a>
									<a class="list-group-item list-group-item-action" data-toggle="list" href="#" role="tab">Quyền riêng tư và an toàn </a>
									<a class="list-group-item list-group-item-action" data-toggle="list" href="#" role="tab">Xóa tài khoản </a>

								</div>
							</div>
						</div>

						<div class="col-md-9 col-xl-10">
							@foreach($user as $info )
							<div class="tab-content">
								<div class="tab-pane fade show active" id="account" role="tabpanel">
									<form class="edit_profile" action="{{route('edit_profile')}}" method="post" name="frmEditProfile" enctype="multipart/form-data">
										{{ csrf_field() }}
									<div class="card">
										<div style="background: aliceblue;" class="card-header">

											<center><h3 class="card-title ">Thông tin chung</h3></center>
										</div>
										<div style="background: aliceblue;" class="card-body">
											
												<div class="row">
													
													<div class="col-md-12">
														<div class="text-center">
															<div class="user-avatar">
														@if($info->avatar ==null)
															<img id="avatar" alt="avatar" src="public/avatar/avatar_default_man.jpg" class="rounded-circle img-responsive mt-2" width="128" height="128" />
														@else
														
															<img id="avatar" alt="avatar" src="public/avatar/{{$info->avatar}}" class="rounded-circle img-responsive mt-2" width="128" height="128">
															
														@endif

															</div>
															<input type="hidden" name="avatar_current" value="{{$info->avatar}}">
																<div class="btn_upload">
																	<div class="button_outer">
																		<span class="hiddenFileInput">
  																			<input type="file" name="avatar" id="img"  accept="image/*" />
  																			<span style="display: none;" class="error1-avatar" >
															<i class=" fa fa-exclamation-triangle"></i>
														</span>
																		</span>
			
																		<div class="processing_bar"></div>
																	</div>
																</div>
															<h5>Ảnh đại diện</h5>
															<small>Để có kết quả tốt nhất, hãy sử dụng hình ảnh có kích thước tối thiểu 128px x 128px ở định dạng .jpg</small>
														</div>
													</div>
												</div>

												
								

										</div>
									</div>

									<div style="background: aliceblue;" class="card">
										<div style="background: aliceblue;" class="card-header">

											<center><h3 class="card-title mb-0">Thông tin cá nhân</h3></center>
										</div>
										<div  class="card-body">
												<div class="form-row">
													<div class="form-group col-md-6">
													<label for="inputEmail4">Email</label>
													<input disabled="" type="email" name="email" class="form-control" id="inputEmail4" placeholder="Email" value="{{$info->email}}">
													<span style="display: none;" class="error1" >
															<i class=" fa fa-exclamation-triangle"></i>
														</span>
												</div>
												<div class="form-group col-md-6">
													<label for="inputAddress">Tổng số tiền bạn đã mua</label>
													<input  type="text" disabled="" class="form-control text-danger" id="inputAddress" placeholder="Tổng tiền đã mua" value="{{number_format($info->khachhang->TongTienDaMua,0,",",".")}} VNĐ">
													<span style="display: none;" class="error1" >
															<i class=" fa fa-exclamation-triangle"></i>
														</span>
												</div>
												</div>
												<div class="form-row">
													
													<div class="form-group col-md-6">
														<label for="inputFirstName">Họ và Tên</label>
														<input type="text" name="HoTen" class="form-control" id="inputFirstName" placeholder="Họ và Tên" value="{{$info->khachhang->HoTen}}">
														<span style="display: none;" class="error1" >
															<i class=" fa fa-exclamation-triangle"></i>
														</span>
													</div>
													<div class="form-group col-md-6">
														<label for="inputLastName">Số điện thoại</label>
														<input type="text" name="SoDienThoai" class="form-control" id="inputLastName" placeholder="Số điện thoại" value="{{$info->khachhang->SoDienThoai}}">
														<span style="display: none;" class="error1" >
															<i class=" fa fa-exclamation-triangle"></i>
														</span>
													</div>
												</div>
												
												<div class="form-row">
													@foreach($info->khachhang->diachi as $key => $dc)
													<div id="dc{!!++$key!!}"  class="form-group col-md-6">
														<label for="inputEmail4">Địa chỉ {{$key}}</label>
														<a href="javascript:void(0)" type="button" id="del" class="de-icon" title="Xóa">x</a>
														<input type="text" name="DiaChi[]" idDiaChi="{{$dc->idDiaChi}}" rid="{!!$key!!}" class="form-control" id="inputEmail4" placeholder="Địa chỉ" value="{{$dc->DiaChi}}">
														<input type="hidden" name="idDiaChi[]" value="{{$dc->idDiaChi}}">
														
													</div>

													@endforeach
													 
												</div>
												<div id="insert"  style="display:none" class="form-row form-control">
													<div style="background-color: #fcb258;font-size: 20px;
    												font-weight: 700;" class="col-md-12 text-center">Địa chỉ mới</div>
													<div class="form-group col-md-4 ">
														<label class="label-bold">Thành phố: <span class="span-red">*</span></label>
														
															<select name="thanhpho" id="thanhpho" class="form-control thanhpho choose" >
																<option value="0">----Chọn thành phố----</option>
																@foreach($tp as $value)
																<option value="{{$value->TP_id}}">{{$value->TP_Ten}}</option>
																@endforeach
															</select>
														
														<span style="display: none;" class="error1" >
															<i class=" fa fa-exclamation-triangle"></i>
														</span>
													</div>
													<div class="form-group col-md-4 ">
														<label class="label-bold">Quận, huyện: <span class="span-red">*</span></label>
														
															<select name="quanhuyen" id="quanhuyen" class="form-control quanhuyen choose">
																<option value="0">----Chọn quận huyện----</option>
																
																
															</select>
														
														<span style="display: none;" class="error1" >
															<i class=" fa fa-exclamation-triangle"></i>
														</span>
													</div>
													<div class="form-group col-md-4 ">
														<label class="label-bold">Xã, phường, thị trấn: <span class="span-red">*</span></label>
														
															<select  name="xa" id="xa"  class=" form-control"  >
																<option value="0">----Chọn Xã, phường, thị trấn----</option>
															</select>
														
														<span style="display: none;" class="error1" >
															<i class=" fa fa-exclamation-triangle"></i>
														</span>
													</div>
													<div class="form-group col-md-12 ">
														<label class="label-bold">Địa chỉ cụ thể: <span class="span-red">*</span></label>
														
															<textarea placeholder="Nhập địa chỉ cụ thể..." id="diachi" class="form-control" name="diachi"></textarea>
														
														<span style="display: none;" class="error1" >
															<i class=" fa fa-exclamation-triangle"></i>
														</span>
													</div>

												</div>
												<input type="hidden" id="check_insert" name="check_insert" value="0">

												<button type="button" class="btn-sm btn-primary mb-2" id="addADs">Thêm địa chỉ</button>  
												
												<br>
												
												<button type="submit" class="btn btn-primary button-edit_profile">Lưu thay đổi</button>
											

										</div>
									</div>
								</form>
								</div>
								<div class="tab-pane fade" id="password" role="tabpanel">
									<div class="card">
										<div class="card-body">
											<center><h3 class="card-title">Mật khẩu</h3></center>

											<form action="{{route('change_pass')}}" class="form-profile" method="post">
												@csrf
												<div class="form-group">
													<label for="inputPasswordCurrent">Mật khẩu cũ:<span class="span-red">*</span></label>
													<input type="password" name="PasswordCurrent" id="PasswordCurrent" class="form-control" required="required" >
													<span class="error2" style="display: none;">
                                                          <i class="error-log fa fa-exclamation-triangle"></i>
                                                      </span>
													<small><a class="a-pointer" data-toggle="modal" data-target="#forget_pass">Quên mật khẩu?</a></small>
													
												</div>
												<div class="form-group">
													<label for="inputPasswordNew">Mật khẩu mới:<span class="span-red">*</span></label>
													<input type="password" name="PasswordNew" id="PasswordNew" class="form-control" required="required">
													<span class="error2" style="display: none;">
                                                          <i class="error-log fa fa-exclamation-triangle"></i>
                                                      </span>
												</div>
												<div class="form-group">
													<label for="inputPasswordNew2">Nhập lại mật khẩu:<span class="span-red">*</span></label>
													<input type="password" name="PasswordNew2" id="PasswordNew2" class="form-control" required="required">
													<span class="error2" style="display: none;">
                                                          <i class="error-log fa fa-exclamation-triangle"></i>
                                                      </span>
												</div>
												<button type="submit" class="btn btn-primary button-profile">Lưu thay đổi</button>
											</form>

										</div>
									</div>
								</div>
							</div>
							@endforeach
						</div>
					</div>

				</div>
			</main>
			</div>
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
	@endsection