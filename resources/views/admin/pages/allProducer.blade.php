@extends('admin.index')
@section('allProducer')

   <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Quản lí nhà sản xuất</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Trang chủ</a></li>
              <li class="breadcrumb-item active">nhà sản xuất</li>
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
                <h3 class="card-title">Danh sách tất cả các nhà sản xuất</h3>
                <div class="  float-right "> <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add_nsx"> Thêm nhà sản xuất mới </button> </div> 
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <div name="csrf-token" content="{{ csrf_token() }}">
                  <thead style="background-color:#FFED86;color: black;">
                  <tr>
                    <th>ID</th>
                    <th>Tên nhà sản xuất</th>
                    <th>Địa chỉ</th>
                    <th>Số điện thoại</th>
                    <th>Hành động</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($nsx as $all)
                    
                  <tr>
                    
                    <td >{{$all->idNhaSanXuat}}</td>
                    <td>{{$all->TenNhaSanXuat}}</td>
                    <td>{{$all->DiaChi}}</td>
                    <td>{{$all->SoDienThoai}}</td>        
                    <td class="table-action text-center mr-auto">
                        <a href="" title="Xem thông tin" data-toggle="modal" data-target="#edit_nsx{{$all->idNhaSanXuat}}"><i class="align-middle" data-feather="edit-3"></i></a>
                       
                        <a title="Xóa" href="javascript:void" onclick="delete_nsx({{$all->idNhaSanXuat}})"><i class="align-middle" data-feather="lock"></i></a>
                        
                       
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

<div class="modal fade" id="add_nsx" tabindex="-1" role="dialog" >
    <div  class="modal-lg modal-dialog " role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Thông tin nhà sản xuất mới</h5> <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
        </div>
        <div class="modal-body ">
         <section class="shop login section m-0">
            <form action="{{route('postadd_nsx')}}" name="frm" method="post"  class="msform form-add-nsx" enctype="multipart/form-data"> 
               {{ csrf_field() }}
                        <div class="login-form ">
                            <h2>Thêm mới nhà sản xuất</h2>
                            <p>Vui lòng kiểm tra kỉ thông tin trước khi thêm</p>
                            <!-- Form -->
                            <div class="row ">
                            	<div class="form-row col-md-12 ">

                            		<div class="form-row col-md-6 ml-sm-1 mb-3 ">
                            			<label class="label-bold">Tên nhà sản xuất: <span>*</span></label>
                            			<div class="input-group">
                            				<div class="input-group-prepend">
                            					<span class="input-group-text"><i class="fas fa-keyboard"></i></span>
                            				</div>
                            				<input type="text" required="required" name="name" class="form-control float-right"  placeholder="Vui lòng nhập tên giảm giá..." >
                            			</div>
                            			<span style="display: none;" class="error4 ml-lg-4" >
                            				<i class=" fa fa-exclamation-triangle"></i>
                            			</span>
                            		</div>
                            		<div class="form-row col-md-6 ml-sm-1 mb-3 ">
                            			<label class="label-bold">Số điện thoại: <span>*</span></label>
                            			<div class="input-group">
                            				<div class="input-group-prepend">
                            					<span class="input-group-text"><i class="fas fa-keyboard"></i></span>
                            				</div>
                            				<input type="text" name="phone"  placeholder="Vui lòng nhập mã giảm giá..." class="form-control float-right" >
                            			</div>
                            			<span style="display: none;" class="error4" >
                            				<i class=" fa fa-exclamation-triangle"></i>
                            			</span>
                            		</div>
                            		<div class="row">
                            			<div class="form-group col-md-4 ">
                            				<label class="label-bold">Thành phố: <span class="span-red">*</span></label>
                            				<div>
                            					<select name="thanhpho" id="thanhpho" class="form-control thanhpho choose" >
                            						<option value="">----Chọn thành phố----</option>
                            						@foreach($tp as $value)
                            						<option value="{{$value->TP_id}}">{{$value->TP_Ten}}</option>
                            						@endforeach
                            					</select>
                            				</div>
                            				<span style="display: none;" class="error1-avatar" >
                            					<i class=" fa fa-exclamation-triangle"></i>
                            				</span>
                            			</div>
                            			<div class="form-group col-md-4 ">
                            				<label class="label-bold">Quận, huyện: <span class="span-red">*</span></label>
                            				<div>
                            					<select  name="quanhuyen" id="quanhuyen" class="form-control quanhuyen choose" name="idDanhMuc" >
                            						<option  value="">----Chọn quận huyện----</option>


                            					</select>
                            				</div>
                            				<span style="display: none;" class="error1-avatar" >
                            					<i class=" fa fa-exclamation-triangle"></i>
                            				</span>
                            			</div>
                            			<div class="form-group col-md-4 ">
                            				<label class="label-bold">Xã, phường, thị trấn: <span class="span-red">*</span></label>
                            				<div>
                            					<select  name="xa" id="xa"  class=" form-control" name="idDanhMuc" >
                            						<option   value="">----Chọn Xã, phường, thị trấn----</option>
                            					</select>
                            				</div>
                            				<span style="display: none;" class="error1-avatar" >
                            					<i class=" fa fa-exclamation-triangle"></i>
                            				</span>
                            			</div>
                            			<div class="form-group col-md-12 ">
                            				<label class="label-bold">Địa chỉ cụ thể: <span class="span-red">*</span></label>
                            				<div>
                            					<textarea placeholder="Nhập địa chỉ cụ thể..." id="diachi" class="form-control" name="diachi"></textarea>
                            				</div>
                            				<span style="display: none;" class="error1-avatar" >
                            					<i class=" fa fa-exclamation-triangle"></i>
                            				</span>
                            			</div>
                            		</div>

                            	</div>

                            	<!--/ End Form -->
                            	<div class="form-group col-md-12 text-center">
                            		<button class="btn btn-lg btn-success button-add-nsx" type="submit"><i class="ti ti-save" ></i> Thêm</button>
                            		&nbsp;&nbsp;&nbsp;&nbsp;
                            		<button class="btn btn-lg btn-info" type="reset"><i class="ti ti-close"></i> Hủy</button>

                            	</div>
                            </div>
                      </div>   
            </form>
        </section>
      </div>


    </div>
  </div>
