@extends('admin.index')
@section('upProduct')

  <!-- Navbar -->

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Quản lí sản phẩm</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
              <li class="breadcrumb-item active">General Form</li>
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
                 <h3 class="card-title">Sửa sản phẩm</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              @foreach($edit_product as $edit)
              <form action="{{$edit->idSanPham}}" name="frmEditProduct" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="card-body col-md-8 float-left">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Tên sản phẩm</label>
                    <input type="text" name="TenSanPham" class="form-control" placeholder="Nhập tên sản phẩm..." value="{{$edit->TenSanPham}}">
                  </div>
                <div class="form-group">
                  <label for="exampleSelectBorder">Danh mục</label>
                  <select class="custom-select " name="idDanhMuc" value="{{$edit->idDanhMuc}}">
                     @foreach($name_category as $key => $danhmuc)
                     @if($danhmuc->idDanhMuc == $edit->idDanhMuc)
                      <option value="{{$danhmuc->idDanhMuc}}" selected>{{$danhmuc->TenDanhMuc}}</option>
                    @else
                    <option value="{{$danhmuc->idDanhMuc}}" >{{$danhmuc->TenDanhMuc}}</option>
                    @endif
                    @endforeach
                  </select>
                </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Giá sản phẩm</label>
                    <input type="number" name="Gia" class="form-control" placeholder="Nhập giá sản phẩm.." value="{{$edit->Gia}}">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Số lượng hàng</label>
                    <input type="number" name="SoLuong" class="form-control"  placeholder="Nhập số lượng.." value="{{$edit->SoLuongHang}}">
                  </div>
                  <div class="form-group">
                  <label for="exampleSelectBorder">Nhà sản xuất</label>
                  <select class="custom-select " name="idNhaSanXuat" value="{{$edit->idNhaSanXuat}}">
                    @foreach($name_nsx as $key => $nsx)
                     @if($nsx->idNhaSanXuat == $edit->idNhaSanXuat)
                      <option value="{{$nsx->idNhaSanXuat}}" selected>{{$nsx->TenNhaSanXuat}}</option>
                    @else
                     <option value="{{$nsx->idNhaSanXuat}}">{{$nsx->TenNhaSanXuat}}</option>
                    @endif
                    @endforeach
                  </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Mô tả ngắn</label>
                    <input type="text" name="MoTaNgan" class="form-control"  placeholder="Nhập mô tả ngắn.." value="{{$edit->MoTaNgan}}">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Mô tả chi tiết</label>
                    <input type="text" name="MoTaChiTiet" class="form-control" placeholder="Nhập mô tả chi tiết..." value="{{$edit->MoTaChiTiet}}">
                  </div>
                  <div class="col-md-6 float-left">
                  <div class="form-group">
                    <label for="exampleInputFile">Hình ảnh đại diện cũ</label>
                    <div class="custom-file">
                      <img id="img" src="{{asset('public/frontend/images/product/'.$edit->HinhAnh)}}">
                      <input type="hidden" name="img_current" value="{{$edit->HinhAnh}}">
                    </div>
                  </div>
                  </div>
                  <div class="col-md-6 float-right">
                  <div class="form-group">
                      <label for="exampleInputFile">Hình đại diện mới</label>
                    <div class="custom-file">
                      
                      <input type="file" name="HinhAnh" class="custom-file-input" id="exampleInputFile">
                      <label class="custom-file-label" for="exampleInputFile">Chọn file</label>
                    </div>
                  </div>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-body col-md-4 float-right">
              
                <!-- /.card-body -->
                  @foreach($imgdetail_product as $key => $imgs)
                  <div class="form-group" id="img{!!$key!!}">
                    <label for="exampleInputFile">Hình ảnh chi tiết{!! $key !!}</label>
                    <div class="custom-file hinh">
                        <img style="height: 100px;width: 100px;" src="{{asset('public/frontend/images/product/'.$imgs->src)}}" id="{!!$imgs->idHinhAnh!!}" rid="{!!$key!!}">
                        <a href="javascript:void(0)" type="button" id="del_icon" class="btn btn-danger de-icon"><i class="fa fa-times"></i></a>
                      </div>

                 </div>

                 <br>
                  @endforeach
                  <br>
                  <button type="button" class="btn btn-primary" id="addImgs">Thêm hình ảnh chỉ tiết</button>  
                  <div id="insert"></div>             
                </div>
                <div class="card-footer">
                  <center>
                     <button type="submit" class="btn btn-primary">Sửa</button>
                     &nbsp;&nbsp;&nbsp;&nbsp;
                     &nbsp;&nbsp;&nbsp;&nbsp;
                  <button type="submit" class="btn btn-danger">Hủy</button>
                  </center>
                 
                </div>
              </form>
              @endforeach
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


@endsection