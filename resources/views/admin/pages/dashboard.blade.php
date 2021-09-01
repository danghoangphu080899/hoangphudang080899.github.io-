@extends('admin.index')
@section('dashboard')
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{$count_order}}</h3>

                <p>Đơn hàng mới</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="{{route('all_order')}}" class="small-box-footer">Xem cho tiết <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{number_format($total,0,",",".")}}<sup style="font-size: 20px">đ</sup></h3>

                <p>Doanh thu trong tháng</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" class="small-box-footer">Xem chi tiết <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{$count_user}}</h3>

                <p>Khách hàng</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="{{route('all_user')}}" class="small-box-footer">Xem chi tiết <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>{{$count_total}}</h3>

                <p>Lượt truy cập </p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer">Xem chi tiết <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
          <section class="col-lg-12 connectedSortable" >
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fas fa-chart-pie mr-1"></i>
                  Thống kê danh thu
                </h3>
                <div class="card-tools">
                  <button type="button" class="btn bg-info btn-sm" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn bg-info btn-sm" data-card-widget="maximize"><i class="fas fa-expand"></i></button>
                  <button type="button" class="btn bg-info btn-sm" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content p-0">
                  <form >
                    @csrf
                  
                  <div class="col-md-12 " style="display: flex;">
                    <div class="col-md-2">
                      <p>Từ ngày: <input type="text" name="" id="datepicker" data-provide="datepicker" class="form-control"></p>
                      
                  </div>
                  <div class="col-md-2">
                    <p>Đến ngày: <input type="text" name="" id="datepicker2" class="form-control"></p>
                  </div>
                  <div class="col-md-2">
                    <p>Lọc theo: 
                        <select class="dashboard-filter form-control">
                          <option >--none--</option>
                          <option value="7ngay">7 ngày qua</option>
                          <option value="thangtruoc">Trong tháng trước</option>
                          <option value="thangnay">Trong tháng này</option>
                          <option value="365ngay">Trong năm nay</option>
                        </select>
                    </p>
                  </div>

                  <div class="col-md-2">
                    <br>
                    <p><input type="button" name="" id="btn-dashboard" class="btn btn-primary" value="Lọc"></p>
                  </div>
                  </div>
                  </form>
                  <!-- Morris chart - Sales -->
                  <div class="chart tab-pane active" id="bar-chart" style="position: relative; height: 300px;">   
                   </div>
                  <div class="chart tab-pane" id="line-chart" style="position: relative; width: 100%;" >
                  </div>
                </div>
              </div><!-- /.card-body -->
            </div>
            <div class="card bg-gradient-info">
              <div class="card-header border-0">
                <h3 class="card-title">
                  <i class="fas fa-th mr-1"></i>
                  Thống kê
                </h3>

                <div class="card-tools">
                  <button type="button" class="btn bg-info btn-sm" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn bg-info btn-sm" data-card-widget="maximize"><i class="fas fa-expand"></i></button>
                  <button type="button" class="btn bg-info btn-sm" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>

                </div>
              </div>
              <div style="display: flex" class="card-body ">
                <div class="col-md-4">
                  <h3 class="text-center font-weight-bold">Thống kê số lượng</h3>
                  <div id="donut"></div>
                </div>
                <div class="col-md-4">
                  <h4 class="text-center font-weight-bold " >Top các sản phẩm bán nhiều nhất</h4>
                  <ul class="top-sold">
                    @foreach($top_sold as $top)
                    <li>{{$top->TenSanPham}}</li>
                    @endforeach
                  </ul>
                </div>
                <div class="col-md-4">
                  <h4 class="text-center font-weight-bold" >Top bài viết lượt xem nhiều nhất</h4>
                  <ul class="top-view">
                     @foreach($top_view as $top)
                    <li>{{$top->TenSanPham}}</li>
                    @endforeach
                  </ul>
                </div>
              </div>
              <!-- /.card-body -->
              
              <!-- /.card-footer -->
            </div>
          </section>

            <!-- /.card -->
          
          <!-- Left col -->
          
          
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <script type="text/javascript">
      $(document).ready(function() {
        var colorDanger = "#FF1744";
        Morris.Donut({
          element: 'donut',
          resize: true,
          
          colors: [
            '#e1141d',
            '#004586',
            '#ffd320',
            '#579d1c',
            '#7e0021',
            '#83caff',
            '#00ACC1',
            '#ff420e',
            '#00838F',
            '#006064'
          ],
          //labelColor:"#cccccc", // text color
          //backgroundColor: '#333333', // border color
          data: [
            {label:'SẢN PHẨM', value:<?php echo $count_product ?>},
            {label:"ĐƠN HÀNG", value:<?php echo $count_order ?>},
            {label:"BÀI VIẾT", value:<?php echo $count_post ?>},
            {label:"KHÁCH HÀNG", value:<?php echo $count_user ?>},
            {label:"TRUY CẬP", value:<?php echo $count_total ?>}
          ]
        });


});
    </script>
@endsection