</div>

@foreach($nsx as $all)
<div class="modal fade" id="edit_nsx{{$all->idNhaSanXuat}}" tabindex="-1" role="dialog" >
    <div  class="modal-lg modal-dialog " role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Thông tin nhà sản xuất</h5> <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
        </div>
        <div class="modal-body ">
         <section class="shop login section  m-0">
            <form action="{{route('postedit_nsx')}}" name="frm" method="post"  class="msform form-edit-nsx{{$all->NhaSanXuat}}" enctype="multipart/form-data"> 
               {{ csrf_field() }}
           
                        <div class="login-form ">
                            <h2>Thêm mới nhà sản xuất</h2>
                            <p>Vui lòng kiểm tra kỉ thông tin trước khi thêm</p>
                            <!-- Form -->
                            <div class="row ">
                            	<div class="form-row col-md-12 ">

                            		<div class="form-row col-md-6 ml-sm-1 mb-3 ">
                            			<label class="label-bold">Tên nhà sản xuất: <span>*</span></label>
                            			<div class="input-group">
                            				<div class="input-group-prepend">
                            					<span class="input-group-text"><i class="fas fa-keyboard"></i></span>
                            				</div>
                            				<input type="text" value="{{$all->TenNhaSanXuat}}" required="required" name="name" class="form-control float-right"  placeholder="Vui lòng nhập tên giảm giá..." >
                            			</div>
                            			<span style="display: none;" class="error4 ml-lg-4" >
                            				<i class=" fa fa-exclamation-triangle"></i>
                            			</span>
                            		</div>

                            		<div class="form-row col-md-6 ml-sm-1 mb-3 ">
                            			<label class="label-bold">Số điện thoại: <span>*</span></label>
                            			<div class="input-group">
                            				<div class="input-group-prepend">
                            					<span class="input-group-text"><i class="fas fa-keyboard"></i></span>
                            				</div>
                            				<input type="text" name="phone" value="{{$all->SoDienThoai}}"  placeholder="Vui lòng nhập mã giảm giá..." class="form-control float-right" >
                            			</div>
                            			<span style="display: none;" class="error4" >
                            				<i class=" fa fa-exclamation-triangle"></i>
                            			</span>
                            		</div>

                            		
                            			<div class="col-md-12"><b style="color: #333;
                            			font-size: large;">Địa chỉ hiện tại: </b>{{$all->DiaChi}}</div>
                            		<button type="button"  class="btn-sm btn-primary" id="edit_address{{$all->idNhaSanXuat}}">Thay đổi địa chỉ</button>  
                            			
                            		<div id='address_nsx{{$all->idNhaSanXuat}}' class="row" style="display: none;">	
                            			<div style="background-color: #fcb258;font-size: 20px;
                                                    font-weight: 700;margin-top: 20px;" class="col-md-12 text-center">Thông tin địa chỉ mới<a href="javascript:void()" onclick="remove_form_insert{{$all->idNhaSanXuat}}()"><i style="position: absolute;
                                            right: 10px;
                                            top: 5px;" class="tis ti-close"></i></a></div>
                            			<div class="form-group col-md-4 ">
                            				<label class="label-bold">Thành phố: <span class="span-red">*</span></label>
                            				<div>
                            					<select name="thanhpho" id="thanhpho{{$all->idNhaSanXuat}}" class="form-control thanhpho choose{{$all->idNhaSanXuat}}" >
                            						<option value="0">----Chọn thành phố----</option>
                            						@foreach($tp as $value)
                            						<option value="{{$value->TP_id}}">{{$value->TP_Ten}}</option>
                            						@endforeach
                            					</select>
                            				</div>
                            				<span style="display: none;" class="error1-avatar" >
                            					<i class=" fa fa-exclamation-triangle"></i>
                            				</span>
                            			</div>
                            			<div class="form-group col-md-4 ">
                            				<label class="label-bold">Quận, huyện: <span class="span-red">*</span></label>
                            				<div>
                            					<select  name="quanhuyen" id="quanhuyen{{$all->idNhaSanXuat}}" class="form-control quanhuyen choose{{$all->idNhaSanXuat}}" name="idDanhMuc" >
                            						<option  value="0">----Chọn quận huyện----</option>


                            					</select>
                            				</div>
                            				<span style="display: none;" class="error1-avatar" >
                            					<i class=" fa fa-exclamation-triangle"></i>
                            				</span>
                            			</div>
                            			<div class="form-group col-md-4 ">
                            				<label class="label-bold">Xã, phường, thị trấn: <span class="span-red">*</span></label>
                            				<div>
                            					<select  name="xa" id="xa{{$all->idNhaSanXuat}}"  class=" form-control" name="idDanhMuc" >
                            						<option   value="0">----Chọn Xã, phường, thị trấn----</option>
                            					</select>
                            				</div>
                            				<span style="display: none;" class="error1-avatar" >
                            					<i class=" fa fa-exclamation-triangle"></i>
                            				</span>
                            			</div>
                            			<div class="form-group col-md-12 ">
                            				<label class="label-bold">Địa chỉ cụ thể: <span class="span-red">*</span></label>
                            				<div>
                            					<textarea placeholder="Nhập địa chỉ cụ thể..." id="diachi{{$all->idNhaSanXuat}}" class="form-control" name="diachi"></textarea>
                            				</div>
                            				<span style="display: none;" class="error1-avatar" >
                            					<i class=" fa fa-exclamation-triangle"></i>
                            				</span>
                            			</div>
                            		</div>

                            	</div>
                            	<input type="hidden" id="check_nsx{{$all->idNhaSanXuat}}" name="check_nsx" value="0">
								<input type="hidden" name="idNhaSanXuat" value="{{$all->idNhaSanXuat}}">
                            	<!--/ End Form -->
                            	<div class="form-group col-md-12 text-center">
                            		<button class="btn btn-lg btn-success button-edit-nsx" type="submit"><i class="ti ti-save" ></i> Sửa</button>
                            		&nbsp;&nbsp;&nbsp;&nbsp;
                            		<button class="btn btn-lg btn-info" type="reset"><i class="ti ti-close"></i> Hủy</button>

                            	</div>
                            </div>
                      </div>   
                       
            </form>
        </section>
      </div>


    </div>
  </div>
