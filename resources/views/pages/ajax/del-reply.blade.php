<h3 class="comment-title">Bình luận ({{$count_comment}})</h3>
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