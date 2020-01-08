<!DOCTYPE html>
<html lang="vi">
<head>
  <title>@yield('title')</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  


  <meta property="og:url"           content="https://www.your-domain.com/your-page.html" />
  <meta property="og:type"          content="website" />
  <meta property="og:title"         content="Your Website Title" />
  <meta property="og:description"   content="Your description" />
  <meta property="og:image"         content="public/admin_new/images/image_icon_title.png" />





  <link rel="icon" type="image/ico" href="public/admin_new/images/image_icon_title.png" />
  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href='https://fonts.googleapis.com/css?family=Bai Jamjuree' rel='stylesheet'>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>


  <div id="fb-root"></div>
  <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v3.3"></script>
  

  <style>
    /* Add a gray background color and some padding to the footer */
    #container{
      background-color: white;
    }
    #pannel_footer{
      color: white;
      font-family: 'Chonburi';font-size: 18px;
    }
    #navbar-form{
      text-align: center;
    }

    img{
      height: 50px; width: 250px;
      margin-top: 5px; margin-right: 10px; margin-left: 5px; margin-bottom: 0px;
    }

    #nav_menu{
      background-color: #65BAF7; 
      border: 1px solid #65BAF7;
      margin: auto;
      text-align: center;
    }
    #li_home{
      background-color: #4B72FD;
      text-align: center;
    }
    #li_home a{
      font-size: 28px;  color: white;
      margin: auto;
      text-align: center;
    }

    #a_list:hover{
      color: green; 
    }


    body {
      background-image: url('public/eeps/back.jpg');
      background-attachment: fixed;
      background-position: center;
      background-size: auto;
      background-repeat: no-repeat;
    }
    

    .carousel-inner img {
      width: 100%; /* Set width to 100% */
      min-height: 220px;
    }

    /* Hide the carousel text when the screen is less than 600 pixels wide */
    @media (max-width: 600px) {
      .carousel-caption {
        display: none; 
      }
    }

    #a_list{
      color: white; margin-top: 3px;
      font-size: 18px;
      text-decoration: none;
      text-align: center;
    }
    #a_list:hover{
      color: green; 
      font-size: 18px;
    }
    #a_dropdown-menu{
      color: green;
      font-size: 18px;
    }
    #a_dropdown-menu:hover{
      background-color: #D7D4D4;
    }
    input{
      border: 0px;
    }
  </style>

</head>
<body>
<div class="container" id="container">{{-- khung_chinh --}} <br><br>
  
