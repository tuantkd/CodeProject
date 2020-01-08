@include('Admin2.header')


  <style type="text/css" media="screen">
    #pannel{
      background-color: #D4FBF6;
      border-radius: 5px;
      border: 1px solid #09A788;
    }
    h4{
      color: #192904;
    }
    h2{
      color: #192904;
    }
    
  </style>

  {{-- container --}}
  <div class="container">
    
      <div class="row">
      
      <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3"></div>
      <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6" id="pannel"><br>
      <h2 align="center">Chỉnh sửa thông tin cá nhân:</h2><br>

      <div class="panel panel-default">
        <div class="panel-body">


          @if ($errors->any())
              <div class="alert alert-danger">
                  <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              </div>
          @endif

          <form method="post" enctype="multipart/form-data"
          action="get_update_info_user{{ $edit_info->id }}">

            {!! csrf_field() !!}
            {!! method_field('PUT') !!}

            <div class="form-group">
                <h4>Họ và tên:</h4>
                <input type="text" class="form-control"
                value="{{ $edit_info->name }}" name="txt_fullname">
            </div>

            <div class="form-group">
              <h4>Email:</h4>
                <input type="email" class="form-control" style="width: 50%;"
                value="{{ $edit_info->email }}" name="txt_email">
            </div>

      
            <div class="form-group">
              <h4>Giới tính: ({{ $edit_info->sex }})</h4>
            </div>

            <div class="form-group">
              <h4>Nghề nghiệp:</h4>
                <input type="text" class="form-control" style="width: 50%;"
                value="{{ $edit_info->job }}" name="txt_job">
            </div>
            
            {{-- <div class="form-group">
              <h4>Nhập mật khẩu mới nếu muốn thay đổi!:</h4>
              <input type="password" class="form-control" style="width: 50%;"
              name="txt_password" id="input" value="{{ $edit_info->password }}">
            </div> --}}
            
            <div class="form-group">
              <h4>Quyền truy cập: {{ $edit_info->level }}</h4>
            </div>

            <div class="form-group">
              <h4>Địa chỉ:</h4>
                <input type="text" class="form-control"
                value="{{ $edit_info->address }}" name="txt_address">
            </div>
        
            <div class="text-right">
                <button type="submit" class="btn btn-primary"
                onclick="return xacnhanxoa('Bạn chắc chắn muốn chỉnh sửa ?')">
                Đồng ý
                </button>
            </div>
          </form><br>


          <!--XÁC NHẬN XÓA-->
          <script type="text/javascript">
            function xacnhanxoa(msg){
              if(window.confirm(msg)){
                return true;
              }
              return false;
            }
          </script>
          <!--XÁC NHẬN XÓA-->
          

        </div>
        {{-- end_panel-body --}}
      </div>
      {{-- end_panel panel-default --}}

    </div>
    {{-- end_col1 --}}
    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3"></div>

  </div>
  {{-- end_container --}}



@include('Admin2.footer')
