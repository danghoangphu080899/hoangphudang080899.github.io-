@extends('admin.index')
@section('allProduct')

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Danh sách sản phẩm</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
              <li class="breadcrumb-item active">Danh sách sản phẩm</li>
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
                <h3 class="card-title">Danh sách tất cả các sản phẩm</h3>
                <div class="  float-right "> <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#create_product"> Thêm sản phẩm mới </button> </div> 
              </div>
              <?php 
                     $mess=Session::get('mess');
                      if($mess){
                                        echo '<div class="alert alert-success" role="alert">'.$mess.'</div>';
                                         Session::put('mess',null);
                                }else                            
                                 ?>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <div name="csrf-token" content="{{ csrf_token() }}">
                  <thead style="
    color: #ffffff;
    background: #2980b9;">
                  <tr>
                    <th>ID</th>
                    <th>Tên sản phẩm</th>
                    <th>Hình</th>
                    <th>Giá</th>
                    <th>Danh mục</th>
                    <th>Số lượng hàng</th>
                    <th>Nhà sản xuất</th>
                    <th>Mô tả ngắn</th>
                    <th>Trạng thái</th>
                    {{-- <th>Mô tả chi tiết</th> --}}
                    <th>Hành động</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($products as $all)
                    
                  <tr id="del_ajax{{$all->idSanPham}}">
                    
                    <td id="{{$all->idSanPham}}">{{$all->idSanPham}}</td>
                    <td><b>{{$all->TenSanPham}}</b></td> 
                    <td>
                      <img style="width: 100px;height: 100px;" src="../public/frontend/images/product/{{$all->HinhAnh}}">   
                    </td>
                    <td style="color:red">{{number_format($all->Gia,0,",",".")}}<span>đ</span></td>
                    <td>{{$all->danhmucsanpham->TenDanhMuc}}</td> 
                    
                    
                    <td>{{$all->SoLuongHang}}</td>
                    <td>{{$all->nhasanxuat->TenNhaSanXuat}}</td>
                    <td>{{$all->MoTaNgan}}</td>
                    @if($all->TrangThai==1)
                    <td> <span class="badge badge-success">Hiển thị</span></td>
                    @else
                    <td> <span class="badge badge-dark">Đã ẩn</span></td>
                    {{-- <td >{{$all->MoTaChiTiet}}</td> --}}
                    @endif
                    <td class="table-action text-center mr-auto">
                        <a href="" data-toggle="modal" data-target="#edit_product_{{$all->idSanPham}}"><i class="align-middle" data-feather="edit-2"></i></a>
                        
                        @if($all->TrangThai==1)
                        <a title="Ẩn sản phẩm" href="javascript:void" onclick="hidden_product({{$all->idSanPham}})"><i class="align-middle" data-feather="eye-off"></i></a>
                        @else
                        <a title="Hiển thị lại" href="javascript:void" onclick="show_product({{$all->idSanPham}})"><i class="align-middle" data-feather="eye"></i></a>
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

  @foreach($products as $mess)
 <div  class="modal fade" id="edit_product_{{$mess->idSanPham}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Kiểm tra thay đổi thông tin sản phẩm</h5> <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
        </div>
        <div class="modal-body">
          <!-- Multi step form --> 
          <section class="multi_step_form">  
            <form action="{{route('postedit_product',[$mess->idSanPham])}}" name="frm" method="post"  class="msform form-edit-product{{$mess->idSanPham}}" enctype="multipart/form-data"> 
               {{ csrf_field() }}


              <!-- progressbar -->
              <ul class="progress-test" id="progressbar">
                <li class="active">Thông tin sản phẩm</li>  
                <li >Thông tin cấu hình sản phẩm</li> 
                <li>Hình ảnh sản phẩm </li> 
                <li>Xác nhận</li>
              </ul>
              <!-- fieldsets -->
              <fieldset>
                  <section class="shop login section">

        
                     
                    
                        <div class="login-form form-control">
                            <h2>Thay đổi thông tin sản phẩm</h2>
                            <p>Vui lòng kiểm tra kỉ thông tin trước khi qua bước tiếp theo</p>
                            <!-- Form -->

                           
                                <div class="row ">
                                    <div class="form-row col-md-12 ">

                                        <div class="form-row col-md-6 ml-sm-1">
                                            <label class="label-bold">Nhập tên sản phẩm: <span>*</span></label>
                                            <div class="input-group">
                                                    <div class="input-group-prepend">
                                                      <span class="input-group-text"><i class="fas fa-keyboard"></i></span>
                                                  </div>
                                                  <input  type="text" required="required" name="TenSanPham" placeholder="Vui lòng nhập tên sản phẩm..." value="{{$mess->TenSanPham}}" class="form-control float-right" >
                                              </div>
                                              <span style="display: none;" class="error1-custom" >
                                                          <i class=" fa fa-exclamation-triangle"></i>
                                                      </span>
                                        </div>
                                        <div class="form-row col-md-6 ml-sm-1">
                                            <label class="label-bold">Nhập giá bán: <span>*</span></label>
                                            <div class="input-group">
                                                    <div class="input-group-prepend">
                                                      <span class="input-group-text"><i class="fas fa-keyboard"></i></span>
                                                  </div>
                                                   <input type="number" name="Gia" value="{{$mess->Gia}}"  placeholder="Vui lòng nhập giá bán sản phẩm..." class="form-control float-right" >
                                              </div>
                                              <span style="display: none;" class="error1" >
                                                          <i class=" fa fa-exclamation-triangle"></i>
                                                      </span>
                                        </div>
                                    </div>
                                    <div class="form-row col-md-12 ">
                                      <div class="form-row col-md-6 ml-sm-1 ">
                                            <label class="label-bold">Nhập số lượng: <span>*</span></label>
                                            <div class="input-group">
                                                    <div class="input-group-prepend">
                                                      <span class="input-group-text"><i class="fas fa-keyboard"></i></span>
                                                  </div>
                                                   <input type="number" value="{{$mess->SoLuongHang}}" name="SoLuong" placeholder="Vui lòng nhập số lượng sản phẩm..." class="form-control float-right" >
                                              </div>
                                              <span style="display: none;" class="error1" >
                                                          <i class=" fa fa-exclamation-triangle"></i>
                                                      </span>
                                        </div>
                                        <div class="form-row col-md-3 ml-sm-1">
                                            <label class="label-bold">Danh mục sản phẩm: <span>*</span></label>
                                            <div class="input-group">
                                                    <div class="input-group-prepend">
                                                      <span class="input-group-text"><i class="fas fa-keyboard"></i></span>
                                                  </div>
                                                   <select id="category_edit_product{{$mess->idSanPham}}" class="custom-select " name="idDanhMuc" >
                                                    <option selected="" value="{{$mess->idDanhMuc}}">{{$mess->danhmucsanpham->TenDanhMuc}}</option>
                    @foreach($name_category as $key => $danhmuc)
                    <option disabled="" value="{{$danhmuc->idDanhMuc}}">{{$danhmuc->TenDanhMuc}}</option>
                    @endforeach
                  </select>
                                              </div>
                                              <span style="display: none;" class="error1" >
                                                          <i class=" fa fa-exclamation-triangle"></i>
                                                      </span>
                                        </div>

                                        <div class="form-row col-md-3 ml-sm-1">
                                            <label class="label-bold">Nhà sản xuất: <span>*</span></label>
                                            <div class="input-group">
                                                    <div class="input-group-prepend">
                                                      <span class="input-group-text"><i class="fas fa-keyboard"></i></span>
                                                  </div>
                                                   <select class="custom-select " name="idNhaSanXuat">
                                                    <option selected="" value="{{$mess->idNhaSanXuat}}" >{{$mess->nhasanxuat->TenNhaSanXuat}}</option>
                    @foreach($name_nsx as $key => $nsx)
                    <option value="{{$nsx->idNhaSanXuat}}" >{{$nsx->TenNhaSanXuat}}</option>
                    @endforeach
                  </select>
                                              </div>
                                              <span style="display: none;" class="error1" >
                                                          <i class=" fa fa-exclamation-triangle"></i>
                                                      </span>
                                        </div>

                                    </div>

                                    <div class="col-md-12">
                                      <div class="form-group">
                                          <label class="label-bold">Mô tả tóm tắt sản phẩm: <span>*</span></label>
                                            <textarea  class="form-control" name="MoTaNgan" rows="3" placeholder="Enter ..." >{{$mess->MoTaNgan}}</textarea>    
                                      </div>
                                      <span style="display: none;" class="error1-custom2" >
                                                          <i class=" fa fa-exclamation-triangle"></i>
                                                      </span>
                                             
                                    </div>
                                    <div class="form-group col-md-12">
                                            <label class="label-bold">Mô tả chi tiết sản phẩm: <span>*</span></label>
                                            <textarea id="summernote_edit_product{{$mess->idSanPham}}" name="MoTaChiTiet" class="form-control" ></textarea>
                                            <script>

                                             $('#summernote_edit_product{{$mess->idSanPham}}').summernote({
                                                height: 200,
                                                dialogsInBody: true,

                                                

                                               }).summernote('code', `{!!$mess->MoTaChiTiet!!}`);;
                                             
                                              
                                            </script>

                                    </div>
                                    

                                    <div class="form-row col-md-12">
                                        <div class="form-group col-md-4">
                                            <label class="label-bold" for="exampleInputFile">Chọn hình đại diện sản phẩm: <span>*</span></label>
                                            
                                              <div class="custom-file">
                                                <input type="file" name="HinhAnh" class="input_avatar_product_new custom-file-input" id="exampleInputFile" accept="image/*" >
                                                <label style="position: absolute;" class="custom-file-label" for="exampleInputFile">Chọn file</label>
                                                
                                                
                                            </div>
                                            <span style="display: none;" class="error1-avatar" >
                                                          <i class=" fa fa-exclamation-triangle"></i>
                                                      </span>
                                       
                                    </div>
                                    <div class="form-group col-md-4">
                                                <label class="label-bold " for="exampleInputFile">hình đại diện cũ: </label>
                                                <div class="input-group">
                                                    <img id="img_2"  class="avatar_product_current" src="{{asset('public/frontend/images/product')}}/{{$mess->HinhAnh}}">
                                                </div>
                                                <input type="hidden" name="img_current" value="{{$mess->HinhAnh}}">
                                                
                                                  
                                                 
                                                
                                            </div>
                                    <div class="form-group col-md-4">
                                                <label class="label-bold " for="exampleInputFile">Xem trước hình đại diện mới:</label>
                                                <div class="input-group">
                                                    <img id="img_2"  class="avatar_product_new" src="{{asset('public/avatar/default_avatar.jpg')}}">
                                                </div>
                                                
                                                  
                                                 
                                                
                                            </div>
                                    </div>
                                    


                                    
                                </div>
                            
                            <!--/ End Form -->
                        </div>
                     
                    
                        
                   
                    
               
           
        </section>

            