<nav class="navbar navbar-inverse navbar-fixed-top" id="nav_menu">
  <div class="container-fluid">

    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>

      <a href="{{ URL::to('/') }}">
        <img src="{{ asset('public/eeps/logo_web.png') }}" alt="logo">
      </a>
    </div>

    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">

        <li id="li_home">
          <a href="{{ URL::to('/') }}"><i class="fas fa-home"></i></a>
        </li>


        <ul class="nav navbar-nav">
          <li>
            <a href="{{ URL::to('view_video') }}" id="a_list">VIDEO</a>
          </li>

          <li>
            <a href="{{ URL::to('view_list_picture') }}" id="a_list">HÌNH ẢNH</a>
          </li>

          <li class="dropdown">
            
            <a class="dropdown-toggle" data-toggle="dropdown" href="#" style="background-color: #65BAF7;" id="a_list">
            TÀI LIỆU
            <span class="caret"></span></a>
            <ul class="dropdown-menu" style="background-color: white;">

              <li>
                <a href="{{ URL::to('view_list_book') }}" id="a_dropdown-menu">
                SÁCH
                </a>
              </li>

              <li>
                <a href="{{ URL::to('view_list_curriculum') }}" id="a_dropdown-menu">
                GIÁO TRÌNH
                </a>
              </li>

              <li>
                <a href="{{ URL::to('view_list_science') }}" id="a_dropdown-menu">
                THÔNG TIN/BÀI BÁO KHOA HỌC
                </a>
              </li>

              <li>
                <a href="{{ URL::to('view_list_thematic') }}" id="a_dropdown-menu">
                  BÁO CÁO CHUYÊN ĐỀ
                </a>
              </li>

              <li>
                <a href="{{ URL::to('view_list_lesson') }}" id="a_dropdown-menu">
                BÀI GIẢNG
                </a>
              </li>

              <li>
                <a href="{{ URL::to('view_list_overview') }}" id="a_dropdown-menu">
                BÁO CÁO TỔNG QUAN
                </a>
              </li>

            </ul>
          </li>

          <li>
            <a href="#lienhe" id="a_list">LIÊN HỆ</a>
          </li>
          
          @if(Auth::check())

            <li>
              <form class="navbar-form" id="navbar-form">
                <div class="dropdown">
                  <button class="btn btn-success dropdown-toggle"
                  type="button" data-toggle="dropdown">UPLOAD
                  <span class="caret"></span></button>
                  <ul class="dropdown-menu">
                    <li><a href="{{ URL::to('get_upload_document') }}">
                    Tài liệu</a></li>
                    <li><a href="{{ URL::to('get_upload_image') }}">
                    Hình ảnh</a></li>
                    <li><a href="{{ URL::to('get_upload_video') }}">
                    Video</a></li>
                  </ul>
                </div>
              </form>
            </li>

          @else

            <li>
              <form class="navbar-form" id="navbar-form">
                <a class="btn btn-danger" data-toggle="modal" href='#modal-id' role="button">
                <i class="fas fa-file-upload"></i> UPLOAD</a>
              </form>
            </li>

          @endif

        </ul>
      </ul>

      <style>
        .avatar {
          margin-top: 3px;
          margin-right: auto;  
          vertical-align: middle;
          width: 45px;
          height: 45px;
          border-radius: 50%;
        }
      </style>

      <ul class="nav navbar-nav navbar-right">

        @if(Auth::check())
            <li>
              <img src="{{ asset('public/eeps/user.png') }}" 
              alt="Avatar_user" class="avatar">
            </li>
            <li>
              <form class="navbar-form" id="navbar-form">
                <div class="dropdown">
                  <button class="btn btn-default dropdown-toggle" type="button" 
                  id="menu1" data-toggle="dropdown">
                    {{ Auth::user()->name }}
                  <span class="caret"></span></button>
                  <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
                    <li role="presentation">
                      <a role="menuitem"
                      href="view_personal_customer{{ Auth::user()->id }}">
                      Thông tin tài khoản
                      </a>
                    </li>

                    <li role="presentation"><a role="menuitem" 
                    href="{{ URL::to('get_logout') }}">Đăng xuất</a></li>
                  </ul>
                </div>
              </form>
            </li>
           
        @else
          <style type="text/css">
            #a{
              font-size: 18px;
            }
          </style>
          <li>
            <form class="navbar-form" id="navbar-form">
              <a class="btn btn-primary" id="a" 
              href="{{ URL::to('get_register') }}">
              <i class="fas fa-user"></i> Đăng ký</a>
            </form>
          </li>
          <li>
            <form class="navbar-form" id="navbar-form">
              <a class="btn btn-primary" id="a"
              href="{{ URL::to('get_login') }}" role="button" >
              <i class="fas fa-sign-in-alt"></i> Đăng nhập</a>
            </form>
          </li>
        @endif  

      </ul>{{-- navbar-nav navbar-right --}}
    </div>{{-- collapse navbar-collapse --}}

  </div>
