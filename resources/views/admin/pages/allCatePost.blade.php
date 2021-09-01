@extends('admin.index')
@section('allCatePost')

   <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Quản lí danh mục bài viết</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Trang chủ</a></li>
              <li class="breadcrumb-item active">danh mục bài viết</li>
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
                <h3 class="card-title">Danh sách tất cả các danh mục bài viết</h3>
                <div class="  float-right "> <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add_catepost"> Thêm danh mục mới </button> </div> 
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <div name="csrf-token" content="{{ csrf_token() }}">
                  <thead style="background-color:#FFED86;color: black;">
                  <tr>
                    <th>ID</th>
                    <th>Tên danh mục bài viết</th>
                    <th>Mô tả về danh mục</th>
                    <th>Hành động</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($cate as $all)
                    
                  <tr>
                    
                    <td >{{$all->idDanhMucBaiViet}}</td>
                    <td>{{$all->TenDanhMucBaiViet}}</td>
                    <td>{{$all->MoTaDanhMucBaiViet}}</td>     
                    <td class="table-action text-center mr-auto">
                        <a href="" title="Xem thông tin" data-toggle="modal" data-target="#edit_catepost{{$all->idDanhMucBaiViet}}"><i class="align-middle" data-feather="edit-3"></i></a>
                       
                      {{--   <a title="Xóa" href="javascript:void" onclick="delete_nsx({{$all->idNhaSanXuat}})"><i class="align-middle" data-feather="lock"></i></a> --}}
                        
                       
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

<div class="modal fade" id="add_catepost" tabindex="-1" role="dialog" >
    <div  class="modal-lg modal-dialog " role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Thông tin danh mục bài viết mới</h5> <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
        </div>
        <div class="modal-body ">
         <section class="shop login section m-0">
            <form action="{{route('postadd_catepost')}}" name="frm" method="post"  class="msform form-add-catepost" enctype="multipart/form-data"> 
               {{ csrf_field() }}
                        <div class="login-form ">
                            <h2>Thêm mới danh mục bài viết</h2>
                            <p>Vui lòng kiểm tra kỉ thông tin trước khi thêm</p>
                            <!-- Form -->
                                <div class="row ">
                                    <div class="form-row col-md-12 ">

                                        <div class="form-row col-md-12 ml-sm-1 mb-3 ">
                                            <label class="label-bold">Tên danh mục: <span>*</span></label>
                                            <div class="input-group">
                                                    <div class="input-group-prepend">
                                                      <span class="input-group-text"><i class="fas fa-keyboard"></i></span>
                                                  </div>
                                                  <input type="text" required="required" name="name" class="form-control float-right"  placeholder="Vui lòng nhập tên danh mục bài viết..." >
                                              </div>
                                              <span style="display: none;" class="error4 ml-lg-3" >
                                                          <i class=" fa fa-exclamation-triangle"></i>
                                                      </span>
                                        </div>
                                        <div class="form-row col-md-12 ml-sm-1 mb-3 ">
                                            <label class="label-bold">Mô tả danh mục: <span>*</span></label>
                                            <div class="input-group">
                                                    <div class="input-group-prepend">
                                                      <span class="input-group-text"><i class="fas fa-keyboard"></i></span>
                                                  </div>
                                                   <textarea type="text" name="mota"  placeholder="Vui lòng nhập mô tả danh mục bài viết..." class="form-control float-right" ></textarea>
                                              </div>
                                              <span style="display: none;" class="error4 ml-lg-3" >
                                                          <i class=" fa fa-exclamation-triangle"></i>
                                                      </span>
                                        </div>
                                    </div>
                                      
                                </div>
                            
                            <!--/ End Form -->
                            <div class="form-group col-md-12 text-center">
                                <button class="btn btn-lg btn-success button-add-catepost" type="submit"><i class="ti ti-save" ></i> Thêm</button>
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

@foreach($cate as $all)
<div class="modal fade" id="edit_catepost{{$all->idDanhMucBaiViet}}" tabindex="-1" role="dialog" >
    <div  class="modal-lg modal-dialog " role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Thông tin nhà sản xuất</h5> <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
        </div>
        <div class="modal-body ">
         <section class="shop login section  m-0">
            <form action="{{route('postedit_catepost')}}" name="frm" method="post"  class="msform form-edit-catepost{{$all->idDanhMucBaiViet}}" enctype="multipart/form-data"> 
               {{ csrf_field() }}
           
                        <div class="login-form ">
                            <h2>thay đổi thông tin danh mục bài viết</h2>
                            <p>Vui lòng kiểm tra kỉ thông tin trước khi thay đổi</p>
                            <!-- Form -->
                                <div class="row ">
                                    <div class="form-row col-md-12 ">

                                        <div class="form-row col-md-12 ml-sm-1 mb-3 ">
                                            <label class="label-bold">Tên danh mục: <span>*</span></label>
                                            <div class="input-group">
                                                    <div class="input-group-prepend">
                                                      <span class="input-group-text"><i class="fas fa-keyboard"></i></span>
                                                  </div>
                                                  <input type="text" value="{{$all->TenDanhMucBaiViet}}" required="required" name="name" class="form-control float-right"  placeholder="Vui lòng nhập tên danh mục bài viết..." >
                                              </div>
                                              <span style="display: none;" class="error4 ml-lg-3" >
                                                          <i class=" fa fa-exclamation-triangle"></i>
                                                      </span>
                                        </div>
                                        <div class="form-row col-md-12 ml-sm-1 mb-3 ">
                                            <label class="label-bold">Mô tả danh mục: <span>*</span></label>
                                            <div class="input-group">
                                                    <div class="input-group-prepend">
                                                      <span class="input-group-text"><i class="fas fa-keyboard"></i></span>
                                                  </div>
                                                   <textarea type="text" name="mota"  placeholder="Vui lòng nhập mô tả danh mục bài viết..." class="form-control float-right" >{{$all->MoTaDanhMucBaiViet}}</textarea>
                                              </div>
                                              <span style="display: none;" class="error4 ml-lg-3" >
                                                          <i class=" fa fa-exclamation-triangle"></i>
                                                      </span>
                                        </div>
                                    </div>
                                    <input type="hidden" name="id" value="{{$all->idDanhMucBaiViet}}">
                                      
                                </div>
                            
                            <!--/ End Form -->
                            <div class="form-group col-md-12 text-center">
                                <button class="btn btn-lg btn-success button-edit-catepost" type="submit"><i class="ti ti-save" ></i> Sửa</button>
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
    
    $(".form-edit-catepost{{$all->idDanhMucBaiViet}}").validate({
        

      rules: {

         name: {
          required: true,
          minlength: 3,
          maxlength: 50
        },
        mota: {
           required: true,
          minlength: 10,
          maxlength: 100
        },



      },
      messages: {

         name: {
          required: "Nhập tên danh mục bài viết",
          minlength: 'Chiều dài tối thiểu 3 kí tự' ,
          maxlength: 'Chiều dài tối đa 50 kí tự'
        },
        mota: {
           required: "Nhập mô tả danh mục bài viết",
          minlength: 'Chiều dài tối thiểu 10 kí tự' ,
          maxlength: 'Chiều dài tối đa 100 kí tự'
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
   $(".button-edit-catepost").click(function() {
        $(".form-edit-catepost{{$all->idDanhMucBaiViet}}").validate({
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
        if ($(".form-edit-catepost{{$all->idDanhMucBaiViet}}").valid()) {
                return true;
            
        }
      });
});


</script>
@endforeach
@endsection