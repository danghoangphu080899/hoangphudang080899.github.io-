<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Hoàng Phú | Dashboard</title>

    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <!-- Place favicon.ico in the root directory -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('public/frontend/images/favicon.ico')}}">
    <link rel="apple-touch-icon" href="apple-touch-icon.png">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="{{asset('public/backend/custom.css')}}">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('public/backend/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{asset('public/backend/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{asset('public/backend/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{asset('public/backend/plugins/jqvmap/jqvmap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('public/backend/dist/css/adminlte.min.css')}}">
  <link rel="stylesheet" href="{{asset('public/frontend/css/toastr.min.css')}}">
  <link rel="stylesheet" href="{{asset('public/frontend/css/alertify.min.css')}}">
  <!-- overlayScrollbars -->
      <!-- Themify Icons -->
    <link rel="stylesheet" href="{{asset('public/frontend/css/themify-icons.css')}}">
  <link rel="stylesheet" href="{{asset('public/backend/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{asset('public/backend/plugins/daterangepicker/daterangepicker.css')}}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{asset('public/backend/plugins/summernote/summernote-bs4.min.css')}}">
  <!-- css table -->
  <link rel="stylesheet" href="{{asset('public/backend/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('public/backend/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('public/backend/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('public/backend/morris.css')}}">
  <script src="{{asset('public/backend/js/feather.min.js')}}"></script>

<!-- jQuery -->
<script src="{{asset('public/backend/plugins/jquery/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('public/backend/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<script src="{{asset('public/backend/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('public/backend/plugins/toastr/toastr.min.js')}}"></script>
<script src="{{asset('public/backend/plugins/summernote/summernote-bs4.js')}}"></script>
<script src="{{asset('public/backend/plugins/moment/moment.min.js')}}"></script>
<script src="{{asset('public/backend/plugins/daterangepicker/daterangepicker.js')}}"></script>

</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->


  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{route('dashboard')}}" class="nav-link">Trang chủ</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Liên hệ</a>
      </li>
    </ul>

    <!-- Right navbar links -->
        
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->

      {{-- <li class="nav-item">

        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li> --}}

      <!-- Messages Dropdown Menu -->
      {{-- <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-comments"></i>
          <span class="badge badge-danger navbar-badge">3</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Brad Diesel
                  <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">Call me whenever you can...</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  John Pierce
                  <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">I got your message bro</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Nora Silvester
                  <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">The subject goes here</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
        </div> 
      </li>--}}
      <!-- Notifications Dropdown Menu -->
      {{-- <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li> --}}
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
      <li>
        <div style="float: right;">
              <a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#" data-toggle="dropdown">
                <i class="align-middle" data-feather="settings"></i>
              </a>
              @foreach($name as $name_ad)
              <a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-toggle="dropdown">
                <img style="    width: 30px;
    height: 30spx;" src="{{asset('public/avatar')}}/{{$name_ad->avatar}}" class=" img-fluid rounded mr-1" alt="Charles Hall" /> 
                
                <span class="text-dark">{{$name_ad->nhanvien->HoTen}}</span>
                
              </a>
              @endforeach
              <div class="dropdown-menu dropdown-menu-right">
                <a class="dropdown-item" href="" data-toggle="modal" data-target="#profile"><i class="align-middle mr-1" data-feather="user"></i> Thông tin cá nhân</a>
                {{-- <a class="dropdown-item" href="#"><i class="align-middle mr-1" data-feather="pie-chart"></i> Analytics</a> --}}
                <div class="dropdown-divider"></div>
                {{-- <a class="dropdown-item" href="pages-settings.html"><i class="align-middle mr-1" data-feather="settings"></i> Settings & Privacy</a> --}}
                <a class="dropdown-item" href="{{route('logout')}}"><i class="align-middle mr-1" data-feather="log-out"></i>Đăng xuất</a>
              </div>
           
    </div>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar  sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    {{-- <a href="{{route('dashboard')}}" class="brand-link">
       @foreach($name as $name_ad)
      <img src="{{asset('public/avatar')}}/{{$name_ad->avatar}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: 8;margin-top: 5px;">
        @endforeach
      <span class="brand-text font-weight-light">DashBoard</span>
    </a> --}}

    <!-- Sidebar -->
    <div class="sidebar"> 
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        @foreach($name as $name_ad)
        <div class="image">
          @if($name_ad->avatar ==null)
          <img src="../public/avatar/avatar_default_man.jpg" class="img-circle elevation-2" alt="Avatar default">
          @else
           <img src="{{asset('public/avatar')}}/{{$name_ad->avatar}}" class="img-circle elevation-2" alt="User Image">
          @endif
         

        </div>
        <div class="info">
          
          <a href="{{route('dashboard')}}" class="d-block">{{$name_ad->nhanvien->HoTen}}</a>
         
        </div>
         @endforeach
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Tìm gì.." aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-file-invoice-dollar"></i>
              <p>
                Quản lí đơn hàng
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right"></span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('all_order')}}" class="nav-link">
                  <i class="fas fa-caret-right nav-icon"></i>
                  <p>Danh sách đơn hàng</p>
                </a>
              </li>
              
              
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-mobile"></i>
              <p>
                Quản lí sản phẩm
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right"></span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('all_product')}}" class="nav-link">
                  <i class="fas fa-caret-right nav-icon"></i>
                  <p>Danh sách sản phẩm</p>
                </a>
              </li>
              {{-- <li class="nav-item">
                <a href="{{route('add_product')}}" class="nav-link">
                  <i class="fas fa-caret-right nav-icon"></i>
                  <p>Thêm sản phẩm</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="pages/layout/top-nav-sidebar.html" class="nav-link">
                  <i class="fas fa-caret-right nav-icon"></i>
                  <p>Sửa sản phẩm</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/layout/boxed.html" class="nav-link">
                  <i class="fas fa-caret-right nav-icon"></i>
                  <p>Xóa sản phẩm</p>
                </a>
              </li> --}}
              
            </ul>
          </li>
          
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Quản lí khách hàng
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right"></span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('all_user')}}" class="nav-link">
                  <i class="fas fa-caret-right nav-icon"></i>
                  <p>Danh sách khách hàng</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('add_user')}}" class="nav-link">
                  <i class="fas fa-caret-right nav-icon"></i>
                  <p>Thêm khách hàng</p>
                </a>
              </li>
              
            </ul>
          </li>
      
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user-shield"></i>
              <p>
                Quản lí nhân viên
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right"></span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('all_admin')}}" class="nav-link">
                  <i class="fas fa-caret-right nav-icon"></i>
                  <p>Danh sách nhân viên</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('add_admin')}}" class="nav-link">
                  <i class="fas fa-caret-right nav-icon"></i>
                  <p>Thêm nhân viên</p>
                </a>
              </li>

              
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-grip-horizontal"></i>
              <p>
                Quản lí danh mục
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right"></span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('allCategory')}}" class="nav-link">
                  <i class="fas fa-caret-right nav-icon"></i>
                  <p>Danh sách danh mục</p>
                </a>
              </li>
              
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-toolbox"></i>
              <p>
                Quản lí nhà sản xuất
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right"></span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('all_producer')}}" class="nav-link">
                  <i class="fas fa-caret-right nav-icon"></i>
                  <p>Danh sách nhà sản xuất</p>
                </a>
              </li>


            </ul>
          </li>
          <li class="nav-item" style="    border-bottom: 2px solid #989696;">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-receipt"></i>
              <p>
                Quản lí mã giảm giá
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right"></span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('allCoupon')}}" class="nav-link">
                  <i class="fas fa-caret-right nav-icon"></i>
                  <p>Danh sách mã giảm giá</p>
                </a>
              </li>
              
            </ul>
          </li>
          <li class="nav-item" >
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-receipt"></i>
              <p>
                Danh mục bài viết
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right"></span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('allCatePost')}}" class="nav-link">
                  <i class="fas fa-caret-right nav-icon"></i>
                  <p>Danh mục bài viết</p>
                </a>
              </li>
              
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-receipt"></i>
              <p>
                Quản lí bài viết
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right"></span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('allPost')}}" class="nav-link">
                  <i class="fas fa-caret-right nav-icon"></i>
                  <p>Danh sách bài viết</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('addPost')}}" class="nav-link">
                  <i class="fas fa-caret-right nav-icon"></i>
                  <p>Thêm bài viết mới</p>
                </a>
              </li>
              
            </ul>
          </li>
          



          </ul>
            
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
       @yield('dashboard')
       @yield('allCoupon')
       @yield('allProduct')
       @yield('allCategory')
      @yield('allUser')
      @yield('addUser')
      @yield('addAdmin')
      @yield('allAmin')
      @yield('allOrder')
      @yield('editOrder')
      @yield('allProducer')
      @yield('allCatePost')
      @yield('addPost')
      @yield('allPost')


      
      
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2017-2021 <a href="">HoangPhu.com</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 8.8.99
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
<div class="modal fade" id="profile" tabindex="-1" role="dialog" >
    <div  class="modal-lg modal-dialog " role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Thông tin cá nhân của bạn</h5> <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
        </div>
        <div class="modal-body ">
         <div class="container">
    <div class="main-body">
    
          <!-- Breadcrumb -->
          <nav aria-label="breadcrumb" class="main-breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Trang chủ</a></li>
              <li class="breadcrumb-item active" aria-current="page">thông tin cá nhân</li>
            </ol>
          </nav>
          <!-- /Breadcrumb -->
    
          <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-column align-items-center text-center">
                    @if($name_ad->avatar ==null)
          <img src="../public/avatar/avatar_default_man.jpg" class="rounded-circle" width="150" alt="Avatar default">
          @else
           <img src="{{asset('public/avatar')}}/{{$name_ad->avatar}}" class="rounded-circle" width="150" alt="User Image">
          @endif
                    
                    <div class="mt-3">
                      <h4 class="font-weight-bold">{{$name_ad->nhanvien->HoTen}}</h4>
                      <p class="text-secondary mb-1">{{$name_ad->email}}</p>
                      <p class="text-muted font-size-sm ">{{$name_ad->nhanvien->DiaChi}}</p>
                    </div>
                  </div>
                </div>
              </div>
              
            </div>
            <div class="col-md-8">
              <div class="card mb-3">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0 font-weight-bold">Họ và Tên: </h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      {{$name_ad->nhanvien->HoTen}}
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0 font-weight-bold">Email: </h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      {{$name_ad->email}}
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0 font-weight-bold">Số điện thoại: </h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      {{$name_ad->nhanvien->SoDienThoai}}
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0 font-weight-bold">Địa chỉ: </h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      {{$name_ad->nhanvien->DiaChi}}
                    </div>
                  </div>
                  <hr>

                </div>
              </div>

              



            </div>
          </div>

        </div>
    </div>
      </div>


    </div>
  </div>
