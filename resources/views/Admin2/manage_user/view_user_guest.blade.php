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

        @if(session()->has('message'))
            <div class="alert alert-success">
                <strong>{{ session()->get('message') }}</strong>
            </div>
        @endif

        <!-- Navbar Search -->
        <h4>Tìm kiếm người dùng:</h4>
        <form class="d-none d-md-inline-block form-inline 
        ml-auto mr-0 mr-md-3 my-2 my-md-0"
        method="GET" action="{{ route('get_search_user_guest') }}">

          {{ csrf_field() }}

          <div class="input-group">
            <input type="text" class="form-control" name="txt_timkiem" 
            placeholder="Nhập tìm kiếm ...">

            <div class="input-group-append">
              <button class="btn btn-primary" type="submit">
                <i class="fas fa-search"></i>
              </button>
            </div>

          </div><br>
        </form>
        <!-- Navbar Search -->


        <div class="card mb-3">

          <div class="card-header" id="card-header">
            <h4><i class="fas fa-table"></i>&nbsp;Danh sách người dùng trang khách</h4>
          </div>

          <div class="card-body" id="card-body">
            
            <div class="table-responsive">
                <table class="table table-bordered">
                  <thead align="center">
                    <tr>
                      <th>STT</th>
                      <th>Họ và tên</th>
                      <th>Email</th>
                      <th>Mật khẩu</th>
                      
                      <th>Địa chỉ</th>
                      <th>Tuổi</th>
                      <th>Giới tính</th>
                      <th>Nghệ nghiệp</th>
                      <th>Quyền truy cập</th>

                      <th>Hành động</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $i=1; ?>
                    @if(isset($users))
                    @foreach($users as $user)

                    <tr>
                      <td align="center"><?php echo $i++; ?></td>

                      <td>{!! $user->name !!}</td>
                      <td>{!! $user->email !!}</td>
                      <td>{!! $user->password !!}</td>

                      <td>{!! $user->address !!}</td>
                      <td>{!! $user->old !!}</td>
                      <td>{!! $user->sex !!}</td>
                      <td>{!! $user->job !!}</td>
                      <td>{!! $user->level !!}</td>

                      <td>
                        <a href="get_delete_user_guest{{ $user->id }}" role="button"
                          onclick="return xacnhanxoa('Bạn có chắc chắn xóa không?')"
                          class="btn btn-danger" data-toggle="tooltip" title="Xóa">
                          <i class="fas fa-trash-alt"></i>
                        </a>
                      </tr>

                    @endforeach
                    
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

                    <script>
                      $(document).ready(function(){
                        $('[data-toggle="tooltip"]').tooltip();   
                      });
                    </script>

                  </tbody>
                </table>
              </div>

          </div>
          <!-- end-card-body -->
        </div><br>
        {{-- end_col --}}
            <div class="row">
              <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                <nav>
                  <ul class="pagination justify-content-end">
                       {{$users->links('vendor.pagination.bootstrap-4')}}
                  </ul>
                </nav>
              </div>
            </div>
      </div>
      {{-- end_row1 --}}
      @endif
	</div>
  {{-- end_container --}}

@include('Admin2.footer')
