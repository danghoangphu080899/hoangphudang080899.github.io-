@extends('welcome')
@section('detailpost')
		
		<!-- Breadcrumbs -->
		<div class="breadcrumbs">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<div class="bread-inner">
							<ul class="bread-list">
								<li><a href="{{route('trangchu')}}">Trang chủ<i class="ti-arrow-right"></i></a></li>
								<li class="active"><a href="">chi tiết tin tức</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- End Breadcrumbs -->
			
		<!-- Start Blog Single -->
		<section class="blog-single section pt-0">
			<div class="container">
				<div class="row">
					<div class="col-lg-10 offset-lg-1 col-12">
						<div class="blog-single-main">
							<div class="row">
								<div class="col-12">
								
									<div class="image">
										<img src="{{asset('public/avatar-post')}}/{{$post_detail->HinhAnh}}" alt="#">
									</div>
									<div class="blog-detail">
										<h2 class="blog-title">{{$post_detail->TieuDeBaiViet}}</h2>
										<div class="blog-meta">
											 <?php
								                $s3 = $post_detail->NgayTaoBaiViet;
								                $dt3 = new DateTime($s3);
								                $day3 = $dt3->format('d');
								                $month3 = $dt3->format('m');
								                $year3 = $dt3->format('Y');
								            ?>
											<span class="author"><a href="#"><i class="fa fa-user"></i>Đăng bởi: {{$post_detail->nhanvien->HoTen}}(admin)</a><a href="#"><i class="fa fa-calendar"></i>Ngày {{$day3}} tháng {{$month3}} năm {{$year3}}</a><a href="#"><i class="fa fa-comments"></i>Bình luận ({{$count_comment}})</a></span>
										</div>
										<div class="content">
											{{-- <p>{{$post_detail->NoiDungNgan}}</p> --}}
											<blockquote> <i class="fa fa-quote-left"></i> {{$post_detail->NoiDungNgan}}.</blockquote>
											<textarea id="summernote_post"> </textarea>
                                                  <script type="text/javascript">
                                                      $('#summernote_post').summernote({
                                                        height: '200',
                                                        airMode: true,
														}).summernote('code', `{!!$post_detail->NoiDungChiTiet!!}`);
                                                        $('#summernote_post').summernote('disable');

                                                   </script>
										</div>
									</div>
								</div>
								<div class="col-md-12 m-2">
								
								<div class="fb-like" data-href="https://hoangphu.com/myproject2/detail_post/{{$post_detail->idBaiViet}}" data-width="" data-layout="standard" data-action="like" data-size="large" data-share="true"></div>
								</div>
								
								<div class="col-12">
									<div  class="comments" id="del-reply-ajax">
										<div id="check_height2" class="content-reply ">
											
										
										<input type="hidden" id="count_comment" value="{{$count_comment}}">
										<h3 class="comment-title">Bình luận ({{$count_comment}})</h3>
										@if($count_comment > 0)
										@foreach($post_detail->binhluan as $com)
										<?php
								                $s = $com->created_at;
								                $dt = new DateTime($s);
								                $day = $dt->format('d');
								                $month = $dt->format('m');
								                $year = $dt->format('Y');
								                $minutes = $dt->format('h:m A');  
								                $day2 = $dt->format('d/m/Y'); 
								            ?>
										<!-- Single Comment -->
										<div class="single-comment">
											<a style="position: absolute;top: 0px; left: 0px;" href="javascript::void(0)" onclick="com_del({{$com->idBinhLuan}})"><i class="ti ti-close"></i></a>
											@if($com->khachhang->taikhoan->avatar==null)
                          <img src="{{asset('public/avatar')}}/avatar_default_man.jpg" alt="avatar">
                      @else
                          <img src="{{asset('public/avatar')}}/{{$com->khachhang->taikhoan->avatar}}" alt="avatar">
                      @endif
											
											<div class="content">
												<h4>{{$com->khachhang->HoTen}} <span>Lúc {{$minutes}} Ngày {{$day2}}</span></h4>
												<p>{{$com->NoiDung}}</p>
											</div>
										</div>
										<!-- End Single Comment -->
										@endforeach
										@else
										<p>Chưa có bình luận nào!</p>
										@endif
										
										</div>
										<div class="show-more-reply">
                                                                        <a href="javascript::void(0)"><span>Xem thêm</span></a>
                                                                    </div>
									</div>									
								</div>											
								<div class="col-12">			
									<div class="reply">
										<div class="reply-head">
											<h2 class="reply-title">Để lại bình luận của bạn</h2>
											<!-- Comment Form -->
											@if(Auth::check() )
                        
                         <div class="col-lg-12 col-12">
                            <div class="form-group button5">    
                                <button data-toggle="modal" data-target="#comment" class="btn">Tạo bài đánh giá</button>
                            </div>
                        </div>

                         @else

                         <a  href="{{route('login')}}"><button class="btn-info btn-lg">Đăng nhập để có thể bình luận</button></a>

                        @endif

											{{-- <form class="form" action="#">
												<div class="row">
													<div class="col-12">
														<div class="form-group">
															<label>Bình luận của bạn <span class="span-red">*</span></label>
															<textarea name="message" placeholder="Nhận nhận xét của bạn ở đây..."></textarea>
														</div>
													</div>
													<div class="col-12">
														<div class="form-group button">
															<button type="submit" class="btn">Gửi bình luận</button>
														</div>
													</div>
												</div>
											</form> --}}
											<!-- End Comment Form -->
										</div>
									</div>			
								</div>			
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		    <!-- Start Shop Newsletter  -->
    <section  style="    padding: 0 0 50px 0;" class="shop-newsletter section">
        <div class="container">
            <div class="inner-top">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2 col-12">
                        <!-- Start Newsletter Inner -->
                        <div class="inner">
                            <h4>Đăng ký nhận thông báo </h4>
                            <p>Đăng ký nhận thông tin khi có tin tức mới</p>
                            <form action="{{route('send_mail_sub_post')}}" method="get" class="newsletter-inner">
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
		<!--/ End Blog Single -->
		<div class="modal fade" id="comment" tabindex="-1" role="dialog">
            <div style="max-width: 400px;" class="modal-dialog modal-dialog2" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span class="ti-close" aria-hidden="true"></span></button>
                    </div>
                    <div class="modal-body2 shop single">
                        <form class="form form-comment2" method="post" action="{{route('comment')}}">
                            <input type="hidden" name="id" value="{{$post_detail->idBaiViet}}">
                            <div class="comment-review">
                                <div class="add-review">
                                    <h3 style="    text-transform: uppercase;" class="text-center">Bình luận bài viết</h3>
                                    <p style="    margin-top: 10px;">Bạn thấy bài viết này như thế nào? chủ đề bài viết ra sao? Hãy để lại bình luận của bạn ở dưới</p>
                                </div>
                               

                        </div>
                        <!--/ End Review -->
                        <!-- Form -->

                        @csrf
                        <div class="row">

                            <div class="col-lg-12 col-12">
                                <div class="form-group">
                                    <label>Bình luận của bạn? <span>*</span></label>
                                    <textarea style="   resize: vertical;"  id="summernote_comment" name="message" rows="10" placeholder="Bạn thấy sản phẩm này thế nào..." ></textarea>
                                    <span class="error1" style="display: none;">
                                                          <i class=" fa fa-exclamation-triangle"></i>
                                                      </span>
                                </div>
                            </div>
                            
                            <div class="col-lg-12 col-12 text-center">
                                <div class="form-group button5">    
                                    <button  type="submit"  class="btn button-comment">Bình luận</button>
                                </div>
                            </div>
                            <div class="col-md-12 text-center">
                            	<p style="    font-style: italic; font-size: small;font: small-caption;"><span class="span-red">*</span>Những tài khoản có bình luận không hợp lệ có thể bị khóa</p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
    </div>
    
    </div> 
    <script type="text/javascript">

        if($('#count_comment').val()>=3){
        $("#check_height2").addClass("hideContent-reply");
        $(".show-more-reply").show();

        $(".reply").addClass('mt-70');
        
         
    }else{
        $("#check_height2").removeClass("hideContent-reply");
        $(".show-more-reply").hide();

         $(".reply").removeClass('mt-70');
    
}
    </script>
@endsection