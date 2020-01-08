<!DOCTYPE html>
<html lang="vi">
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="NguyenVanTuan">

  <title>Admin EEPS</title>

  <link rel="icon" type="image/ico" href="public/admin_new/images/image_icon_title.png" />
  <!-- Custom fonts for this template-->
  <link href="{{ asset('public/admin_new/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">

  <!-- Page level plugin CSS-->
  <link href="{{ asset('public/admin_new/vendor/datatables/dataTables.bootstrap4.css') }}" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="{{ asset('public/admin_new/css/sb-admin.css') }}" rel="stylesheet">
  
  <!-- Custom for fontawesome-->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

</head>

<body id="page-top">

  <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

    <a class="navbar-brand mr-1" href="{!! URL::to('index') !!}">
      <img src="{{ asset('public/admin_new/images/logo-web.png') }}" class="img-responsive" alt="Logo_web">
    </a>

    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
      <i class="fas fa-bars" style="color: blue; font-size: 30px;"></i>
    </button>

    <!-- Navbar Search -->
    <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
      <div class="input-group">
      </div>
    </form>

    <!-- Navbar -->
    <ul class="navbar-nav ml-auto ml-md-0">
      <li class="nav-item dropdown no-arrow mx-1">
        
      </li>
      <li class="nav-item dropdown no-arrow mx-1">
        
      </li>
      <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <img src="public/admin_new/images/user1.png" class="img-responsive" alt="User">Tuấn
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
          <a class="dropdown-item" href="#">Thông tin tài khoản</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Đăng xuất</a>
        </div>
      </li>
    </ul>

  </nav>

  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="sidebar navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="#">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>BẢNG ĐIỀU KHIỂN</span>
        </a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-fw fa-folder"></i>
        <span>Các trang</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <h5 class="dropdown-header" style="color: blue;">Cập nhật nội dung:</h5>
          <a class="dropdown-item" href="{!! URL::to('banner') !!}">Cập nhật banner</a>
          <a class="dropdown-item" href="{!! URL::to('information') !!}">Thông tin nổi bật</a>
          <div class="dropdown-divider"></div>
          <h5 class="dropdown-header" style="color: blue;">Tài liệu:</h5>
          <a class="dropdown-item" href="#">Sách</a>
          <a class="dropdown-item" href="#">Giáo trình</a>
          <a class="dropdown-item" href="#">TT/bài báo khoa học</a>
          <a class="dropdown-item" href="#">Báo cáo chuyên đề</a>
          <a class="dropdown-item" href="#">Bài giảng</a>
          <a class="dropdown-item" href="#">Báo cáo tổng quan</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Hình ảnh liên quan</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">
          <i class="fas fa-fw fa-table"></i>
          <span>Video liên quan</span></a>
      </li>
    </ul>

    <div id="content-wrapper">

      <div class="container-fluid">

      
      <!-- Icon Cards-->
        <div class="row">
          <div class="col-xl-4 col-sm-6 mb-4">
            <div class="card text-white bg-primary o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-comments"></i>
                </div>
                <div class="mr-5">26 Bình luận!</div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="#">
                <span class="float-left">Xem chi tiết!</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
          <div class="col-xl-4 col-sm-6 mb-4">
            <div class="card text-white bg-warning o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-download"></i>
                </div>
                <div class="mr-5">11 Lượt tải về!</div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="#">
                <span class="float-left">Xem chi tiết</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
          <div class="col-xl-4 col-sm-6 mb-4">
            <div class="card text-white bg-success o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-eye"></i>
                </div>
                <div class="mr-5">123 Lượt xem!</div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="#">
                <span class="float-left">Xem chi tiết!</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
          
        </div>

        <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Danh sánh bình luận</div>
          <div class="card-body">
            
            <div class="table-responsive">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th>Họ tên</th>
                    <th>Email</th>
                    <th>Nội dung</th>
                    <th>Ngày</th>
                    <th colspan="2">Tùy chọn</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>Nguyễn Văn Tùng</td>
                    <td>tung@gmail.com</td>
                    <td>Tài liệu rất có ích</td>
                    <td>31/03/2019</td>
                    <td>
                      <a class="btn btn-primary" href="#" role="button">
                        <i class="fas fa-edit"></i>
                      </a>
                    </td>
                    <td>
                      <a class="btn btn-danger" href="#" role="button">
                        <i class="fas fa-trash-alt"></i>
                      </a>
                    </td>
                      
                  </tr>
                </tbody>
              </table>
            </div>

          </div>
          <!-- end-card-body -->
      

      </div>
      <!-- /.container-fluid -->

      <!-- Sticky Footer -->
      <footer class="sticky-footer">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span style="color: black; font-size: 18px; font-style: italic;">
            Copyright © EEPS.org 2019</span>
          </div>
        </div>
      </footer>

    </div>
    <!-- /.content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Sẵn sàng rời khỏi?</h5>
          
        </div>
        <div class="modal-body">Chọn "Đăng xuất" bên dưới nếu bạn đã sẵn sàng kết thúc phiên hiện tại của mình.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Thoát</button>
          <a class="btn btn-primary" href="login.html">Đăng xuất</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="{{ asset('public/admin_new/vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('public/admin_new/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

  <!-- Core plugin JavaScript-->
  <script src="{{ asset('public/admin_new/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

  <!-- Page level plugin JavaScript-->
  <script src="{{ asset('public/admin_new/vendor/chart.js/Chart.min.js') }}"></script>
  <script src="{{ asset('public/admin_new/vendor/datatables/jquery.dataTables.js') }}"></script>
  <script src="{{ asset('public/admin_new/vendor/datatables/dataTables.bootstrap4.js') }}"></script>

  <!-- Custom scripts for all pages-->
  <script src="{{ asset('public/admin_new/js/sb-admin.min.js') }}"></script>

  <!-- Demo scripts for this page-->
  <script src="{{ asset('public/admin_new/js/demo/datatables-demo.js') }}"></script>
  <script src="{{ asset('public/admin_new/js/demo/chart-area-demo.js') }}"></script>


</body>

</html>