</div>
<!-- jQuery -->
<script src="{{asset('public/backend/plugins/jquery/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('public/backend/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->

<!-- ChartJS -->
<script src="{{asset('public/backend/plugins/chart.js/Chart.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{asset('public/backend/plugins/sparklines/sparkline.js')}}"></script>
<!-- JQVMap -->
<script src="{{asset('public/backend/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{asset('public/backend/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{asset('public/backend/plugins/jquery-knob/jquery.knob.min.js')}}"></script>
<!-- daterangepicker -->
<script src="{{asset('public/backend/plugins/moment/moment.min.js')}}"></script>
<script src="{{asset('public/backend/plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{asset('public/backend/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<!-- Summernote -->
<script src="{{asset('public/backend/plugins/summernote/summernote-bs4.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{asset('public/backend/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('public/backend/dist/js/adminlte.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('public/backend/dist/js/demo.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset('public/backend/dist/js/pages/dashboard.js')}}"></script>
<!-- Table -->
<script src="{{asset('public/backend/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('public/backend/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('public/backend/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('public/backend/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('public/backend/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('public/backend/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('public/backend/plugins/jszip/jszip.min.js')}}"></script>
<script src="{{asset('public/backend/plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{asset('public/backend/plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{asset('public/backend/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('public/backend/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('public/backend/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
<script  src="{{asset('public/backend/js/jquery.validate.js')}}"></script>
<script  src="{{asset('public/backend/js/additional-methods.min.js')}}"></script>
<script src="{{asset('public/backend/js/modernizr.min.js')}}"></script>
<script src="{{asset('public/backend/myscript.js')}}"></script>
<script src="{{asset('public/backend/js/raphael-min.js')}}"></script>
<script src="{{asset('public/backend/js/morris.min.js')}}"></script>
<script>
  $(function () {
    $("#example1").DataTable({
       "order": [[ 0, "desc" ]],
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  });
</script>
<script>
      feather.replace()
    </script>
            <script>

    @if(Session::has('message'))
        var type="{{Session::get('alert-type','info')}}"

toastr.options = {
  "closeButton": true,
  "debug": false,
  "newestOnTop": true,
  "progressBar": true,
  "positionClass": "toast-top-right",
  "preventDuplicates": true,
  "showDuration": "300",
  "hideDuration": "1000",
  "timeOut": "5000",
  "extendedTimeOut": "1000",
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "slideDown",
  "hideMethod": "slideUp",
  "closeMethod" : 'slideUp'
}
        switch(type){
            case 'success':
                toastr.success("{{ Session::get('message') }}");
                break;
            case 'error':
                toastr.error("{{ Session::get('message') }}");
                break;
        }
    @endif
</script>
<script type="text/javascript">
    $('#reservationtime_coupon').daterangepicker({
      timePicker: true,
      timePickerIncrement: 10,
      timePickerSeconds: true,
      timePicker24Hour: true,
        autoUpdateInput: false,  
      drops: 'auto',
      locale: {
        format: 'YYYY-MM-DD HH:mm:ss'
      }

  });
    $('input[name="Ngay"]').on('apply.daterangepicker', function(ev, picker) {
      $(this).val(picker.startDate.format('YYYY-MM-DD HH:mm:ss') + ' - ' + picker.endDate.format('YYYY-MM-DD HH:mm:ss'));
  });
</script>
</body>
</html>
