@extends('welcome')
@section('post-grip')	
		<!-- Breadcrumbs -->
		<div class="breadcrumbs">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<div class="bread-inner">
							<ul class="bread-list">
								<li><a href="{{route('trangchu')}}">Trang chủ<i class="ti-arrow-right"></i></a></li>
								<li class="active"><a href="">danh sách tin tức</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- End Breadcrumbs -->

		<!-- Start Blog Single -->
		<section class="blog-single shop-blog grid section">
			<div class="container">
				<div class="row">
					<div class="col-lg-8 col-12">
						<div class="nav-main">
							<ul class="nav nav-tabs" id="myTab1" role="tablist">

                                    <li class="nav-item"><a class="nav-link active"  data-toggle="tab" href="#0" role="tab">Tất cả</a></li>
                                    @foreach($cate as $c)
                                   <li class="nav-item"><a class="nav-link " data-toggle="tab" href="#{{$c->idDanhMucBaiViet}}" role="tab">{{$c->TenDanhMucBaiViet}}</a></li>
                                    @endforeach
                                </ul>
                                </div>
                        <div class="tab-content" id="myTabContent">
                                <!-- Start Single Tab -->
                                <div class="tab-pane fade show active" id="0" role="tabpanel">
                                    <div class="tab-single">
                                        <div class="row">
				                             @foreach($post as $p)
											<div class="col-lg-6 col-md-6 col-12">
												<!-- Start Single Blog  -->
												<div class="shop-single-blog ">
													  <?php
										                $s3 = $p->NgayTaoBaiViet;
										                $dt3 = new DateTime($s3);
										                $day3 = $dt3->format('d');
										                $month3 = $dt3->format('m');
										                $year3 = $dt3->format('Y');
										            ?>
													<a href="{{route('detail_post',[$p->idBaiViet])}}"><img src="{{asset('public/avatar-post')}}/{{$p->HinhAnh}}" alt="#" ></a>
							                        <div class="content" >
							                            <p class="date">Ngày {{$day3}} tháng {{$month3}} năm {{$year3}}</p>
							                            <a href="{{route('detail_post',[$p->idBaiViet])}}" class="title">{{$p->TieuDeBaiViet}}</a>
							                            <a href="#" class="more-btn">Xem chi tiết</a>
							                        </div>
												</div>
												<!-- End Single Blog  -->
											</div>
											@endforeach
											<div class="col-12">
													<!-- Pagination -->
													{{  $post->links()  }}
													<!--/ End Pagination -->
												</div> 
                                                   
                                             
                                        </div>
                                    </div>
                                </div>
                                <!--/ End Single Tab -->
                                
                                <!-- Start Single Tab -->
                              	<div class="tab-pane fade" id="1" role="tabpanel">
                                    <div class="tab-single">
                                        <div class="row">
                                        	
                                            @foreach($cate1 as $p)

                                            	<div class="col-lg-6 col-md-6 col-12">
												<!-- Start Single Blog  -->
												<div class="shop-single-blog ">
													  <?php
										                $s3 = $p->NgayTaoBaiViet;
										                $dt3 = new DateTime($s3);
										                $day3 = $dt3->format('d');
										                $month3 = $dt3->format('m');
										                $year3 = $dt3->format('Y');
										            ?>
													<a href="{{route('detail_post',[$p->idBaiViet])}}"><img src="{{asset('public/avatar-post')}}/{{$p->HinhAnh}}" alt="#" ></a>
							                        <div class="content" >
							                            <p class="date">Ngày {{$day3}} tháng {{$month3}} năm {{$year3}}</p>
							                            <a href="{{route('detail_post',[$p->idBaiViet])}}" class="title">{{$p->TieuDeBaiViet}}</a>
							                            <a href="#" class="more-btn">Xem chi tiết</a>
							                        </div>
												</div>
												<!-- End Single Blog  -->
											</div>
                                                @endforeach
                                                <div class="col-12">
													<!-- Pagination -->
													{{  $cate1->links()  }}
													<!--/ End Pagination -->
												</div> 
                                        </div>
                                    </div>
                                        
                                </div>
                                <!--/ End Single Tab -->
                                <!-- Start Single Tab -->
                              	<div class="tab-pane fade" id="2" role="tabpanel">
                                    <div class="tab-single">
                                        <div class="row">
                                        	
                                            @foreach($cate2 as $p)

                                            	<div class="col-lg-6 col-md-6 col-12">
												<!-- Start Single Blog  -->
												<div class="shop-single-blog ">
													  <?php
										                $s3 = $p->NgayTaoBaiViet;
										                $dt3 = new DateTime($s3);
										                $day3 = $dt3->format('d');
										                $month3 = $dt3->format('m');
										                $year3 = $dt3->format('Y');
										            ?>
													<a href="{{route('detail_post',[$p->idBaiViet])}}"><img src="{{asset('public/avatar-post')}}/{{$p->HinhAnh}}" alt="#" ></a>
							                        <div class="content" >
							                            <p class="date">Ngày {{$day3}} tháng {{$month3}} năm {{$year3}}</p>
							                            <a href="{{route('detail_post',[$p->idBaiViet])}}" class="title">{{$p->TieuDeBaiViet}}</a>
							                            <a href="#" class="more-btn">Xem chi tiết</a>
							                        </div>
												</div>
												<!-- End Single Blog  -->
											</div>
                                                @endforeach
                                                <div class="col-12">
													<!-- Pagination -->
													{{  $cate2->links()  }}
													<!--/ End Pagination -->
												</div> 
                                        </div>
                                    </div>
                                        
                                </div>
                                <!-- Start Single Tab -->
                              	<div class="tab-pane fade" id="3" role="tabpanel">
                                    <div class="tab-single">
                                        <div class="row">
                                        	
                                            @foreach($cate3 as $p)

                                            	<div class="col-lg-6 col-md-6 col-12">
												<!-- Start Single Blog  -->
												<div class="shop-single-blog ">
													  <?php
										                $s3 = $p->NgayTaoBaiViet;
										                $dt3 = new DateTime($s3);
										                $day3 = $dt3->format('d');
										                $month3 = $dt3->format('m');
										                $year3 = $dt3->format('Y');
										            ?>
													<a href="{{route('detail_post',[$p->idBaiViet])}}"><img src="{{asset('public/avatar-post')}}/{{$p->HinhAnh}}" alt="#" ></a>
							                        <div class="content" >
							                            <p class="date">Ngày {{$day3}} tháng {{$month3}} năm {{$year3}}</p>
							                            <a href="{{route('detail_post',[$p->idBaiViet])}}" class="title">{{$p->TieuDeBaiViet}}</a>
							                            <a href="#" class="more-btn">Xem chi tiết</a>
							                        </div>
												</div>
												<!-- End Single Blog  -->
											</div>
                                                @endforeach
                                                <div class="col-12">
													<!-- Pagination -->
													{{  $cate3->links()  }}
													<!--/ End Pagination -->
												</div> 
                                        </div>
                                    </div>
                                        
                                </div>
                                <!-- Start Single Tab -->
                              	<div class="tab-pane fade" id="4" role="tabpanel">
                                    <div class="tab-single">
                                        <div class="row">
                                        	
                                            @foreach($cate4 as $p)

                                            	<div class="col-lg-6 col-md-6 col-12">
												<!-- Start Single Blog  -->
												<div class="shop-single-blog ">
													  <?php
										                $s3 = $p->NgayTaoBaiViet;
										                $dt3 = new DateTime($s3);
										                $day3 = $dt3->format('d');
										                $month3 = $dt3->format('m');
										                $year3 = $dt3->format('Y');
										            ?>
													<a href="{{route('detail_post',[$p->idBaiViet])}}"><img src="{{asset('public/avatar-post')}}/{{$p->HinhAnh}}" alt="#" ></a>
							                        <div class="content" >
							                            <p class="date">Ngày {{$day3}} tháng {{$month3}} năm {{$year3}}</p>
							                            <a href="{{route('detail_post',[$p->idBaiViet])}}" class="title">{{$p->TieuDeBaiViet}}</a>
							                            <a href="#" class="more-btn">Xem chi tiết</a>
							                        </div>
												</div>
												<!-- End Single Blog  -->
											</div>
                                                @endforeach
                                                <div class="col-12">
													<!-- Pagination -->
													{{  $cate4->links()  }}
													<!--/ End Pagination -->
												</div> 
                                        </div>
                                    </div>
                                        
                                </div>
                                <!-- Start Single Tab -->
                              	<div class="tab-pane fade" id="5" role="tabpanel">
                                    <div class="tab-single">
                                        <div class="row">
                                        	
                                            @foreach($cate5 as $p)

                                            	<div class="col-lg-6 col-md-6 col-12">
												<!-- Start Single Blog  -->
												<div class="shop-single-blog ">
													  <?php
										                $s3 = $p->NgayTaoBaiViet;
										                $dt3 = new DateTime($s3);
										                $day3 = $dt3->format('d');
										                $month3 = $dt3->format('m');
										                $year3 = $dt3->format('Y');
										            ?>
													<a href="{{route('detail_post',[$p->idBaiViet])}}"><img src="{{asset('public/avatar-post')}}/{{$p->HinhAnh}}" alt="#" ></a>
							                        <div class="content" >
							                            <p class="date">Ngày {{$day3}} tháng {{$month3}} năm {{$year3}}</p>
							                            <a href="{{route('detail_post',[$p->idBaiViet])}}" class="title">{{$p->TieuDeBaiViet}}</a>
							                            <a href="#" class="more-btn">Xem chi tiết</a>
							                        </div>
												</div>
												<!-- End Single Blog  -->
											</div>
                                                @endforeach
                                                <div class="col-12">
													<!-- Pagination -->
													{{  $cate5->links()  }}
													<!--/ End Pagination -->
												</div> 
                                        </div>
                                    </div>
                                        
                                </div>
                               
                            </div>	
						<div class="row">
							
						</div>
					</div>
					<div class="col-lg-4 col-12">
						<div class="main-sidebar">
							<!-- Single Widget -->
							<div class="single-widget search">
								<div class="form">
									<input type="email" placeholder="Bạn muốn tìm gì...">
									<a class="button" href="#"><i class="fa fa-search"></i></a>
								</div>
							</div>
							<!--/ End Single Widget -->
							<!-- Single Widget -->
							<div class="single-widget category">
								<h3 class="title">Danh mục bài viết</h3>
								<ul class="categor-list">
									@foreach($cate as $c)
									<li><a href="{{route('PostGripCate',[$c->idDanhMucBaiViet])}}">{{$c->TenDanhMucBaiViet}}</a></li>
									@endforeach
								</ul>
							</div>
							<!--/ End Single Widget -->
							<!-- Single Widget -->
							<div class="single-widget recent-post">
								<h3 class="title">Tin tức vừa xem</h3>
								<!-- Single Post -->
								@if(Session::has("WatchedPost") != null)
									 @foreach(array_reverse(Session('WatchedPost')->posts) as $item) 
								<div class="single-post">
									<div class="image">
									 <a href="{{route('detail_post',[$item['postInfo']->idBaiViet])}}">	<img class="img-thumbnail" src="{{asset("public/avatar-post")}}/{{$item['postInfo']->HinhAnh}}" alt="#"></a>
									</div>
									<div class="content">
										<h5 style="height: 36px;overflow: hidden;text-overflow: ellipsis;"><a href="{{route('detail_post',[$item['postInfo']->idBaiViet])}}">{{$item['postInfo']->TieuDeBaiViet}}</a></h5>
										<ul class="comment">
											<?php
						                $s = $item['postInfo']->NgayTaoBaiViet;
						                $dt = new DateTime($s);
						                $day = $dt->format('d');
						                $month = $dt->format('F');
						                $year = $dt->format('Y');
						            ?>
											<li><i class="fa fa-calendar" aria-hidden="true"></i>{{$month}} {{$day}}, {{$year}}</li>
											<li><i class="fa fa-commenting-o" aria-hidden="true"></i>35</li>
										</ul>
									</div>
								</div>
								@endforeach
								@else
									<p>Bạn chưa xem tin tức nào</p>
									@endif
								<!-- End Single Post -->
							</div>
							<!--/ End Single Widget -->
							<!-- Single Widget -->
							<!--/ End Single Widget -->
							<!-- Single Widget -->
							<div class="single-widget side-tags">
								<h3 class="title">Tags phổ biến</h3>
								<ul class="tag">
									@foreach($cate as $c)
									<li><a href="href="{{route('PostGripCate',[$c->idDanhMucBaiViet])}}"">{{$c->TenDanhMucBaiViet}}</a></li>
									@endforeach
								</ul>
							</div>
							<!--/ End Single Widget -->
							<!-- Single Widget -->
							<div class="single-widget newsletter">
								<h3 class="title">Đăng ký nhận tin tức</h3>
								<div class="letter-inner">
									<h4 class="text-center">Đăng ký nhận thông tin khi có tin tức mới</h4>
									<div class="form-inner">
										<form name="form_post" action="{{route('send_mail_sub_post')}}" method="get" class="newsletter-inner">
										<input required="" type="email" name='email' placeholder="Nhận email của bạn">
									<button type="submit">Đăng ký</button>
										</form>
									</div>
								</div>
							</div>
							<!--/ End Single Widget -->
						</div>
					</div>
				</div>
			</div>
		</section>
		<!--/ End Blog Single -->
@endsection