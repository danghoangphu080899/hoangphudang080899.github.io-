@extends('pages.product-list')
@section('phone')
<div class="row product-single">
								<!-- Start Single List -->
								
								<div class="col-12 ">
									@if(count($products)>0)
									@foreach($products as $sp)
									
									<div class="row ">
										<div class="col-lg-4 col-md-6 col-sm-6">
											<div class="single-product">
												<div class="product-img">
													<a href="product-details.html">
														<img class="default-img" src="public/frontend/images/product/{{$sp->HinhAnh}}" alt="#">
														<img class="hover-img" src="public/frontend/images/product/{{$sp->HinhAnh}}" alt="#">
													</a>
													<div class="button-head">
														<div class="product-action">
															<a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i class=" ti-eye"></i><span>Quick Shop</span></a>
															<a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Add to Wishlist</span></a>
															<a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Add to Compare</span></a>
														</div>
														<div class="product-action-2">
															<a title="Add to cart" href="#">Add to cart</a>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="col-lg-8 col-md-6 col-12">
											<div class="list-content">
												<div class="product-content">
													<div class="product-price">
														<span>{{number_format($sp->Gia,0,",",".")}} VNĐ</span>
													</div>
													<h3 class="title"><a href="product-details.html">{{$sp->TenSanPham}}</a></h3>
													<div class="review-inner">
														<div class="ratings">
															<ul class="rating">
																<li><i class="fa fa-star"></i></li>
																<li><i class="fa fa-star"></i></li>
																<li><i class="fa fa-star"></i></li>
																<li><i class="fa fa-star"></i></li>
																<li><i class="fa fa-star-half-o"></i></li>
																<li class="total">(4.5)</li>
															</ul>
														</div>
													</div>
												</div>
												<p class="des">{{$sp->MoTaNgan}}</p>
												<a href="#" class="btn">Xem chi tiết!</a>
											</div>
										</div>

									</div>
									@endforeach
									@else 
									<div class="row">
										<div class="col-lg-12 col-md-12 col-12">
											<br>
											<center><h3>Không có sản phẩm! nào!!!!!</h3></center>
										</div>
										
									</div>
									@endif
								</div>
								<!-- End Single List -->
								
								<!-- End Single List -->
								<div class="col-12">
									<!-- Pagination -->
									{{  $products->links()  }}
									<!--/ End Pagination -->
								</div>
								
							</div>
				@endsection