@extends('admin.index')
@section('allPost') 

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Danh sách bài viết </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Trang chủ</a></li>
              <li class="breadcrumb-item active">Danh sách bài viết</li>
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
                  <thead style=" background-color:  #a9bcab; ">
                  <tr>
                    <th>ID</th>
                    <th>Tiêu đề</th>
                    <th>Hinh ảnh</th>
                    <th>Lượt xem</th>
                    <th>Nội dung ngắn</th>
                    <th>Tình trạng</th>
                    
                    <th>Người đăng</th>
                    <th>Ngày đăng</th>
                    <th>Hành động</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($post as $all)
                    
                  <tr>
                    
                    <td >{{$all->idBaiViet}}</td>
                    <td><b>{{$all->TieuDeBaiViet}}</b></td>
                    @if($all->HinhAnh ==null)
                       <td><img  src="../public/avatar/avatar_default_man.jpg" class="img-circle elevation-2" style="width: 50px;height: 50px;" alt="Avatar default"></td>
                     @else
                       <td><img style="width: 300px;height: auto;" class="img-thumbnail " src="{{asset('public/avatar-post/'.$all->HinhAnh)}}" alt="Avatar"></td>
                     @endif
                    <td>{{$all->LuotXem}}</td>
                    <td>{{$all->NoiDungNgan}}</td> 
                    @if($all->TrangThai == 1)
                    <td class="text-center"><span class="badge badge-info">Hiển thị</span></td>
                    @else
                    <td class="text-center"><span class="badge badge-secondary">Ẩn</span></td>
                    @endif
                    <td>{{$all->nhanvien->HoTen}}</td>
                    <td>{{$all->NgayTaoBaiViet}}</td> 
                    <td class="table-action text-center mr-auto">
                        <a href="" title="Xem thông tin" data-toggle="modal" data-target="#edit_post_{{$all->idBaiViet}}"><i class="align-middle" data-feather="edit-3"></i></a>
                        
                          @if($all->TrangThai==0)
                        <a title="Mở khóa" href="javascript:void" onclick="show_post({{$all->idBaiViet}})"><i class="align-middle" data-feather="unlock"></i></a>
                        @else
                        <a title="Khóa" href="javascript:void" onclick="hidden_post({{$all->idBaiViet}})"><i class="align-middle" data-feather="lock"></i></a>
                        @endif
                       
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
@foreach($post as $all)
<div class="modal fade" id="edit_post_{{$all->idBaiViet}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div  class="modal-xl modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Thông tin bài viết</h5> <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
        </div>
        <div class="modal-body modal-custom2">
         <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header"> 
                 <h3 class="card-title">Thay đổi thông tin bài viết</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{route('postedit_post')}}" method="post" class="form-edit-post{{$all->idBaiViet}}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="card-body col-md-8 float-left">
                  <div class="form-row ml-sm-1 mb-3 ">
                                            <label class="label-bold">Tiêu đề bài viết: <span class="span-red">*</span></label>
                                            <div class="input-group">
                                                    <div class="input-group-prepend">
                                                      <span class="input-group-text"><i class="fas fa-keyboard"></i></span>
                                                  </div>
                                                  <input type="text" required="required" name="title" class="form-control float-right" value="{{$all->TieuDeBaiViet}}" placeholder="Vui lòng nhập tên tiêu đề bài viết..." >
                                                  
                                              </div>
                                              <span style="display: none;" class="error5" >
                                                          <i class=" fa fa-exclamation-triangle"></i>
                                                      </span>
                  </div>
                 <div class="form-row ml-sm-1 mb-3 ">
                                            <label class="label-bold">Mô tả ngắn về bài viết: <span class="span-red">*</span></label>
                                            <div class="input-group">
                                                    <div class="input-group-prepend">
                                                      <span class="input-group-text"><i class="fas fa-keyboard"></i></span>
                                                  </div>
                                                  <textarea type="text" cols="3" name="shortcontent" class="form-control float-right"  placeholder="Vui lòng nhập mô tả ngắn về bài viết..." >{{$all->NoiDungNgan}}</textarea>
                                                
                                              </div>
                                            <span style="display: none;" class="error5" >
                                                          <i class=" fa fa-exclamation-triangle"></i>
                                                      </span>
                  </div>
                  <div class=" ml-sm-1 mb-3 ">
                                            <label class="label-bold">Mô tả chi tiết về bài viết: <span class="span-red">*</span></label>
                                            <div >
                                                  <textarea type="text" id="summernote_edit_post{{$all->idBaiViet}}"  name="content"  ></textarea>
                                              </div>
                                              <span style="display: none;" class="error4" >
                                                          <i class=" fa fa-exclamation-triangle"></i>
                                                      </span>
                                              <script>

                                             $('#summernote_edit_post{{$all->idBaiViet}}').summernote({
                                                height: 200,
                                                dialogsInBody: true,
                                               }).summernote('code', `{!!$all->NoiDungChiTiet!!}`);;

                                            </script>
                  </div>
                
                  
                  
                 
                  
                </div>
                <!-- /.card-body -->
                
                <div class="card-body col-md-4 float-right">
              
                <!-- /.card-body -->
              
                
                <div class="form-group">
                  <label class="label-bold" for="exampleSelectBorder">Trạng thái:  <span class="span-red">*</span></label>
                  <div>
                  <select name="status" id="type" class="custom-select ">
                    @if($all->TrangThai == 1)
                      <option selected="" value="1">Hiển thị</option>  
                      <option   value="0">Bị ẩn</option>
                    @else
                      <option  value="1">Hiển thị</option>  
                      <option selected=""  value="0">Bị ẩn</option>
                    @endif     
                  </select>
                  </div>
                  <span style="display: none;" class="error1-avatar" >
                                                          <i class=" fa fa-exclamation-triangle"></i>
                                                      </span>
                </div>
                <div class="form-group">
                  <label class="label-bold" for="exampleSelectBorder">Danh mục bài viết:  <span class="span-red">*</span></label>
                   <div>
                  <select name="cate" id="type" class="custom-select">
                    <option selected="" value="{{$all->danhmucbaiviet->idDanhMucBaiViet}}">{{$all->danhmucbaiviet->TenDanhMucBaiViet}}</option>
                    @foreach($cate as $value)
                    <option  value="{{$value->idDanhMucBaiViet}}">{{$value->TenDanhMucBaiViet}}</option>
                    @endforeach
                  </select>
                 </div>
                  <span style="display: none;" class="error1-avatar" >
                                                          <i class=" fa fa-exclamation-triangle"></i>
                                                      </span>
                </div>
                  <div class="form-group">
                    <label for="exampleInputFile">Chọn hình đại diện mới:  </label>
                    <div class="input-group">
                      <div class="custom-file">
                        <div>
                        <input type="file" name="avatar" class="custom-file-input" id="avatar_post{{$all->idBaiViet}}" accept="image/*" >
                        </div>
                        <span style="display: none;" class="error1-avatar" >
                                                          <i class=" fa fa-exclamation-triangle"></i>
                                                      </span>
                        <label class="custom-file-label" for="exampleInputFile">Chọn file</label> 

                      </div>
                    </div> 
                  </div>
                  <div class="form-row col-md-12"  id='result_post{{$all->idBaiViet}}'>

              <div class="form-group "> 
                <label class="label-bold" for="exampleInputFile">Hình đại diện cũ: </label> 
                <div class="input-group"> 
                  <img id="img_2" class="avatar_product_detail" src="{{asset('public/avatar-post')}}/{{$all->HinhAnh}}"  > 
                </div>
              </div>
             
               

                
               </div>
