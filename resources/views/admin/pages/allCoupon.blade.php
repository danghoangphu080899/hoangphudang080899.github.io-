@extends('admin.index')
@section('allCoupon')

   <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Quản lí giảm giá</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
              <li class="breadcrumb-item active">Mã giảm giá</li>
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
              <div class="card-header">
                <h3 class="card-title">Danh sách tất cả các mã giảm giá</h3>
                <div class="  float-right "> <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add_coupon"> Thêm mã giảm giá mới </button> </div> 
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <div name="csrf-token" content="{{ csrf_token() }}">
                  <thead style="background-color:#FFED86;color: black;">
                  <tr>
                    <th>ID</th>
                    <th>Tên giảm giá</th>
                    <th>Mã giảm giá</th>
                    <th>Số lượng mã</th>
                    <th>Loại giảm giá</th>
                    <th>Giá trị</th>
                    <th>Hành động</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($all_coupon as $all)
                    
                  <tr>
                    
                    <td >{{$all->idGiamGia}}</td>
                    <td>{{$all->TenGiamGia}}</td>
                    <td><b>{{$all->MaGiamGia}}</b></td>
                    <td>{{$all->SoLuongMa}}</td>
                    @if($all->LoaiGiamGia == 1)
                    <td>Giảm theo tiền</td>
                    <td class="text-danger">{{number_format($all->GiaTriGiamGia,0,",",".")}}đ</td>
                    @else
                    <td>Giảm theo phần trăm</td>
                    <td class="text-danger">{{$all->GiaTriGiamGia}}%</td>
                    @endif

                    
                    <td class="table-action text-center mr-auto">
                        <a href="" title="Xem thông tin" data-toggle="modal" data-target="#edit_coupon{{$all->idGiamGia}}"><i class="align-middle" data-feather="edit-3"></i></a>
                       
                        <a title="Xóa" href="javascript:void" onclick="delete_coupon({{$all->idGiamGia}})"><i class="align-middle" data-feather="trash-2"></i></a>
                        
                       
                      </td>
                  
                  </tr>
                  
                  @endforeach
                  </tbody>
                 
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <div class="form-row col-md-6 ml-sm-1 mb-3 ">
        <button id="btn-check-select" type="button" class="btn btn-sm btn-info btn-check-select"  data-toggle="modal" data-target="#send_coupon">Gửi mã khách hàng</button>
                                        </div>
        
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->

