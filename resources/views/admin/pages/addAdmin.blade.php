@extends('admin.index')
@section('addAdmin')

  <!-- Navbar -->

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Quản lí nhân viên</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
              <li class="breadcrumb-item active">Thêm nhân viên</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header"> 
                 <h3 class="card-title">Thêm nhân viên mới</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{route('postadd_admin')}}" method="post" class="form-add-user" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="card-body  col-md-8 float-left">
                  <div class="form-group">
                    <label class="label-bold" for="exampleInputEmail1">Họ và Tên:  <span class="span-red">*</span></label>
                    <input type="text" name="name" class="form-control" placeholder="Nhập họ và tên khách hàng..." required="required">
                    <span style="display: none;" class="error1-avatar" >
                                                          <i class=" fa fa-exclamation-triangle"></i>
                                                      </span>
                  </div>
                <div class="form-group">
                  <label class="label-bold" for="exampleSelectBorder"> Tình trạng:  <span class="span-red">*</span></label>
                  <select class="custom-select " name="position" >
                    <option value="1" >Hoạt động</option>
                    <option value="0" >Bị khóa<option>
                  </select>
                </div>
                  <div class="form-group">
                    <label class="label-bold" for="exampleInputEmail1">Số điện thoại:  <span class="span-red">*</span> </label>
                    <input type="text" name="phone" class="form-control"  placeholder="Nhập số điện thoại.." required="required">
                    <span style="display: none;" class="error1-avatar" >
                                                          <i class=" fa fa-exclamation-triangle"></i>
                                                      </span>
                  </div>
                  <div class="row">
                      <div class="form-group col-md-4 ">
                            <label class="label-bold">Thành phố: <span class="span-red">*</span></label>
                            
                              <select name="thanhpho" id="thanhpho" class="form-control thanhpho choose" >
                                <option value="">----Chọn thành phố----</option>
                                @foreach($tp as $value)
                                <option value="{{$value->TP_id}}">{{$value->TP_Ten}}</option>
                                @endforeach
                              </select>
                            
                            <span style="display: none;" class="error1-avatar" >
                              <i class=" fa fa-exclamation-triangle"></i>
                            </span>
                          </div>
                          <div class="form-group col-md-4 ">
                            <label class="label-bold">Quận, huyện: <span class="span-red">*</span></label>
                            
                              <select  name="quanhuyen" id="quanhuyen" class="form-control quanhuyen choose" name="idDanhMuc" >
                                <option  value="">----Chọn quận huyện----</option>
                                
                                
                              </select>
                            
                            <span style="display: none;" class="error1-avatar" >
                              <i class=" fa fa-exclamation-triangle"></i>
                            </span>
                          </div>
                          <div class="form-group col-md-4 ">
                            <label class="label-bold">Xã, phường, thị trấn: <span class="span-red">*</span></label>
                            
                              <select  name="xa" id="xa"  class=" form-control" name="idDanhMuc" >
                                <option   value="">----Chọn Xã, phường, thị trấn----</option>
                              </select>
                            
                            <span style="display: none;" class="error1-avatar" >
                              <i class=" fa fa-exclamation-triangle"></i>
                            </span>
                          </div>
                          <div class="form-group col-md-12 ">
                            <label class="label-bold">Địa chỉ cụ thể: <span class="span-red">*</span></label>
                            
                              <textarea placeholder="Nhập địa chỉ cụ thể..." id="diachi" class="form-control" name="diachi"></textarea>
                            
                            <span style="display: none;" class="error1-avatar" >
                              <i class=" fa fa-exclamation-triangle"></i>
                            </span>
                          </div>
                  </div>
                 
                  
                </div>
                <!-- /.card-body -->
                
                <div class="card-body col-md-4 float-right">
              
                <!-- /.card-body -->
              
                
                  <div class="form-group">
                    <label class="label-bold" for="exampleInputEmail1">Địa chỉ Email:  <span class="span-red">*</span></label>
                    <input type="email" class="form-control" name="email" placeholder="Nhập email.." required="required">
                    <span style="display: none;" class="error1-avatar" >
                                                          <i class=" fa fa-exclamation-triangle"></i>
                                                      </span>
                  </div>
                  <div class="form-group">
                    <label class="label-bold" for="password_add_user">Mật khẩu:  <span class="span-red">*</span></label>
                    <input type="password" class="form-control password_add_user" name="password_add_user" placeholder="Nhập mật khẩu.." required="required" id="password_add_user">
                    <span style="display: none;" class="error1-avatar" >
                                                          <i class=" fa fa-exclamation-triangle"></i>
                                                      </span>
                  </div>
                  <div class="form-group">
                    <label class="label-bold" for="exampleInputPassword1">Nhập lại mật khẩu:  <span class="span-red">*</span></label>
                    <input type="password" class="form-control" name="repassword" placeholder="Nhập lại mật khẩu.." required="required">
                    <span style="display: none;" class="error1-avatar" >
                                                          <i class=" fa fa-exclamation-triangle"></i>
                                                      </span>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputFile">Chọn avatar:  <span class="span-red">*</span></label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" name="avatar" class="custom-file-input" id="avatar_user" accept="image/*" >
                        <span style="display: none;" class="error1-avatar" >
                                                          <i class=" fa fa-exclamation-triangle"></i>
                                                      </span>
                        <label class="custom-file-label" for="exampleInputFile">Chọn file</label> 

                      </div>
                    </div>
                  </div>
                  <div class="form-row col-md-12"  id='result_user'>

               
                <!-- /.card-body -->

                
               </div>

                
              
            
                <div class="card-footer">
                  <center> 
                     <button  type="submit" class="btn btn-primary submit-add-user">Thêm</button>
                     &nbsp;&nbsp;&nbsp;&nbsp;
                     &nbsp;&nbsp;&nbsp;&nbsp;
                  <button type="reset" class="btn btn-danger">Hủy</button>
                  </center>
                 
                </div>
                </form>
              </div>
          </div>
            
          <!--/.col (left) -->
          <!-- right column -->
        
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
<script type="text/javascript">
  
</script>

@endsection