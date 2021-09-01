@extends('admin.index')
@section('allOrder')

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Danh sách đơn hàng</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
              <li class="breadcrumb-item active">Danh sách đơn hàng</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">

            <div class="card">
              
              
                                 
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <div name="csrf-token" content="{{ csrf_token() }}">
                  <thead style="background-color:#4253d7!important;font-family: Montserrat-Medium;
    font-size: 17px;
    color: #fff;
    line-height: 1.4;
    border-radius: 10px;">
                  <tr>
                    <th>ID</th>
                    <th>Tên khách hàng</th>
                    <th>Tổng tiền</th>
                    <th>Tình trạng</th>
                    <th>Phương thức thanh toán</th>
                    <th>Nhân viên duyệt đơn</th>
                    <th>Hành động</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($orders as $all)
                    
                  <tr id="del_ajax{{$all->idPhieuDatHang}}">
                    
                    <td id="{{$all->idPhieuDatHang}}">{{$all->idPhieuDatHang}}</td>
                    <td><b>{{$all->khachhang->HoTen}}</b></td> 
                    <td>{{number_format($all->TongTien,0,",",".")}} VNĐ</td> 
                    
                    
                      {{-- <img style="width: 100px;height: 100px;" src="../public/frontend/images/product/{{$all->HinhAnh}}"> --}}
                      
                    @if($all->trangthaidathang->idTrangThai==1)
                    <td> <span class="badge badge-secondary">Chờ duyệt</span></td>
                    @elseif($all->trangthaidathang->idTrangThai==2)
                    <td> <span class="badge badge-info">Đã duyệt</span></td>
                    @elseif($all->trangthaidathang->idTrangThai==3)
                    <td> <span class="badge badge-warning">Đang vận chuyển</span></td>
                    @elseif($all->trangthaidathang->idTrangThai==4)
                    <td> <span class="badge badge-success">Giao hàng thành công</span></td>
                    @elseif($all->trangthaidathang->idTrangThai==5)
                    <td> <span class="badge badge-danger">Giao hàng không thành công</span></td>
                    @else
                    <td> <span class="badge badge-dark">Đã ẩn</span></td>
                    @endif   
                    </td>
                    @if($all->phuongthucthanhtoan->idPhuongThucThanhToan == 1)
                     <td> <span class="badge badge-light">{{$all->phuongthucthanhtoan->TenPhuongThucThanhToan}}</span></td>
                    @else
                     <td> <span class="badge badge-warning">{{$all->phuongthucthanhtoan->TenPhuongThucThanhToan}}</span><ion-icon name="logo-paypal"></ion-icon></td>
                    @endif
                   
                    @if($all->idNhanVien)
                    <td><b>{{$all->nhanvien->HoTen}}</b></td>
                    @else 
                    <td><i style="">Chưa được duyệt</i></td>
                    @endif
                   
                    <td class="table-action text-center mr-auto">
                        <a href=""   data-toggle="modal" data-target="#approve_order_{{$all->idPhieuDatHang}}"><i class="align-middle" data-feather="edit-2"></i></a>
                        @if($all->trangthaidathang->idTrangThai==5 || $all->trangthaidathang->idTrangThai==4)
                        <a href="javascript:void" onclick="hidden_order({{$all->idPhieuDatHang}})"><i class="align-middle" data-feather="eye-off"></i></a>
                        @endif
                       
                      </td>
                  
                  </tr>
                  
                  @endforeach
                  </tbody>
                 </div>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
  @foreach($orders as $mess)
 <div  class="modal fade" id="approve_order_{{$mess->idPhieuDatHang}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Kiểm tra thông tin đơn hàng</h5> <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
        </div>
        <div class="modal-body">
          <!-- Multi step form --> 
          <section class="multi_step_form">  
            <form action="{{route('postedit_order',[$mess->idPhieuDatHang])}}" name="frm" method="post"  class="msform form-check{{$mess->idPhieuDatHang}}" enctype="multipart/form-data"> 
               {{ csrf_field() }}


              <!-- progressbar -->
              <ul id="progressbar">
                <li class="active">Thông tin đơn hàng</li>  
                <li>Danh sách sản phẩm của đơn hàng</li> 
                <li>Xác nhận</li>
              </ul>
              <!-- fieldsets -->
              <fieldset>


            <section class="shop login section">

                
                     
                  
                        <div class="login-form form-control">
                            <h2>Kiểm tra thông tin đơn hàng</h2>
                            <p>Vui lòng kiểm tra kỉ thông tin trước khi chuyển qua bước tiếp theo</p>
                            <!-- Form -->

                           
                                <div class="row ">
                                    <div class="form-row col-md-12">

                                        <div class="form-group col-md-6">
                                            <label class="label-bold">Tên khách hàng: <span>*</span></label>
                                      <input disabled="" type="text" value="{{$mess->khachhang->HoTen}}" placeholder="...">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="label-bold">Tổng giá trị đơn hàng: <span>*</span></label>
                                     <input disabled="" type="text" value="{{number_format($mess->TongTien,0,",",".")}} VND" placeholder="...">
                                        </div>
                                    </div>

                                    <div class="form-row col-md-12">
                                      
                                      <div class="form-group col-md-6">
                                        <label class="label-bold">Nhân viên duyệt đơn: <span>*</span></label>
                                        
                                        @if($mess->idNhanVien)
               <input disabled="" type="text" value="{{$mess->nhanvien->HoTen}}" placeholder="...">
                    @else 
                    <input disabled="" type="text" value="Đơn hàng chưa được duyệt" placeholder="...">
                   
                    @endif
                                      </div>
                                      <div class="form-group col-md-6">
                                        <label class="label-bold">Phương thức thanh toán: <span>*</span></label>
                                        @if($all->phuongthucthanhtoan->idPhuongThucThanhToan == 1)
                                         <input disabled="" value="{{$mess->phuongthucthanhtoan->TenPhuongThucThanhToan}}">
                                        @else
                                        <input disabled="" value="{{$mess->phuongthucthanhtoan->TenPhuongThucThanhToan}}"></span><ion-icon name="logo-paypal"></ion-icon>
                                        @endif
                                       {{--  <input disabled="" type="text" value="" placeholder="..."> --}}
                                      </div>
                                            
                                    </div>
                                    
                                    <div class="form-group col-md-12">
                                            <label class="label-bold">Địa chỉ giao hàng: <span>*</span></label>
                                            <textarea disabled="" class="form-control" rows="3" placeholder="Enter ..." >{{$mess->DiaChiGiaoHang}}</textarea>
                                            {{-- <script>

                                             $('#summernote_event_{{$mess->idPhieuDatHang}}').summernote({
                                               
                                                height: 300,

                                               });
                                             $('#summernote_event_{{$mess->idPhieuDatHang}}').summernote('disable');
                                              
                                            </script> --}}
                                    </div>
                                    

                                    <div class="form-row col-md-12">
                                        
                                        <div class="form-group col-md-6">
                                            <label class="label-bold">Thời gian đặt hàng: <span>*</span></label>
                                            <input disabled="" value="{{$mess->created_at}}" type="datetime"  placeholder="start date..." >
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="label-bold">Cập nhật gần nhất: <span>*</span></label>
                                            <input disabled="" value="{{$mess->updated_at}}" type="datetime"  placeholder="finish date..." >
                                        </div>
                                    </div>
                                    
                                     
                                    
                                </div>
                            
                            <!--/ End Form -->
                        </div>
                    

            
        </section>
