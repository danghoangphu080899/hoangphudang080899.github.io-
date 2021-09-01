@extends('welcome')
@section('order-history')
<div class="breadcrumbs">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="bread-inner">
                            <ul class="bread-list">
                                <li><a href="index1.html">Trang chủ<i class="ti-arrow-right"></i></a></li>
                                <li class="active"><a href="blog-single.html">Lịch sử đặt hàng</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Main Container  -->
        <div class="main-container container">
            <div class="row">
                <!--Middle Part Start-->
                <div id="content" class="col-12">
                    <h2 class="title">Lịch sử đặt hàng</h2><br>
                    <table id="example1" class="table table-bordered table-striped table-order">
                  <div name="csrf-token" content="{{ csrf_token() }}">
                  <thead>
                  <tr class="tr-order" >

                                    <td class="text-center">ID#</td>
                                    <td class="text-center">Địa chỉ giao hàng</td>
                                    <td class="text-center">Trạng thái đơn hàng</td>
                                    <td class="text-center">Tổng tiền</td>
                                    <td class="text-center">Phương thức thanh toán</td>
                                    <td class="text-center">Thời gian đặt hàng</td>
                                    <td class="text-center">Ngày cập nhật trạng thái</td>
                                    <td>Hành động</td>
    
                                </tr>
                  </thead>
                  <tbody>
                     @foreach($orders as $order)
                                <tr>
                                    <td class="text-center">{{$order->idPhieuDatHang}}</td>
                                    <td class="text-left">{{$order->DiaChiGiaoHang}}</td>
                                     @if($order->trangthaidathang->idTrangThai==1)
                    <td class="text-center"> <span class="badge badge-secondary">Chờ duyệt</span></td>
                    @elseif($order->trangthaidathang->idTrangThai==2)
                    <td  class="text-center"> <span class="badge badge-info">Đã duyệt</span></td>
                    @elseif($order->trangthaidathang->idTrangThai==3)
                    <td  class="text-center"> <span class="badge badge-warning">Đang vận chuyển</span></td>
                    @elseif($order->trangthaidathang->idTrangThai==4)
                    <td class="text-center"> <span class="badge badge-success">Giao hàng thành công</span></td>
                    @elseif($order->trangthaidathang->idTrangThai==5)
                    <td  class="text-center"> <span class="badge badge-danger">Giao hàng không thành công</span></td>
                    @else
                    <td  class="text-center"> <span class="badge badge-dark">Đã ẩn</span></td>
                    @endif 
                                    <td style="font-weight: 600;" class="text-left text-danger">{{number_format($order->TongTien,0,",",".")}}đ</td>

                                     @if($order->phuongthucthanhtoan->idPhuongThucThanhToan == 1)
                     <td> <span class="badge badge-light">{{$order->phuongthucthanhtoan->TenPhuongThucThanhToan}}</span></td>
                    @else
                     <td> <span class="badge badge-warning">{{$order->phuongthucthanhtoan->TenPhuongThucThanhToan}}</span><ion-icon name="logo-paypal"></ion-icon></td>
                    @endif

                                    <td class="text-center">{{$order->created_at}}</td>
                                    <td class="text-center">{{$order->updated_at}}</td>
                                     <td class="text-center">
                                        <a href='' class="a-hover" data-toggle="modal" data-target="#{{$order->idPhieuDatHang}}" data-original-title="View"><i class="align-middle" data-feather="eye"></i></a>
                                        @if($order->idTrangThai == 4 || $order->idTrangThai == 5)
                                        <a href="javascript:void()" class="a-hover" onclick="delOrder({{$order->idPhieuDatHang}})"><i class="align-middle" data-feather="trash-2"></i></a>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                  </tbody>
                 </div>
                </table>
                        {{-- <table class="table table-bordered table-hover table-order">
                            <thead>
                                <tr class="tr-order" >

                                    <td class="text-center">ID</td>
                                    <td class="text-center">Địa chỉ giao hàng</td>
                                    <td class="text-center">Trạng thái đơn hàng</td>
                                    <td class="text-right">Tổng tiền</td>
                                    <td class="text-left">Phương thức thanh toán</td>
                                    <td class="text-center">Ngày đặt</td>
                                    <td class="text-left">Ngày cập nhật trạng thái</td>
                                    <td>Xem</td>
    
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($orders as $order)
                                <tr>
                                    <td class="text-center">#{{$order->idPhieuDatHang}}</td>
                                    <td class="text-left">{{$order->DiaChiGiaoHang}}</td>
                                     @if($order->trangthaidathang->idTrangThai==1)
                    <td class="text-center"> <span class="badge badge-secondary">Chờ duyệt</span></td>
                    @elseif($order->trangthaidathang->idTrangThai==2)
                    <td  class="text-center"> <span class="badge badge-info">Đã duyệt</span></td>
                    @elseif($order->trangthaidathang->idTrangThai==3)
                    <td  class="text-center"> <span class="badge badge-warning">Đang vận chuyển</span></td>
                    @elseif($order->trangthaidathang->idTrangThai==4)
                    <td> <span class="badge badge-success">Giao hàng thành công</span></td>
                    @elseif($order->trangthaidathang->idTrangThai==5)
                    <td  class="text-center"> <span class="badge badge-danger">Giao hàng không thành công</span></td>
                    @else
                    <td  class="text-center"> <span class="badge badge-dark">Đã ẩn</span></td>
                    @endif 
                                    <td class="text-left">{{number_format($order->TongTien,0,",",".")}} VNĐ</td>

                                     @if($order->phuongthucthanhtoan->idPhuongThucThanhToan == 1)
                     <td> <span class="badge badge-light">{{$order->phuongthucthanhtoan->TenPhuongThucThanhToan}}</span></td>
                    @else
                     <td> <span class="badge badge-warning">{{$order->phuongthucthanhtoan->TenPhuongThucThanhToan}}</span><ion-icon name="logo-paypal"></ion-icon></td>
                    @endif

                                    <td class="text-center">{{$order->created_at}}</td>
                                    <td class="text-center">{{$order->updated_at}}</td>
                                     <td class="text-center"><a class="btn-view"  title="" data-toggle="modal" data-target="#{{$order->idPhieuDatHang}}" data-original-title="View"><i class="fa fa-eye"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table> --}}
                    

                </div>
                <!--Middle Part End-->
               

            </div>
        </div>
        <!-- //Main Container -->
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

    @foreach($orders as $order)
    <div class="modal fade"  id="{{$order->idPhieuDatHang}}" tabindex="1" role="dialog">
            <div class="modal-dialog modal-dialog2" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" id="closemodal" data-dismiss="modal" aria-label="Close"><span class="ti-close" aria-hidden="true"></span></button>
                    </div>
                    <div style=" height: auto;min-height: auto;" class="modal-body">
                        <div class="container">
                            <article class="card">

                                <div  class="card-body">
                                    @if($order->trangthaidathang->idTrangThai == 1)
                                    <div style="display: flex;
                                            align-content: stretch;
                                            justify-content: space-between;
                                            align-items: center">
                                        <h4>Thông tin chi tiết của đơn hàng ID: #{{$order->idPhieuDatHang}}</h4> 
                                        <a href="javascript:void(0)" onclick="cancelOrder({{$order->idPhieuDatHang}})" class="btn btn-warning" data-abc="true"> <i class="fas fa-times"></i> Hủy đơn hàng</a>
                                        </div>
                                    @else
                                    <h4>Thông tin chi tiết của đơn hàng ID: #{{$order->idPhieuDatHang}}</h4>
                                    @endif
                                  
                                <article class="card">
                                    <div class="card-body row">
                                        <?php
                                                        $s3 = $order->created_at;
                                                        $dt3 = new DateTime($s3);
                                                        $day3 = $dt3->format('d');
                                                        $month3 = $dt3->format('m');
                                                        $year3 = $dt3->format('Y');
                                                        $hour3 = $dt3->format('H:m:s');

                                                    ?>
                                        <div class="col"> <strong>Thời gian bạn đặt hàng:</strong> <br>Ngày {{$day3}}-{{$month3}}-{{$year3}} {{ $hour3}} </div>
                                        @if($order->idNhanVien!=null)
                                        <div class="col"> <strong>Giao bởi:</strong> <br> {{$order->nhanvien->HoTen}}, | <i class="fa fa-phone"></i> {{$order->nhanvien->SoDienThoai}} </div>
                                        @else
                                        <div class="col"> <strong>Giao bởi:</strong> <br> Chưa xác định, | <i class="fa fa-phone"></i> +xxx.xxx.xxx </div>
                                        @endif
                                        <div class="col"> <strong>Trang thái:</strong> <br> {{$order->trangthaidathang->TenTrangThai}} </div>
                                        <div class="col"> <strong>Theo dõi #:</strong> <br> {{$order->idPhieuDatHang}} </div>
                                    </div>
                                </article>
                                @if($order->trangthaidathang->idTrangThai == 1)
                                <div class="track">
                                    <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Chờ xác nhận</span> </div>
                                    <div class="step"> <span class="icon"> <i class="fa fa-user"></i> </span> <span class="text">Duyệt đơn hàng</span> </div>
                                    <div class="step "> <span class="icon"> <i class="fa fa-truck"></i> </span> <span class="text">Đang vận chuyển </span> </div>
                                    <div class="step"> <span class="icon"> <i class="fa fa-box"></i> </span> <span class="text">Giao hàng thành công</span> </div>
                                </div>
                                @elseif($order->trangthaidathang->idTrangThai == 2)
                                <div class="track">
                                    <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Chờ xác nhận</span> </div>
                                    <div class="step active"> <span class="icon"> <i class="fa fa-user"></i> </span> <span class="text">Duyệt đơn hàng</span> </div>
                                    <div class="step "> <span class="icon"> <i class="fa fa-truck"></i> </span> <span class="text">Đang vận chuyển </span> </div>
                                    <div class="step"> <span class="icon"> <i class="fa fa-box"></i> </span> <span class="text">Giao hàng thành công</span> </div>
                                </div>
                                @elseif($order->trangthaidathang->idTrangThai == 3)
                                <div class="track">
                                    <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Chờ xác nhận</span> </div>
                                    <div class="step active"> <span class="icon"> <i class="fa fa-user"></i> </span> <span class="text">Duyệt đơn hàng</span> </div>
                                    <div class="step active"> <span class="icon"> <i class="fa fa-truck"></i> </span> <span class="text">Đang vận chuyển </span> </div>
                                    <div class="step"> <span class="icon"> <i class="fa fa-box"></i> </span> <span class="text">Giao hàng thành công</span> </div>
                                </div>
                                @else
                                <div class="track">
                                    <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Chờ xác nhận</span> </div>
                                    <div class="step active"> <span class="icon"> <i class="fa fa-user"></i> </span> <span class="text">Duyệt đơn hàng</span> </div>
                                    <div class="step active"> <span class="icon"> <i class="fa fa-truck"></i> </span> <span class="text">Đang vận chuyển </span> </div>
                                    <div class="step active"> <span class="icon"> <i class="fa fa-box"></i> </span> <span class="text">Giao hàng thành công</span> </div>
                                </div>
                                @endif


                            <hr>
                            <ul class="row">
                               
                                @foreach($order->chitietphieudathang as $sp )
                                <li class="col-md-4">
                                    <figure class="itemside mb-3">
                                        <div class="aside"><img src="{{asset('public/frontend/images/product')}}/{{$sp->sanpham->HinhAnh}}" class="img-sm border"></div>
                                    <figcaption class="info align-self-center">
                                        <p class="title">{{$sp->sanpham->TenSanPham}}<br></p> <span class="text-muted">{{number_format($sp->sanpham->Gia,0,",",".")}} VNĐ x{{$sp->SoLuong}} sản phẩm</span>
                                           
                                    </figcaption>
                                    </figure>
                                </li>
                                @endforeach
                            </ul>
                                 <hr>
                                <h6 style="color: red; float: right;">Tổng đơn: {{number_format($order->TongTien,0,",",".")}} VNĐ</h6>
                                
                                <a href="{{route('order-history')}}" class="btn btn-warning" data-abc="true"> <i class="fa fa-chevron-left"></i> Quay về </a>
                                </div>
                        </article>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    @endforeach
    <!-- Modal end -->


@endsection