<button type="button" class="action-button previous_button">Quay lại</button>
                <button  type="button" class="next3{{$mess->idSanPham}} action-button">Tiếp tục</button>  

          

                
              </fieldset>
              <fieldset>
                    <section class="shop login section">
                <div class="login-form form-control">
                            <h2>Nhập cấu hình cho sản phẩm</h2>
                            <p>Vui lòng kiểm tra thông tin của form này</p>
                            <!-- Form -->
                            

                            <div class="row">
                             <div class="form-row col-md-10 m-auto">
                              @foreach($mess->giatrithuoctinh as $key => $value)
                               <div class="form-row col-md-4 ml-sm-1">
                                <label class="label-bold">{{$value->thuoctinh->TenThuocTinh}}: <span>*</span></label> 
                                <div class="input-group">
                                 <div class="input-group-prepend"> <span class="input-group-text"><i class="fas fa-keyboard"></i></span> </div>
                                 <input  type="text" id="{{$key+1}}" value="{{$value->GiaTri}}"  name="thuoctinh{{$key+1}}" placeholder="Nhập thông số màn hình..."  class="form-control float-right" > 
                               </div>
                               <span style="display: none;" class="error3" > <i class=" fa fa-exclamation-triangle"></i> </span> 
                             </div>
                             @endforeach
                             
           </div>


         </div>



         <!--/ End Form -->
       </div>
                      </section>
                <button type="button" class="action-button previous3{{$mess->idSanPham}} previous_button">Quay lại</button>
                <button  type="button" class="next3{{$mess->idSanPham}} action-button">Tiếp tục</button>  
              </fieldset>  
              <fieldset>
                <section  class="shop login section">
                  <div class="login-form form-control col-md-12">
                    <h2>Hình ảnh chi tiết sản phẩm</h2>
                    <p>Vui lòng thêm hình ảnh chi tiết cho sản phẩm (360 độ nếu có)</p>
                    <!-- Form -->
                   
            <!-- general form elements -->
            <div class="row">
              
            


              

            <div class="  col-md-8 ">
              
              <div class="form-row col-md-12"  id='result_edit{{$mess->idSanPham}}'>
                @foreach($mess->hinhanh as $key => $value)
              <div class="form-group col-md-4"> 
                <label class="label-bold" for="exampleInputFile">Ảnh chi tiết {{$key+1}}: <span>*</span></label> 
                <div class="input-group"> 
                  <img id="img_2" class="avatar_product_detail" src="{{asset('public/frontend/images/product-details')}}/{{$value->src}}"  > 
                </div>
              </div>
              @endforeach
              </div>
              <div class="form-group col-md-12">
                <label class="label-bold" for="exampleInputFile">Chọn hình chi tiết sản phẩm: <span>*</span></label>

                <div class="custom-file">
                  <input onchange="show_imt({{$mess->idSanPham}})" type="file" name="HinhAnhChiTiet[]" class="input_avatar_product custom-file-input" id="files_detail_edit{{$mess->idSanPham}}" multiple="" accept="image/*">
                  <label style="position: absolute;" class="custom-file-label" for="exampleInputFile">Chọn file</label>


                </div>
                
                <span style="display: none;" class="error1-avatar" >
                  <i class=" fa fa-exclamation-triangle"></i>
                </span>

              </div>
              





            </div>
                <!-- /.card-body -->
                <div class=" col-md-4 ">
              

                 <div class="form-group ">
                   <label class="label-bold" for="exampleInputFile">Chọn hình 360độ của sản phẩm: <span>*</span></label>

                   <div class="custom-file">
                    <input type="file" name="HinhAnh360[]"  class="input_avatar_product_detail custom-file-input" id="exampleInputFile" multiple="" accept="image/*">
                    <label style="position: absolute;" class="custom-file-label" for="exampleInputFile">Chọn file</label>

                  </div>
                  <span style="display: none;" class="error1-avatar" >
                    <i class=" fa fa-exclamation-triangle"></i>
                  </span>
                </div>
                  
               </div>
               </div>
               
                 
               
             
       
      
