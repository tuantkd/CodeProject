@include('Admin2.header')

  {{-- container --}}
  <div class="container">
     
      <div class="row">

        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
          <div class="panel panel-default">
            <div class="panel-body">
            
            <!-- button thêm thông tin -->
            <div class="text-right">
              <a class="btn btn-primary"
              href="{{ URL::to('get_add_infomation') }}" role="button">
                <i class="fas fa-plus-circle"></i>
                Thêm thông tin mới
              </a>
            </div>


            <!-- Navbar Search -->
            <h4>Tìm kiếm thông tin:</h4>
            <form class="d-none d-md-inline-block form-inline 
            ml-auto mr-0 mr-md-3 my-2 my-md-0"
            method="GET" action="{{ route('get_search_display_information') }}">
            {{ csrf_field() }}

              <div class="input-group">
                <input type="text" class="form-control" name="txt_timkiem" 
                placeholder="Nhập từ khóa cần tìm ...">

                <div class="input-group-append">
                  <button class="btn btn-primary" type="submit">
                    <i class="fas fa-search"></i>
                  </button>
                </div>

              </div><br>
            </form>
            <!-- Navbar Search -->

           


            @if(session()->has('status'))
                <div class="alert alert-success" style="width: 35%;" align="center">
                    <strong>{{ session()->get('status') }}</strong>
                </div>
            @endif
            

              <div class="table-responsive">
                <table class="table table-bordered">
                  <tbody>

                    <thead class="thead-dark">
                      <th>STT</th>
                      <th>Thông tin</th>
                      <th colspan="2">Tùy chọn</th>
                   </thea12>
                  
                  <?php $i=1; ?>
                  @if(isset($data_info))
                  @foreach($data_info as $value)

                    <tr>
                        <td rowspan = "4" align="center">
                            <strong><?php echo $i++; ?></strong>
                        </td>

                        <td>
                          <strong style="color: blue;">Tiêu đề:</strong> 
                          {{ $value->title }}
                        </td>

                        <td rowspan = "4" align="center">
                          <a class="btn btn-primary" data-toggle="tooltip" title="Chỉnh sửa"
                            href="get_edit_information{!! $value->id !!}" 
                            role="button">
                            <i class="far fa-edit"></i>
                          </a>
                        </td>

                        <td rowspan = "4" align="center">
                          <a class="btn btn-danger" 
                            href="get_delete_information{!! $value->id !!}"
                            role="button" data-toggle="tooltip" title="Xóa"
                            onclick="return xacnhanxoa('Bạn có chắc chắn xóa không?')">
                            <i class="fas fa-trash-alt"></i>
                          </a>
                        </td> 
                    </tr>

                    <tr>
                        <td>
                          <strong>Nội dung:</strong>
                          {!! $value->content !!} 
                        </td>
                    </tr>

                    <tr>
                        <td>
                          <strong>Người quản trị:</strong>
                          {{ Auth::user()->name }}
                        </td>
                    </tr>

                    <tr>
                        <td>
                          <strong>Ngày tạo:</strong>
                          {!! date("d-m-Y", strtotime($value->created_at)) !!}
                          &nbsp;&nbsp;
                          <strong>Ngày cập nhật:</strong>
                          {!! date("d-m-Y", strtotime($value->updated_at)) !!}
                        </td>
                    </tr>

                  @endforeach
                  @endif

                  </tbody>
                </table>
              </div>
              {{-- table-responsive --}}

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

              <!--HIỆN THÔNG TIN-->
              <script>
                $(document).ready(function(){
                  $('[data-toggle="tooltip"]').tooltip();   
                });
              </script>
              <!--HIỆN THÔNG TIN-->
              


            </div>
            {{-- panel-body --}}
          </div> 
          {{--panel-default--}}   
        </div>
        {{-- end_col12 --}}

      </div><br>
      {{-- end_row2 --}}

      @if(isset($data_info))
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
          <nav>
            <ul class="pagination justify-content-end"> 
                {{ $data_info->links('vendor.pagination.bootstrap-4') }}
            </ul>
          </nav>
        </div>
      </div>
      @endif



	</div>
  {{-- end_container --}}

@include('Admin2.footer')
