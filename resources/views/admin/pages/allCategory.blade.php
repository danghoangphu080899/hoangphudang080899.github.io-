@extends('admin.index')
@section('allCategory')

  <!-- Navbar -->

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Quản lí đơn hàng</h1>
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
          <div class="col-12">

            <div class="card">
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <div name="csrf-token" content="{{ csrf_token() }}">
                  <thead style="background-color: #27ae60;">
                  <tr>
                    <th>ID</th>
                    <th>Tên danh mục</th>
                    <th>Mô tả danh mục</th>
                    <th>Hành động</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($all_cate as $all)
                    
                  <tr>
                    
                    <td >{{$all->idDanhMuc}}</td>
                    <td><b>{{$all->TenDanhMuc}}</b></td>
                    <td>{{$all->MoTa}}</td>
                    <td class="table-action text-center mr-auto">
                        <a href="" title="Xem thông tin" data-toggle="modal" data-target="#edit_cate_{{$all->idDanhMuc}}"><i class="align-middle" data-feather="edit-3"></i></a>
                        
                        {{-- @if($all->ChucVu==3)
                        <a title="Mở khóa" href="javascript:void" onclick="show_user({{$all->idDanhMuc}})"><i class="align-middle" data-feather="unlock"></i></a>
                        @else
                        <a title="Khóa" href="javascript:void" onclick="hidden_user({{$all->idDanhMuc}})"><i class="align-middle" data-feather="lock"></i></a>
                        @endif --}}
                       
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
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->

@foreach($all_cate as $cate)
<div class="modal fade" id="edit_cate_{{$cate->idDanhMuc}}" tabindex="-1" role="dialog" >
    <div  class="modal-lg modal-dialog " role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Thông tin danh mục sản phẩm</h5> <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
        </div>
        <div class="modal-body ">
         <section class="shop login section">
            <form action="{{route('postedit_cate')}}" name="frm" method="post"  class="msform form-edit-cate{{$cate->idDanhMuc}}" enctype="multipart/form-data"> 
               {{ csrf_field() }}
                        <div class="login-form ">
                            <h2>Thay đổi thông tin danh mục sản phẩm</h2>
                            <p>Vui lòng kiểm tra kỉ thông tin trước khi thay đổi</p>
                            <!-- Form -->
                                <div class="row ">
                                    <div class="form-row col-md-12 ">

                                        <div class="form-row col-md-6 ml-sm-1">
                                            <label class="label-bold">ID sản phẩm: <span>*</span></label>
                                            <div class="input-group">
                                                    <div class="input-group-prepend">
                                                      <span class="input-group-text"><i class="fas fa-keyboard"></i></span>
                                                  </div>
                                                  <input disabled="" type="text" required="required" name="idDanhMuc" value="{{$cate->idDanhMuc}}" class="form-control float-right" >
                                              </div>
                                              <span style="display: none;" class="error1-custom " >
                                                          <i class=" fa fa-exclamation-triangle"></i>
                                                      </span>
                                        </div>
                                        <div class="form-row col-md-6 ml-sm-1">
                                            <label class="label-bold">Tên danh mục: <span>*</span></label>
                                            <div class="input-group">
                                                    <div class="input-group-prepend">
                                                      <span class="input-group-text"><i class="fas fa-keyboard"></i></span>
                                                  </div>
                                                   <input type="text" name="TenDanhMuc" value="{{$cate->TenDanhMuc}}"  placeholder="Vui lòng nhập tên danh mục..." class="form-control float-right" >
                                              </div>
                                              <span style="display: none;" class="error4" >
                                                          <i class=" fa fa-exclamation-triangle"></i>
                                                      </span>
                                        </div>
                                    <div class=" col-md-12 mt-3">
                                      <div class="form-group">
                                          <label class="label-bold">Mô tả danh mục: <span>*</span></label>
                                            <textarea  class="form-control" name="MoTa" rows="3" placeholder="Vui lòng nhập mô tả danh mục sản phẩm ..." >{{$cate->MoTa}}</textarea>    
                                      </div>
                                      <span style="display: none;" class="error4-custom" >
                                                          <i class=" fa fa-exclamation-triangle"></i>
                                                      </span>               
                                    </div>
                                    </div>
                                      
                                </div>
                            <input type="hidden" name="id" value="{{$cate->idDanhMuc}}">
                            <!--/ End Form -->
                            <div class="form-group col-md-12 text-center">
                                <button class="btn btn-lg btn-success button-edit-cate" type="submit"><i class="ti ti-save" ></i> Lưu</button>
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
    
    $(".form-edit-cate{{$cate->idDanhMuc}}").validate({
        

      rules: {

        TenDanhMuc: {
          required: true,
          minlength: 3,
          maxlength: 30
        },
        MoTa: {
          required: true,
          minlength: 10,
          maxlength: 255
        },
       



      },
      messages: {

        TenDanhMuc: {
          required: "Vui lòng nhập tên danh mục",
          minlength: "Chiều dài tối thiểu 3 kí tự",
          maxlength: "Chiều dài tối đa là 30 kí tự"
        },
        MoTa: {
          required: "Vui lòng nhập mô tả danh mục",
          minlength: "Chiều dài tối thiểu 10 kí tự",
          maxlength: "Chiều dài tối đa là 255 kí tự"
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
   $(".button-edit-cate").click(function() {
        $(".form-edit-cate{{$cate->idDanhMuc}}").validate({
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
        if (!$(".form-edit-cate{{$cate->idDanhMuc}}").valid()) {
            return true;
        }
      });
});

</script>
@endforeach
@endsection