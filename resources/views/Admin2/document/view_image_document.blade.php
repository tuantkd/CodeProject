@include('Admin2.header')

  <style type="text/css" media="screen">
    #card-header{
      background-color: #87CEEB;
    }

    h3{
      color: #006400;
    }
  </style>

  {{-- container --}}
  <div class="container">
    
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

        <!-- DataTables Example -->
        <div class="text-right">
          <a class="btn btn-success" href="{!! URL::to('get_add_image_admin') !!}"
          role="button">
            <i class="fas fa-plus-circle"></i>&nbsp;
            Thêm hình ảnh
          </a>
        </div><br>

          
        <!-- Navbar Search -->
        <h4>Tìm kiếm hình ảnh:</h4>
        <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0"
        method="GET" action="{{ route('get_search_image_admin') }}">

          {{ csrf_field() }}

          <div class="input-group">
            <input type="text" class="form-control" name="txt_timkiem" 
            placeholder="Nhập thể loại hình...">

            <div class="input-group-append">
              <button class="btn btn-primary" type="submit">
                <i class="fas fa-search"></i>
              </button>
            </div>

          </div><br>
        </form>
        <!-- Navbar Search -->
        
        
        <!--Hiển thị thông báo thành công-->
        @if(session()->has('message'))
            <div class="alert alert-success" style="width: 40%;" align="center">
                <strong>{{ session()->get('message') }}</strong>
            </div>
        @endif
        <!--Hiển thị thông báo thành công-->

        <div class="card mb-3">
          <div class="card-header" id="card-header">
            <h4><i class="fas fa-table"></i>&nbsp;Hình ảnh liên quan</h4>
          </div>

          <div class="card-body" id="card-body">
            
            <div class="table-responsive">
                <table class="table table-bordered" id="myTable">
                  <thead>
                    <tr>
                      <th>STT</th>
                      <th>Tiêu đề</th>
                      <th>Nội dung về hình ảnh</th>
                      <th>Người dùng</th>
                      <th>Thể loại</th>
                      <th>Nguồn</th>
                      <th>File Hình ảnh</th>
                      <th>Ngày tạo</th>
                      <th>Ngày cập nhật</th>
                      <th colspan="2">Tùy chọn</th>
                    </tr>
                  </thead>
                  <tbody>
                    
                    <?php $i=1; ?>
                    @if (isset($datas))
                    @foreach( $datas as $image )

                    @php($users = DB::table('users')
                    ->where('id', $image->id_user_fk)->get())

                    <tr>

                      <td><strong><?php echo $i++; ?></strong></td>
                      <td>{{ $image->title_file }}</td>
                      <td>{{ $image->content }}</td>

                      @foreach($users as $user)
                        <td>{!! $user->name !!}</td>
                      @endforeach
                      
                      <td>{{ $image->kind }}</td>
                      <td>{{ $image->source }}</td>
                     
                      <td>
                        <a data-toggle="tooltip" title="Click xem hình"
                          href="display_picture{{ $image->id }}">
                          <img src="{{ URL::to('public/upload_document_images/'
                          .$image->file_name) }}" 
                          alt="Ảnh bìa tài liệu" width="100" height="120">
                        </a>
                      </td>

                      <td>
                        {!! date("d-m-Y", strtotime($image->created_at)) !!}
                      </td>

                      <td>
                        {!! date("d-m-Y", strtotime($image->updated_at)) !!}
                      </td>

                      <td>
                        <a class="btn btn-success" data-toggle="tooltip" title="Chỉnh sửa"
                        href="get_edit_image_admin{{ $image->id }}" role="button">
                          <i class="far fa-edit"></i>
                        </a>
                      </td>

                      <td>
                        <a class="btn btn-danger" data-toggle="tooltip" title="Xóa"
                        href="get_delete_image_admin{{ $image->id }}"
                        onclick="return xacnhanxoa('Bạn có chắc chắn xóa không?')" role="button"> 
                          <i class="far fa-trash-alt"></i>
                        </a>
                      </td>

                    </tr>

                    @endforeach
                    @endif

                  </tbody>
                </table>
              </div><br>

              @if (isset($datas))
                <div class="row">
                  <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                    <nav>
                      <ul class="pagination justify-content-end"> 
                          {{ $datas->links('vendor.pagination.bootstrap-4') }}
                      </ul>
                    </nav>
                  </div>
                </div>
              @endif

             
          </div>
          <!-- end-card-body -->
    
        </div>
        {{-- end_col --}}
      </div>
      {{-- end_row1 --}}

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
  {{-- end_container --}}

@include('Admin2.footer')