</div>

              
                            
                            <!--/ End Form -->
                       
                      </section>
                <button type="button" class="action-button previous3{{$mess->idSanPham}} previous_button">Quay lại</button>
                <button type="button" class="next3{{$mess->idSanPham}} action-button ">Tiếp tục</button>  
              </fieldset>
              <fieldset>
              
                            <h2>Xác nhận </h2>
                            <p>Vui lòng kiểm tra thông tin thật kĩ trước khi xác nhận</p>
                  
                  <div class="form-group"> 
                  <div class="custom-control custom-checkbox">
                          <input class="custom-control-input custom-control-input-danger" type="checkbox" name="check" id="exampleInputFile{{$mess->idSanPham}}">
                          <label for="exampleInputFile{{$mess->idSanPham}}" class="custom-control-label">Đã kiểm tra kỉ thông tin</label>
                        </div>
                        <span style="display: none;" class="error2-check" >
                                                          <i class=" fa fa-exclamation-triangle"></i>
                                                      </span>
                 

                </div>
                 

                 


                

                
                <button type="button" class="action-button previous3{{$mess->idSanPham}} previous_button">Quay lại</button> 
                <a  class="action-button"><button class="action-button" type="submit">Xác nhận</button></a> 
              </fieldset>  
            </form>  
          </section> 
        </div>
      </div>
    </div>
  </div>

