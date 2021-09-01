
@extends('welcome')
@section('forget-pass')

        <!--/ End Header -->
    
        <!-- Breadcrumbs -->
        <div class="breadcrumbs">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="bread-inner">
                            <ul class="bread-list">
                                <li><a href="index.html">Trang chủ<i class="ti-arrow-right"></i></a></li>
                                <li class="active"><a href="{{route('forget_pass')}}">Quên mật khẩu</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Breadcrumbs -->
                
        <!-- Shop Login -->
        <section class="shop login section">
            <div class="container">
                <div class="row"> 
                    <div class="col-lg-8 offset-lg-2 col-12">
                        <div class="login-form">
                            <h2>Quên mật khẩu</h2>
                            <p>Vui lòng nhập địa chỉ email của bạn</p>
                            <!-- Form -->
                            <?php 
                                    $mess=Session::get('mess');
                                    if($mess){
                                        echo '<div class="alert alert-danger" role="alert">'.$mess.'</div>';
                                         Session::put('mess',null);
                                }else                            
                                 ?>
                                 @if($errors->any())
                                    <div class="alert alert-danger">
                                        @foreach($errors->all() as $err)
                                            <li>{{$err}}</li>
                                        @endforeach
                                     </div>
                                @endif
                            <form action="{{route('recover_pass')}}" class="form" method="post">
                                    {{ csrf_field() }}
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label>Nhập email: <span>*</span></label>
                                            <input type="email" name="email" placeholder="" required="required">
                                        </div>
                                    </div>
                                    <div class="list-login col-12 ">
                                        <div class="form-group login-btn">
                                            <button class="btn" type="submit">Gửi</button> 
                                        </div>
                                        <a class="a-back" href="{{route('login')}}"><i class="ti ti-angle-left"></i> Quay lại</a>
                                       
                                    </div>
                                </div>
                            </form>
                            <!--/ End Form -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--/ End Login -->
        
        
@endsection