</nav><br>{{-- navbar navbar-inverse navbar-fixed-top --}}

  <div class="row">

      <div class="col-sm-8">
          @yield('banner')
      </div>{{-- col-sm-8 --}}

      <div class="col-sm-4">
          @yield('thongbao')
      </div>{{-- col-sm-4 --}}

  </div><br>{{-- end_row1 --}}
  


  <div class="row">
      @yield('tim_kiem')
  </div>{{-- thanh_tim_kiem --}}


  <div class="row" style="margin: auto;">

      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
          @yield("noidung_tailieu")
      </div>{{-- end_col_12 --}}

  </div>{{-- end_row3 --}}



  <div class="row">

      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
          @yield('noidung_hinh')
      </div>
      {{-- col-xs-12 col-sm-12 col-md-12 col-lg-12 --}}

  </div>{{-- end_row4 --}}
  

  <div class="row">

      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
         @yield('noidung_video')
      </div>

  </div>
  {{-- end_row5 --}}

<div class="row">
  <footer style="background-color: #66CDAA; font-family: 'Raleway', sans-serif;" id="lienhe">
      <p align="left" style="margin-left: 10px; margin-bottom: 0px; color: white;">
           <strong style="font-size: 18px;">Thông tin liên hệ </strong><br>
           Bộ môn Công nghệ Nông thôn - 
           Khoa Phát triển Nông thôn - Trường Đại học Cần Thơ <br>
           Địa chỉ: Khu Hòa An - ĐHCT, số 544, quốc lộ 61, ấp Hòa Đức, xã Hòa An, huyện Phụng Hiệp, tỉnh Hậu Giang <br>
           &copy; Copyright - 2019. Trang web EEPS.org <br>

          <a href="#" style="color: white; text-decoration: none;" > 
            <i class="fa fa-envelope" style="font-size:25px; color: red;"></i> eeps.org@gmail.com
          </a> &nbsp; &nbsp;

          <a href="https://www.facebook.com/WillLe153"
          style="color: black; text-decoration: none;">
            <i class="fab fa-facebook-square" style="font-size:28px; color:blue;"></i>
          </a>&nbsp; &nbsp;

          <a href="https://www.youtube.com/channel/UC2OVQGhHGsprdRT7qNsY6pQ" style="color: black; text-decoration: none;">
            <i class="fab fa-youtube" style="font-size:26px;color:red"></i>
          </a>

      </p>
  </footer>

</div>
{{-- end_row --}}

{{-- ========================================================== MODAL--}}

<div class="modal fade" id="modal-id">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" style="color: red;">Thông báo</h4>
      </div>
      <div class="modal-body">

        <div class="panel panel-default">
          <div class="panel-body">
            <p style="color: red;">Vui lòng đăng nhập thành viên. Tải lên tài liệu!
            </p>
          </div>
        </div>
     
     
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Hủy</button>
        <a class="btn btn-primary" data-toggle="modal" 
        href="{{ URL::to('get_login') }}" 
        id="myBtn">Chuyển trang đăng nhập</a>
      </div>
    </div>
  </div>
</div>


</div>{{-- end_khung_chinh --}}


<script src="{{ asset('public/ckeditor/ckeditor.js') }}"></script>
<script>
        CKEDITOR.replace( 'txt_noidung');
  </script>

<!--Nút nhấp trở lên đầu trang web-->
<a id="back-to-top" href="#" class="btn btn-default btn-lg back-to-top" role="button"
title="Nhấp để quay lại đầu trang" data-toggle="tooltip" data-placement="left">
<span class="glyphicon glyphicon-chevron-up" style="color: blue; font-size: 23px;"></span>
</a>
<!--Nút nhấp trở lên đầu trang web-->

<style type="text/css">
  .back-to-top {
    cursor: pointer;
    position: fixed;
    bottom: 20px;
    right: 20px;
    display:none;
  }
</style>

<script type="text/javascript">
  $(document).ready(function(){
     $(window).scroll(function () {
            if ($(this).scrollTop() > 50) {
                $('#back-to-top').fadeIn();
            } else {
                $('#back-to-top').fadeOut();
            }
        });
        // scroll body to 0px on click
        $('#back-to-top').click(function () {
            $('#back-to-top').tooltip('hide');
            $('body,html').animate({
                scrollTop: 0
            }, 800);
            return false;
        });
        
        $('#back-to-top').tooltip('show');

  });
</script>

</body>
</html>
