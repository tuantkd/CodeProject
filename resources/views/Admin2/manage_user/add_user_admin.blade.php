@include('Admin2.header')


  <style type="text/css" media="screen">
    #pannel{
      border: 1px solid #178286;
      border-radius: 5px;
    }
    
  </style>

  {{-- container --}}
  <div class="container">
    
      <div class="row">
      
      <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3"></div>
      <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6" id="pannel"><br>
      <h2 align="center">Thêm người dùng trang quản lý:</h2><br>

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
          action="{!! route('post_add_user_admin') !!}">
          <input type="hidden" name="_token" value="{!! csrf_token() !!}"/>

            <div class="form-group">
                <h4>Họ và tên:</h4>
                <input type="text" class="form-control"
                placeholder="Nhập họ và tên đầy đủ" name="txt_fullname">
            </div>


            <div class="form-group">
              <h4>Email:</h4>
                <input type="email" class="form-control" style="width: 60%;"
                placeholder="Nhập địa chỉ email" name="txt_email"
                value="{{ old('txt_email') }}" required autofocus>
            </div>

           
            <div class="form-group">
              <h4>Mật khẩu:</h4>
              <input type="password" class="form-control" style="width: 60%;"
              name="txt_password" placeholder="Nhập mật khẩu">
            </div>

            

            <div class="form-group">
              <h4>Địa chỉ:</h4>
                <input type="text" class="form-control"
                placeholder="Nhập địa chỉ" name="txt_address">
            </div>

            <div class="form-group">
              <h4>Nghề nghiệp:</h4>
                <input type="text" class="form-control"
                placeholder="Nhập nghề nghiệp" name="txt_job">
            </div>
            
            <div class="form-group">
              <h4>Giới tính:</h4>
                <select name="txt_sex" class="form-control" style="width: 30%;">
                  <option value="">-- Chọn --</option>
                  <option value="Nữ">Nữ</option>
                  <option value="Nam">Nam</option>
                </select>
            </div>
            
            
            <div class="form-group">
              <h4>Quyền truy cập:</h4>
                <select name="txt_level" class="form-control" style="width: 30%;">
                  <option value="">-- Chọn --</option>
                  <option value="0">Người dùng</option>
                  <option value="1">Quản lý</option>
                </select>
            </div>

            
        
            <div class="text-right">
                <button type="submit" class="btn btn-primary">
                THÊM
                </button>
            </div>
          </form><br>
          

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