<input type="hidden" name="avatar_current" value="{{$all->HinhAnh}}">
                <input type="hidden" name="id" value="{{$all->idBaiViet}}">
                </div>
              
            
                <div class="card-footer">
                  <center> 
                     <button  type="submit" class="btn btn-primary submit-edit-post{{$all->idBaiViet}}">Sửa</button>
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
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
  $(document).ready(function() {
  //Check File API support
  if (window.File && window.FileList && window.FileReader) {

    var filesInput = document.getElementById("avatar_post{{$all->idBaiViet}}");
    filesInput.addEventListener("change", function(event) {
      $('#result_post{{$all->idBaiViet}}').empty();
      var files = event.target.files; //FileList object
      var output = document.getElementById("result_post{{$all->idBaiViet}}");
      for (var i = 0; i < files.length; i++) {
        var file = files[i];
        //Only pics
        if (!file.type.match('image'))
          continue;
        var picReader = new FileReader();
        var count =1;
        picReader.addEventListener("load", function(event) {
          var picFile = event.target;
          
          var div = document.createElement("div");
           div.classList.add('form-group');
          // div.innerHTML = "<img class='thumbnail' src='" + picFile.result + "'" +
          //   "title='" + picFile.name + "'/>";
           div.innerHTML =" <label class='label-bold' for='exampleInputFile'>Xem trước ảnh đại diện mới:</label> <div class='input-group'> <img id='img_2'  class='avatar_product_detail' src='" + picFile.result + "'" + "</div> "
          count++;
          output.insertBefore(div, null);

        });
        //Read the image
        picReader.readAsDataURL(file);
      }
    });
  } else {
    console.log("Your browser does not support File API");
  }
});
</script>
<script type="text/javascript">
  $(document).ready(function() {
    
    $(".form-edit-post{{$all->idBaiViet}}").validate({
        

      rules: {

        title: {
          required: true,
          minlength: 6,
          maxlength: 150
        },
        shortcontent: {
          required: true,
          minlength: 10,
          maxlength: 300,
        },
        avatar: {
           
             accept:"jpg,png,jpeg,gif"
        }




      },
      messages: {

        title: {
          required: "Vui lòng nhập tiêu đề bài viết",
          minlength: "Chiều dài tối thiểu 6 kí tự",
          maxlength: "Chiều dài tối đa là 150 kí tự"
        },
        shortcontent: {
          required: "Vui lòng nhập mô tả ngắn gọn",
          minlength: "Chiều dài tối thiểu 10 kí tự",
          maxlength: "Chiều dài tối đa là 400 kí tự",
        },
        avatar:{
  
            accept: "Chỉ nhận hình định dạng jpg/png/jpeg/gif"
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
   $(".submit-edit-post{{$all->idBaiViet}}").click(function() {
        $(".form-edit-post{{$all->idBaiViet}}").validate({
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
        if ((!$('.form-edit-post{{$all->idBaiViet}}').valid())) {
            if(document.getElementById('summernote_edit_post{{$all->idBaiViet}}').value == ''){
                alert('Vui lòng nhập mô tả chi tiết bài viết');
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