<button type="button" class="action-button previous_button">Quay lại</button>
                <button  type="button" class="next4{{$mess->idPhieuDatHang}} action-button">Tiếp tục</button>  

          

                
              </fieldset>
              <fieldset>
                <section  class="shop login section">
                <div class="login-form form-control">
                            <h2>Thay đổi trạng thái sự kiện</h2>
                            <p>Vui lòng xem kỉ thông tin ở trang trước, trước khi chấp thuận</p>
                            <!-- Form -->
                            
                            
                            <div class="row">

                              <div class="form-control ">
                                <div class="col-12 ">
                    <!-- Shopping Summery -->
                       
                    <table class="table shopping-summery table-responsive table-hover ">
                        <thead>
                            <tr class="main-hading">
                                <th style="width: 20%" >Sản phẩm</th>
                                <th style="width: 30%">Tên </th>
                                <th style="width: 20%" class="text-center">Giá</th>
                                <th style="width: 10%" class="text-center">Số lượng</th>
                                <th style="width: 20%" class="text-center">Tổng tiền</th> 
                            </tr>
                        </thead>
                        <tbody>
                          
                                         @foreach($mess->chitietphieudathang as $item)  
                            <tr>
                                <td class="image" data-title="No"><img src="{{asset('public/frontend/images/product')}}/{{$item->sanpham->HinhAnh}}" alt="#"></td>
                                <td class="product-des" data-title="Description">
                                    <p class="product-name"><a href="">{{$item->sanpham->TenSanPham}}</a></p>
                                   
                                </td>
                                <td class="price" data-title="Price"><span>{{number_format($item->GiaDatHang,0,",",".")}}đ </span></td>
                                <td class="qty" data-title="Qty"><!-- Input Order -->
                                    <div class="input-group">
                                        <input disabled="" type="text" id="quanty-item-{{$item->idSanPham}}"  value="{{$item->SoLuong}}"  class="input-number"   >
                                    </div>
                                    
                                    <!--/ End Input Order -->
                                </td>

                                <td class="total-amount" data-title="Total"><span>{{number_format($item->GiaDatHang*$item->SoLuong,0,",",".")}}đ</span></td>

                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                    <!--/ End Shopping Summery -->
                
                </div>







                            </div>
                          </div>
                            
                            <!--/ End Form -->
                        </div>
                      </section>
                <button type="button" class="action-button previous4{{$mess->idPhieuDatHang}} previous_button">Quay lại</button>
                <button onclick="checkselect_order({{$mess->idTrangThai}} , {{$mess->idPhieuDatHang}})" type="button" class="next4{{$mess->idPhieuDatHang}} action-button button-test">Tiếp tục</button>  
              </fieldset>  
              <fieldset>
                <h3>Xác nhận</h3>
                <h6>Vui lòng kiểm tra thông tin thật kĩ trước khi xác nhận</h6> 
                 
                  <div class="form-group"> 
                    <div class=" text-center col-md-12">
                                        <label class="label-bold">Trạng thái của đơn hàng : </label>
                                        <div class="form-group text-center">
                                        <select id="select_status_{{$mess->idPhieuDatHang}}" name="idTrangThai"  class="form-control mb-3 form-control-sm w-50 m-auto">
                                          @foreach($status as $tt)
                                            <option value="{{$tt->idTrangThai}}">{{$tt->TenTrangThai}}</option>
                                          @endforeach 
                                        </select>


                                        
                                        

                                    </div>
                                      </div>
                  <div class="custom-control custom-checkbox">
                          <input class="custom-control-input custom-control-input-danger" type="checkbox" name="check" id="qwe{{$mess->idPhieuDatHang}}" >
                          <label for="qwe{{$mess->idPhieuDatHang}}" class="custom-control-label">Đã kiểm tra kỉ thông tin</label>
                        </div>
                        <span style="display: none;" class="error2-check" >
                                                          <i class=" fa fa-exclamation-triangle"></i>
                                                      </span>
                 

                </div>
                 

                {{-- <input type="hidden" name="mess_current" value="{{$mess->event_message_id}}">
 --}}                

                
                <button type="button" class="action-button previous4{{$mess->idPhieuDatHang}} previous_button">Quay lại</button> 
                <a   class="action-button"><button class="action-button " type="submit">Xác nhận</button></a> 
              </fieldset>  
            </form>  
          </section> 
        </div>
      </div>
    </div>
  </div>
  <script type="text/javascript">
    
