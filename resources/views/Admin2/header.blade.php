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
  
  <!-- Custom style CSS-->
  <style type="text/css" media="screen">
    #a:hover{
      color: green;
    }
  </style>

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

    @if(Auth::check())
      <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#"
        id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <img src="public/admin_new/images/user1.png" class="img-responsive" alt="User">
          {{ Auth::user()->name }}
        </a>

        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
          <a class="dropdown-item" href="get_infomation_user{{ Auth::user()->id }}">
            Thông tin tài khoản
          </a>
          <div class="dropdown-divider"></div>

          <a class="dropdown-item" href="#"
            data-toggle="modal" data-target="#logoutModal">
            Đăng xuất
          </a>
        </div>
      </li>
    @endif

    </ul>

  </nav>

  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="sidebar navbar-nav">

      <li class="nav-item active">
        <a class="nav-link" href="{!! URL::to('index') !!}">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>BẢNG ĐIỀU KHIỂN</span>
        </a>
      </li>

      <li class="nav-item dropdown">

        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown"
          role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-fw fa-folder"></i>
          <span>Các trang</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
  
          <h5 class="dropdown-header" style="color: blue;">Nội dung:</h5>
          <a class="dropdown-item" href="{!! URL::to('get_display_banner') !!}" id="a">
            Banner website
          </a>
          <a class="dropdown-item"
          href="{!! URL::to('get_search_display_information') !!}" id="a">
            Thông tin nổi bật
          </a>
          

          <h5 class="dropdown-header" style="color: blue;">Quản lý người dùng:</h5>
          <a class="dropdown-item" href="{!! URL::to('view_user_admin') !!}" id="a">
          Người dùng
          </a>

         {{--  <a class="dropdown-item" href="{!! URL::to('view_curriculum_admin') !!}" id="a">
          Giáo trình</a> --}}

          {{-- <a class="dropdown-item" href="{!! URL::to('view_scientific_article_admin') !!}" id="a">
          TT/bài báo khoa học</a>

          <a class="dropdown-item" href="{!! URL::to('view_thematic_reports_admin') !!}" id="a">
          Báo cáo chuyên đề</a>

          <a class="dropdown-item" href="{!! URL::to('view_lesson_admin') !!}" id="a">
          Bài giảng</a>
          
          <a class="dropdown-item" href="{!! URL::to('view_overview_report_admin') !!}" id="a">
          Báo cáo tổng quan</a> --}}
        </div>
      </li>

  
       <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown"
          role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-fw fa-folder"></i>
          <span> Tài liệu chờ duyệt</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <h5 class="dropdown-header" style="color: blue;">Các tài liệu liên quan:</h5>
          <a class="dropdown-item" href="{{ URL::to('document_pending') }}" id="a">
            Tài liệu
          </a>

          <a class="dropdown-item"
          href="{{ URL::to('picture_pending') }}" id="a">
            Hình ảnh
          </a>
          <a class="dropdown-item"
          href="{{ URL::to('video_pending') }}" id="a">
            Video
          </a>
        </div>
      </li>
      

      <li class="nav-item">
        <a class="nav-link" href="{!! URL::to('view_book_admin') !!}">
          <i class="fas fa-file-alt"></i>
          <span> Tài liệu đã duyệt</span>
        </a>
      </li>



      <li class="nav-item">
        <a class="nav-link" href="{!! URL::to('get_search_image_admin') !!}">
          <i class="fas fa-image"></i>
          <span>Hình ảnh đã duyệt</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="{!! URL::to('view_embed_video_admin') !!}">
          <i class="fab fa-youtube"></i>
          <span>Video đã duyệt</span></a>
      </li>
    </ul>

    <div id="content-wrapper">
