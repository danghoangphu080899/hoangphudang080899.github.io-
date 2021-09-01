<div class="row">
                                                            <div class="col-12 ">
                                                                <div class="ratting-main content-comment hideContent-comment" id="rating-ajax">
                                                                    <div class="avg-ratting">
                                                                        <h4>Đánh giá {{$detail->TenSanPham}}  </h4>
                                                                        
                                                                        <div class="rating-main-comment">
                                                                            <?php if ($review_avg-(int)$review_avg==0) {
                                                                                $review_avg = $review_avg . '.0';
                                                                            } ?>
                                                                            <h5 >{{$review_avg}}  </h5>
                                                    <ul class="rating-comment">
                                                        @for( $i=0; $i<(int)$review_avg;$i++)
                                                        <li><i class="fa fa-star"></i></li>
                                                        @endfor
                                                        @if($review_avg-(int)$review_avg!=0)
                                                            <li ><i class="fa fa-star-half-o"></i></li>
                                                            @for( $i=0; $i<5-(int)$review_avg -1;$i++)
                                                            <li class="dark"><i class="fa fa-star-o"></i></li> 
                                                            @endfor
                                                        @else
                                                           @for( $i=0; $i<5-(int)$review_avg;$i++)
                                                            <li ><i class="fa fa-star-o"></i></li> 
                                                            @endfor 
                                                        @endif
                                                        {{-- <li><i class="fa fa-star"></i></li>
                                                        <li><i class="fa fa-star"></i></li>
                                                        
                                                        <li class="dark"><i class="fa fa-star-o"></i></li> --}}
                                                    </ul>
                                                   <span>( {{count($detail->danhgia)}} đánh giá )</span>
                                                </div>
                                                                        
                                                                    </div>
                                                                    <!-- Single Rating -->

                                                                    @foreach($detail_danhgia as $dg)
                                                                    <div style="margin: 0;" class="single-rating">
                                                                        <div class="rating-author">
                                                                            @if($dg->khachhang->taikhoan->avatar==null)
                                                                            <img src="{{asset('public/avatar')}}/avatar_default_man.jpg" alt="avatar">
                                                                            @else
                                                                            <img src="{{asset('public/avatar')}}/{{$dg->khachhang->taikhoan->avatar}}" alt="avatar">
                                                                            @endif
                                                                        </div>
                                                                        <div class="rating-des">
                                                                            <h6>{{$dg->khachhang->HoTen}}</h6>
                                                                            <div class="ratings">
                                                                                <ul class="rating">
                                                                                    @for( $i=0; $i<$dg->SoSao;$i++)
                                                                                    <li><i class="fa fa-star"></i></li>
                                                                                    @endfor
                                                                                    @for( $i=0; $i<5-$dg->SoSao;$i++)
                                                                                    <li><i class="fa fa-star-o"></i></li>
                                                                                    @endfor
                                                                                    {{-- <li><i class="fa fa-star"></i></li>
                                                                                    <li><i class="fa fa-star"></i></li>
                                                                                    <li><i class="fa fa-star-o"></i></li>
                                                                                    <li><i class="fa fa-star-o"></i></li> --}}
                                                                                </ul>
                                                                                <div class="rate-count">(<span>{{$dg->SoSao}} sao</span>)</div>
                                                                            </div>
                                                                            <p>{{$dg->MucDanhGia}}</p>
                                                                        </div>
                                                                        @if( Auth::check() && $dg->khachhang->idKhachHang == Auth::user()->khachhang->idKhachHang)
                                                                        <div class="rating-del">
                                                                            <a onclick="review_del({{$dg->idDanhGia}},{{$detail->idSanPham}})" href="javascript:void(0)"><i class="ti ti-close"></i></a>
                                                                        </div>
                                                                        @endif
                                                                    </div>
                                                                    @endforeach
                                                                    <!--/ End Single Rating -->
                                                                    
                                                                </div> 
                                                                <div class="show-more-comment">
                                                                        <a href="javascript::void(0)"><span>Xem thêm</span></a>
                                                                    </div>
                                                                <!-- Review -->
                                                                <div class="comment-review">
                                                                    <div class="add-review">
                                                                        <h5>Đánh giá mới</h5>
                                                                        <p>Chỉ những ai đã mua sản phẩm mới có thể đánh giá sản phẩm</p>
                                                                    </div>
                                                                </div>
                                                                @if(Auth::check() )
                                                                @if($check_acc_review)
                                                                <?php
                                                                $check = false;
                                                                foreach ($check_acc_review as $key => $value) {
                                                                    if ($value->phieudathang->khachhang->idKhachHang == Auth::user()->khachhang->idKhachHang && $value->phieudathang->idTrangThai == 4) {
                                                                       $check = true;
                                                                    }
                                                                }

                                                                 ?>
                                                                 @if($check)
                                                                 <div class="col-lg-12 col-12">
                                                                    <div class="form-group button5">    
                                                                        <button data-toggle="modal" data-target="#comment" class="btn">Tạo bài đánh giá</button>
                                                                    </div>
                                                                </div>
                                                                 @endif
                                                                

                                                                @endif
                                                                 @else

                                                                 <a  href="{{route('login')}}"><button class="btn-info btn-lg">Login</button></a>

                                                                @endif
                                                            </div>
                                                            
                                                        </div>