$(document).ready(function() {
    
    $(".form-check{{$mess->idPhieuDatHang}}").validate({
        

      rules: {

       
        mess_title: {
          required: true,
          minlength: 6,
          maxlength: 35
        },
        mess_content: {
          required: true,
          minlength: 6,
          maxlength: 50
        },
        check: {
          required: true
        }

        



      },
      messages: {

        
        mess_title: {
           required: "Vui lòng nhập tiêu đề thông báo",
           minlength: "Chiều dài tối thiểu 6 kí tự",
          maxlength: "Chiều dài tối đa là 35 kí tự"
        },
        mess_content: {
           required: "Vui lòng nhập nội dung thông báo",
          minlength: "Chiều dài tối thiểu 6 kí tự",
          maxlength: "Chiều dài tối đa là 50 kí tự"
        },
        check:{
          required: "Vui lòng xác nhận"
        }



      },
      errorClass: 'invalid',
        errorElement: 'span',
  
        errorPlacement: function(error, element) {
            error.insertAfter(element.parent().next('span').children());
        },
        highlight: function(element) {
            $(element).parent().next('span').show();
        },
        unhighlight: function(element) {
            $(element).parent().next('span').hide();
        }
    });


     
});


/* Fundraising Grader
*
* Generic Copyright, yadda yadd yadda
*
* Plug-ins: jQuery Validate, jQuery 
* Easing
*/

