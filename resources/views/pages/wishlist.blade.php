@extends('welcome')
@section('wishlist')
        <!-- End Offset Wrapper -->
    <!-- Breadcrumbs -->
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="bread-inner">
                        <ul class="bread-list">
                            <li><a href="index1.html">Trang chủ<i class="ti-arrow-right"></i></a></li>
                            <li class="active"><a href="blog-single.html">yêu thích</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumbs -->
        <!-- wishlist-area start -->
        <div class="wishlist-area ptb--120 bg__white">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="wishlist-content">
                            <div class="wishlist-ajax">
                            <form action="#">
                                <div class="wishlist-table table-responsive table-hover">
                                    <table>
                                        <thead>
                                            <tr>
                                                <th class="product-remove"><span class="nobr">Xóa</span></th>
                                                <th class="product-thumbnail">Hình ảnh</th>
                                                <th class="product-name"><span class="nbr">Tên sản phẩm</span></th>
                                                <th class="product-price"><span class="nobr"> Giá gốc </span></th>
                                                <th class="product-stock-stauts"><span class="nobr"> Tình trạng </span></th>
                                                <th class="product-add-to-cart"><span class="nobr">Thêm vào giỏ hàng</span></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if(count($wish)>0)
                                            @foreach($wish as $item)
                                            <tr>
                                                <td class="product-remove"><a onclick="RemoveWishlist({{$item->sanpham->idSanPham}})" href="javascript:void(0)">x</a></td>
                                                <td class="product-thumbnail"><a href="#"><img src="{{asset('public/frontend/images/product')}}/{{$item->sanpham->HinhAnh}}" alt="" /></a></td>
                                                <td class="product-name"><a href="#">{{$item->sanpham->TenSanPham}}</a></td>
                                                <td class="product-price"><span class="amount">{{$item->sanpham->Gia}}</span></td>
                                                @if($item->sanpham->SoLuongHang >0)
                                                <td class="product-stock-status"><span class="wishlist-in-stock">Trong kho</span></td>
                                                <td class="product-add-to-cart"><a onclick="AddCart({{$item->sanpham->idSanPham}})" href="javascript:void(0)"> Thêm giỏ hàng</a></td>
                                                @else
                                                <td class="product-stock-status"><span class="wishlist-in-stock">Hết hàng</span></td>
                                                <td class="product-add-to-cart"><a href="javascript:void(0)"> Tạm hết hàng</a></td>
                                                @endif
                                            </tr>
                                            @endforeach
                                            @else
                                            <tr>

                                                <td colspan="6">Không có sản phẩm nào</td>
                                            </tr>
                                            @endif
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td colspan="6">
                                                    <div class="wishlist-share">
                                                        <h4 class="wishlist-share-title">Share on:</h4>
                                                        <div class="social-icon">
                                                            <ul>
                                                            <li><a href="#"><i class="ti-facebook"></i></a></li>
                                <li><a href="#"><i class="ti-twitter"></i></a></li>
                                <li><a href="#"><i class="ti-flickr"></i></a></li>
                                <li><a href="#"><i class="ti-instagram"></i></a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>  
                            </form>
                        </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- wishlist-area end -->
        <!-- Start Footer Area -->
@endsection