@if(Session::has("Cart") != null)
                                <a href="#" class="single-icon"><i class="ti-bag"></i> <span class="total-count">{{Session('Cart')->totalQuanty}}</span></a>
                                <!-- Shopping Item -->
                                <div class="shopping-item">
                                    
 
                                     
                                    <div class="dropdown-cart-header">
                                        <span>{{Session('Cart')->totalQuanty}} Items</span>
                                        <a href="{{route('mycart')}}">Giỏ hàng</a>
                                    </div>
                                    <ul class="shopping-list">
                                        @foreach(Session('Cart')->products as $item) 
                                        <li>
                                            <a onclick="RemoveCart({{$item['productInfo']->idSanPham}})" href="javascript:void(0)" class="remove" title="Remove this item"><i class="fa fa-remove"></i></a>
                                            <a class="cart-img" href="{{route('detail_product',[$item['productInfo']->idSanPham])}}"><img src="{{asset("public/frontend/images/product")}}/{{$item['productInfo']->HinhAnh}}" alt="#"></a>
                                            <h4><a href="{{route('detail_product',[$item['productInfo']->idSanPham])}}">{{$item['productInfo']->TenSanPham}}</a></h4>
                                            <p class="quantity">{{$item['quanty']}} - <span class="amount">{{number_format($item['productInfo']->Gia,0,",",".")}} VND</span></p>
                                        </li>
                                        @endforeach
                                        
                                    </ul>
                                    <div class="bottom">
                                        <div class="total">
                                            <span>Tổng cộng</span>
                                            <span class="total-amount">{{number_format(Session('Cart')->totalPrice,0,",",".")}} VND</span>
                                        </div>
                                        <a href="{{route('checkout')}}" class="btn animate">Thanh toán</a>
                                    </div>
                                    @else
                                    <a href="#" class="single-icon"><i class="ti-bag"></i> <span class="total-count">0</span></a>
                                    <div class="shopping-item">
                                        <div class="dropdown-cart-header">
                                        <span>0 Items</span>
                                        <a href="">Giỏ hàng</a>
                                        </div>
                                    </div>
                                    @endif