@extends('welcome')
@section('products-grid')	
		<!-- Breadcrumbs -->
		<div class="breadcrumbs">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<div class="bread-inner">
							<ul class="bread-list">
								<li><a href="index1.html">Trang chủ<i class="ti-arrow-right"></i></a></li>
								<li class="active"><a href="">Danh sách lưới</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- End Breadcrumbs -->
		
		<!-- Product Style -->
		<section class="product-area shop-sidebar shop section">
			<div class="container">
				<div class="row">
					<div class="col-lg-3 col-md-4 col-12">
						<div class="shop-sidebar">
								<!-- Single Widget -->
								<div class="single-widget category">
									<h3 class="title">Danh mục sản phẩm</h3>
									<ul class="categor-list">
										@foreach($category as $cate)
                                                    <li><a href="{{route('products_category_grid',[$cate->idDanhMuc])}}">{{$cate->TenDanhMuc}}</a></li> 
                                                    @endforeach
									</ul>
								</div>
								<!--/ End Single Widget -->
								<!-- Shop By Price -->
									<div class="single-widget range">
										<h3 class="title">Sản phẩm theo giá</h3>
										<div class="price-filter">
											<div class="price-filter-inner">
												<form>
												<div id="slider-range"></div>
													<div class="price_slider_amount">
													<div class="label-input">
														<span>Khoảng:</span><input type="text" id="amount"  placeholder="Add Your Price"/>
														<center><button class="btn-sm btn-primary" >Lọc giá</button></center> 
														<input type="hidden" id="minPrice" name="minPrice">
														<input type="hidden" id="maxPrice" name="maxPrice">
													</div>

												</div>
												</form>
											</div>
										</div>
										<ul class="check-box-list">
											<li>
												<label class="checkbox-inline" for="1"><input name="news" id="1" type="checkbox">100.000đ - 1.000.000đ</label>
											</li>
											<li>
												<label class="checkbox-inline" for="2"><input name="news" id="2" type="checkbox">1.000.000 - 5.000.000đ</label>
											</li>
											<li>
												<label class="checkbox-inline" for="3"><input name="news" id="3" type="checkbox">5.000.000đ - 10.000.000đ</label>
											</li>
										</ul>
									</div>
									<!--/ End Shop By Price -->
								<!-- Single Widget -->
								<div class="single-widget recent-post">
									<h3 class="title">Sản phẩm vừa xem</h3>
									<!-- Single Post -->
									@if(Session::has("Watched") != null)
									 @foreach(array_reverse(Session('Watched')->products) as $item) 
									<div class="single-post first">
										<div class="image">
											<img src="{{asset("public/frontend/images/product")}}/{{$item['productInfo']->HinhAnh}}" alt="#">
										</div>
										<div class="content">
											<h5><a href="{{route('detail_product',[$item['productInfo']->idSanPham])}}">{{$item['productInfo']->TenSanPham}}</a></h5>
											<p style="color: red" class="price">{{number_format($item['productInfo']->Gia,0,",",".")}} VNĐ</p>
											{{-- <ul class="reviews">
												<li class="yellow"><i class="ti-star"></i></li>
												<li class="yellow"><i class="ti-star"></i></li>
												<li class="yellow"><i class="ti-star"></i></li>
												<li><i class="ti-star"></i></li>
												<li><i class="ti-star"></i></li>
											</ul> --}}
										</div>
									</div>
									<!-- End Single Post -->
									@endforeach
									@else
									<p>Bạn chưa xem sản phẩm nào</p>
									@endif
								</div>
								<!--/ End Single Widget -->
								<!-- Single Widget -->
								{{-- <div class="single-widget category">
									<h3 class="title">Manufacturers</h3>
									<ul class="categor-list">
										<li><a href="#">Forever</a></li>
										<li><a href="#">giordano</a></li>
										<li><a href="#">abercrombie</a></li>
										<li><a href="#">ecko united</a></li>
										<li><a href="#">zara</a></li>
									</ul>
								</div> --}}
								<!--/ End Single Widget -->
						</div>
					</div>
					<div class="col-lg-9 col-md-8 col-12">
						<div class="row">
							<div class="col-12">
								<!-- Shop Top -->
								<div class="shop-top">
									<div class="shop-shorter">
										<div class="single-shorter">
											<label>Show :</label>
											<select class="select">
												<option selected="selected">09</option>
												<option>15</option>
												<option>25</option>
												<option>30</option>
											</select>
										</div>
										<div  class="single-shorter">
											<label>Sắp xếp:</label>
											<select name="sort" id="sort" class="select">
												<option value="{{Request::url()}}?sort_by=name_az" selected="selected">Tên a -> z </option>
												<option value="{{Request::url()}}?sort_by=name_za" selected="selected">Tên z -> a </option>
												<option value="{{Request::url()}}?sort_by=gia_tangdan" >Giá tăng dần</option>
												<option value="{{Request::url()}}?sort_by=gia_giamdan" >Giá giảm dần</option>
											</select>
										
										</div>
									</div>
									<ul class="view-mode">
										<li class="active"><a href="{{route('products_category_grid',[$idCategory])}}"><i class="fa fa-th-large"></i></a></li>
										<li ><a href="{{route('products_category_list',[$idCategory])}}"><i class="fa fa-th-list"></i></a></li>
									</ul>
								</div>
								<!--/ End Shop Top -->
							</div>
						</div>
						<div class="row">
							@if(count($products)>0)
									@foreach($products as $sp)
							<div class="col-lg-4 col-md-6 col-4">
								<div class="single-product">
									<div class="product-img">
										<a href="{{('../detail_product/'.$sp->idSanPham)}}">
											<img class="default-img" src="{{asset('public/frontend/images/product')}}/{{$sp->HinhAnh}}" alt="#">
											<img class="hover-img" src="{{asset('public/frontend/images/product')}}/{{$sp->HinhAnh}}" alt="#">
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
										<h3><a href="{{('../detail_product/'.$sp->idSanPham)}}">{{$sp->TenSanPham}}</a></h3>
										<div class="product-price">
											<span style="color: red">{{number_format($sp->Gia,0,",",".")}} VNĐ</span>
										</div>
									</div>
								</div>
							</div>
							@endforeach
							@else 
								<div class="col-lg-12 col-md-12 col-12">
								<br>
									<center><h3>Không có sản phẩm nào!!!!!</h3></center>
								</div>
							@endif

							<div class="col-12">
									<!-- Pagination -->
									{{  $products->links()  }}
									<!--/ End Pagination -->
								</div>
								
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!--/ End Product Style 1  -->	

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
		
		
		
    
    <!-- Modal -->
    @foreach($products as $sp)
    <div class="modal fade" id="home{{$sp->idSanPham}}" tabindex="-1" role="dialog">
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
                                    <h2>{{$sp->TenSanPham}}</h2>
                                    {{-- <div class="quickview-ratting-review">
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
                                    </div> --}}
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
                                                <button type="button" class="btn btn-primary btn-number" disabled="disabled" data-type="minus" data-field="quant[1]">
                                                    <i class="ti-minus"></i>
                                                </button>
                                            </div>
                                            <input type="text" name="quant[1]" class="input-number"  data-min="1" data-max="1000" value="1">
                                            <div class="button plus">
                                                <button type="button" class="btn btn-primary btn-number" data-type="plus" data-field="quant[1]">
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
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    @endforeach
    <!-- Modal end -->
@endsection