<div class="modal fade" id="add_coupon" tabindex="-1" role="dialog" >
    <div  class="modal-lg modal-dialog " role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Thông tin mã giảm giá mới</h5> <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
        </div>
        <div class="modal-body ">
         <section class="shop login section">
            <form action="{{route('postadd_coupon')}}" name="frm" method="post"  class="msform form-add-coupon" enctype="multipart/form-data"> 
               {{ csrf_field() }}
                        <div class="login-form ">
                            <h2>Thêm mới mã giảm giá</h2>
                            <p>Vui lòng kiểm tra kỉ thông tin trước khi thêm</p>
                            <!-- Form -->
                                <div class="row ">
                                    <div class="form-row col-md-12 ">

                                        <div class="form-row col-md-6 ml-sm-1 mb-3 ">
                                            <label class="label-bold">Tên mã giảm giá: <span>*</span></label>
                                            <div class="input-group">
                                                    <div class="input-group-prepend">
                                                      <span class="input-group-text"><i class="fas fa-keyboard"></i></span>
                                                  </div>
                                                  <input type="text" required="required" name="TenGiamGia" class="form-control float-right"  placeholder="Vui lòng nhập tên giảm giá..." >
                                              </div>
                                              <span style="display: none;" class="error4" >
                                                          <i class=" fa fa-exclamation-triangle"></i>
                                                      </span>
                                        </div>
                                        <div class="form-row col-md-6 ml-sm-1 mb-3 ">
                                            <label class="label-bold">Mã giảm giá: <span>*</span></label>
                                            <div class="input-group">
                                                    <div class="input-group-prepend">
                                                      <span class="input-group-text"><i class="fas fa-keyboard"></i></span>
                                                  </div>
                                                   <input type="text" name="MaGiamGia"  placeholder="Vui lòng nhập mã giảm giá..." class="form-control float-right" >
                                              </div>
                                              <span style="display: none;" class="error4" >
                                                          <i class=" fa fa-exclamation-triangle"></i>
                                                      </span>
                                        </div>
                                        <div class="form-row col-md-6 ml-sm-1 mb-3 ">
                                            <label class="label-bold">Số lượng mã: <span>*</span></label>
                                            <div class="input-group">
                                                    <div class="input-group-prepend">
                                                      <span class="input-group-text"><i class="fas fa-keyboard"></i></span>
                                                  </div>
                                                  <input  type="number" required="required" name="SoLuongMa" class="form-control float-right" placeholder="Vui lòng nhập số lượng mã..." >
                                              </div>
                                              <span style="display: none;" class="error4" >
                                                          <i class=" fa fa-exclamation-triangle"></i>
                                                      </span>
                                        </div>
                                        <div class="form-row col-md-6 ml-sm-1 mb-3 ">
                                            <label class="label-bold">Loại giảm giá: <span>*</span></label>
                                            <div class="input-group">
                                                    <div class="input-group-prepend">
                                                      <span class="input-group-text"><i class="fas fa-keyboard"></i></span>
                                                  </div>
                                                   <select class="custom-select " id="LoaiGiamGia" name="LoaiGiamGia" >
                                                    <option selected="" value="">----Chọn loại giảm giá----</option>
                                                    <option value="1">Giảm giá theo tiền</option>
                                                    <option value="2">Giảm giá theo phần trăm</option>
                                                   </select>
                   
                
                                              </div>
                                              <span style="display: none;" class="error4" >
                                                          <i class=" fa fa-exclamation-triangle"></i>
                                                      </span>
                                        </div>
                                        <div class="form-row col-md-6 ml-sm-1 mb-3 ">
                                            <label class="label-bold">Ngày bắt đầu và kết thúc: <span>*</span></label>
                                            <div class="input-group">
                                                    <div class="input-group-prepend">
                                                      <span class="input-group-text"><i class="fas fa-keyboard"></i></span>
                                                  </div>
                                                  <input  type="text" required="required" name="Ngay" class="form-control float-right" placeholder="Vui lòng chọn ngày bắt đầu..." id="reservationtime_coupon" >
                                              </div>
                                              <span style="display: none;" class="error4" >
                                                          <i class=" fa fa-exclamation-triangle"></i>
                                                      </span>
                                        </div>
                                        
                                     <div class="form-row col-md-6 ml-sm-1 mb-3 ">
                                            <label class="label-bold">Giá trị giảm giá: <span>*</span></label>
                                            <div class="input-group">
                                                    <div class="input-group-prepend">
                                                      <span class="input-group-text"><i class="fas fa-keyboard"></i></span>
                                                  </div>
                                                  <input type="number" id="GiaTri" required="required" name="GiaTri" class="form-control float-right text-danger" placeholder="Vui lòng nhập giá trị giảm giá...">
                                              </div>
                                              <span style="display: none;" class="error4" >
                                                          <i class=" fa fa-exclamation-triangle"></i>
                                                      </span>
                                        </div>
                                    </div>
                                      
                                </div>
                            
                            <!--/ End Form -->
                            <div class="form-group col-md-12 text-center">
                                <button class="btn btn-lg btn-success button-add-coupon" type="submit"><i class="ti ti-save" ></i> Thêm</button>
                                &nbsp;&nbsp;&nbsp;&nbsp;
                                <button class="btn btn-lg btn-info" type="reset"><i class="ti ti-close"></i> Hủy</button>
                            
                      </div>
                        </div>
                         
            </form>
        </section>
      </div>


    </div>
  </div>
</div>
<div class="modal fade" id="send_coupon" tabindex="-1" role="dialog" >
    <div  class="modal-lg modal-dialog " role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Gửi mã giảm giá</h5> <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
        </div>
        <div class="modal-body ">
         <section class="shop login section">
            <form action="{{route('send_coupon')}}" name="frm" method="post"  class="msform form-send-coupon" enctype="multipart/form-data"> 
               {{ csrf_field() }}
                        <div class="login-form ">
                            <h2>Gửi mã giảm giá cho toàn bộ khách hàng</h2>
                            <p>Vui lòng kiểm tra kỉ thông tin trước khi thêm</p>
                            <!-- Form -->
                                <div class="row ">
                                    <div class="form-row col-md-12 ">

                                        <div class="form-row col-md-6 ml-sm-1 mb-3 ">
                                            <label class="label-bold">Tên mã giảm giá: <span>*</span></label>
                                            <div class="input-group ">
                                                   
                                                  <select name="id" id="change_select" class="select ">
                                                    <option selected="" value="">---- Vui lòng chọn mã giảm giá ----</option>
             @foreach($all_coupon as $all)
  <option value="{{$all->idGiamGia}}">{{$all->TenGiamGia}}</option>
    @endforeach
