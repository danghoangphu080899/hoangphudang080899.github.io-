@extends('admin.index')
@section('allUser')

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Danh sách khách hàng </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
              <li class="breadcrumb-item active">Danh sách khách hàng</li>
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
                    <th>Họ và Tên</th>
                    <th>Avatar</th>
                    <th>Số điện thoại</th>
                    <th>Địa chỉ</th>
                    <th>Email</th>
                    <th>Tình trạng</th>
                    <th>Hành động</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($all_user as $all)
                    
                  <tr id="del_ajax{{$all->idKhachHang}}">
                    
                    <td id="{{$all->idKhachHang}}">{{$all->idKhachHang}}</td>
                    <td><b>{{$all->HoTen}}</b></td>
                    @if($all->avatar ==null)
                       <td><img  src="../public/avatar/avatar_default_man.jpg" class="img-circle elevation-2" style="width: 50px;height: 50px;" alt="Avatar default"></td>
                     @else
                       <td><img style="width: 50px;height: 50px;" class="img-circle elevation-2" src="{{asset('public/avatar/'.$all->avatar)}}" alt="Avatar"></td>
                     @endif
                    <td>{{$all->SoDienThoai}}</td>
                    <td>
                    <select class="custom-select" >
                    @foreach($all->diachi as $key => $ad)
                     <option value="{{$ad->idDiaChi}}">{{$ad->DiaChi}}</option>
                    @endforeach
                     </select>
                    </td>
                    <td>{{$all->email}}</td> 
                    @if($all->TrangThai == 1)
                    <td class="text-center"><span class="badge badge-info">Hoạt động</span></td>
                    @else
                    <td class="text-center"><span class="badge badge-secondary">Khóa</span></td>
                    @endif
                    <td class="table-action text-center mr-auto">
                        <a href="" title="Xem thông tin" data-toggle="modal" data-target="#edit_user_{{$all->idKhachHang}}"><i class="align-middle" data-feather="eye"></i></a>
                        
                          @if($all->TrangThai==0)
                        <a title="Mở khóa" href="javascript:void" onclick="show_user({{$all->id}})"><i class="align-middle" data-feather="unlock"></i></a>
                        @else
                        <a title="Khóa" href="javascript:void" onclick="hidden_user({{$all->id}})"><i class="align-middle" data-feather="lock"></i></a>
                        @endif
                       
                      </td>
                    {{-- <td><a href="{{route('edit_user',[$all->idKhachHang])}}"><img style="width: 30px;height: 30px;" src="../public/frontend/images/icons/edit.png"></a></td>
                    <td><a href="{{route('getdel_user',[$all->taikhoan->id])}}" id="del"><img style="width: 30px;height: 30px;" src="../public/frontend/images/icons/delete.png"></a></td> --}}
                  
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
@foreach($all_user as $user)
<div class="modal fade" id="edit_user_{{$user->idKhachHang}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div  class="modal-lg modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Thông tin khách hàng</h5> <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
        </div>
        <div class="modal-body modal-custom2">
         <div class="card" >  
            <div class="container ">

    <div style="margin-top: 10px;" class="row">
     <div class="col-md-3 text-center align-middle"><!--left col-->
              

      <div class="text-center ">
        @if($user->avatar)
        <img src="{{asset('public/avatar')}}/{{$user->avatar}}" class="avatar img-circle img-thumbnail" alt="avatar">
        @else
        <img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" class="avatar img-circle img-thumbnail" alt="avatar">
        @endif

      </div><hr><br>

               

          
        </div><!--/col-3-->
      <div class="col-md-9">


              
          
           
                
                 
                    <div class="form-row col-md-12">
                        <div class="form-group col-md-6">
                              <label class="label-bold" for="email">Email</label>
                              <input type="email" disabled="disabled" class="form-control" value="{{$user->email}}"  placeholder="you@email.com" title="enter your email.">
                          
                      </div>
                      <div class="form-group col-md-6">
                            <label class="label-bold"  >Họ và Tên</label>
                              <input disabled="" type="text" class="form-control" value="{{$user->HoTen}}"  >
                      </div>
                    </div>
                      
                    <div class="form-row col-md-12">
                      <div class="form-group col-md-6">

                          <label class="label-bold" for="phone">Số điện thoại</label>
                          <input disabled="" type="text"  class="form-control" value="{{$user->SoDienThoai}}" >
                        
                      </div>
                      <div class="form-group col-md-6">
                        <label class="label-bold" for="exampleSelectBorder"> Chức vụ</label>
                        <select class="custom-select " name="position" >
                          
                          @if($user->ChucVu == 1)
                          <option selected="" value="1" >Normal user</option>
                          <option value="3" >Bị khóa</option>
                          @else
                          <option  value="1" >Normal user</option>
                          <option selected="" value="3" >Bị khóa</option>
                          @endif
                          

                        </select>
                      </div>                    
                    </div>
                      
                      <div class="form-row col-md-12">

                      <div class="form-group col-md-12">
                          <label class="label-bold" for="exampleInputEmail1">Địa chỉ</label>
                        <select class="custom-select" >
                    @foreach($user->diachi as $key => $ad)
                     <option value="{{$ad->idDiaChi}}">{{$ad->DiaChi}}</option>
                    @endforeach
                     </select>
                        <span style="display: none;" class="error1-avatar" >
                                                          <i class=" fa fa-exclamation-triangle"></i>
                                                      </span>
                          
                      </div>
                      </div>   
          </div><!--/col-9-->

        </div>
    </div>

        
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-warning" data-dismiss="modal">Đóng</button>
      </div>
    </div>
  </div>
</div>

@endforeach
  @endsection