@extends('admin.index')
@section('addPost')

  <!-- Navbar -->

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Thêm bài viết</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
              <li class="breadcrumb-item active">bài viết mới</li>
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
                 <h3 class="card-title">Thêm bài viết mới</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{route('postadd_post')}}" method="post" class="form-add-post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="card-body col-md-8 float-left">
                  <div class="form-row ml-sm-1 mb-3 ">
                                            <label class="label-bold">Tiêu đề bài viết: <span class="span-red">*</span></label>
                                            <div class="input-group">
                                                    <div class="input-group-prepend">
                                                      <span class="input-group-text"><i class="fas fa-keyboard"></i></span>
                                                  </div>
                                                  <input type="text" required="required" name="title" class="form-control float-right"  placeholder="Vui lòng nhập tên tiêu đề bài viết..." >
                                                  
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
                                                  <textarea type="text" style="height: 40px;" name="shortcontent" class="form-control float-right"  placeholder="Vui lòng nhập mô tả ngắn về bài viết..." ></textarea>
                                                
                                              </div>
                                            <span style="display: none;" class="error5" >
                                                          <i class=" fa fa-exclamation-triangle"></i>
                                                      </span>
                  </div>
                  <div class=" ml-sm-1 mb-3 ">
                                            <label class="label-bold">Mô tả chi tiết về bài viết: <span class="span-red">*</span></label>
                                            <div >
                                                  <textarea type="text" id="summernote_add_post"  name="content"  ></textarea>
                                              </div>
                                              <span style="display: none;" class="error4" >
                                                          <i class=" fa fa-exclamation-triangle"></i>
                                                      </span>
                                              <script>
                                             $('#summernote_add_post').summernote({
                                                height: 200,
                                                tabsize: 2,
                                                dialogsInBody: true,
                                               }); 
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
                    <option selected="" value="">---- Vui lòng chọn trạng thái ----</option>    
                    <option  value="1">Hiển thị</option>  
                    <option   value="0">Bị ẩn</option>  
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
                    <option selected="" value="">---- Vui lòng chọn danh mục ----</option>
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
                    <label for="exampleInputFile">Chọn hình đại diện:  <span class="span-red">*</span></label>
                    <div class="input-group">
                      <div class="custom-file">
                        <div>
                        <input type="file" name="avatar" class="custom-file-input" id="avatar_post" accept="image/*" >
                        </div>
                        <span style="display: none;" class="error1-avatar" >
                                                          <i class=" fa fa-exclamation-triangle"></i>
                                                      </span>
                        <label class="custom-file-label" for="exampleInputFile">Chọn file</label> 

                      </div>
                    </div>
                  </div>
                  <div class="form-row col-md-12"  id='result_post'>

               
                <!-- /.card-body -->

                
               </div>

                </div>
              
            
                <div class="card-footer">
                  <center> 
                     <button  type="submit" class="btn btn-primary submit-add-post">Thêm</button>
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


@endsection