<script type="text/javascript">  
$(document).ready(function() {
    
    $(".form-edit-product{{$mess->idSanPham}}").validate({
        

      rules: {

       
        TenSanPham: {
          required: true,
          minlength: 10,
          maxlength: 50
        },
        Gia: {
          required: true,
          number: true,
          min: 1000
        },
        SoLuong: {
          required: true,
          number: true,
          min: 1
        },
        MoTaNgan: {
          required: true,
          minlength: 100,
          maxlength: 400,
        },

        
       
        HinhAnh: {
         
          accept:"jpg,png,jpeg,gif"

        },
          'HinhAnhChiTiet[]': {
          accept:"jpg,png,jpeg,gif" 
          },
          'HinhAnh360[]': {
           
          accept:"jpg,png,jpeg,gif" 
          },
        thuoctinh1: { 
          required: true,
        },
        thuoctinh2: { 
          required: true,
        },
        thuoctinh3: { 
          required: true,
        },
        thuoctinh4: { 
          required: true,
        },
        thuoctinh5: { 
          required: true,
        },
        thuoctinh6: { 
          required: true,
        },
        thuoctinh7: { 
          required: true,
        },
        thuoctinh8: { 
          required: true,
        },
        thuoctinh9: { 
          required: true,
        },
        check: {
          required: true
        }

        



      },
      messages: {

        
       TenSanPham: {
           required: "Vui lòng nhập tên sản phẩm",
           minlength: "Chiều dài tối thiểu 10 kí tự",
          maxlength: "Chiều dài tối đa là 50 kí tự"
        },
        Gia: {
           required: "Vui lòng nhập giá bán",
           number: "Vui lòng nhập số",
          min: "Giá bán không nhỏ hơn 1000"

        },
        SoLuong: {
           required: "Vui lòng số lượng", 
            number: "Vui lòng nhập số",
          min: "Số lượng không nhỏ hơn 0"

        },
         MoTaNgan: {
           required: "Vui lòng nhập mô tả ngắn",
           minlength: "Chiều dài tối thiểu 100 kí tự",
           maxlength: "Chiều dài tối đa 400 kí tự",
        },

        HinhAnh: {
          accept: "Chỉ nhận hình định dạng jpg/png/jpeg/gif"

        },
        'HinhAnhChiTiet[]': {
          accept: "Chỉ nhận hình định dạng jpg/png/jpeg/gif"

        },
        'HinhAnh360[]': {

          accept: "Chỉ nhận hình định dạng jpg/png/jpeg/gif"

        },
        thuoctinh1:{
          required: "Vui lòng thông tin ở đây"
        },
        thuoctinh2:{
          required: "Vui lòng thông tin ở đây"
        },
        thuoctinh3:{
          required: "Vui lòng thông tin ở đây"
        },
        thuoctinh4:{
          required: "Vui lòng thông tin ở đây"
        },
        thuoctinh5:{
          required: "Vui lòng thông tin ở đây"
        },
        thuoctinh6:{
          required: "Vui lòng thông tin ở đây"
        },
        thuoctinh7:{
          required: "Vui lòng thông tin ở đây"
        },
        thuoctinh8:{
          required: "Vui lòng thông tin ở đây"
        },
        thuoctinh9: {
          required: "Vui lòng thông tin ở đây"
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
    $(".form-edit-product{{$mess->idSanPham}}").validate({
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
    $(".next3{{$mess->idSanPham}}").click(function() {
        $(".form-edit-product{{$mess->idSanPham}}").validate({
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
        if(document.getElementById('summernote_edit_product{{$mess->idSanPham}}').value == ''){
                alert('Vui lòng nhập mô tả chi tiết sản phẩm');
                return false;
            }
        if (!$('.form-edit-product{{$mess->idSanPham}}').valid()) {
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


    $(".previous3{{$mess->idSanPham}}").click(function() {
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
<div class="modal fade" id="create_product" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tạo sản phẩm mới</h5> <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
        </div>
        <div class="modal-body">
          <!-- Multi step form --> 
          <section class="multi_step_form">  
            <form action="{{route('postadd_product')}}" name="frm" method="post"  class="msform form-add-product" enctype="multipart/form-data"> 
               {{ csrf_field() }}


              <!-- progressbar -->
              <ul class="progress-test" id="progressbar">
                <li class="active">Thông tin sản phẩm</li>  
                <li >Thông tin cấu hình sản phẩm</li> 
                <li>Hình ảnh sản phẩm </li> 
                <li>Xác nhận</li>
              </ul>
              <!-- fieldsets -->
              <fieldset>
                  <section class="shop login section">

        
                     
                    
                        <div class="login-form form-control">
                            <h2>Form nhập thông tin sản phẩm</h2>
                            <p>Vui lòng kiểm tra kỉ thông tin trước khi qua bước tiếp theo</p>
                            <!-- Form -->

                           
                                <div class="row ">
                                    <div class="form-row col-md-12 ">

                                        <div class="form-row col-md-6 ml-sm-1">
                                            <label class="label-bold">Nhập tên sản phẩm: <span>*</span></label>
                                            <div class="input-group">
                                                    <div class="input-group-prepend">
                                                      <span class="input-group-text"><i class="fas fa-keyboard"></i></span>
                                                  </div>
                                                  <input  type="text" required="required" name="TenSanPham" placeholder="Vui lòng nhập tên sản phẩm..."  class="form-control float-right" >
                                              </div>
                                              <span style="display: none;" class="error1-custom" >
                                                          <i class=" fa fa-exclamation-triangle"></i>
                                                      </span>
                                        </div>
                                        <div class="form-row col-md-6 ml-sm-1">
                                            <label class="label-bold">Nhập giá bán: <span>*</span></label>
                                            <div class="input-group">
                                                    <div class="input-group-prepend">
                                                      <span class="input-group-text"><i class="fas fa-keyboard"></i></span>
                                                  </div>
                                                   <input type="number" name="Gia"   placeholder="Vui lòng nhập giá bán sản phẩm..." class="form-control float-right" >
                                              </div>
                                              <span style="display: none;" class="error1" >
                                                          <i class=" fa fa-exclamation-triangle"></i>
                                                      </span>
                                        </div>
                                    </div>
                                    <div class="form-row col-md-12 ">
                                      <div class="form-row col-md-6 ml-sm-1 ">
                                            <label class="label-bold">Nhập số lượng: <span>*</span></label>
                                            <div class="input-group">
                                                    <div class="input-group-prepend">
                                                      <span class="input-group-text"><i class="fas fa-keyboard"></i></span>
                                                  </div>
                                                   <input type="number"  name="SoLuong" placeholder="Vui lòng nhập số lượng sản phẩm..." class="form-control float-right" >
                                              </div>
                                              <span style="display: none;" class="error1" >
                                                          <i class=" fa fa-exclamation-triangle"></i>
                                                      </span>
                                        </div>
                                        <div class="form-row col-md-3 ml-sm-1">
                                            <label class="label-bold">Danh mục sản phẩm: <span>*</span></label>
                                            <div class="input-group">
                                                    <div class="input-group-prepend">
                                                      <span class="input-group-text"><i class="fas fa-keyboard"></i></span>
                                                  </div>
                                                   <select id="category_add_product" class="custom-select " name="idDanhMuc" >
                    @foreach($name_category as $key => $danhmuc)
                    <option value="{{$danhmuc->idDanhMuc}}">{{$danhmuc->TenDanhMuc}}</option>
                    @endforeach
                  </select>
                                              </div>
                                              <span style="display: none;" class="error1" >
                                                          <i class=" fa fa-exclamation-triangle"></i>
                                                      </span>
                                        </div>

                                        <div class="form-row col-md-3 ml-sm-1">
                                            <label class="label-bold">Nhà sản xuất: <span>*</span></label>
                                            <div class="input-group">
                                                    <div class="input-group-prepend">
                                                      <span class="input-group-text"><i class="fas fa-keyboard"></i></span>
                                                  </div>
                                                   <select class="custom-select " name="idNhaSanXuat">
                    @foreach($name_nsx as $key => $nsx)
                    <option value="{{$nsx->idNhaSanXuat}}" >{{$nsx->TenNhaSanXuat}}</option>
                    @endforeach
                  </select>
                                              </div>
                                              <span style="display: none;" class="error1" >
                                                          <i class=" fa fa-exclamation-triangle"></i>
                                                      </span>
                                        </div>

                                    </div>

                                    <div class="col-md-12">
                                      <div class="form-group">
                                        <label class="label-bold">Mô tả tóm tắt sản phẩm: <span>*</span></label>
                                            <textarea  class="form-control" name="MoTaNgan" rows="3" placeholder="Enter ..." ></textarea>  
                                      </div>
                                           <span style="display: none;" class="error1-custom2" >
                                                          <i class=" fa fa-exclamation-triangle"></i>
                                                      </span>    
                                    </div>
                                    <div class="form-group col-md-12">
                                            <label class="label-bold">Mô tả chi tiết sản phẩm: <span>*</span></label>
                                            <textarea id="summernote_add_product" name="MoTaChiTiet" class="form-control" ></textarea>
                                            <script>

                                             $('#summernote_add_product').summernote({
                                                height: 200,
                                                dialogsInBody: true,
                                                

                                               });
                                             
                                              
                                            </script>
                                    </div>
                                    

                                    <div class="form-row col-md-12">
                                        <div class="form-group col-md-6">
                                            <label class="label-bold" for="exampleInputFile">Chọn hình đại diện sản phẩm: <span>*</span></label>
                                            
                                              <div class="custom-file">
                                                <input type="file" required="" name="HinhAnh" class="input_avatar_product custom-file-input" id="exampleInputFile" accept="image/*" >
                                                <label style="position: absolute;" class="custom-file-label" for="exampleInputFile">Chọn file</label>
                                                
                                                
                                            </div>
                                            <span style="display: none;" class="error1-avatar" >
                                                          <i class=" fa fa-exclamation-triangle"></i>
                                                      </span>
                                       
                                    </div>
                                    <div class="form-group col-md-6">
                                                <label class="label-bold " for="exampleInputFile">Xem trước hình đại diện: <span>*</span></label>
                                                <div class="input-group">
                                                    <img id="img_2"  class="avatar_product" src="{{asset('public/avatar/default_avatar.jpg')}}">
                                                </div>
                                                
                                                  
                                                 
                                                
                                            </div>
                                    </div>
                                    


                                    
                                </div>
                            
                            <!--/ End Form -->
                        </div>
                    
                    
                        
                   
                    
               
           
        </section>

            
<button type="button" class="action-button previous_button">Quay lại</button>
                <button onclick="check_attributes()" type="button" class="next3 action-button">Tiếp tục</button>  

          

                
              </fieldset>
              <fieldset>
                <section class="shop login section">
                <div class="login-form form-control">
                            <h2>Nhập cấu hình cho sản phẩm</h2>
                            <p>Vui lòng kiểm tra thông tin của form này</p>
                            <!-- Form -->
                            

                                <div id="step2_add_product" class="row">
                                   
                                  <div class="form-row col-md-10 m-auto"> <div class="form-row col-md-4 ml-sm-1"> <label class="label-bold">Màn hình: <span>*</span></label> <div class="input-group"> <div class="input-group-prepend"> <span class="input-group-text"><i class="fas fa-keyboard"></i></span> </div> <input  type="text" value="123"  name="manhinh" placeholder="Nhập thông số màn hình..."  class="form-control float-right" > </div> <span style="display: none;" class="error3" > <i class=" fa fa-exclamation-triangle"></i> </span> </div> <div class="form-row col-md-4 ml-sm-1"> <label class="label-bold">Hệ điều hành: <span>*</span></label> <div class="input-group"> <div class="input-group-prepend"> <span class="input-group-text"><i class="fas fa-keyboard"></i></span> </div> <input  type="text" value="123"  name="hdh" placeholder="Nhập thông tin hệ điều hành..."  class="form-control float-right" > </div> <span style="display: none;" class="error3" > <i class=" fa fa-exclamation-triangle"></i> </span> </div> <div class="form-row col-md-4 ml-sm-1"> <label class="label-bold">Camera sau: <span>*</span></label> <div class="input-group"> <div class="input-group-prepend"> <span class="input-group-text"><i class="fas fa-keyboard"></i></span> </div> <input  type="text" value="123" name="camsau" placeholder="Nhập thông số camera sau..."  class="form-control float-right" > </div> <span style="display: none;" class="error3" > <i class=" fa fa-exclamation-triangle"></i> </span> </div> <div class="form-row col-md-4 ml-sm-1"> <label class="label-bold">Camera trước: <span>*</span></label> <div class="input-group"> <div class="input-group-prepend"> <span class="input-group-text"><i class="fas fa-keyboard"></i></span> </div> <input  type="text" value="123" name="camtruoc" placeholder="Nhập thông số camera trước..."  class="form-control float-right" > </div> <span style="display: none;" class="error3" > <i class=" fa fa-exclamation-triangle"></i> </span> </div> <div class="form-row col-md-4 ml-sm-1"> <label class="label-bold">Chip: <span>*</span></label> <div class="input-group"> <div class="input-group-prepend"> <span class="input-group-text"><i class="fas fa-keyboard"></i></span> </div> <input  type="text" value="123"  name="chip" placeholder="Nhập thông số chíp xử lí..."  class="form-control float-right" > </div> <span style="display: none;" class="error3" > <i class=" fa fa-exclamation-triangle"></i> </span> </div> <div class="form-row col-md-4 ml-sm-1"> <label class="label-bold">Ram <span>*</span></label> <div class="input-group"> <div class="input-group-prepend"> <span class="input-group-text"><i class="fas fa-keyboard"></i></span> </div> <input  type="text" value="123" name="ram" placeholder="Nhập thông số ram..."  class="form-control float-right" > </div> <span style="display: none;" class="error3" > <i class=" fa fa-exclamation-triangle"></i> </span> </div> <div class="form-row col-md-4 ml-sm-1"> <label class="label-bold">Bộ nhớ trong: <span>*</span></label> <div class="input-group"> <div class="input-group-prepend"> <span class="input-group-text"><i class="fas fa-keyboard"></i></span> </div> <input  type="text" value="123"  name="bnt" placeholder="Nhập thông số bộ nhớ trong..."  class="form-control float-right" > </div> <span style="display: none;" class="error3" > <i class=" fa fa-exclamation-triangle"></i> </span> </div> <div class="form-row col-md-4 ml-sm-1"> <label class="label-bold">Sim: <span>*</span></label> <div class="input-group"> <div class="input-group-prepend"> <span class="input-group-text"><i class="fas fa-keyboard"></i></span> </div> <input  type="text" value="123"  name="sim" placeholder="Nhập thông tin sim..."  class="form-control float-right" > </div> <span style="display: none;" class="error3" > <i class=" fa fa-exclamation-triangle"></i> </span> </div> <div class="form-row col-md-4 ml-sm-1"> <label class="label-bold">Dung lượng pin: <span>*</span></label> <div class="input-group"> <div class="input-group-prepend"> <span class="input-group-text"><i class="fas fa-keyboard"></i></span> </div> <input  type="text" value="123"  name="pin" placeholder="Nhập thông số dung lượng pin..."  class="form-control float-right" > </div> <span style="display: none;" class="error3" > <i class=" fa fa-exclamation-triangle"></i> </span> </div> </div>
                                  {{-- laptop --}}

                                  <div class="form-row col-md-10 m-auto"> <div class="form-row col-md-4 ml-sm-1"> <label class="label-bold">CPU: <span>*</span></label> <div class="input-group"> <div class="input-group-prepend"> <span class="input-group-text"><i class="fas fa-keyboard"></i></span> </div> <input  type="text" value="123"  name="cpu" placeholder="Nhập thông số CPU..."  class="form-control float-right" > </div> <span style="display: none;" class="error3" > <i class=" fa fa-exclamation-triangle"></i> </span> </div> <div class="form-row col-md-4 ml-sm-1"> <label class="label-bold">Ram: <span>*</span></label> <div class="input-group"> <div class="input-group-prepend"> <span class="input-group-text"><i class="fas fa-keyboard"></i></span> </div> <input  type="text" value="123"  name="ram" placeholder="Nhập thông số ram..."  class="form-control float-right" > </div> <span style="display: none;" class="error3" > <i class=" fa fa-exclamation-triangle"></i> </span> </div> <div class="form-row col-md-4 ml-sm-1"> <label class="label-bold">Ổ cứng: <span>*</span></label> <div class="input-group"> <div class="input-group-prepend"> <span class="input-group-text"><i class="fas fa-keyboard"></i></span> </div> <input  type="text" value="123" name="ocung" placeholder="Nhập thông số ổ cứng..."  class="form-control float-right" > </div> <span style="display: none;" class="error3" > <i class=" fa fa-exclamation-triangle"></i> </span> </div> <div class="form-row col-md-4 ml-sm-1"> <label class="label-bold">Màn hình: <span>*</span></label> <div class="input-group"> <div class="input-group-prepend"> <span class="input-group-text"><i class="fas fa-keyboard"></i></span> </div> <input  type="text" value="123"  name="manhinh" placeholder="Nhập thông tin màn hình..."  class="form-control float-right" > </div> <span style="display: none;" class="error3" > <i class=" fa fa-exclamation-triangle"></i> </span> </div> <div class="form-row col-md-4 ml-sm-1"> <label class="label-bold">Card màn hình: <span>*</span></label> <div class="input-group"> <div class="input-group-prepend"> <span class="input-group-text"><i class="fas fa-keyboard"></i></span> </div> <input  type="text" value="123" name="card" placeholder="Nhập thông tin card màn hình..."  class="form-control float-right" > </div> <span style="display: none;" class="error3" > <i class=" fa fa-exclamation-triangle"></i> </span> </div> <div class="form-row col-md-4 ml-sm-1"> <label class="label-bold">Cổng kết nối: <span>*</span></label> <div class="input-group"> <div class="input-group-prepend"> <span class="input-group-text"><i class="fas fa-keyboard"></i></span> </div> <input  type="text" value="123"  name="cong" placeholder="Nhập thông tin cổng kết nối..."  class="form-control float-right" > </div> <span style="display: none;" class="error3" > <i class=" fa fa-exclamation-triangle"></i> </span> </div> <div class="form-row col-md-4 ml-sm-1"> <label class="label-bold">Tính năng đặc biệt: <span>*</span></label> <div class="input-group"> <div class="input-group-prepend"> <span class="input-group-text"><i class="fas fa-keyboard"></i></span> </div> <input  type="text" value="123" name="dacbiet" placeholder="Nhập thông tin đặc biệt..."  class="form-control float-right" > </div> <span style="display: none;" class="error3" > <i class=" fa fa-exclamation-triangle"></i> </span> </div> <div class="form-row col-md-4 ml-sm-1"> <label class="label-bold">Hệ điều hành: <span>*</span></label> <div class="input-group"> <div class="input-group-prepend"> <span class="input-group-text"><i class="fas fa-keyboard"></i></span> </div> <input  type="text" value="123"  name="hdh" placeholder="Nhập thông tin hệ điều hành..."  class="form-control float-right" > </div> <span style="display: none;" class="error3" > <i class=" fa fa-exclamation-triangle"></i> </span> </div> <div class="form-row col-md-4 ml-sm-1"> <label class="label-bold">Kích thước, trọng lượng: <span>*</span></label> <div class="input-group"> <div class="input-group-prepend"> <span class="input-group-text"><i class="fas fa-keyboard"></i></span> </div> <input  type="text" value="123"  name="kichthuoc" placeholder="Nhập thông tin kích thước, trọng lượng..."  class="form-control float-right" > </div> <span style="display: none;" class="error3" > <i class=" fa fa-exclamation-triangle"></i> </span> </div> </div> 
                                  {{-- tablet --}}

                                  <div class="form-row col-md-10 m-auto"> <div class="form-row col-md-4 ml-sm-1"> <label class="label-bold">Màn hình: <span>*</span></label> <div class="input-group"> <div class="input-group-prepend"> <span class="input-group-text"><i class="fas fa-keyboard"></i></span> </div> <input  type="text" value="123"  name="manhinh" placeholder="Nhập thông số màn hình..."  class="form-control float-right" > </div> <span style="display: none;" class="error3" > <i class=" fa fa-exclamation-triangle"></i> </span> </div> <div class="form-row col-md-4 ml-sm-1"> <label class="label-bold">Hệ điều hành: <span>*</span></label> <div class="input-group"> <div class="input-group-prepend"> <span class="input-group-text"><i class="fas fa-keyboard"></i></span> </div> <input  type="text" value="123"  name="hdh" placeholder="Nhập thông tin hệ điều hành..."  class="form-control float-right" > </div> <span style="display: none;" class="error3" > <i class=" fa fa-exclamation-triangle"></i> </span> </div> <div class="form-row col-md-4 ml-sm-1"> <label class="label-bold">Chip: <span>*</span></label> <div class="input-group"> <div class="input-group-prepend"> <span class="input-group-text"><i class="fas fa-keyboard"></i></span> </div> <input  type="text" value="123" name="chip" placeholder="Nhập thông số chíp xủ lí..."  class="form-control float-right" > </div> <span style="display: none;" class="error3" > <i class=" fa fa-exclamation-triangle"></i> </span> </div> <div class="form-row col-md-4 ml-sm-1"> <label class="label-bold">Ram: <span>*</span></label> <div class="input-group"> <div class="input-group-prepend"> <span class="input-group-text"><i class="fas fa-keyboard"></i></span> </div> <input  type="text" value="123" name="ram" placeholder="Nhập thông số ram..."  class="form-control float-right" > </div> <span style="display: none;" class="error3" > <i class=" fa fa-exclamation-triangle"></i> </span> </div> <div class="form-row col-md-4 ml-sm-1"> <label class="label-bold">Bộ nhớ trong: <span>*</span></label> <div class="input-group"> <div class="input-group-prepend"> <span class="input-group-text"><i class="fas fa-keyboard"></i></span> </div> <input  type="text" value="123"  name="bnt" placeholder="Nhập thông số `bộ nhớ trong:..."  class="form-control float-right" > </div> <span style="display: none;" class="error3" > <i class=" fa fa-exclamation-triangle"></i> </span> </div> <div class="form-row col-md-4 ml-sm-1"> <label class="label-bold">Kết nối: <span>*</span></label> <div class="input-group"> <div class="input-group-prepend"> <span class="input-group-text"><i class="fas fa-keyboard"></i></span> </div> <input  type="text" value="123" name="ketnoi" placeholder="Nhập thông tin kết nối..."  class="form-control float-right" > </div> <span style="display: none;" class="error3" > <i class=" fa fa-exclamation-triangle"></i> </span> </div> <div class="form-row col-md-4 ml-sm-1"> <label class="label-bold">Camera sau: <span>*</span></label> <div class="input-group"> <div class="input-group-prepend"> <span class="input-group-text"><i class="fas fa-keyboard"></i></span> </div> <input  type="text" value="123"  name="camsau" placeholder="Nhập thông số camera sau..."  class="form-control float-right" > </div> <span style="display: none;" class="error3" > <i class=" fa fa-exclamation-triangle"></i> </span> </div> <div class="form-row col-md-4 ml-sm-1"> <label class="label-bold">Camera trước: <span>*</span></label> <div class="input-group"> <div class="input-group-prepend"> <span class="input-group-text"><i class="fas fa-keyboard"></i></span> </div> <input  type="text" value="123"  name="camtruoc" placeholder="Nhập thông số camera sau..."  class="form-control float-right" > </div> <span style="display: none;" class="error3" > <i class=" fa fa-exclamation-triangle"></i> </span> </div> <div class="form-row col-md-4 ml-sm-1"> <label class="label-bold">Dung lượng pin: <span>*</span></label> <div class="input-group"> <div class="input-group-prepend"> <span class="input-group-text"><i class="fas fa-keyboard"></i></span> </div> <input  type="text" value="123"  name="pin" placeholder="Nhập thông số dung lượng pin..."  class="form-control float-right" > </div> <span style="display: none;" class="error3" > <i class=" fa fa-exclamation-triangle"></i> </span> </div> </div>

                                  {{-- smartwatch --}}
                                  <div class="form-row col-md-10 m-auto"> <div class="form-row col-md-4 ml-sm-1"> <label class="label-bold">Màn hình: <span>*</span></label> <div class="input-group"> <div class="input-group-prepend"> <span class="input-group-text"><i class="fas fa-keyboard"></i></span> </div> <input  type="text" value="123"  name="manhinh" placeholder="Nhập thông số màn hình..."  class="form-control float-right" > </div> <span style="display: none;" class="error3" > <i class=" fa fa-exclamation-triangle"></i> </span> </div> <div class="form-row col-md-4 ml-sm-1"> <label class="label-bold">Thời lượng pin: <span>*</span></label> <div class="input-group"> <div class="input-group-prepend"> <span class="input-group-text"><i class="fas fa-keyboard"></i></span> </div> <input  type="text" value="123"  name="pin" placeholder="Nhập thông số thời lượng pin..."  class="form-control float-right" > </div> <span style="display: none;" class="error3" > <i class=" fa fa-exclamation-triangle"></i> </span> </div> <div class="form-row col-md-4 ml-sm-1"> <label class="label-bold">Kết nối với hệ điều hành: <span>*</span></label> <div class="input-group"> <div class="input-group-prepend"> <span class="input-group-text"><i class="fas fa-keyboard"></i></span> </div> <input  type="text" value="123"  name="ketnoi" placeholder="Nhập thông tin kết nối..."  class="form-control float-right" > </div> <span style="display: none;" class="error3" > <i class=" fa fa-exclamation-triangle"></i> </span> </div> <div class="form-row col-md-4 ml-sm-1"> <label class="label-bold">Mặt: <span>*</span></label> <div class="input-group"> <div class="input-group-prepend"> <span class="input-group-text"><i class="fas fa-keyboard"></i></span> </div> <input  type="text" value="123" name="mat" placeholder="Nhập thông tin mặt đồng hồ..."  class="form-control float-right" > </div> <span style="display: none;" class="error3" > <i class=" fa fa-exclamation-triangle"></i> </span> </div> <div class="form-row col-md-4 ml-sm-1"> <label class="label-bold">Tính năng đặc biệt: <span>*</span></label> <div class="input-group"> <div class="input-group-prepend"> <span class="input-group-text"><i class="fas fa-keyboard"></i></span> </div> <input  type="text" value="123" name="dacbiet" placeholder="Nhập tính năng đặc biệt..."  class="form-control float-right" > </div> <span style="display: none;" class="error3" > <i class=" fa fa-exclamation-triangle"></i> </span> </div> <div class="form-row col-md-4 ml-sm-1"> <label class="label-bold">Hãng: <span>*</span></label> <div class="input-group"> <div class="input-group-prepend"> <span class="input-group-text"><i class="fas fa-keyboard"></i></span> </div> <input  type="text" value="123"  name="hang" placeholder="Nhập hãng sản xuất..."  class="form-control float-right" > </div> <span style="display: none;" class="error3" > <i class=" fa fa-exclamation-triangle"></i> </span> </div> </div>
                                  {{--fashionwatch--}}

                                  <div class="form-row col-md-10 m-auto"> <div class="form-row col-md-4 ml-sm-1"> <label class="label-bold">Đối tượng sử dụng: <span>*</span></label> <div class="input-group"> <div class="input-group-prepend"> <span class="input-group-text"><i class="fas fa-keyboard"></i></span> </div> <input  type="text" value="123"  name="dtsd" placeholder="Nhập đối tượng sử dụng..."  class="form-control float-right" > </div> <span style="display: none;" class="error3" > <i class=" fa fa-exclamation-triangle"></i> </span> </div> <div class="form-row col-md-4 ml-sm-1"> <label class="label-bold">Đường kính mặt: <span>*</span></label> <div class="input-group"> <div class="input-group-prepend"> <span class="input-group-text"><i class="fas fa-keyboard"></i></span> </div> <input  type="text" value="123"  name="dkm" placeholder="Nhập đường kính mặt đồng hồ..."  class="form-control float-right" > </div> <span style="display: none;" class="error3" > <i class=" fa fa-exclamation-triangle"></i> </span> </div> <div class="form-row col-md-4 ml-sm-1"> <label class="label-bold">Chất liệu mặt kính: <span>*</span></label> <div class="input-group"> <div class="input-group-prepend"> <span class="input-group-text"><i class="fas fa-keyboard"></i></span> </div> <input  type="text" value="123"  name="clmk" placeholder="Nhập chất liệu mặt kính..."  class="form-control float-right" > </div> <span style="display: none;" class="error3" > <i class=" fa fa-exclamation-triangle"></i> </span> </div> <div class="form-row col-md-4 ml-sm-1"> <label class="label-bold">Chất liệu dây: <span>*</span></label> <div class="input-group"> <div class="input-group-prepend"> <span class="input-group-text"><i class="fas fa-keyboard"></i></span> </div> <input  type="text" value="123" name="cld" placeholder="Nhập chất liệu dây..."  class="form-control float-right" > </div> <span style="display: none;" class="error3" > <i class=" fa fa-exclamation-triangle"></i> </span> </div> <div class="form-row col-md-4 ml-sm-1"> <label class="label-bold">Bộ máy: <span>*</span></label> <div class="input-group"> <div class="input-group-prepend"> <span class="input-group-text"><i class="fas fa-keyboard"></i></span> </div> <input  type="text" value="123" name="bomay" placeholder="Nhập thông tin bộ máy..."  class="form-control float-right" > </div> <span style="display: none;" class="error3" > <i class=" fa fa-exclamation-triangle"></i> </span> </div> <div class="form-row col-md-4 ml-sm-1"> <label class="label-bold">Thương hiệu: <span>*</span></label> <div class="input-group"> <div class="input-group-prepend"> <span class="input-group-text"><i class="fas fa-keyboard"></i></span> </div> <input  type="text" value="123"  name="thuonghieu" placeholder="Nhập hãng sản xuất..."  class="form-control float-right" > </div> <span style="display: none;" class="error3" > <i class=" fa fa-exclamation-triangle"></i> </span> </div> </div>







                                </div>
                                
                                 
                            
                            <!--/ End Form -->
                        </div>
                      </section>
                <button type="button" class="action-button previous3 previous_button">Quay lại</button>
                <button  type="button" class="next3 action-button">Tiếp tục</button>  
              </fieldset>  
              <fieldset>
                <section  class="shop login section">
                  <div class="login-form form-control col-md-12">
                    <h2>Hình ảnh chi tiết sản phẩm</h2>
                    <p>Vui lòng thêm hình ảnh chi tiết cho sản phẩm (360 độ nếu có)</p>
                    <!-- Form -->
                   
            <!-- general form elements -->
            <div class="row">
              
            


              

            <div class="  col-md-8 ">
              <div class="form-row col-md-12" id='result'></div>
              <div class="form-group col-md-12">
                <label class="label-bold" for="exampleInputFile">Chọn hình chi tiết sản phẩm: <span>*</span></label>

                <div class="custom-file">
                  <input type="file" name="HinhAnhChiTiet[]" class="input_avatar_product custom-file-input" id="files_detail" multiple="" accept="image/*">
                  <label style="position: absolute;" class="custom-file-label" for="exampleInputFile">Chọn file</label>


                </div>
                
                <span style="display: none;" class="error1-avatar" >
                  <i class=" fa fa-exclamation-triangle"></i>
                </span>

              </div>
              





            </div>
                <!-- /.card-body -->
                <div class=" col-md-4 ">
              

                 <div class="form-group ">
                   <label class="label-bold" for="exampleInputFile">Chọn hình 360độ của sản phẩm: <span>*</span></label>

                   <div class="custom-file">
                    <input type="file" name="HinhAnh360[]"  class="input_avatar_product_detail custom-file-input" id="exampleInputFile" multiple="" accept="image/*">
                    <label style="position: absolute;" class="custom-file-label" for="exampleInputFile">Chọn file</label>

                  </div>
                  <span style="display: none;" class="error1-avatar" >
                    <i class=" fa fa-exclamation-triangle"></i>
                  </span>
                </div>
                  
               </div>
               </div>
               
                 
               
             
       
      
</div>

              
                            
                            <!--/ End Form -->
                       
                      </section>
                <button type="button" class="action-button previous3 previous_button">Quay lại</button>
                <button type="button" class="next3 action-button ">Tiếp tục</button>  
              </fieldset>
              <fieldset>
              
                            <h2>Xác nhận </h2>
                            <p>Vui lòng kiểm tra thông tin thật kĩ trước khi xác nhận</p>
                  
                  <div class="form-group"> 
                  <div class="custom-control custom-checkbox">
                          <input class="custom-control-input custom-control-input-danger" type="checkbox" name="check" id="exampleInputFile331">
                          <label for="exampleInputFile331" class="custom-control-label">Đã kiểm tra kỉ thông tin</label>
                        </div>
                        <span style="display: none;" class="error2-check" >
                                                          <i class=" fa fa-exclamation-triangle"></i>
                                                      </span>
                 

                </div>
                 

                 


                

                
                <button type="button" class="action-button previous3 previous_button">Quay lại</button> 
                <a  class="action-button button-add-event"><button class="action-button" type="submit">Xác nhận</button></a> 
              </fieldset>  
            </form>  
          </section>
        </div>
      </div>
    </div>
  </div>
  @endsection