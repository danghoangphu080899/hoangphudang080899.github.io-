
            <form action="{{route('edit_cart')}}" name="frmEditCart" id="frmEditCart" method="post" >
                        {{ csrf_field() }}  
            <div class="row">
                <div class="col-12 ">
                    <!-- Shopping Summery -->
                       
                    <table class="table shopping-summery table-responsive table-hover">
                        <thead>
                            <tr class="main-hading">
                                <th>Sản phẩm</th>
                                <th>Tên </th>
                                <th class="text-center">Giá</th>
                                <th class="text-center">Số lượng</th>
                                <th class="text-center">Tổng tiền</th> 
                                <th class="text-center"><i class="ti-trash remove-icon"></i></th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(Session('Cart')!=null)
                                         @foreach(Session('Cart')->products as $item)  
                            <tr>
                                <td class="image" data-title="No"><img src="{{asset('public/frontend/images/product')}}/{{$item['productInfo']->HinhAnh}}" alt="#"></td>
                                <td class="product-des" data-title="Description">
                                    <p class="product-name"><a href="{{route('detail_product',[$item['productInfo']->idSanPham])}}">{{$item['productInfo']->TenSanPham}}</a></p>
                                   
                                </td>
                                <td class="price" data-title="Price"><span>{{$item['productInfo']->Gia}} </span></td>
                                <td class="qty" data-title="Qty"><!-- Input Order -->
                                    <div class="input-group">
                                        <div class="button minus">
                                            <button type="button" class="btn btn-primary btn-number" disabled="disabled" data-type="minus" data-field="SoLuong[{{$item['productInfo']->idSanPham}}]">
                                                <i class="ti-minus"></i>
                                            </button>
                                        </div>
                                        <input type="text" id="quanty-item-{{$item['productInfo']->idSanPham}}" name="SoLuong[{{$item['productInfo']->idSanPham}}]"  value="{{$item['quanty']}}"  class="input-number"  data-min="1" data-max="{{$item['productInfo']->SoLuongHang}}" >
                                        <div class="button plus">
                                            <button type="button" class="btn btn-primary btn-number" data-type="plus" data-field="SoLuong[{{$item['productInfo']->idSanPham}}]">
                                                <i class="ti-plus"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <!--/ End Input Order -->
                                </td>
                                <td class="total-amount" data-title="Total"><span>{{$item['price']}}</span></td>
                                <td class="action" data-title="Remove"><a onclick="RemoveListCart({{$item['productInfo']->idSanPham}})" href="javascript:void(0)"><i class="ti-trash remove-icon"></i></a></td>
                                <input type="hidden" name="idSanPham[]" value="{{$item['productInfo']->idSanPham}}">

                            </tr>
                            @endforeach
                                            @else
                                            <tr>

                                                <td colspan="6">Không có sản phẩm nào</td>
                                            </tr>
                                            @endif
                        </tbody>
                    </table>
                    <!--/ End Shopping Summery -->
                
                </div>
            </div>
        </form>
            <div class="row">
                <div class="col-12">
                    <!-- Total Amount -->
                    <div class="total-amount">
                        <div class="row">
                            <div class="col-lg-8 col-md-5 col-12">
                                <div class="left">
                                    
                                        <div class="button4">
                                        <a href="javascript:void(0)" onclick="submitcart()" class="btn">Cập nhật giỏ hàng</a>
                                        </div>
                                       <div class="coupon"> 
                                        <form action="{{route('check_coupon')}}" class="check-coupon" method="post">
                                             {{ csrf_field() }} 
                                             <div>
                                                <input class="test" name="Coupon" placeholder="Mã giảm giá">

                                            <button class="btn " type="submit">Áp dụng</button> 
                                             </div>
                                            
                                            <span style="display: none;" class="error3" >
                                                          <i class=" fa fa-exclamation-triangle"></i>
                                                      </span>

                                        </form>
                                            
                                        
                                    </div>
                                    <div class="checkbox">
                                        {{-- <label class="checkbox-inline" for="2"><input name="news" id="2" type="checkbox"> Vận chuyển (+10.000d)</label> --}}
                                        <a href="javascript:void()" onclick="unset_coupon()"><p>Xóa tất cả mã giảm giá</p></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-7 col-12">
                                <div class="right">
                                    <ul>
                                        @if(Session('Cart')!=null)
                                        <li><b>Tổng cộng</b><span>{{number_format(Session('Cart')->totalPrice,0,",",".")}} VNĐ</span></li>
                                        <li><b>Vận chuyển</b><span>10.000đ</span></li>
                                        <li>
                                         @if(Session::get('coupon'))
                                                @foreach(Session::get('coupon') as $key => $cou)
                                                @if($cou['LoaiGiamGia']==2)
                                                <b> Mã giảm: <span>{{$cou['GiaTri']}}%</span></b>
                                                <p>
                                                    @php
                                                    $total_coupon = (Session('Cart')->totalPrice*$cou['GiaTri'])/100;
                                                   echo '<li><b>Tổng tiền được giảm:<span>'.number_format(min($total_coupon,Session('Cart')->totalPrice),0,",",".")  .'đ</span></b></li>';
                                                   echo '<li class="last">Tiền thanh toán: <span>'.number_format(max(Session('Cart')->totalPrice+10000-$total_coupon,0),0,",",".") .' VNĐ</span></li>';
                                                    @endphp
                                                   
                                                </p>
                                                
                                                 @elseif($cou['LoaiGiamGia']==1)
                                            <b> Mã giảm: <span>{{number_format($cou['GiaTri'],0,",",".")}}đ</span></b>
                                                <p>
                                                    @php
                                                    $total_coupon = $cou['GiaTri'];
                                                    echo '<li><b>Tổng tiền được giảm:<span>'.number_format(min($total_coupon,Session('Cart')->totalPrice),0,",",".")  .'đ</span></b></li>';
                                                    echo '<li class="last">Tiền thanh toán: <span>'.number_format(max(Session('Cart')->totalPrice+10000-$total_coupon,0),0,",",".") .' VNĐ</span></li>';
                                                    @endphp
                                                                                                  </p>
                                                
                                                @endif
                                                 @endforeach
                                        @else
                                        <li class="last">Tiền thanh toán: <span>{{number_format(Session('Cart')->totalPrice+10000,0,",",".") }} VNĐ</span></li>
                                        
                                        @endif


                                        </li>
                                        {{-- <li><b>You Save</b><span>$20.00</span></li> --}}
                                        {{-- <li class="last">Tiền thanh toán<span>{{number_format(Session('Cart')->totalPrice+10000,0,",",".")}} VNĐ</span></li> --}}
                                        @else
                                        <li><b>Tổng cộng</b><span>0 VNĐ</span></li>
                                        <li><b>Vận chuyển</b><span>10.000đ</span></li>
                                        {{-- <li><b>You Save</b><span>$20.00</span></li> --}}
                                        <li class="last">Tiền thanh toán<span>0 VNĐ</span></li>
                                        @endif
                                    </ul>
                                    <div class="button5">
                                        <a href="{{route('checkout')}}" class="btn">Thanh toán</a>
                                        <a href="{{route('trangchu')}}" class="btn">Tiếp tục mua sắm</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/ End Total Amount -->
                </div>
            </div>
       
    