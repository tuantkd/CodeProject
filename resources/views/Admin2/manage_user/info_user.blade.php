@include('Admin2.header')
  <style type="text/css" media="screen">
    
    #panel{
      background-color: #D4FBF6;
      border-radius: 5px;
      border: 1px solid #5BBCBD;
    }
    
    td{
      font-family: 'Roboto Slab', serif;
      font-size: 23px;
    }

  </style>

  {{-- container --}}
  <div class="container">
    
      <div class="row">
        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3"></div>
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">

        @if(isset($users))
        @foreach($users as $user)

        <div class="panel panel-default" id="panel">
          <div class="panel-body">

            @if(session()->has('message'))
                <div class="alert alert-success" align="center">
                    <strong>{{ session()->get('message') }}</strong>
                </div>
            @endif

            <div class="table-responsive">
              <table class="table table-condensed">
                <tbody>
                  <tr align="center">
                    <td colspan="2"><strong>THÔNG TIN NGƯỜI DÙNG</strong></td>
                  </tr>
                  <tr>
                    <td align="right">Họ và tên:</td>
                    <td>{{ $user->name }}</td>
                  </tr>

                  <tr>
                    <td align="right">Email:</td>
                    <td>{{ $user->email }}</td>
                  </tr>

                  <tr>
                    <td align="right">Địa chỉ:</td>
                    <td>{{ $user->address }}</td>
                  </tr>

                  <tr>
                    <td align="right">Giới tính:</td>
                    <td>{{ $user->sex }}</td>
                  </tr>

                  <tr>
                    <td align="right">Nghề nghiệp:</td>
                    <td>{{ $user->job }}</td>
                  </tr>

                  <tr>
                    <td align="right">Quyền truy cập:</td>
                    <td>{{ $user->level }}</td>
                  </tr>

                  <tr align="center">
                    <td colspan="2">
                      <div class="alert alert-warning" id="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;
                        </button>
                        <strong>Ghi chú quyền truy cập:</strong><br>
                        0. Người dùng <br>1. Người quản trị
                      </div>
                    </td>
                  </tr>

                  <tr align="center">
                    <td colspan="2">
                      <a class="btn btn-primary"
                      href="get_edit_info_user{{ $user->id }}"
                      role="button" onclick="return xacnhanxoa('Bạn có muốn chỉnh sửa thông tin không?')">
                        <i class="fas fa-user-edit"></i> Chỉnh sửa thông tin
                      </a>
                    </td>
                  </tr>

                </tbody>
              </table>
            </div>
            <!--table-->
          </div>
          <!--panel_bpdy-->
        </div>
        <!--panel--> <br>

        @endforeach
        @endif
      </div>
      <!--col6-->
      <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3"></div>
    </div>
    <!--row-->
  </div>
  <!--container-->
           
  <!--XÁC NHẬN XÓA-->
  {{-- <script type="text/javascript">
    function xacnhanxoa(msg){
      if(window.confirm(msg)){
        return true;
      }
      return false;
    }
  </script> --}}
  <!--XÁC NHẬN XÓA-->

@include('Admin2.footer')