$(document).ready(function() {
    var current_fs, next_fs, previous_fs;
    var left, opacity, scale;
    var animating;
    $(".form-check{{$mess->idPhieuDatHang}}").validate({
        errorClass: 'invalid',
        errorElement: 'span',
        errorPlacement: function(error, element) {
            error.insertAfter(element.parent().next('span').children());
        },
        highlight: function(element) {
            $(element).parent().next('span').show();
        },
        unhighlight: function(element) {
            $(element).parent().next('span').hide();
        }
    });
    $(".next4{{$mess->idPhieuDatHang}}").click(function() {
        $(".form-check{{$mess->idPhieuDatHang}}").validate({
            errorClass: 'invalid',
            errorElement: 'span',
            errorPlacement: function(error, element) {
                error.insertAfter(element.parent().next('span').children());
            },
            highlight: function(element) {
                $(element).parent().next('span').show();
            },
            unhighlight: function(element) {
                $(element).parent().next('span').hide();
            }
        });
        if ((!$('.form-check{{$mess->idPhieuDatHang}}').valid())) {
            return true;



        }
        if (animating) return false;
            animating = true;
 
            current_fs = $(this).parent();
            next_fs = $(this).parent().next();

            //activate next step on progressbar using the index of next_fs
            $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");
            

            //show the next fieldset
            next_fs.show();
            //hide the current fieldset with style
            current_fs.animate({
                opacity: 0
            }, {
                step: function (now, mx) {
                    //as the opacity of current_fs reduces to 0 - stored in "now"
                    //1. scale current_fs down to 80%
                    scale = 1 - (1 - now) * 0.2;
                    //2. bring next_fs from the right(50%)
                    left = (now * 50) + "%";
                    //3. increase opacity of next_fs to 1 as it moves in
                    opacity = 1 - now;
                    current_fs.css({
                        'transform': 'scale(' + scale + ')',
                        'position': 'relative'
                    });
                    next_fs.css({
                        'left': left,
                        'opacity': opacity
                    });
                },
                duration: 800,
                complete: function () {
                    current_fs.hide();
                    animating = false;
                },
                //this comes from the custom easing plugin
                easing: 'easeInOutBack'
            });
        });


    $(".previous4{{$mess->idPhieuDatHang}}").click(function() {
        if (animating) return false;
            animating = true;

            current_fs = $(this).parent();
            previous_fs = $(this).parent().prev();

            //de-activate current step on progressbar
            $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");

            //show the previous fieldset
            previous_fs.show();
            //hide the current fieldset with style
            current_fs.animate({
                opacity: 0
            }, {
                step: function (now, mx) {
                    //as the opacity of current_fs reduces to 0 - stored in "now"
                    //1. scale previous_fs from 80% to 100%
                    scale = 0.8 + (1 - now) * 0.2;
                    //2. take current_fs to the right(50%) - from 0%
                    left = ((1 - now) * 50) + "%";
                    //3. increase opacity of previous_fs to 1 as it moves in
                    opacity = 1 - now;
                    current_fs.css({
                        'left': left
                    });
                    previous_fs.css({
                        'transform': 'scale(' + scale + ')',
                        'opacity': opacity
                    });
                },
                duration: 800,
                complete: function () {
                    current_fs.hide();
                    animating = false;
                },
                //this comes from the custom easing plugin
                easing: 'easeInOutBack'
            });
    });




});
  </script>
@endforeach

  @endsection