</select>
                                              </div>
                                              <span style="display: none;" class="error1-avatar" >
                                                          <i class=" fa fa-exclamation-triangle"></i>
                                                      </span>
                                        </div>
                                        <div class="form-row col-md-6 ml-sm-1 mb-3 ">
                                            <label class="label-bold">Loại gửi: <span>*</span></label>
                                            <div class="input-group ">
                                                    
                                                  <select name="type" id="type" class="select ">
                                                    <option selected="" value="">---- Vui lòng chọn kiểu gửi ----</option>
                                                        
                                              <option  value="2">Gửi toàn bộ</option>
                                              <option  value="1">Gửi khách hàng vip</option>  
                                              <option   value="0">Gửi khách hàng thường</option>  
                                            </select>
                                              </div>
                                              <span style="display: none;" class="error1-avatar" >
                                                          <i class=" fa fa-exclamation-triangle"></i>
                                                      </span>
                                        </div>
                                       
                                         <div id="insert_send_coupon"  class="form-row check-info">
                                                   {{--  <div style="background-color: #fcb258;font-size: 20px;
                                                    font-weight: 700;" class="col-md-12 text-center">Xem lại thông tin mã giảm giá</div>
                                                    <div class="form-row col-md-6 ml-1">
                                                        <label class="label-normal">ID mã giảm giá:</label>
                                                        <div class="label-bold ml-1">123123123131</div>
                                                    </div>
                                                    <div class="form-row col-md-6 ml-1">
                                                        <label class="label-normal">Tên mã giảm giá:</label>
                                                        <div class="label-bold ml-1">123123123131</div>
                                                    </div>
                                                    <div class="form-row col-md-6  ml-1">
                                                        <label class="label-normal ">Mã giảm giá:</label>
                                                        <div class="label-bold ml-1">123123123131</div>
                                                    </div>
                                                    <div class="form-row col-md-6  ml-1">
                                                        <label class="label-normal">Số lượng mã:</label>
                                                        <div class="label-bold ml-1">123123123131</div>
                                                    </div>
                                                    <div class="form-row col-md-6  ml-1">
                                                        <label class="label-normal">Loại giảm giá:</label>
                                                        <div class="label-bold ml-1">123123123131</div>
                                                    </div>
                                                    <div class="form-row col-md-6  ml-1">
                                                        <label class="label-normal">Giá trị được giảm:</label>
                                                        <div class="label-bold ml-1">123123123131</div>
                                                    </div>
                                                    <div class="form-row col-md-6  ml-1">
                                                        <label class="label-normal">Ngày bắt đầu:</label>
                                                        <div class="label-bold ml-1">123123123131</div>
                                                    </div>
                                                    <div class="form-row col-md-6  ml-1">
                                                        <label class="label-normal">Ngày kết thúc:</label>
                                                        <div class="label-bold ml-1">123123123131</div>
                                                    </div> --}}
                                                    
                                                   

                                                </div>

                                       
                                        
                                      
                                </div>
                            
                            <!--/ End Form -->
                            <br>
                            <div class="form-group col-md-12 text-center">
                                <button class="btn btn-lg btn-success button-send-coupon" type="submit"><i class="ti ti-save" ></i> Gửi</button>
                               
                            
                      </div>
                        </div>
                         
            </form>
        </section>
      </div>


    </div>
  </div>