</div>
<script type="text/javascript">
	 $(document).ready(function () {
    $("#edit_address{{$all->idNhaSanXuat}}").click(function() {
        document.getElementById('address_nsx{{$all->idNhaSanXuat}}').style.display = "flex";
        document.getElementById('check_nsx{{$all->idNhaSanXuat}}').value = '1';
        $('#edit_address{{$all->idNhaSanXuat}}').hide();
        
    });
});
function remove_form_insert{{$all->idNhaSanXuat}}() {
   
        document.getElementById('address_nsx{{$all->idNhaSanXuat}}').style.display = "none";
        $('#edit_address{{$all->idNhaSanXuat}}').show();
        document.getElementById('check_nsx{{$all->idNhaSanXuat}}').value = '0';
    
}

</script>
<script type="text/javascript">
	$(document).ready(function() {
    $('.choose{{$all->idNhaSanXuat}}').on('change',function() {
      
        var action = $(this).attr('id');
        var id = {{$all->idNhaSanXuat}} 
        var matp = $(this).val();
        var _token = $('input[name="_token"]').val();
        
        var result = '';
       
        if (action == 'thanhpho{{$all->idNhaSanXuat}}') {
            result = 'quanhuyen{{$all->idNhaSanXuat}}';
        }else{
            result = 'xa{{$all->idNhaSanXuat}}';
        }
        $.ajax({
          url: 'https://hoangphu.com/myproject2/select_delivery_admin_edit',
          type: 'POST',
         
          data: {id:id,action: action, matp:matp,_token:_token},
        success:function(data) {
            
            $('#'+result).html(data);
        }
          
        });
        
    });
});
</script>
<script type="text/javascript">
    $(document).ready(function() {
    
    $(".form-edit-nsx{{$all->NhaSanXuat}}").validate({
        

      rules: {

         name: {
          required: true,
          minlength: 3,
          maxlength: 50
        },
        phone: {
          required: true,
          number: true,
          minlength: 10,
          maxlength: 11
        },



      },
      messages: {

         name: {
          required: "Nhập tên nhà sản xuất",
          minlength: 'Chiều dài tối thiểu 3 kí tự' ,
          maxlength: 'Chiều dài tối đa 50 kí tự'
        },
        phone: {
          required: "Nhập số điện thoại",
          minlength: 'Chiều dài tối thiểu 10 kí tự' ,
          maxlength: 'Chiều dài tối đa 11 kí tự',
          number: "Chỉ nhập số"
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
   $(".button-edit-nsx").click(function() {
        $(".form-edit-nsx{{$all->NhaSanXuat}}").validate({
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
        if ($(".form-edit-nsx{{$all->NhaSanXuat}}").valid()) {
             if (document.getElementById('check_nsx{{$all->idNhaSanXuat}}').value == '1') {
                if (document.getElementById('thanhpho{{$all->idNhaSanXuat}}').value == '0') {
                    alert('Vui lòng chọn thành phố');
                    document.getElementById('thanhpho{{$all->idNhaSanXuat}}').focus();
                    return false;
                }else if (document.getElementById('quanhuyen{{$all->idNhaSanXuat}}').value == '0') {
                    alert('Vui lòng chọn quận huyện');
                    document.getElementById('quanhuyen{{$all->idNhaSanXuat}}').focus();
                    return false;
                }
                else if (document.getElementById('xa{{$all->idNhaSanXuat}}').value == '0') {
                    alert('Vui lòng chọn xã, phường, thị trấn');
                    document.getElementById('xa{{$all->idNhaSanXuat}}').focus();
                    return false;
                }else if (document.getElementById('diachi{{$all->idNhaSanXuat}}').value == '') {
                    alert('Vui lòng điền địa chỉ chi tiết');
                    document.getElementById('diachi{{$all->idNhaSanXuat}}').focus();
                    return false;
                }else{
                    return true;
                }
                
            }else{
                return true;
            }
        }
      });
});


</script>
@endforeach
@endsection