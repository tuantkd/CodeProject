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
        

        <!-- Navbar Search -->
        <h4>Tìm kiếm hình ảnh:</h4>
        <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0"
        method="GET" action="{{ route('picture_pending') }}">
          {{ csrf_field() }}

          <div class="input-group">
            <input type="text" class="form-control" name="txt_timkiem" 
            placeholder="Nhập từ khóa tìm ...">

            <div class="input-group-append">
              <button class="btn btn-primary" type="submit">
                <i class="fas fa-search"></i>
              </button>
            </div>

          </div><br>
        </form>
        <!-- Navbar Search -->
        
        @if(session()->has('message'))
            <div class="alert alert-success" style="width: 20%;" align="center">
                <strong>{{ session()->get('message') }}</strong>
            </div>
        @endif


        <div class="card mb-3">
          <div class="card-header" id="card-header">
            <h4><i class="fas fa-table"></i>&nbsp;Hình ảnh chờ duyệt</h4>
          </div>

          <div class="card-body" id="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
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
                      <th>Tùy chọn</th>
                    </tr>
                  </thead>
                  <tbody>
                  
                    <?php $i=1; ?>

                    @if(isset($picture_pendings))
                    @foreach($picture_pendings as $picture_pending)

                    @php($users = DB::table('users')
                    ->where('id', $picture_pending->id_user_fk)->get())

                    <tr>
                      <td><strong><?php echo $i++; ?></strong></td>
                      <td>{{ $picture_pending->title_file }}</td>
                      <td>{{ $picture_pending->content }}</td>

                      @foreach($users as $user)
                        <td>{!! $user->name !!}</td>
                      @endforeach
                      
                      <td>{{ $picture_pending->kind }}</td>
                      <td>{{ $picture_pending->source }}</td>
                     
                      <td>
                        <a data-toggle="tooltip" title="Click xem hình"
                        href="display_picture_pending{{ $picture_pending->id }}">
                        <img src="{{ URL::to('public/upload_document_images/'
                        .$picture_pending->file_name) }}" 
                        alt="Ảnh bìa tài liệu" width="100" height="120">
                        </a>
                      </td>

                      <td>
                        {!! date("d-m-Y", strtotime($picture_pending->created_at)) !!}
                      </td>
                      <td>
                        {!! date("d-m-Y", strtotime($picture_pending->updated_at)) !!}
                      </td>

                      <td>
                        <a class="btn btn-success" data-toggle="tooltip" title="Duyệt"
                        href="load_form_picture{{ $picture_pending->id }}" role="button">
                          <i class="fas fa-check-circle"></i>
                        </a>
                      </td>

                     
                    </tr>

                    @endforeach
                    @endif

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

                    <!--Hiện thông tin-->
                    <script>
                      $(document).ready(function(){
                        $('[data-toggle="tooltip"]').tooltip();   
                      });
                    </script>
                    <!--Hiện thông tin-->

                  </tbody>
                </table>
              </div><br>

              @if(isset($picture_pendings))
              <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                  <nav>
                    <ul class="pagination justify-content-end">
                         {{ $picture_pendings->links('vendor.pagination.bootstrap-4') }}
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


	</div>
  {{-- end_container --}}

@include('Admin2.footer')