</div>
@foreach($all_coupon as $all)
<div class="modal fade" id="edit_coupon{{$all->idGiamGia}}" tabindex="-1" role="dialog" >
    <div  class="modal-lg modal-dialog " role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Thông tin mã giảm giá</h5> <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
        </div>
        <div class="modal-body ">
         <section class="shop login section">
            <form action="{{route('postedit_coupon')}}" name="frm" method="post"  class="msform form-edit-coupon{{$all->idGiamGia}}" enctype="multipart/form-data"> 
               {{ csrf_field() }}
                        <div class="login-form ">
                            <h2>Thay đổi thông tin mã giảm giá</h2>
                            <p>Vui lòng kiểm tra kỉ thông tin trước khi thay đổi</p>
                            <!-- Form -->
                                <div class="row ">
                                    <div class="form-row col-md-12 ">

                                        <div class="form-row col-md-6 ml-sm-1 mb-3 ">
                                            <label class="label-bold">Tên mã giảm giá: <span>*</span></label>
                                            <div class="input-group">
                                                    <div class="input-group-prepend">
                                                      <span class="input-group-text"><i class="fas fa-keyboard"></i></span>
                                                  </div>
                                                  <input type="text" required="required" name="TenGiamGia" class="form-control float-right" value="{{$all->TenGiamGia}}"  placeholder="Vui lòng nhập tên giảm giá..." >
                                              </div>
                                              <span style="display: none;" class="error4" >
                                                          <i class=" fa fa-exclamation-triangle"></i>
                                                      </span>
                                        </div>
                                        <div class="form-row col-md-6 ml-sm-1 mb-3 ">
                                            <label class="label-bold">Mã giảm giá: <span>*</span></label>
                                            <div class="input-group">
                                                    <div class="input-group-prepend">
                                                      <span class="input-group-text"><i class="fas fa-keyboard"></i></span>
                                                  </div>
                                                   <input type="text" value="{{$all->MaGiamGia}}" name="MaGiamGia"  placeholder="Vui lòng nhập mã giảm giá..." class="form-control float-right" >
                                              </div>
                                              <span style="display: none;" class="error4" >
                                                          <i class=" fa fa-exclamation-triangle"></i>
                                                      </span>
                                        </div>
                                        <div class="form-row col-md-6 ml-sm-1 mb-3 ">
                                            <label class="label-bold">Số lượng mã: <span>*</span></label>
                                            <div class="input-group">
                                                    <div class="input-group-prepend">
                                                      <span class="input-group-text"><i class="fas fa-keyboard"></i></span>
                                                  </div>
                                                  <input value="{{$all->SoLuongMa}}" type="number" required="required" name="SoLuongMa" class="form-control float-right" placeholder="Vui lòng nhập số lượng mã..." >
                                              </div>
                                              <span style="display: none;" class="error4" >
                                                          <i class=" fa fa-exclamation-triangle"></i>
                                                      </span>
                                        </div>
                                        <div class="form-row col-md-6 ml-sm-1 mb-3 ">
                                            <label class="label-bold">Loại giảm giá: <span>*</span></label>
                                            <div class="input-group">
                                                    <div class="input-group-prepend">
                                                      <span class="input-group-text"><i class="fas fa-keyboard"></i></span>
                                                  </div>
                                                   <select class="custom-select " id="LoaiGiamGia{{$all->idGiamGia}}" name="LoaiGiamGia" >
                                                    @if($all->LoaiGiamGia == 1)
                                                    <option selected="" value="1">Giảm giá theo tiền</option>
                                                    <option value="2">Giảm giá theo phần trăm</option>
                                                    @else
                                                    <option value="1">Giảm giá theo tiền</option>
                                                    <option selected="" value="2">Giảm giá theo phần trăm</option>
                                                    @endif
                                                    
                                                    
                                                   </select>
                   
                
                                              </div>
                                              <span style="display: none;" class="error4" >
                                                          <i class=" fa fa-exclamation-triangle"></i>
                                                      </span>
                                        </div>
                                        <div class="form-row col-md-6 ml-sm-1 mb-3 ">
                                            <label class="label-bold">Ngày bắt đầu và kết thúc: <span>*</span></label>
                                            <div class="input-group">
                                                    <div class="input-group-prepend">
                                                      <span class="input-group-text"><i class="fas fa-keyboard"></i></span>
                                                  </div>
                                                  <input  type="text" required="required" name="Ngay" class="form-control float-right" placeholder="Vui lòng chọn ngày bắt đầu..." id="reservationtime_coupon_edit{{$all->idGiamGia}}" >
                                                  <script type="text/javascript">
                                                    $('#reservationtime_coupon_edit{{$all->idGiamGia}}').daterangepicker({
                                                      timePicker: true,
                                                      timePickerIncrement: 10,
                                                      timePickerSeconds: true,
                                                      timePicker24Hour: true,
                                                    startDate: "{{$all->NgayBatDau}}",
                                                  endDate: "{{$all->NgayKetThuc}}",
                                                      drops: 'auto',
                                                      locale: {
                                                        format: 'YYYY-MM-DD HH:mm:ss',
                                                    }

                                                });
                                                  
                                              </script>
                                          </div>
                                              <span style="display: none;" class="error4" >
                                                          <i class=" fa fa-exclamation-triangle"></i>
                                                      </span>
                                        </div>
                                     <div class="form-row col-md-6 ml-sm-1 mb-3 ">
                                            <label class="label-bold">Giá trị giảm giá: <span>*</span></label>
                                            <div class="input-group">
                                                    <div class="input-group-prepend">
                                                      <span class="input-group-text"><i class="fas fa-keyboard"></i></span>
                                                  </div>
                                                  <input type="number" id="GiaTri{{$all->idGiamGia}}" value="{{$all->GiaTriGiamGia}}" required="required" name="GiaTri" class="form-control float-right text-danger" placeholder="Vui lòng nhập giá trị giảm giá...">
                                              </div>
                                              <span style="display: none;" class="error4" >
                                                          <i class=" fa fa-exclamation-triangle"></i>
                                                      </span>
                                        </div>
                                    </div>
                                    <input type="hidden" name="id" value="{{$all->idGiamGia}}">
                                      
                                </div>
                            
                            <!--/ End Form -->
                            <div class="form-group col-md-12 text-center">
                                <button class="btn btn-lg btn-success button-edit-coupon" type="submit"><i class="ti ti-save" ></i> Lưu</button>
                                &nbsp;&nbsp;&nbsp;&nbsp;
                                <button class="btn btn-lg btn-info" type="reset"><i class="ti ti-close"></i> Hủy</button>
                            
                      </div>
                        </div>
                         
            </form>
        </section>
      </div>


    </div>
  </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
    
    $(".form-edit-coupon{{$all->idGiamGia}}").validate({
        

      rules: {

        TenGiamGia: {
          required: true,
          minlength: 3,
          maxlength: 150
        },
        MaGiamGia: {
          required: true,
          minlength: 10,
          maxlength: 20
        },
       LoaiGiamGia: {
          required: true,

        },
        SoLuongMa: {
          required: true,
          min: 0,
          number: true
          
        },
        GiaTri: {
          required: true,
          min: 0,
          number: true
        },



      },
      messages: {

         TenGiamGia: {
          required: "Nhập tên giảm giá",
          minlength: 'Chiều dài tối thiểu 3 kí tự' ,
          maxlength: 'Chiều dài tối đa 150 kí tự'
        },
        MaGiamGia: {
          required: "Nhập mã giảm giá",
          minlength: 'Chiều dài tối thiểu 10 kí tự' ,
          maxlength: 'Chiều dài tối đa 20 kí tự'
        },
       LoaiGiamGia: {
          required: "Chọn loại giảm giá",

        },
        SoLuongMa: {
          required: "Nhập số lượng mã giảm",
          min: "Số lượng phải lớn hơn 0",
           number: "Vui lòng chỉ nhập số"
          
        },
        GiaTri: {
          required: "Nhập giá trị giảm giá",
          min: "Số lượng phải lớn hơn 0",
          number: "Vui lòng chỉ nhập số"
        },

        

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
   $(".button-edit-coupon").click(function() {
        $(".form-edit-coupon{{$all->idGiamGia}}").validate({
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
        if ($(".form-edit-coupon{{$all->idGiamGia}}").valid()) {
             if(document.getElementById('LoaiGiamGia{{$all->idGiamGia}}').value == '2')
                if (document.getElementById('GiaTri{{$all->idGiamGia}}').value > 100) {
                    alert('Phần trăm giảm giá không thể lớn hơn 100%');
                    document.getElementById('GiaTri{{$all->idGiamGia}}').focus();
                    return false;
                }else{
                    return true;
                }
        }
      });
});


</script>
@endforeach
@endsection