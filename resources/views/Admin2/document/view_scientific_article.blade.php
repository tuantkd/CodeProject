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

        <div class="btn-group" role="group" aria-label="Basic example">
          <a class="btn btn-info" href="{!! URL::to('view_book_admin') !!}" 
          role="button">Sách</a>
          <a class="btn btn-info" href="{!! URL::to('view_curriculum_admin') !!}" 
          role="button">Giáo trình</a>
          <a class="btn btn-info" href="{!! URL::to('view_scientific_admin') !!}" 
          role="button">TT/bài báo khoa học</a>
          <a class="btn btn-info" href="{!! URL::to('view_thematic_reports') !!}" 
          role="button">Báo cáo chuyên đề</a>
          <a class="btn btn-info" href="{!! URL::to('view_lesson_admin') !!}" 
          role="button">Bài giảng</a>
          <a class="btn btn-info" href="{!! URL::to('view_overview_admin') !!}" 
          role="button">Báo cáo tổng quan</a>
        </div>


        <hr>


        <div class="text-right">
          <a class="btn btn-primary" href="{!! URL::to('get_add_scientific_admin') !!}"
          role="button">
            <i class="fas fa-plus-circle"></i>&nbsp;
            Thêm tài liệu tt/bài báo khoa học
          </a>
        </div><br>

        <!-- Navbar Search -->
        <h4>Tìm kiếm tài liệu:</h4>
        <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0"
        method="GET" action="{{ route('view_scientific_admin') }}">

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
            <div class="alert alert-success" style="width: 50%;" align="center">
                <strong>{{ session()->get('message') }}</strong>
            </div>
        @endif

        <div class="card mb-3">
          <div class="card-header" id="card-header">
            <h4><i class="fas fa-table"></i>&nbsp;Tài liệu thông tin bài báo khoa học</h4>
          </div>

          <div class="card-body" id="card-body">
            
            <div class="table-responsive">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th>STT</th>
                      <th>Tiêu đề</th>
                      <th>Thành viên</th>
                      <th>Nội dung tóm tắt</th>
                      
                      <th>Tác giả</th>
                      <th>Năm xuất bản</th>
                      <th>Nguồn</th>
                      <th>File tài liệu</th>
                      <th>Ảnh bìa tài liệu</th>
                      <th>Ngày tạo</th>
                      <th>Ngày cập nhật</th>
                      <th colspan="2">Tùy chọn</th>
                    </tr>
                  </thead>
                  <tbody>
                    
                    <?php $i=1; ?>
                    @if(isset($data_scientific))
                    @foreach($data_scientific as $document)

                    @php($users = DB::table('users')
                    ->where('id', $document->id_user_fk)->get())

                    <tr>
                      <td ><strong><?php echo $i++; ?></strong></td>

                      <td>{!! $document->title_file !!}</td>

                      @foreach($users as $user)
                        <td>{!! $user->name !!}</td>
                      @endforeach

                      <td>{!! $document->content !!}</td>
                      <td>{!! $document->author !!}</td>
                      <td>{!! $document->publish !!}</td>
                      <td>{!! $document->source !!}</td>
                      <td>
                        <a href="display_document{{ $document->id }}"
                          style="text-decoration: none;">
                          {!! $document->file_name !!}
                        </a>
                      </td>

                      <td>
                        <img src="{!! URL::to('public/upload_file_images/'
                        .$document->file_cover_image) !!}" 
                        alt="Ảnh bìa tài liệu" width="100" height="120">
                      </td>

                      <td>
                        {!! date("d-m-Y", strtotime($document->created_at)) !!}
                      </td>

                      <td>
                        {!! date("d-m-Y", strtotime($document->updated_at)) !!}
                      </td>

                      <td>
                        <a class="btn btn-success" data-toggle="tooltip" title="Chỉnh sửa"
                        href="get_edit_scientific{!! $document->id !!}" role="button">
                          <i class="far fa-edit"></i>
                        </a>
                      </td>

                      <td>
                        <a class="btn btn-danger" data-toggle="tooltip" title="Xóa"
                        href="delete_scientific_admin{!! $document->id !!}"
                        onclick="return xacnhanxoa('Bạn có chắc chắn xóa không?')" role="button">
                          <i class="far fa-trash-alt"></i>
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
              </div>

              @if(isset($data_scientific))
                <div class="row">
                  <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                    <nav>
                      <ul class="pagination justify-content-end">
                           {{ $data_scientific->links('vendor.pagination.bootstrap-4') }}
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
