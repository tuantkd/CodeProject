@include('Admin2.header')

  {{-- container --}}
  <div class="container">

      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

          
          <div class="text-right">
            <a class="btn btn-success" href="{{ URL::to('get_banner') }}"
            role="button">
            <i class="far fa-file-image"></i>
              Thêm banner web
            </a>
          </div><br>


          @if(session()->has('status'))
              <div class="alert alert-success" style="width: 30%;" align="center">
                  <strong>{{ session()->get('status') }}</strong>
              </div>
          @endif 

          <div class="panel panel-default">
            <div class="panel-body">
              <div class="table-responsive">
                <table class="table table-bordered">
                  <thead class="thead-dark">
                    <tr>
                      <th>STT</th>
                      <th>Hình ảnh upload banner</th>
                      <th colspan="2">Hành động</th>
                    </tr>
                  </thead>
                  <tbody>

                    <?php $i=1; ?>
                    @if(isset($image_banners))
                    
                    @foreach($image_banners as $image)
                      
                      <tr>

                          <td rowspan = "4" align="center">
                            <strong><?php echo $i++; ?></strong>
                          </td>

                          <td>
                            <strong style="color: #C49E06;">Tiêu đề:</strong> 
                            {{ $image->title }}
                          </td>

                          <td rowspan = "4" align="center">
                            <a class="btn btn-primary" data-toggle="tooltip" title="Chỉnh sửa"
                            href="get_edit_banner{!! $image->id !!}" 
                            role="button"><i class="far fa-edit"></i></a>
                          </td>

                          <td rowspan = "4" align="center">
                            <a class="btn btn-danger" data-toggle="tooltip" title="Xóa"
                              href="get_delete_banner{!! $image->id !!}" role="button"
                              onclick="return xacnhanxoa('Bạn có chắc chắn xóa không?')">
                              <i class="fas fa-trash-alt"></i>
                            </a>
                          </td> 

                      </tr>

                      <tr>
                          <td>
                            <a href="display_banner{{ $image->id }}"
                              data-toggle="tooltip" title="Click xem hình ảnh">
                              <img src="{!! URL::to('public/image_banner/' .$image->image) !!}" 
                              alt="Banner_web" width="450" height="100">
                            </a>
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
                            {!! date("d-m-Y", strtotime($image->created_at)) !!}
                            &nbsp;&nbsp;&nbsp;&nbsp;

                            <strong>Ngày cập nhật:</strong>
                            {!! date("d-m-Y", strtotime($image->updated_at)) !!}
                          </td>
                      </tr>
                    
                    @endforeach
                    @endif

                  </tbody>
                </table>
              </div>

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

            </div><br>
            {{-- end_panel-body --}}

            <div class="row">
              <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                <nav>
                  <ul class="pagination justify-content-end"> 
                      {{ $image_banners->links('vendor.pagination.bootstrap-4') }}
                  </ul>
                </nav>
              </div>
            </div>


          </div>
          {{-- end_panel panel-default --}}
         
        </div>
        {{-- end_col2 --}}
      </div>
      {{-- end_row2 --}}


	</div>
  {{-- end_container --}}

@include('Admin2.footer')
