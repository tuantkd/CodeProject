@include('Admin2.header')

  <style type="text/css" media="screen">
    #card-header{
      background-color: #87CEEB;
    }
  </style>

   
  {{-- container --}}
  <div class="container">
    
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <!-- DataTables Example -->

        <div class="btn-group" role="group" aria-label="Basic example">
          <a class="btn btn-primary" href="{!! URL::to('get_search_user_guest') !!}" 
          role="button">Người dùng trang khách</a>

          <a class="btn btn-primary" href="{!! URL::to('view_user_admin') !!}" 
          role="button">Người dùng trang quản lý</a>
        </div>

        <hr>

        <div class="text-right">
          <a class="btn btn-primary" href="{!! URL::to('get_add_user_admin') !!}"
          role="button">
            <i class="fas fa-user-plus"></i>&nbsp;
            Thêm người dùng quản lý
          </a>
        </div><br>
        
        @if(session()->has('message'))
            <div class="alert alert-success" style="width: 40%;" align="center">
                <strong>{{ session()->get('message') }}</strong>
            </div>
        @endif


        <div class="card mb-3">

          <div class="card-header" id="card-header">
            <h4><i class="fas fa-table"></i>&nbsp;Danh sách người dùng trang quản lý</h4>
          </div>

          <div class="card-body" id="card-body">
            
            <div class="table-responsive">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th>STT</th>
                      <th>Họ và tên</th>
                      <th>Mật khẩu</th>
                      <th>Email</th>
                      <th>Địa chỉ</th>
                      <th>Giới tính</th>
                      <th>Nghề nghiệp</th>
                      <th>Quyền truy cập</th>
                     {{--  <th>Tùy chọn</th> --}}
                    </tr>
                  </thead>
                  <tbody>
                    
                    <?php $i=1; ?>
                    @foreach($user_admin as $user)
                    <tr>
                      <td><strong><?php echo $i++; ?></strong></td>
                      <td>{!! $user->name !!}</td>
                      <td>{!! $user->password !!}</td>
                      <td>{!! $user->email !!}</td>
                      <td>{!! $user->address !!}</td>
                      <td>{!! $user->sex !!}</td>
                      <td>{!! $user->job !!}</td>
                      <td>{!! $user->level !!}</td>
              
                      {{-- <td>
                        <a href="get_delete_user_admin{{ $user->id }}" role="button"
                          onclick="return xacnhanxoa('Bạn có chắc chắn xóa không?')"
                          class="btn btn-danger" data-toggle="tooltip" title="Xóa">
                          <i class="fas fa-trash-alt"></i>
                        </a>
                      </td> --}}
                    </tr>

                    @endforeach
                    
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

                    {{-- <script>
                      $(document).ready(function(){
                        $('[data-toggle="tooltip"]').tooltip();   
                      });
                    </script> --}}

                  </tbody>
                </table>
              </div>

          </div>
          <!-- end-card-body -->
    
        </div>
        {{-- end_col --}}
      </div>
      {{-- end_row1 --}}


	</div>
  {{-- end_container --}}

@include('Admin2.footer')
